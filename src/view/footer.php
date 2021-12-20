

    <?php
      if($_SESSION["page"] == "admin")require_once dirname(__DIR__)."/view/admin/adminmenu.php";
    ?>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/public/libs/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="/public/libs/zjs.js"></script>
    <script src="/public/script.js"></script>

    <!--https://ckeditor.com/docs/ckeditor4/latest/guide/dev_jquery.html-->
    <script src="/public/libs/ckeditor/ckeditor.js"></script>
    <script src="/public/libs/ckeditor/adapters/jquery.js"></script>
    <script>
        $(function() {
            $('textarea.ckeditor').ckeditor();
        });
    </script>
  </body>
</html>