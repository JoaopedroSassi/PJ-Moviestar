<?php
   require_once('templates/header.php');
   require_once('dao/MoviesDAO.php');

   $moviesDao = new MovieDAO($conn, $BASE_URL);

   $q = filter_input(INPUT_GET, "q");

   $movies = $moviesDao->findByTitle($q);
?>
   <div id="main-container" class="container-fluid">
      <h2 class="section-title" id="search-title">Você está buscando por: <span class="search-result"><?php echo $q ?></span></h2>
      <p class="section-description">Resultados de busca retornados com base na sua pesquisa</p>
      <div class="movies-container">
         <?php foreach ($movies as $movie): ?>
            <?php require('templates/movie_card.php'); ?>
         <?php endforeach; ?>
         <?php if (count($movies) === 0): ?>
            <p class="empty-list">Não há filmes para esta busca, <a href="<?php echo $BASE_URL ?>" class="back-link">Voltar</a>.</p>
         <?php endif; ?>
      </div>
<?php
   include_once('templates/footer.php');
?>