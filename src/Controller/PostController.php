<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/', name: 'app_homepage')]
    public function homepage(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['votes' => 'DESC']);

        return $this->render('post/homepage.html.twig', [
            'date' => new \DateTime(),
            'posts' => $posts,
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
            $post->getCreatedAt() ? $post->getCreatedAt()->format('d.m.Y H:i:s') : 'ERROR',
        ));
    }

    #[Route('/post/{id}', name: 'app_post')]
    public function show(Post $post): Response
    {
        return $this->render('post/post.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/post/{id}/vote', name: 'app_post_vote', methods: ['POST'])]
    public function vote(Post $post, Request $request, EntityManagerInterface $entityManager): Response
    {
        $direction = $request->request->get('direction', 'up');
        if ('up' == $direction) {
            $post->upVote();
        } else {
            $post->downVote();
        }
        $entityManager->flush();

        $this->addFlash('success', 'Vote counted!');

        return $this->redirectToRoute('app_post', [
            'id' => $post->getId(),
        ]);
    }
}
