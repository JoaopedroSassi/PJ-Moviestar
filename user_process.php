<?php

   require_once('globals.php');
   require_once('connection.php');
   require_once('models/user.php');
   require_once('models/msg.php');
   require_once('dao/userDAO.php');

   $message = new message($BASE_URL);
   $userDao = new UserDAO($conn, $BASE_URL);

   $type = filter_input(INPUT_POST, "type");

   if ($type === "update") {
      
      $userData = $userDao->verifyToken();

      $name = filter_input(INPUT_POST, "name");
      $last_name = filter_input(INPUT_POST, "last_name");
      $email = filter_input(INPUT_POST, "email");
      $bio = filter_input(INPUT_POST, "bio");

      $userData->name = $name;
      $userData->last_name = $last_name;
      $userData->email = $email;
      $userData->bio = $bio;

      

      $userDao->update($userData);
   } else if ($type === "changepassword") {

   } else {
      $message->setMessage("Informações inválidas!", "error", "index.php");
   }

