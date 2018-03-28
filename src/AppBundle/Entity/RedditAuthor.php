<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 26/03/18
 * Time: 9:45 AM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class RedditAuthor
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="reddit_authors", indexes={
 *   @ORM\Index(name="index_author_name", columns={"name"})
 *})
 */
class RedditAuthor
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RedditPost", mappedBy="author")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return RedditAuthor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    //Chris Madness
    public function addPost(RedditPost $redditPost)
    {
        if( ! $this->posts->contains($redditPost)){
            $redditPost->setAuthor($this);
            $this->posts->add($redditPost);
        }
        return $this;
    }
    //Chris Madness

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }


}