<?php
   include_once('templates/header.php');

   require_once('dao/userDAO.php');
   require_once('models/user.php');

   $user = new User();
   $userDao = new UserDAO($conn, $BASE_URL);

   $userData = $userDao->verifyToken(true);
?>
   <div id="main-container" class="container-fluid">
      <h2 class="section-title">Dashboard</h2>
      <p class="section-description">Adicione ou atualize as informações dos filmes que você enviou</p>
      <div class="col-md-12" id="add-movie-container">
         <a href="<?= $BASE_URL ?>newmovie.php" class="btn card-btn">
            <i class="bi bi-cloud-plus"></i> Adicionar filme
         </a>
      </div>
      <div class="col-md-12" id="movies-dashboard">
         <table class="table">
            <thead>
               <th scope="col">#</th>
               <th scope="col">Título</th>
               <th scope="col">Nota</th>
               <th scope="col" class="actions-column">Ações</th>
            </thead>
            <tbody>
               <tr>
                  <td scope="row">1</td>
                  <td><a href="#" class="table-movie-title">Título</a></td>
                  <td><i class="bi bi-star"></i></td>
                  <td class="actions-column">
                     <a href="#" class="edit-btn">
                        <i class="bi bi-pencil"></i> Editar
                     </a>
                     <form action="">
                        <button type="submit" class="delete-btn">
                           <i class="bi bi-file-earmark-x"></i> Deletar
                        </button>
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
<?php
   include_once('templates/footer.php');
?>
