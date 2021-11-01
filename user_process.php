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

      $user = new User;

      $userData->name = $name;
      $userData->last_name = $last_name;
      $userData->email = $email;
      $userData->bio = $bio;

      if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
         
         $image = $_FILES['image'];
         $image_types = ['image/jpeg', 'image/jpg', 'image/png'];
         $jpg_array = ['image/jpeg', 'image/jpg'];

         if (in_array($image['type'], $image_types)) {
            
            if (in_array($image, $jpg_array)) {
               
               $image_file = imagecreatefromjpeg($image['tmp_name']);

            } else {

               $image_file = imagecreatefrompng($image['tmp_name']);

            }

            $image_name = $user->imageGenerateName();

            imagejpeg($image_file, './img/users/'.$image_name, 100);

            $userData->image = $image_name;
         } else {
            $message->setMessage("Tipo inválido de imagem. Insira PNG ou JPG!", "error", "back");
         }
      }

      $userDao->update($userData);
   } else if ($type === "changepassword") {

   } else {
      $message->setMessage("Informações inválidas!", "error", "index.php");
   }

