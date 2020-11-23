



<!-- Modal Login -->
<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                        <form method="POST" name="login">
                            <div class="form-group">
                                <label for="emaillog">Email</label>
                                <input type="email" class="form-control" name="emaillog" id="email"
                                    aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                <small id="emailHelp" class="form-text text-muted">N'ayez crainte votre email ne sortira
                                    pas de chez nous.</small>
                            </div>
                            <div class="form-group">
                                <label for="mdplog">Mot de passe</label>
                                <input type="password" class="form-control" name="mdplog" id="mdplog"
                                    placeholder="votre mot de passe">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Checklog">
                                <label class="form-check-label" for="Check1">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-success">Me connecter</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a  data-dismiss="modal" data-toggle="modal" href="#enregistrement">Pas encore enregistré ?</a>
                    </div>
                </div>
            </div>
        </div>



















        <!-- Modal enregistrement -->
        <div class="modal fade" id="enregistrement" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
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
                        <form method="POST" name="register">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="newName">Nom</label>
                                            <input type="text" name="newFName" class="form-control" id="newName"
                                                aria-describedby="nameHelp" placeholder="Alain">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="newSurname">Prénom</label>
                                            <input type="text" name="newSurname" class="form-control" id="newSurname"
                                                aria-describedby="nameHelp" placeholder="Martin">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="NewAdress">Adresse</label>
                                        <input type="text" class="form-control" name="NewAdress" placeholder="18 Rue du pont">
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="newcity">Ville</label>
                                            <input type="text" class="form-control" name="newcity" placeholder="Paris">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postcode">Code postal</label>
                                            <input type="password" class="form-control" name="postcode" placeholder="75000">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newEmail">Email</label>
                                    <input type="email" name="newEmail" class="form-control" id="newEmail"
                                        aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                    <small id="emailHelp" class="form-text text-muted">N'ayez crainte, votre email ne
                                        sortira pas de chez nous !</small>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="NewPassword">Mot de passe</label>
                                            <input type="password" class="form-control" id="NewPassword"
                                                placeholder="votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validePassword">Validez votre de passe</label>
                                            <input type="password" class="form-control" id="validePassword"
                                                placeholder="votre mot de passe">
                                        </div>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-success">M'enregistrer'</button>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <a data-dismiss="modal" data-toggle="modal" href="#connexion">Déjà enregistré ?</a>
                    </div>

                </div>
            </div>
        </div>


 <!-- Modal login success -->
 <div class="modal fade" id="logOk" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                            <p>Ravis de vous revoir</p>
                            <p>Nom</p>
                            <p>vous etes maintenant connecté</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Sortir</button>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal login fail -->
<div class="modal fade" id="logFail" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Connexion échouée</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p>assurez vous de rentrer les bons</p>
                            <p>email et mot de passe</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#connexion" aria-label="Close">Recommencer</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal déconnexion -->
