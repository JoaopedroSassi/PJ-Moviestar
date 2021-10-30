<?php

   require_once('globals.php');
   require_once('connection.php');
   require_once('models/user.php');
   require_once('models/msg.php');
   require_once('dao/userDAO.php');

   $message = new message($BASE_URL);
   $userDao = new UserDAO($conn, $BASE_URL);

   $type = filter_input(INPUT_POST, "type");

   if ($type === "register") {

      $email = filter_input(INPUT_POST, "email");
      $name = filter_input(INPUT_POST, "nome");
      $lastname = filter_input(INPUT_POST, "lastname");
      $password = filter_input(INPUT_POST, "password");
      $confpassword = filter_input(INPUT_POST, "confpassword");

      if (!$name || !$lastname || !$email || !$password) {
         $message->setMessage("Por favor, preencha todos os campos", "error", "back");
      } else {
         if ($password != $confpassword) {
            $message->setMessage("Senhas não conferem!", "error", "back");
         } else {
            if ($userDao->findByEmail($email) === false) {

               $user = new user();

               $user_token = $user->generateToken();
               $final_password = $user->generatePassword($password);

               $user->name = $name;
               $user->lastname = $lastname;
               $user->email = $email;
               $user->password = $final_password;
               $user->token = $user_token;

               $auth = true;

               $userDao->create($user, $auth);
            } else {
               $message->setMessage("Email já cadastrado!", "error", "back");
            }
         }
      }

   } else if($type === "login"){

      $email = filter_input(INPUT_POST, "email");
      $password = filter_input(INPUT_POST, "password");

      if ($userDao->authenticateUser($email, $password)) {
         
      } else {
         $message->setMessage("Usuário e/ou senha incorretos!", "error", "back");
      }

   } else {
      $message->setMessage("Informações inválidas!", "error", "index.php");
   }
