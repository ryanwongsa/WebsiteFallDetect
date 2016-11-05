<?php
// This is a document allowing any php to connect to the database
// **
function getConnection()
{
    try {
        $host_name = "127.0.0.1";
        $database = "fcm";// Change your database name
        $username = "homestead";// Your database user id
        $password = "secret"; // Your password

        $dbo = new PDO('mysql:host=' . $host_name . ';dbname=' . $database, $username, $password);
        $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbo;

    }
    catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

}


?>
