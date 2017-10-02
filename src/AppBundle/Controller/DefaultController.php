<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\UrlService;

class DefaultController extends BaseController
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
        $data = json_decode($request->getContent());
        $service = new UrlService();

        $validation = $service->urlValidation($data->url);

        if($validation == true) {
            $response = $this->setResultSuccess([
                'value' => $service->generateShortUrl()
            ]);
        } else {
            $response = $this->setResultError([
                'message' => "url is invalid"
            ]);
        }

        return new JsonResponse($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     * @Route("short_url", name="saveShortUrl")
     */
    public function saveShortUrlAction (Request $request)
    {

        $data = json_decode($request->getContent());
        $service = new UrlService();

//        $validation = $service->urlValidation($data);
//
//        if($validation == true) {
//            $response = $this->setResultSuccess([
//                'value' => $service->generateShortUrl()
//            ]);
//        } else {
//            $response = $this->setResultError([
//                'message' => "url is invalid"
//            ]);
//        }

        return new JsonResponse($data);
    }
}
