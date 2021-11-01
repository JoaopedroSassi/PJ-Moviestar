<?php
   require_once('templates/header.php');
   require_once('dao/userDAO.php');
   require_once('models/user.php');

   $user = new User();
   $userDao = new UserDAO($conn, $BASE_URL);

   $userData = $userDao->verifyToken(true);
   $fullName = $user->getFullName($userData);

   if ($userData->image == "") {
      $userData->image = "user.png";
   }
?>
   <div id="main-container" class="container-fluid">
      <div class="col-md-12">
         <form action="<?=$BASE_URL ?>user_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="update">
            <div class="row">
               <div class="col-md-4">
                  <h1><?= $fullName ?></h1>
                  <p class="page-description">Altere seus dados no formulário abaixo:</p>
                  <div class="form-group">
                     <label for="name">Nome:</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" value="<?= $userData->name ?>">
                  </div>
                  <div class="form-group">
                     <label for="last_name">Sobrenome:</label>
                     <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Digite seu sobrenome" value="<?= $userData->last_name ?>">
                  </div>
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="text" readonly class="form-control disabled" name="email" id="email" placeholder="Digite seu sobrenome" value="<?= $userData->email ?>">
                  </div>
                  <input type="submit" class="btn card-btn" value="Alterar">
               </div>
               <div class="col-md-4">
                  <div id="profile-image-container" style="background-image: url('<?=$BASE_URL ?>img/users/<?= $userData->image ?>');"></div>
                  <div class="form-group">
                     <label for="image">Foto:</label>
                     <input type="file" class="form-control-file" name="image">
                  </div>
                  <div class="form-group">
                     <label for="bio">Sobre você:</label>
                     <textarea name="bio" id="bio" class="form-control" rows="5" placeholder="Conte quem você é, o que você faz e onde trabalha..."><?= $userData->bio ?></textarea>
                  </div>
               </div>
            </div>
         </form>
         <div id="change-password-container" class="row">
            <div class="col-md-4">
               <h2>Alterar a senha:</h2>
               <p class="page-description">Digite a nova senha, e confirme para alterar a sua senha:</p>
               <form action="<?=$BASE_URL ?>user_process.php" method="POST">
                  <input type="hidden" name="type" value="changepassword">
                  <div class="form-group">
                     <label for="passoword">Senha:</label>
                     <input type="password" class="form-control" name="passoword" id="passoword" placeholder="Digite a sua nova senha:">
                  </div>
                  <div class="form-group">
                     <label for="confirmpassword">Confirmação de Senha:</label>
                     <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirme a sua nova senha:">
                  </div>
                  <input type="submit" class="btn card-btn" value="Alterar">
               </form>
            </div>
         </div>
      </div>
   </div>
<?php
   require_once('templates/footer.php');
?>