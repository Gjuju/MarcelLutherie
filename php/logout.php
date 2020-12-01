<?php
  session_start();
  // Initialiser la session
  
  // Détruire la session.
  if (isset($_SESSION)) {
    session_destroy();
  }
  
  header("Location: ../index.php");
  
?>