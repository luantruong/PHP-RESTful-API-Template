<?php
// Allow Requests From Any Domain
header('Access-Control-Allow-Origin: *');

// Dependencies
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'ezSQL/ez_sql_core.php';
require 'ezSQL/ez_sql_mysql.php';

// Instantiate Slim
$app = new \Slim\Slim();

// Redirect requests with no method call
$app->get('/', function(){ header('Location: http://yourdomain.com');exit(); });

// Add an HTTP GET route that returns static result
$app->get('/example', 'myAPI::exampleStaticMethod');

// Add an HTTP GET route that returns db result
// Update credentials in Database::instance() + query
// in myAPI::exampleDatabaseMethod() to use this
$app->get('/dbexample', 'myAPI::exampleDatabaseMethod');

// Go!
$app->run();

// Create ezSQL Database Instance

class Database
{
    private static $instance;

    private function __construct()
    {
    }

    public static function instance()
    {
        return self::$instance ? self::$instance : self::$instance = new ezSQL_mysql('db-user', 'db-pass', 'db-name', 'db-hostname');
    }
}

// Create API Class & Methods

class myAPI
{
    public static function exampleStaticMethod() {
        return self::output(array('fooKey' => 'barValue'));
    }

    public static function exampleDatabaseMethod() {
        $query = 'SELECT * FROM table ORDER BY field DESC';

        if(!$results = Database::instance()->get_results($query)){
            $results = array('error' => 'No results.');
        }

        return self::output($results);
    }

    private static function output( $data ) {
        header("Content-Type: application/json; charset=utf-8");

        if(isset(Database::instance()->num_rows) and Database::instance()->num_rows >= 1) {
            $data = array('num_results' => Database::instance()->num_rows, 'results' => $data);
        }

        echo json_encode($data);
        exit();
    }
}