<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 23/03/18
 * Time: 9:51 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\RedditPost;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RedditController extends Controller
{

    /**
     * @Route("/list_posts", name="list")
     */
    public function listAction()
    {

        $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();
        $postOneBy = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findOneBy([
            'id'=> [3]
        ]);
        $postsBy = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findBy([
            'id'=> [2,3]
        ]);

        //dump($postOneBy);

        return $this->render('reddit\index.html.twig', [
            'posts' => $posts,
            'postOneBy' => $postOneBy,
            'postsBy' => $postsBy,
        ]);

    }

    /**
     * @Route("/scraper", name="scraper")
     */
    public function scraperAction()
    {

        $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();
        $result = $this->get('reddit_scraper')->scrape();

        return $this->render('reddit\index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/create_post/{text}", name="create-post")
     */
    public function createAction($text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new RedditPost();
        $post->setTitle('Hello, '.$text);

        $em->persist($post);
        $em->flush();

        return $this->redirectToRoute('list');

    }

    /**
     * @Route("/update_post/{id}", name="update-post")
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:RedditPost')->find($id);
        if(!$post){
            throw $this->createNotFoundException('Data not found!');
            return $this->redirectToRoute('list');
        }

        /**
         * @var $post RedditPost
         */
        $post->setTitle('Hey there!');
        $em->flush();

        return $this->redirectToRoute('list');


    }

    /**
     * @Route("/delete_post/{id}", name="delete-post")
     */
    public function deleteAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:RedditPost')->find($id);
        if(!$post){
            throw $this->createNotFoundException('Data not found!');
            return $this->redirectToRoute('list');
        }
        /**
         * @var $post RedditPost
         */
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('list');

    }
}