<?php
   require_once('templates/header.php');
   require_once('dao/userDAO.php');

   $userDao = new UserDAO($conn, $BASE_URL);

   $userData = $userDao->verifyToken(true);
?>

   <div id="main-container" class="container-fluid">
      <h1>Editar perfil</h1>
   </div>

<?php
   require_once('templates/footer.php');
?>