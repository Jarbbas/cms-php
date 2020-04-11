<?php


    function queryAllCategories() {
        global $connection;
        $query = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
        die('query failed ' . mysqli_error($connection));
        } else {      
        while ($row = mysqli_fetch_assoc($result)) {                            
        $cat_title = $row['cat_title'];              

        echo "<li><a href='#'>{$cat_title}</a></li>";
        } 
        }
    }