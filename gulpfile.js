var elixir = require('laravel-elixir');

require('laravel-elixir-browserify-official');


elixir(function(mix) {
    mix.sass('app.scss')
       .scripts([
           'font.js',
           'jquery.min.js',
           'bootstrap.min.js'
       ], 'public/js/front.js')
        .scripts([
            'admin.js',
            'jquery.min.js',
            'validator.min.js',
            'bootstrap.min.js'
        ], 'public/js/admin.js');
});
