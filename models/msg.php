   <?php

   class message{
      private $url;

      public function __construct($url){
         $this->url = $url;
      }

      public function setMessage($msg, $type, $redirect = "index.php"){

         $_SESSION['msg'] = $msg;
         $_SESSION['type'] = $type;

         if ($redirect != "back") {
            header("Location: $this->url" . $redirect);
         } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
         }
      }

      public function getMessage(){

      }

      public function clearMessage(){

      }
   }