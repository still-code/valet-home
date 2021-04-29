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
                $items        = (object) [];
                $items->name  = $item;
                $items->type  = 'generic';
                $items->class = 'text-gray-800 bg-gray-100';

                $reader = new ComposerReader($path . $item . '/composer.json');
                if ($reader->canRead()) {
                    $section = collect(new RequireSection($reader));

                    if ($this->checkType('illuminate/support', $section)) {
                        $items->type  = 'laravel package';
                        $items->class = 'text-orange-800 bg-orange-100';
                    } elseif ($this->checkType('laravel/framework', $section)) {
                        $items->type  = 'laravel';
                        $items->class = 'text-red-800 bg-red-100';
                    } elseif ($this->checkType('tightenco/jigsaw', $section)) {
                        $items->type  = 'jigsaw';
                        $items->class = 'text-violet-800 bg-violet-100';
                    } elseif ($this->checkType('php', $section)) {
                        $items->type  = 'php';
                        $items->class = 'text-indigo-800 bg-indigo-100';
                    } elseif (is_dir($path . $item . '/application')) {
                        $items->type  = 'codeigniter';
                        $items->class = 'text-amber-800 bg-amber-100';
                    } else {
                        $items->type  = 'generic';
                        $items->class = 'text-gray-800 bg-gray-100';
                    }

                    return $items;
                }

                if (file_exists($path . $item . '/package.json')) {
                    $items->type  = json_decode(file_get_contents($path . $item . '/package.json'), true, 512, JSON_THROW_ON_ERROR)['keywords'][0];
                    $items->class = 'text-pink-800 bg-pink-100';

                    return $items;
                }

                if (file_exists($path . $item . '/manifest.json')) {
                    $getContnet = json_decode(file_get_contents($path . $item . '/manifest.json'), true, 512, JSON_THROW_ON_ERROR);
                    if (isset($getContnet['manifest_version'])) {
                        $items->type  = 'extension';
                        $items->class = 'text-fuchsia-800 bg-fuchsia-100';

                        return $items;
                    }
                }

                return $items;
            })
            ->values();

        return view('welcome')
            ->with('directories', $directories);
    }

    public function checkType($app, $section)
    {
        return $section->contains(function ($value) use ($app) {
            return $value->name === $app;
        });
    }
}
