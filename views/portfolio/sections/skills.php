<section id="skills" class="skills section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Habilidades</h2>
        <p>Nível de habilidade em respectivas tecnologias:</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row skills-content skills-animation">
            <?php foreach ($data["skills"] as $skill): ?>
                <div class="col-lg-6">
                    <div class="progress">
                        <span class="skill"><span><?php echo $skill["name"]; ?></span> <i class="val"><?php echo $skill["grade"]; ?>%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill["grade"]; ?>" aria-valuemin="0" aria-valuemax="<?php echo $skill["grade"]; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>