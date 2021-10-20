<?php
   session_start();
   unset($_SESSION['client']);
   $_SESSION['error'] = 0;
   $_SESSION['success'] = 'Vous ètes maintenant déconnecté';
   header ('Location: index.php');
 ?>