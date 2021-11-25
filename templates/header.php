<?php
   require_once ('globals.php');
   require_once ('connection.php');
   require_once ('models/msg.php');
   require_once ('dao/userDAO.php');

   $message = new message($BASE_URL);

   $flash_message = $message->getMessage();

   if (!empty($flash_message['msg'])) {
      $message->clearMessage();
   }

   $userDao = new UserDAO($conn, $BASE_URL);
   $userData = $userDao->verifyToken(false);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MovieStar</title>
   <link rel="shortcut icon" href="<?= $BASE_URL ?>img/moviestar.ico" type="image/x-icon">
   <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />
   <!--Bootstrap Icons-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
   <!--CSS PJ-->
   <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>
<body>
   <header>
      <nav id="main-navbar" class="navbar navbar-expand-lg">
         <a href="<?= $BASE_URL ?>" class="navbar-brand">
            <img src="<?= $BASE_URL ?>img/logo.svg" alt="Moviestar" id="logo">
            <span id="moviestar-title">Moviestar</span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
         </button>
         <form action= "<?php echo $BASE_URL ?>search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
            <input type="text" name="q" id="search" class="form-control mr-sm-2" placeholder="Buscar Filmes" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">
               <i id="search-btn" class="bi bi-search"></i>
            </button>
         </form>
         <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
               <?php if($userData): ?>
                  <li class="nav-item">
                     <a href="<?= $BASE_URL ?>newmovie.php" class="nav-link">
                        <i class="bi bi-plus-square"></i> Incluir filme
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link"> Meus filmes</a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold"> 
                        <?= $userData->name ?>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= $BASE_URL ?>logout.php" class="nav-link"> Logout</a>
                  </li>
               <?php else: ?>
               <li class="nav-item">
                  <a href="<?= $BASE_URL ?>auth.php" class="nav-link"> Entrar / Cadastrar</a>
               </li>
               <?php endif; ?>
            </ul>
         </div>
      </nav>
   </header>
   <?php if(!empty($flash_message['msg'])): ?>  
      <div class="msg-container">
         <p class="msg <?= $flash_message['type'] ?> "><?= $flash_message['msg'] ?></p>
      </div>
   <?php endif; ?>
