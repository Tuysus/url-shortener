<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Url;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\UrlService;
use Symfony\Component\Serializer\Serializer;

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
        $webModel = json_decode($request->getContent());
        $service = new UrlService();

        $validation = $service->urlValidation($webModel->url);

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
        $webModel = json_decode($request->getContent());

        $listUrl = $this->getDoctrine()->getRepository(Url::class)->findAll();

        $result = "WRONG";
        $response = '';

        if (count($listUrl) != 0) {
        foreach ($listUrl as $item) {
            if ($item === $webModel->shortUrl) {
                $response = $this->setResultError([
                    'message' => "this short url already used"
                ]);
                $result = "WRONG";
                break;
            } else {
                $result = "OK";
            }
        }} else {
            $result = "OK";
        }

        if ($result === "OK") {
            $em = $this->getDoctrine()->getManager();
            $url = new Url();

            $url->setOriginalUrl($webModel->url);
            $url->setShortUrl($webModel->shortUrl);
            $url->setNumberOfUsage(0);

            $em->persist($url);

            $em->flush();

            $response =  $response = $this->setResultSuccess([
                'value' => "saved"
            ]);
        }

        return new JsonResponse($response);
    }

    /**
     * @Route("{url}", name="redirect")
     */
    public function redirectAction($url)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Url::class);

        $criteria = array('shortUrl'=> $url);

        $data = $repository->findBy($criteria);

        $n = $data[0]->getNumberOfUsage();

        if ($data) {
            $data[0]->setNumberOfUsage(++$n);
            $em->flush();
            return new RedirectResponse("http://" . $data[0]->getOriginalUrl()); //$this->redirect('https://google.com');
        } else {
//            throw $this->createNotFoundException();
            return $this->render('default/index.html.twig');
        }

//        $data->set('New product name!');
//        $em->flush();

    }
}
