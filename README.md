# Nginx generator for Laravel 4
[![Latest Stable Version](https://poser.pugx.org/alexsoft/nginx-generator/v/stable.svg)](https://packagist.org/packages/alexsoft/nginx-generator) [![Total Downloads](https://poser.pugx.org/alexsoft/nginx-generator/downloads.svg)](https://packagist.org/packages/alexsoft/nginx-generator) [![Latest Unstable Version](https://poser.pugx.org/alexsoft/nginx-generator/v/unstable.svg)](https://packagist.org/packages/alexsoft/nginx-generator) [![License](https://poser.pugx.org/alexsoft/nginx-generator/license.svg)](https://packagist.org/packages/alexsoft/nginx-generator)

## Instalation
First install it using Composer. Edit your project's `composer.json` file to require `alexsoft/nginx-generator`.

    "require": {
        "alexsoft/nginx-generator": "~1.0.4"
    }

Next, update Composer from the Terminal:

    composer update --dev

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Alexsoft\NginxGenerator\NginxGeneratorServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `nginx:generate` command.
