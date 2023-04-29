<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Pour toutes les routes qui vont être utilisées dans la classe DefaultController
// on ajoute un préfixe /blog pour éviter de le retaper dans chaque route
#[Route('/blog', name: 'blog_')]

class DefaultController
{

    public function index(Request $request)
    {
        // dd($request);

        $response = new Response('<h1>Salut Nicolas Brun - Consultant SEO</H1><a href="/blog/homepage">Aller sur le blog</a>');
        return $response;
    }

    // Création de la route du blog
    #[
        Route(
            path: '/{name}',
            name: 'blog',
            methods: ["GET", "POST", "DELETE", "PUT"],
            schemes: ["HTTPS"],
            // Permet d'afficher un titre par défaut si aucun paramètre GET n'est envoyé
            defaults: [
                'name' => '',
                'foo' => 'bar'
            ],
            host: 'localhost'
            // Pour restreindre à renvoyer en get que des caractères et non des chiffres ou autres  
            // Si on veut n'autoriser que des nombres, la regex sera \d+          
            // requirements: [
            //     // 'name' => '[a-zA-Z]+'
            //     'id' => '\d+'
            // ]

        )
    ]

    // Configuration du controller blog
    public function blog(Request $request)
    {
        dd($request);
        return new Response('Blog');
    }

    // Création de la route homepage du blog
    #[
        Route(
            path: '/homepage',
            methods: ["GET"],
            name: 'homepage',
            priority: 1
        )
    ]

    // Configuration du controller blog home page
    public function blogHomepage()
    {
        return new Response('blog homepage');
    }
}
