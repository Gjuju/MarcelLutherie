<!-- Modal Login -->
<div class="modal fade" id="myconnexion" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!-- Modal Login content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Me connecter</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="InputEmail1">Email</label>
                                <input type="email" class="form-control" id="InputEmail1"
                                    aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                <small id="emailHelp" class="form-text text-muted">N'ayez crainte votre email ne sortira
                                    pas de chez nous.</small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="InputPassword1"
                                    placeholder="votre mot de passe">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Check1">
                                <label class="form-check-label" for="Check1">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-success">Me connecter</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#enregistrement" id="enregistrement" data-dismiss="modal">Pas encore enregistré ?</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal déconnexion -->


        <!-- Modal enregistrement -->
        <div class="modal fade" id="myenregistrement" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" id="logmodal" role="document">
                <!-- Modal enregistrement content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">M'enregistrer</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="newName">Nom</label>
                                <input type="text" name="newName" class="form-control" id="newName"
                                    aria-describedby="nameHelp" placeholder="Alain">
                            </div>

                            <div class="form-group">
                                <label for="newSurname">Prénom</label>
                                <input type="text" name="newSurname" class="form-control" id="newSurname"
                                    aria-describedby="nameHelp" placeholder="Martin">
                            </div>

                            <div class="form-group">
                                <label for="newEmail">Email</label>
                                <input type="email" name="newEmail" class="form-control" id="newEmail"
                                    aria-describedby="emailHelp" placeholder="tintin@milou.org">
                                <small id="emailHelp" class="form-text text-muted">N'ayez crainte, votre email ne
                                    sortira pas de chez nous !</small>
                            </div>

                            <div class="form-group">
                                <label for="NewPassword">Mot de passe</label>
                                <input type="password" class="form-control" id="NewPassword"
                                    placeholder="votre mot de passe">
                            </div>

                            <div class="form-group">
                                <label for="validePassword">Validez votre de passe</label>
                                <input type="password" class="form-control" id="validePassword"
                                    placeholder="votre mot de passe">
                            </div>

                            <button type="submit" class="btn btn-success">Me connecter</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#connexion" id="connexion" data-dismiss="modal">Déjà enregistré ?</a>
                    </div>
                </div>
            </div>
        </div>