# Fellowship-Management-1.0
Fellowship Management 1.0

This web application uses LAMP or WAMP. The web development framework it uses is CakePHP 3.3.

Apache version: 2.4.23
Mysql version: 5.7.14
PHP version: 5.6.25

After you have a LAMP webserver running, you will need to create the schema in your mysql server by running the my_fellowship.sql file found in the /Code/ directory.

Create the directory fellowship on your webserver. Then copy the contents in /Code/fellowship/* into the fellowship directory in your local machine.

Edit the file /fellowship/app/config/app.php by changing the following lines to correspond to your mysql server configuration:
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            /**
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => '',
            'database' => 'my_fellowship',
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,

To navigate to the homepage type the following in your browser's address bar: http://localhost/fellowship/app/

If everything works then you should see the webpage with content.