<?php

namespace App\Controller;

use App\Entity\Url;
use App\Service\UrlShortenService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UrlController extends AbstractController
{
    /**
     * @Route("/", name="url")
     */
    public function index(): Response
    {
        return $this->render('url/index.html.twig', [
            'controller_name' => 'UrlController',
        ]);
    }

    /**
    * @Route("/short_url", name="short_url", methods={"POST"})
    */
    public function shorten(Request $request, UrlShortenService $shortenService): Response
    {
        $long_url = $request->request->get('longurl');
        $short_url = $shortenService->setShortUrl($long_url);

        return new JsonResponse( $short_url );  
    }

    /**
    * @Route("/{hash}", name="decode_hash", methods={"GET"})
    */
    public function decode($hash) {
        $em = $this->getDoctrine()->getManager();
        $url = $em->getRepository(Url::class)->findByHash($hash);

        return $this->render('url/shortenurl.html.twig', [
            'long_url' => $url->getLongUrl(),
        ]);
    }

}
