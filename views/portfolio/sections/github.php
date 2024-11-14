<section id="github" class="github section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Github</h2>
        <p>Confira meus projetos disponibilizados em meus repositórios do Github</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <?php foreach ($data["github"] as $project): ?>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo $project["logo"]; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $project["title"]; ?></h5>
                            <p class="card-text"><?php echo $project["description"]; ?></p>
                            <a href="<?php echo $project["doc"]; ?>" target="_blank" class="btn btn-danger"><i class="bi bi-filetype-html"></i></a>
                            <?php if (!is_null($project["host"])): ?>
                                <a href="<?php echo $project["host"]; ?>" target="_blank" class="btn btn-primary"><i class="bi bi-link-45deg"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>