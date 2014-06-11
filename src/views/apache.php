<VirtualHost *:80>

    # Host that will serve this project.
    ServerName <?=$serverName?>

    # The location of our projects public directory.
    DocumentRoot <?=public_path()?>

    # Useful logs for debug.
    CustomLog <?=$logsPath?>/access.log common
    ErrorLog <?=$logsPath?>/error.log

    # Rewrites for pretty URLs, better not to rely on .htaccess.
    <Directory <?=public_path()?>>
        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^ index.php [L]
        </IfModule>
    </Directory>

</VirtualHost>