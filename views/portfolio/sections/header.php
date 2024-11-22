<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>
    <div class="profile-img"><img src="public/assets/img/my-profile-img.jpg" alt="" class="img-fluid rounded-circle"></div>
    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename"><?php echo $data['profile']['name']; ?></h1>
    </a>
    <div class="social-links text-center">
        <?php foreach ($data["social_medias"] as $social_media): ?>
            <a target="_blank" href="<?php echo $social_media["url"]; ?>" class="<?php echo $social_media["class"]; ?>"><i class="<?php echo $social_media["icon"]; ?>"></i></a>
        <?php endforeach; ?>
    </div>
    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i> Início</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> Sobre</a></li>
            <li><a href="#summary"><i class="bi bi-file-earmark-text navicon"></i> Resumo</a></li>
            <li><a href="#github"><i class="bi bi-github navicon"></i> Github</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contato</a></li>
        </ul>
    </nav>
</header>