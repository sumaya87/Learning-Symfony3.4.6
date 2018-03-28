<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 26/03/18
 * Time: 10:32 AM
 */

namespace AppBundle\Service;

use AppBundle\Entity\RedditAuthor;
use AppBundle\Entity\RedditPost;
use Doctrine\ORM\EntityManagerInterface;


class RedditScraper
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function scrape()
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.reddit.com/r/php.json');
        $contents = json_decode($response->getBody()->getContents(), true);

        //dump($contents['data']['children']);

        foreach ($contents['data']['children'] as $child){
            $redditPost = new RedditPost();
            $redditPost->setTitle($child['data']['title']);

            $authorName = $child['data']['author'];
            $redditAuthor = $this->em->getRepository('AppBundle:RedditAuthor')->findOneBy([
                'name' => $authorName,
            ]);
            if(!$redditAuthor){

                $redditAuthor = new RedditAuthor();
                $redditAuthor->setName($authorName);
                $this->em->persist($redditAuthor);
                $this->em->flush();
            }

            //undo chris madness in RedditAuthor,then uncomment
            //$redditPost->setAuthor($redditAuthor);

            $redditAuthor->addPost($redditPost);

            $this->em->persist($redditPost);

        }
        $this->em->flush();
        //return $contents;
    }
}