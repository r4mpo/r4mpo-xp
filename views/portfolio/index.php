<body class="index-page">

    <?php require_once __DIR__ . "/sections/header.php"; ?>

    <main class="main">
        <?php require_once __DIR__ . "/sections/hero.php"; ?>
        <?php require_once __DIR__ . "/sections/about.php"; ?>
        <?php require_once __DIR__ . "/sections/skills.php"; ?>
        <?php require_once __DIR__ . "/sections/summary.php"; ?>
        <?php require_once __DIR__ . "/sections/github.php"; ?>
        <?php require_once __DIR__ . "/sections/contact.php"; ?>
    </main>


    <?php require_once __DIR__ . "/sections/footer.php"; ?>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php echo $scripts; ?>

</body>