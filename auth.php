<?php
   include_once('templates/header.php');
?>

   <div id="main-container" class="container-fluid">
      <div class="col-md-12">
         <div id="auth-row" class="row">
            <div class="col-md-4" id="login-container">
               <h2>Entrar</h2>
               <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
                  <input type="hidden" name="type" value="login">
                  <div class="form-group">
                     <label for="email">E-mail:</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
                  </div>
                  <div class="form-group">
                     <label for="password">Senha:</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                  </div>
                  <input type="submit" class="btn card-btn" value="Entrar">
               </form>
            </div>

            <div class="col-md-4" id="register-container">
               <h2>Criar conta</h2>
               <form action="" method="POST">
                  <input type="hidden" name="type" value="register">
                  <div class="form-group">
                     <label for="email">E-mail:</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
                  </div>
                  <div class="form-group">
                     <label for="nome">Nome:</label>
                     <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                  </div>
                  <div class="form-group">
                     <label for="lastname">Sobrenome:</label>
                     <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite seu sobrenome">
                  </div>
                  <div class="form-group">
                     <label for="password">Senha:</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                  </div>
                  <div class="form-group">
                     <label for="conf_password">Confirmação de senha:</label>
                     <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirme sua senha">
                  </div>
                  <input type="submit" class="btn card-btn" value="Registrar">
               </form>
            </div>
         </div>
      </div>
   </div>

<?php
   include_once('templates/footer.php');
?>