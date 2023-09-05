# Yii2 REST API

~~~
composer install
php init
# edit common/config/main-local.php
php yii migrate
~~~

### Apache2

~~~
sudo nano /etc/apache2/sites-available/yii-api.conf
~~~

~~~
<VirtualHost *:80>
    ServerName yii-api.test
    DocumentRoot "/var/www/yii-api/frontend/web/"

    <Directory "/var/www/yii-api/frontend/web/">
        # use mod_rewrite for pretty URL support
        RewriteEngine on
        # If a directory or a file exists, use the request directly
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # Otherwise forward the request to index.php
        RewriteRule . index.php

        # use index.php as index file
        DirectoryIndex index.php

        # ...other settings...
        # Apache 2.4
        Require all granted
           
        ## Apache 2.2
        # Order allow,deny
        # Allow from all
    </Directory>
</VirtualHost>
   
<VirtualHost *:80>
    ServerName backend.yii-api.test
    DocumentRoot "/var/www/yii-api/backend/web/"
       
    <Directory "/var/www/yii-api/backend/web/">
        # use mod_rewrite for pretty URL support
        RewriteEngine on
        # If a directory or a file exists, use the request directly
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # Otherwise forward the request to index.php
        RewriteRule . index.php

        # use index.php as index file
        DirectoryIndex index.php

        # ...other settings...
        # Apache 2.4
        Require all granted
           
        ## Apache 2.2
        # Order allow,deny
        # Allow from all
    </Directory>
</VirtualHost>
~~~

~~~
sudo a2ensite yii-api.conf
sudo systemctl restart apache2
~~~
