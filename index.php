<?php
   require_once('templates/header.php');
   require_once('dao/MoviesDAO.php');

   $moviesDao = new MovieDAO($conn, $BASE_URL);
   
   $latestMovies = $moviesDao->getLatestMovies();
   $fantasyMovies = [];
   $actionMovies = [];
?>

   <div id="main-container" class="container-fluid">
      <h2 class="section-title">Filmes novos</h2>
      <p class="section-description">Veja as críticas dos últimos filmes adicionados no <span class="emphasis-text">MovieStar</span></p>
      <div class="movies-container">
         <?php foreach ($latestMovies as $movie): ?>
            <?php require('templates/movie_card.php'); ?>
         <?php endforeach; ?>
      </div>

      <h2 class="section-title">Fantasia</h2>
      <p class="section-description">Veja os melhores filmes de <span class="emphasis-text">Fantasia</span></p>
      <div class="movies-container">

      </div>

      <h2 class="section-title">Ação</h2>
      <p class="section-description">Veja os melhores filmes de <span class="emphasis-text">Ação</span></p>
      <div class="movies-container">

      </div>
   </div>
<?php
   include_once('templates/footer.php');
?>