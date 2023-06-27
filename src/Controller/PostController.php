<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class PostController {
    #[Route('/')]
    public function homepage() {
        die("Welcome to The Network");
    }
}