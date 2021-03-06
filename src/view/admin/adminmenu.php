<div id="admin-menu">
   <div class="pt-3">
        <h5 class="text-center text-white">Admin</h5>
   </div>
   <div class="onelink <?php if($_SESSION['page'] == 'admin' && $_SESSION['menu'] == 'category')echo 'active'; ?>">
        <a href="/admin">
            <div><i class="bi bi-tags-fill"></i></div>
            <div>Catégories</div>
        </a>
   </div>
   <div class="onelink <?php if($_SESSION['page'] == 'admin' && $_SESSION['menu'] == 'photo')echo 'active'; ?>">
        <a href="/admin/photos">
            <div><i class="bi bi-image"></i></div>
            <div>Photos</div>
        </a>
   </div>
   <div class="onelink <?php if($_SESSION['page'] == 'admin' && $_SESSION['menu'] == 'article')echo 'active'; ?>">
        <a href="/admin/articles">
            <div><i class="bi bi-card-text"></i></div>
            <div>Articles</div>
        </a>
   </div>
   <div class="onelink">
        <a>
            <div><i class="bi bi-chat-quote-fill"></i></div>
            <div>Commentaires</div>
        </a>
   </div>
   <div class="onelink <?php if($_SESSION['page'] == 'admin' && $_SESSION['menu'] == 'users')echo 'active'; ?>">
        <a href="/admin/utilisateurs">
            <div><i class="bi bi-people-fill"></i></div>
            <div>Utilisateurs</div>
        </a>
   </div>
   <div class="onelink">
        <a href="/deconnexion">
            <div><i class="bi bi-box-arrow-right"></i></div>
            <div>Déconnexion</div>
        </a>
   </div>
</div>