<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Sobre</h2>
        <p><?php echo $data["profile"]["presentation_1"]; ?></p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4">
                <img src="public/assets/img/my-profile-img.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 content">
                <h2><?php echo $data["profile"]["title"]; ?></h2>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Idade:</strong> <span><?php echo $data["profile"]["age"]->y; ?> anos</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Telefone:</strong> <span><?php echo $data["profile"]["phone"]; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>E-mail:</strong><span><?php echo $data["profile"]["email"]; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Cidade:</strong> <span><?php echo $data["profile"]["city"] . ", " . $data["profile"]["uf"]; ?> </span></li>
                        </ul>
                    </div>
                    <p class="py-3"><?php echo $data["profile"]["presentation_2"]; ?></p>
                </div>
            </div>
        </div>
</section>