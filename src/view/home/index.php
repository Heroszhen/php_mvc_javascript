<?php
require_once dirname(__DIR__)."/header.php";
?>

<div id="home-index">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <form action="/" method="POST" class="bg-white p-3">
                    <h2 class="text-center">Connexion</h2><?  "ok" ?>
                    <?php if(count($args["flash"]) != 0){ ?>
                        <div class="alert alert-<?= $args["flash"]["type"] ?>">
                            <?= $args["flash"]["message"] ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="login_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $args["userTable"]["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" name="login_password" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div>


<?php
require_once dirname(__DIR__)."/footer.php";
?>
