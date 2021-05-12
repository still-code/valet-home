<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Nadar\PhpComposerReader\ComposerReader;
use Nadar\PhpComposerReader\RequireSection;

class HomeController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function index()
    {
        $path = config('home.folder_path');

        throw_if(!is_dir($path), 'make sure to set the `folder_path` in config/home.php');

        $directories = collect(array_map('basename', File::directories($path)))
            ->map(function ($item) use ($path) {
                $itemPath = $path . $item;
                $items    = (object) [];

                $items->name = $item;

                // default apps
                $items->type  = 'generic';
                $items->class = 'text-gray-800 bg-gray-100 dark:text-gray-100 dark:bg-gray-800';

                $reader = new ComposerReader($itemPath . '/composer.json');
                if ($reader->canRead()) {
                    $section = collect(new RequireSection($reader));

                    // if composer exist, will assume this is a PHP app
                    $items->type  = 'php';
                    $items->class = 'text-indigo-800 bg-indigo-100 dark:text-indigo-100 dark:bg-indigo-800';

                    // read Composer
                    foreach ($this->projects()['composer'] as $app => $project) {
                        if ($this->checkComposer($app, $section)) {
                            $items->type  = $project['type'];
                            $items->class = $project['classes'];
                        }
                    }

                    return $items;
                }

                // done with composer, will check for packages.json
                if (file_exists($itemPath . '/package.json')) {
                    $package = json_decode(file_get_contents($itemPath . '/package.json'), true, 512, JSON_THROW_ON_ERROR); //['keywords'][0];
                    if (isset($package['dependencies']) && $package['dependencies']['react']) {
                        $items->type  = 'react';
                        $items->class = 'text-blue-800 bg-blue-100 dark:text-blue-100 dark:bg-blue-800';
                    } elseif (isset($package['keywords']) && $package['keywords'][0] !== null) {
                        $items->type  = $package['keywords'][0];
                        $items->class = 'text-pink-800 bg-pink-100 dark:text-pink-100 dark:bg-pink-800';
                    }

                    return $items;
                }

                // if there is a manifest, will assume it's a browser EXT!, correct me if I am missing something here!
                if (file_exists($itemPath . '/manifest.json')) {
                    $getContnet = json_decode(file_get_contents($itemPath . '/manifest.json'), true, 512, JSON_THROW_ON_ERROR);
                    if (isset($getContnet['manifest_version'])) {
                        $items->type  = 'extension';
                        $items->class = 'text-fuchsia-800 bg-fuchsia-100 dark:text-fuchsia-100 dark:bg-fuchsia-800';

                        return $items;
                    }
                }

                foreach ($this->projects()['dir'] as $app => $project) {
                    if (is_dir($itemPath . '/' . $app)) {
                        $items->type  = $project['type'];
                        $items->class = $project['classes'];
                    }
                }

                return $items;
            })
            ->values();

        return view('welcome')
            ->with('directories', $directories);
    }

    public function checkComposer($app, $section)
    {
        return $section->contains(function ($value) use ($app) {
            return $value->name === $app;
        });
    }

    public function projects()
    {
        return [
            'generic'  => [ 'type' => 'generic', 'classes' => 'text-gray-800 bg-gray-100 dark:text-gray-100 dark:bg-gray-800' ],
            'composer' => [
                'illuminate/support' => [ 'type' => 'laravel package', 'classes' => 'text-orange-800 bg-orange-100 dark:text-orange-100 dark:bg-orange-800' ],
                'laravel/framework'  => [ 'type' => 'laravel', 'classes' => 'text-red-800 bg-red-100 dark:text-red-100 dark:bg-red-800' ],
                'tightenco/jigsaw'   => [ 'type' => 'jigsaw', 'classes' => 'text-violet-800 bg-violet-100 dark:text-violet-100 dark:bg-violet-800' ],
            ],
            'dir'      => [
                'application' => [ 'type' => 'codeigniter', 'classes' => 'text-amber-800 bg-amber-100 dark:text-amber-100 dark:bg-amber-800' ],
                'wp-content'  => [ 'type' => 'wordpress', 'classes' => 'text-light-blue-800 bg-light-blue-100 dark:text-light-blue-100 dark:bg-light-blue-800' ],
            ],
        ];
    }
}
