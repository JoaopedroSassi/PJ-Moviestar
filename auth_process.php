<?php

   require_once('globals.php');
   require_once('connection.php');
   require_once('models/user.php');
   require_once('models/msg.php');
   require_once('dao/userDAO.php');

   $message = new message($BASE_URL);

   $type = filter_input(INPUT_POST, "type");

   if ($type === "register") {

      $email = filter_input(INPUT_POST, "email");
      $name = filter_input(INPUT_POST, "name");
      $lastname = filter_input(INPUT_POST, "lastname");
      $password = filter_input(INPUT_POST, "password");
      $confpassword = filter_input(INPUT_POST, "confpassword");

      if (!$name || !$lastname || !$email || !$password) {
         
         $message->setMessage("Por favor, preencha todos os campos", "error", "back");

      } else {
         
      }



   } else if($type === "login"){

   }
