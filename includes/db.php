    <?php

   //Frist we create an array with the connection values  
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "cms";

    /**
     * Second we run a foreach loop to run trough all variables and turn then into
    *  into CONSTANTS, to that we use the define and upperto funtions
    */

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    //$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $query = "SET NAMES utf8";
mysqli_query($connection,$query);

    //Conection Validation 
    $connection_result = ($connection) ? "Connection".SUCESS : "Conection".FAIL;
    echo $connection_result;
