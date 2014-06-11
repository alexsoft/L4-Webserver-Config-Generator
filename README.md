# Webserver config generator for Laravel 4

## Instalation
First install it using Composer. Edit your project's `composer.json` file to require `alexsoft/webserver-config-generator`.

    "require": {
        "alexsoft/webserver-config-generator": "~1.2.0"
    }

Next, update Composer from the Terminal:

    composer update --dev

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Alexsoft\WebserverGenerator\WebserverGeneratorServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `webserver` commands.
