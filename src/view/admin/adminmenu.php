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
   <div class="onelink">
        <a>
            <div><i class="bi bi-image"></i></div>
            <div>Photos</div>
        </a>
   </div>
   <div class="onelink">
        <a>
            <div><i class="bi bi-card-text"></i></div>
            <div>Articles</div>
        </a>
   </div>
</div>