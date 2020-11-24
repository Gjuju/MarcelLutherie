
<!-- Modal Login -->
<div class="modal fade" id="modlogin" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Me connecter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./php/login.php">
                            <div class="form-group">
                                <label for="logemail">Email</label>
                                <input type="email" class="form-control" name="logemail" id="logemail"
                                    aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                <small id="emailHelp" class="form-text text-muted">N'ayez crainte votre email ne sortira
                                    pas de chez nous.</small>
                            </div>
                            <div class="form-group">
                                <label for="logpwd">Mot de passe</label>
                                <input type="password" class="form-control" name="logpwd" id="logpwd"
                                    placeholder="votre mot de passe">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Checklog">
                                <label class="form-check-label" for="Check1">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-success" name="login">Me connecter</button>
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                        <a  data-dismiss="modal" data-toggle="modal" href="#modregister">Pas encore enregistré ?</a>
                    </div>
                </div>
            </div>
        </div>

<!-- modal déconnexion -->

<div class="modal fade" id="modlogout" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Déconnexion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./php/logout.php">
                                <div class="form-group">
                                    <h1><?php echo $_SESSION['prenom']; ?></h1>
                                    <p>Voulez vous vous déconnecter ?</p>
                                </div>
                                <button type="submit" class="btn btn-success">Se déconnecter</button>
                            </form>    
                        </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>






        <!-- Modal enregistrement -->
        <div class="modal fade" id="modregister" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <!-- Modal enregistrement content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">M'enregistrer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <form method="POST" action="./php/register.php" name="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" name="nom" class="form-control" id="newName"
                                                aria-describedby="nameHelp" placeholder="Martin">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prenom">Prénom</label>
                                            <input type="text" name="prenom" class="form-control" id="newSurname"
                                                aria-describedby="nameHelp" placeholder="Alain">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control" placeholder="18 Rue du pont">
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="ville">Ville</label>
                                            <input type="text" name="ville" class="form-control" placeholder="Paris">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cp">Code postal</label>
                                            <input type="text" name="cp" class="form-control" placeholder="75000">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="newEmail"
                                        aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                    <small id="emailHelp" class="form-text text-muted">N'ayez crainte, votre email ne
                                        sortira pas de chez nous !</small>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mot de passe</label>
                                            <input type="password" name="password" class="form-control" id="NewPassword"
                                                placeholder="votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="verifpassword">Validez votre de passe</label>
                                            <input type="password" name="verifpassword" class="form-control" id="validePassword"
                                                placeholder="votre mot de passe">
                                        </div>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-success" name="regform">M'enregistrer</button>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <a data-dismiss="modal" data-toggle="modal" href="#modlogin">Déjà enregistré ?</a>
                    </div>

                </div>
            </div>
        </div>





<!-- Modal login success -->
        <div class="modal fade" id="modlogOk" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Connexion réussie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Ravis de vous revoir <?php echo $_SESSION['prenom']; ?>.</h5>
                            <h5>Vous etes maintenant connecté.</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>
                    </div>
                </div>
            </div>
        </div>



<!-- Modal login fail -->
<div class="modal fade" id="modlogFail" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Connexion échouée !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Assurez vous de rentrer les bons</h5>
                            <h5>email et mot de passe</h5>
                            <h5>Peut etre n'etes vous pas encore enregesitré ?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#modlogin" aria-label="Close">Retenter ?</button>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal register success -->
<div class="modal fade" id="modregOk" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Enregistrement réussi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Vous pouvez désormais vous connecter.</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal register Fail -->
<div class="modal fade" id="modregFail" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Enregistrement échoué !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <h5>Re vérifiez tous vons champs.</h5>
                        <h5>Peut être etes vous déja enregistré ?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal register Fail -->
<div class="modal fade" id="modlogout" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Déconnexion réussie.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <h5>A bientôt.</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>
                    </div>
                </div>
            </div>
        </div>