<main>
    <div class="container mt-5 text-center">
    <?php if(!isset($_SESSION['name'])){ ?>
        <div class="card w-50">
            <div class="card-header">
                <h3>Connexion</h3>
            </div>
            <div class="card-body">
                <form action="/login" class="form" method="post">
                    <div class="form-group row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Identifiant :</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Identifiant" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Mot de passe :</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-5 mt-3">
                            <button id="submit" type="submit" class="btn btn-success">Se Connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <?php
                if($validConnection!==""){
                    echo $validConnection;
                }
                if($error!==""){
                    echo $error;
                }
            ?>
        </div>
        <?php } 
        else { 
            echo "Vous êtes connecté en tant que".$_SESSION['name'];
            } ?>
    </div>
</main>