<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('post/homepage.html.twig', [
            'date' => new \DateTime(),
            'text' => 'Welcome to The Network everybody 😎',
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $topic = \symfony\component\string\u(str_replace('-', ' ', $slug))->title(true);

        return $this->render('post/post.html.twig', [
            'text' => 'Talk to your family? Meet new friends? See what\'s going on'.($slug ? ' about '.$topic : '').'!',
        ]);
    }
}
