<?php

namespace AppBundle\Controller;

use AppBundle\Event\FunEvent;

use AppBundle\Service\OurCustomService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request   $request
     * @param OurCustomService  $ourCustomService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, OurCustomService $ourCustomService)
    {

        $ourCustomService->someMethodName();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
