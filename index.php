<?php
   require_once('templates/header.php');
   require_once('dao/MoviesDAO.php');

   $moviesDao = new MovieDAO($conn, $BASE_URL);
   
   $latestMovies = $moviesDao->getLatestMovies();
   $fantasyMovies = $moviesDao->getMoviesByCategory("Fantasia");
   $actionMovies = $moviesDao->getMoviesByCategory("Ação");
?>

   <div id="main-container" class="container-fluid">
      <h2 class="section-title">Filmes novos</h2>
      <p class="section-description">Veja as críticas dos últimos filmes adicionados no <span class="emphasis-text">MovieStar</span></p>
      <div class="movies-container">
         <?php foreach ($latestMovies as $movie): ?>
            <?php require('templates/movie_card.php'); ?>
         <?php endforeach; ?>
         <?php if (count($latestMovies) === 0): ?>
            <p class="empty-list">Ainda não há filmes cadastrados!</p>
         <?php endif; ?>
      </div>

      <h2 class="section-title">Fantasia</h2>
      <p class="section-description">Veja os melhores filmes de <span class="emphasis-text">Fantasia</span></p>
      <div class="movies-container">
         <?php foreach ($fantasyMovies as $movie): ?>
            <?php require('templates/movie_card.php'); ?>
         <?php endforeach; ?>
         <?php if (count($fantasyMovies) === 0): ?>
               <p class="empty-list">Ainda não há filmes de ação cadastrados!</p>
         <?php endif; ?>
      </div>

      <h2 class="section-title">Ação</h2>
      <p class="section-description">Veja os melhores filmes de <span class="emphasis-text">Ação</span></p>
      <div class="movies-container">
         <?php foreach ($actionMovies as $movie): ?>
            <?php require('templates/movie_card.php'); ?>
         <?php endforeach; ?>
         <?php if (count($actionMovies) === 0): ?>
               <p class="empty-list">Ainda não há filmes de comédia cadastrados!</p>
         <?php endif; ?>
      </div>
   </div>
<?php
   include_once('templates/footer.php');
?>