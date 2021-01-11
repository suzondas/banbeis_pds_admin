<?php 
/*// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','srms');
// Establish database connection.*/

/*try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}*/

$conn = oci_connect("pds", "pds", "192.168.245.33/orcl","AL32UTF8");
if (!$conn) {
    // $m = oci_error();
    // echo $m['message'], "\n";
    header('HTTP/1.1 500 Internal Server ERROR');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'ERROR', 'code' => "Could not connect Database!")));
    exit;
}

?>