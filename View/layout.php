<?php
    global $meta_description;
    global $title;
    global $page;

    use App\Session as Session;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta_description ?>">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column min-vh-100">
<header>
    <?php include_once "layouts/header.php"; ?>
</header>

<main class="container flex-fill">
    <h3 class="message error">
        <?= Session::getFlash( "error" ) ?>
    </h3>
    <h3 class="message success">
        <?= Session::getFlash( "success" ) ?>
    </h3>
    <?= $page ?>
</main>
<footer class="bg-dark text-white py-4 mt-5">
    <?php include_once "layouts/footer.php"; ?>
</footer>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $(".message").each(function () {
            if ($(this).text().length > 0) {
                $(this).slideDown(500, function () {
                    $(this).delay(3000).slideUp(500)
                })
            }
        })
        $(".delete-btn").on("click", function () {
            return confirm("Etes-vous sûr de vouloir supprimer?")
        })
        tinymce.init({
            selector: '.post',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
<script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
</body>
</html>