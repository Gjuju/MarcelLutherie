<?php
  // Initialiser la session
  session_start();
  
  // Détruire la session.
  if (isset($_SESSION)) {
    session_destroy();
  }
  
  header("Location: ../index.php");
  
?>