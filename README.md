# Webserver config generator for Laravel 4
[![Latest Stable Version](https://poser.pugx.org/alexsoft/webserver-config-generator/v/stable.svg)](https://packagist.org/packages/alexsoft/webserver-config-generator) [![Total Downloads](https://poser.pugx.org/alexsoft/webserver-config-generator/downloads.svg)](https://packagist.org/packages/alexsoft/webserver-config-generator) [![Latest Unstable Version](https://poser.pugx.org/alexsoft/webserver-config-generator/v/unstable.svg)](https://packagist.org/packages/alexsoft/webserver-config-generator) [![License](https://poser.pugx.org/alexsoft/webserver-config-generator/license.svg)](https://packagist.org/packages/alexsoft/webserver-config-generator)

## Instalation
First install it using Composer. Edit your project's `composer.json` file to require `alexsoft/webserver-config-generator`.

    "require": {
        "alexsoft/webserver-config-generator": "~1.2.0"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Alexsoft\WebserverGenerator\WebserverGeneratorServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `webserver` commands.
