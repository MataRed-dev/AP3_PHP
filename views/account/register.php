<div class="cover-gradient full-height pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card card-dark">
                    <div class="card-body text-center p-5">
                        <main class="form-signin">
                            <?php
                            if ($error === 4) {
                                ?>
                                <div class="alert alert-danger">Les mots de passe ne sont pas identiques</div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($error === 2) {
                                ?>
                                <div class="alert alert-danger">Le mot de passe n'est pas comforme. Il faut au minimum: majuscule, minuscule, numéro</div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($error === 0) {
                                ?>
                                <div class="alert alert-danger">Vous possédez déjà un compte, <a href="/login">Connectez vous</a></div>
                                <?php
                            }
                            ?>
                            <form method="POST" action="./register">
                                <h1 class="h3 mb-3 fw-normal text-light">Inscription</h1>

                                <div class="form-floating">
                                    <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Nom">
                                    <label for="floatingInput">Nom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="firstname" type="text" class="form-control" id="floatingInput" placeholder="Prénom">
                                    <label for="floatingInput">Prénom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="exemple@email.com">
                                    <label for="floatingInput">Adresse Mail</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="pwd" type="password" class="form-control" id="floatingInput" placeholder="Mot de Passe">
                                    <label for="floatingInput">Mot de passe</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="Cpwd" type="password" class="form-control" id="floatingInput" placeholder="Conformier Mot de Passe">
                                    <label for="floatingInput">Confirmer Mot de passe</label>
                                </div>

                                <button class="w-100 mt-5 btn btn-lg btn-primary" type="submit">S'inscire</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>