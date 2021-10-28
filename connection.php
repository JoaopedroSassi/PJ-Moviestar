<?php

   $db_name = "db_moviestar";
   $db_host = "localhost";
   $db_user = "root";
   $db_pass = "loj159951";

   $conn = new PDO("mysql:dbname=". $db_name .";host=". $db_host, $db_user, $db_pass);

   //Errors PDO
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);