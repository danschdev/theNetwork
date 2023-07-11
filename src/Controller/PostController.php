<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
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
        $topic = $slug ? \symfony\component\string\u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('post/post.html.twig', [
            'text' => 'Talk to your family? Meet new friends? See what\'s going on'.($slug ? ' about '.$topic : '').'!',
        ]);
    }

    #[Route('/post/new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $post = new Post();
        $post->setContent('Welcome to The Network everybody 😎🎉');
        $post->setVotes(rand(-50, 50));

        $entityManager->persist($post);
        $entityManager->flush();

        return new Response(sprintf(
            'Post %d has been created at %s',
            $post->getId(),
            $post->getCreatedAt()->format('d.m.Y H:i:s'),
        ));
    }
}
