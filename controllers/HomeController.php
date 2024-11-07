<?php

class HomeController extends BaseController
{
    public function index()
    {
        $scripts = $this->refs('js');
        $stylesheets = $this->refs('css');

        $this->loadView([
            'view' => 'portfolio/index',
            'title' => 'Portfólio',
            'scripts' => $scripts,
            'stylesheets' => $stylesheets
        ]);
    }

    public function refs($type): string
    {
        $files = [];

        if ($type === 'js') {
            $files = [
                'public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'public/assets/vendor/php-email-form/validate.js',
                'public/assets/vendor/aos/aos.js',
                'public/assets/vendor/typed.js/typed.umd.js',
                'public/assets/vendor/purecounter/purecounter_vanilla.js',
                'public/assets/vendor/waypoints/noframework.waypoints.js',
                'public/assets/vendor/glightbox/js/glightbox.min.js',
                'public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
                'public/assets/vendor/isotope-layout/isotope.pkgd.min.js',
                'public/assets/vendor/swiper/swiper-bundle.min.js',
                'public/assets/js/main.js',
                'public/forms/contact.js'

            ];
        }

        if ($type === 'css') {
            $files = [
                'public/assets/vendor/bootstrap/css/bootstrap.min.css',
                'public/assets/vendor/bootstrap-icons/bootstrap-icons.css',
                'public/assets/vendor/aos/aos.css',
                'public/assets/vendor/glightbox/css/glightbox.min.css',
                'public/assets/vendor/swiper/swiper-bundle.min.css',
                'public/assets/css/main.css'
            ];
        }

        $refs = $this->refsLoad($files, $type);
        return $refs;
    }
}
