<?php
  session_start();
  // Initialiser la session
  

  
  $_SESSION['info'] = 2;
  $_SESSION['infotitle'] = "Déconnecion réussie";
  $_SESSION['infobody'] = '<h5>À bientot '. $_SESSION['prenom']. '</h5>
              <h5>Vous etes maintenant déconnecté.</h5>';
  $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
  
  header("Location: ../index.php");
  
?>