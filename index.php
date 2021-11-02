<?php
   include_once('templates/header.php');
?>
   <div id="main-container" class="container-fluid">
      <h2 class="section-title">Filmes novos</h2>
      <p class="section-description">Veja as críticas dos últimos filmes adicionados no <span class="emphasis-text">MovieStar</span> </p>
      <div class="movies-container">
         <div class="card movie-card">
            <div class="card-img-top" style="background-image: url('<?= $BASE_URL ?>img/movies/movie_cover.jpg');"></div>
            <div class="card-body">
               <p class="card-rating">
                  <i class="bi bi-star"></i>
                  <span class="rating">9</span>
               </p>
               <h5 class="card-title">
                  <a href="#">Título do filme</a>
               </h5>
               <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
               <a href="#" class="btn btn-primary card-btn">Conhecer</a>
            </div>
         </div>
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