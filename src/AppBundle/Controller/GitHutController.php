<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 23/03/18
 * Time: 3:59 PM
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GitHutController extends Controller{

    /**
     * @Route("/githut/{username}", name="githut", defaults={"username": "sumaya87"})
     */
    public function githutAction(Request $request, $username)
    {

        $this->get('github_api')->getRepos($username);
        return $this->render('githut/index.html.twig', [
            'username' => $username,
        ]);

    }

    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, $username)
    {
        $profileData = $this->get('github_api')->getProfile($username);
        return $this->render('githut/profile.html.twig', $profileData);
    }

    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction(Request $request, $username)
    {
        $repoData = $this->get('github_api')->getRepos($username);
        return $this->render('githut/repos.html.twig', $repoData);
    }
}