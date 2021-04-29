<p align="center"><img src="https://raw.githubusercontent.com/atm-code/valet-home/master/public/images/demo.png"></p>

## Valet Home Site

a small site build with [laravel](https://laravel.com/) to be your home page for your [laravel valet](https://laravel.com/docs/master/valet) sites

- simple and lightweight
- project type
- designed with [tailwindcss](https://tailwindcss.com/)

## but why?

I am lazy to remember all the projects in my `~/sites` and I like beautiful things 😂

## how to

- clone the project to your machine
- run `composer install`
- if you want to customize the look, run `yarn && yarn run dev`
- rename the file `.env.example` to `.env`
- run `php artisan key:generate`
- set your path and description in `config/home.php`
- edit your valet config file `~/.config/valet/config.json`and add:
````
"default": "/Users/Sally/Sites/foo",
````


###
