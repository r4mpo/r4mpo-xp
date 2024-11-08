<section id="hero" class="hero section dark-background">
    <img src="public/assets/img/hero-bg.gif" alt="" data-aos="fade-in" class="" style="filter: blur(8px)">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2><?php echo $data["profile"]["name"];?></h2>
        <p>Experiência com <span class="typed"
                data-typed-items="<?php echo $data["profile"]["skills"];?>"><?php echo $data["profile"]["main"];?></span><span
                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span
                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
    </div>
</section>