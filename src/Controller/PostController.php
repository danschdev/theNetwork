<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController {
    #[Route('/')]
    public function homepage() {
        die("Welcome to The Network");
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) {
        $topic = \symfony\component\string\u(str_replace('-', ' ', $slug))->title(true);
        return new Response('Talk to your family? Meet new friends? See what\'s going on'.($slug ? ' about '.$topic :'').'!');

    }
}