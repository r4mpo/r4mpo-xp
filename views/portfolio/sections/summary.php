<section id="summary" class="summary section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Resumo</h2>
        <p>A seguir, apresento um summary das minhas experiências profissionais como desenvolvedor PHP júnior e detalhes
            de minha formação acadêmica:</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="summary-title">Educação</h3>
                <?php foreach($data["education"] as $educational): echo $educational["html"]; endforeach; ?>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="summary-title">Experiência profissional</h3>
                <?php foreach($data["profission"] as $professional): echo $professional["html"]; endforeach; ?>
            </div>
        </div>
    </div>
</section>