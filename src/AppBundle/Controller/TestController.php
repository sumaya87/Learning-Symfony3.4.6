<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 22/03/18
 * Time: 4:17 PM
 */
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TestController extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function indexAction(Request $request)
    {
        //return $this->render('test.html.twig', []);
        //return new Response("<html><body>Hello</body></body></html>", Response::HTTP_OK );

    }
}
