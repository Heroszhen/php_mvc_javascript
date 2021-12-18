<div id="admin-header">
    <div class="wrap">
        <div id="btn-adminheader" class="sb-color">
            <i class="bi bi-list pointer" onclick="switchAdminMenu()"></i>
        </div>
        <div>
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bonjour <?= $_SESSION["user"]["firstname"] ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/deconnexion">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
