<?php

   require_once('globals.php');
   require_once('connection.php');
   require_once('models/Movie.php');
   require_once('models/msg.php');
   require_once('dao/MoviesDAO.php');
   require_once('dao/userDAO.php');

   $message = new message($BASE_URL);
   $type = filter_input(INPUT_POST, "type");

   $userDao = new UserDAO($conn, $BASE_URL);
   $movieDao = new MovieDAO($conn, $BASE_URL);

   $userData = $userDao->verifyToken();
   $movie = new movie();

   if ($type === "create") {

      $title = filter_input(INPUT_POST, "title");
      $description = filter_input(INPUT_POST, "description");
      $trailer = filter_input(INPUT_POST, "trailer");
      $category = filter_input(INPUT_POST, "category");
      $length = filter_input(INPUT_POST, "length");

      if (!empty($title) && !empty($description) && !empty($category)) {

         $movie->title = $title;
         $movie->description = $description;
         $movie->trailer = $trailer;
         $movie->category = $category;
         $movie->length = $length;

         // Image upload
         if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {

            $image = $_FILES['image'];
            $image_types = ['image/jpeg', 'image/jpg', 'image/png'];
            $jpg_array = ['image/jpeg', 'image/jpg'];

            if (in_array($image['type'], $image_types)) {

               if (in_array($image, $jpg_array)) {
                  $image_file = imagecreatefromjpeg($image['tmp_name']);
               } else {
                  $image_file = imagecreatefrompng($image['tmp_name']);
               }

               $image_name = $movie->imageGenerateName();

               imagejpeg($image_file, './img/movies/' . $image_name, 100);

               $movie->image = $image_name;

            } else {
               $message->setMessage("Tipo inválido de imagem. Insira PNG ou JPG!", "error", "back");
            }
         }

         $movieDao->create($movie);
         
      } else {
         $message->setMessage("Você precisa adicionar pelo menos: Título, descrição e categoria!", "error", "back");
      }
      
   } else {
      $message->setMessage("Informações inválidas!", "error", "index.php");
   }