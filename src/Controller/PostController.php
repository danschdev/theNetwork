<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController {
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('post/homepage.html.twig', [
            'date' => new DateTime(),
            'text' => 'Welcome to The Network everybody 😎',
        ]);
    }
    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) {
        $topic = \symfony\component\string\u(str_replace('-', ' ', $slug))->title(true);
        return new Response('Talk to your family? Meet new friends? See what\'s going on'.($slug ? ' about '.$topic :'').'!');

    }
}