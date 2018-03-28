<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 23/03/18
 * Time: 9:16 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * Class RedditPost
     * @package AppBundle\Entity
     *
     * @ORM\Entity
     * @ORM\Table(name="reddit_posts")
     */

class RedditPost{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RedditAuthor", inversedBy="posts")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;


    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor(RedditAuthor $author)
    {
        $this->author = $author;
    }




}