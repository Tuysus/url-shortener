<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UrlService;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("generate_url", name="generateURL")
     */
    public function generateUrlAction (Request $request)
    {
        $data = $request->request->get('url');
        $service = new UrlService();

        $validation = $service->urlValidation($data);

        if($validation == true) {

        } else {
            $response = "url is invalid";
        }

        return new JsonResponse($response);
    }
}
