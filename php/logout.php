<?php
  // Initialiser la session
  session_start();
  
  // Détruire la session.
  if(session_destroy())
  {
    $_SESSION['logout'] = 1;
    header("Location: ../index.php");
  }
?>