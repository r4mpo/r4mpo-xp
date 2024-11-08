<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>
    <div class="profile-img"><img src="public/assets/img/my-profile-img.jpg" alt="" class="img-fluid rounded-circle"></div>
    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename"><?php echo $data['profile']['name'];?></h1>
    </a>
    <div class="social-links text-center">
        <a target="_blank" href="https://www.linkedin.com/in/erick-agostinho-684563227/" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a target="_blank" href="https://www.github.com/r4mpo/" class="github"><i class="bi bi-github"></i></a>
    </div>
    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i> Início</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> about</a></li>
            <li><a href="#summary"><i class="bi bi-file-earmark-text navicon"></i> summary</a></li>
            <li><a href="#github"><i class="bi bi-github navicon"></i> Github</a></li>
            <li><a href="#contact"><i class="bi bi-whatsapp navicon"></i> contact</a></li>
        </ul>
    </nav>
</header>