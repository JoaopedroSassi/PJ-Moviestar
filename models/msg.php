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
         if (!empty($_SESSION['msg'])) {
            return [
               'msg' => $_SESSION['msg'],
               'type' => $_SESSION['type']
            ];
         } else{
            return false;
         }
      }

      public function clearMessage(){
         $_SESSION['msg'] = "";
         $_SESSION['type'] = "";
      }
   }