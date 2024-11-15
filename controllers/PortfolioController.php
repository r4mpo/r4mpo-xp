<?php

class PortfolioController extends BaseController
{
    public function index()
    {
        $scripts = $this->refs("js");
        $stylesheets = $this->refs("css");
        $data = $this->data();

        $this->loadView([
            "view"          => "portfolio/index",
            "title"         => "Portfólio",
            "scripts"       => $scripts,
            "stylesheets"   => $stylesheets,
            "data"          => $data
        ]);
    }

    public function data(): array
    {
        $data = [];

        $profile = new Profile();
        $profile = $profile->all();

        $data["profile"] = $profile[0];

        if (!empty($data["profile"]["birthday"])) {
            $birthday = new \DateTime($data["profile"]["birthday"]);
            $now   = new \DateTime(date("Y-m-d"));
            $diff = $birthday->diff($now);
            $data["profile"]["age"] = $diff;
        }

        $skills = new Skill();
        $data["skills"] = $skills->all();

        $github = new Github();
        $data["github"] = $github->all();

        $social_medias = new SocialMedias();
        $data["social_medias"] = $social_medias->all();

        // Educational
        $summaries = new Summary();
        $conditions = "WHERE type = " . $summaries->getType("education");
        $data["education"] = $summaries->all($conditions);
        // Professional
        $conditions = "WHERE type = " . $summaries->getType("profission");
        $data["profission"] = $summaries->all($conditions);

        return $data;
    }

    public function refs($type): string
    {
        $files = [];

        if ($type === "js") {
            $files = [
                "public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
                "public/assets/vendor/php-email-form/validate.js",
                "public/assets/vendor/aos/aos.js",
                "public/assets/vendor/typed.js/typed.umd.js",
                "public/assets/vendor/purecounter/purecounter_vanilla.js",
                "public/assets/vendor/waypoints/noframework.waypoints.js",
                "public/assets/vendor/glightbox/js/glightbox.min.js",
                "public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js",
                "public/assets/vendor/isotope-layout/isotope.pkgd.min.js",
                "public/assets/vendor/swiper/swiper-bundle.min.js",
                "public/assets/js/main.js",
                "public/forms/contact.js"

            ];
        }

        if ($type === "css") {
            $files = [
                "public/assets/vendor/bootstrap/css/bootstrap.min.css",
                "public/assets/vendor/bootstrap-icons/bootstrap-icons.css",
                "public/assets/vendor/aos/aos.css",
                "public/assets/vendor/glightbox/css/glightbox.min.css",
                "public/assets/vendor/swiper/swiper-bundle.min.css",
                "public/assets/css/main.css"
            ];
        }

        $refs = $this->refsLoad($files, $type);
        return $refs;
    }
}
