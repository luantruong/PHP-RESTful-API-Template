PHP RESTful API Template
========================

[Slim](https://github.com/codeguy/Slim) is a PHP micro framework that helps you quickly write simple yet powerful web applications and APIs.

[ezSQL](https://github.com/jv2222/ezSQL) is a class to make it very easy to deal with database connections.

PHP RESTful API Template pairs both of these, providing the basic code for a database driven web services application, that outputs JSON.

## Getting Started

### System Requirements

You need **PHP >= 5.3.0** and a database. If you use encrypted cookies, you'll also need the `mcrypt` extension.

ezSQL uses MySQL in the example, but supports many other database management systems.

Slim is configured for Apache in the example, but supports many other web servers.

### Install / Setup

#### Apache

1. Upload the `.htaccess` file and `api` directory to the "web root" directory of your domain
2. Adjust the "yourdomain.com", database connection string values, and database query in `api/index.php`
3. Test by going to yourdomain.com/api/example and yourdomain.com/api/dbexample (you should see JSON output in the browser window or when viewing the page source)
4. Build out your real web service methods
5. Optionally edit the `api/method_docs.txt` file to include your methods

## Documentation

Slim: <http://docs.slimframework.com/>  
ezSQL: <http://htmlpreview.github.com/?https://github.com/jv2222/ezSQL/blob/master/ez_sql_help.htm/>

### Twitter

Follow [@traeregan](http://www.twitter.com/traeregan) on Twitter to receive updates about the template.