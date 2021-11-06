<?php
   include_once('templates/header.php');

   require_once('dao/MoviesDAO.php');
   require_once('models/Movie.php');

   $id = filter_input(INPUT_GET, "id");
   $movie;

   $movieDao = new MovieDao($conn, $BASE_URL);

   if (empty($id)) {
      $message->setMessage("O filme não foi encontrado", "error", "index.php");

   } else {
      $movie = $movieDao->findById($id);

      if (!$movie){
         
         $message->setMessage("O filme não foi encontrado", "error", "index.php");

      }
   }

   $userOwnsMovie = false;

   if (!empty($userData)) {
      
      if($userData->id === $movie->users_id){
         $userOwnsMovie = false;
      }
   }
?>