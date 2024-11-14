<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contato</h2>
        <p>Confira dados de contato a seguir e/ou envie uma mensagem ao meu endereço de e-mail:</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Endereço</h3>
                            <p><?php echo $data["profile"]["city"] . ", " . $data["profile"]["uf"]; ?></p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>WhatsApp</h3>
                            <p><?php echo $data["profile"]["phone"]; ?></p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>E-mail</h3>
                            <p><?php echo $data["profile"]["email"]; ?></p>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119050.3682022529!2d-47.802454749999995!3d-21.179284049999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b9bf1d68acc21d%3A0x37b8ee0abedeea39!2sRibeir%C3%A3o%20Preto%2C%20SP!5e0!3m2!1spt-BR!2sbr!4v1724710123808!5m2!1spt-BR!2sbr" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="#" onsubmit="return false;" method="post" class="php-email-form" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label for="name-field" class="pb-2">Seu Nome</label>
                            <input type="text" name="name" id="name-field" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email-field" class="pb-2">Seu E-mail</label>
                            <input type="email" class="form-control" name="email" id="email-field" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Assunto</label>
                            <input type="text" class="form-control" name="subject" id="subject-field" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="message-field" class="pb-2">Mensagem</label>
                            <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="error-message"></div>
                            <button type="button" onclick="enviar_mensagem_whatsapp_redirecionar()">Enviar p/ WhatsApp</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>