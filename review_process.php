<?php

   require_once('globals.php');
   require_once('connection.php');
   require_once('models/Movie.php');
   require_once('models/Review.php');
   require_once('models/msg.php');
   require_once('dao/MoviesDAO.php');
   require_once('dao/userDAO.php');
   require_once('dao/ReviewDAO.php');

   $message = new message($BASE_URL);
   $userDao = new UserDAO($conn, $BASE_URL);
   $movieDao = new MovieDAO($conn, $BASE_URL);
   $reviewDao = new ReviewDao($conn, $BASE_URL);

   $type = filter_input(INPUT_POST, "type");

   $userData = $userDao->verifyToken();

   if ($type === "create"){
      
      $rating = filter_input(INPUT_POST, "rating");
      $review = filter_input(INPUT_POST, "review");
      $movies_id = filter_input(INPUT_POST, "movies_id");
      $users_id = $userData->id;

      $reviewObject = new Review();

      $movieData = $movieDao->findById($movies_id);

      if ($movieData){
         if (!empty($rating) && !empty($review) && !empty($movies_id)){

            $reviewObject->rating = $rating;
            $reviewObject->review = $review;
            $reviewObject->movies_id = $movies_id;
            $reviewObject->users_id = $users_id;

            $reviewDao->create($reviewObject);
         } else {
            $message->setMessage("Você precisa inserir a nota e o comentário!", "error", "back");
         }
      } else {
         $message->setMessage("Informações inválidas!", "error", "index.php");
      }

   } else {
      $message->setMessage("Informações inválidas!", "error", "index.php");
   }