<?php

class PortfolioController extends BaseController
{
    public function index()
    {
        $data = $this->data();

        $this->loadView([
            "view"          => "portfolio/index",
            "title"         => "Portfólio",
            "scripts"       => $this->scripts,
            "stylesheets"   => $this->stylesheets,
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

        $data["contact"]["actionForm"] = $this->getRouteBase() . "/send-email";

        return $data;
    }

}
