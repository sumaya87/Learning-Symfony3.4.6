<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // homepage
        if ('/default' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // githut
        if (preg_match('#^/(?P<username>[^/]++)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'githut')), array (  'username' => 'sumaya87',  '_controller' => 'AppBundle\\Controller\\GitHutController::githutAction',));
        }

        // profile
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<username>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile')), array (  '_controller' => 'AppBundle\\Controller\\GitHutController::profileAction',));
        }

        // repos
        if (0 === strpos($pathinfo, '/repos') && preg_match('#^/repos/(?P<username>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'repos')), array (  '_controller' => 'AppBundle\\Controller\\GitHutController::reposAction',));
        }

        // list
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\RedditController::listAction',  '_route' => 'list',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_list;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'list'));
            }

            return $ret;
        }
        not_list:

        // create-post
        if (0 === strpos($pathinfo, '/create_post') && preg_match('#^/create_post/(?P<text>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create-post')), array (  '_controller' => 'AppBundle\\Controller\\RedditController::createAction',));
        }

        // update-post
        if (0 === strpos($pathinfo, '/update_post') && preg_match('#^/update_post/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'update-post')), array (  '_controller' => 'AppBundle\\Controller\\RedditController::updateAction',));
        }

        // delete-post
        if (0 === strpos($pathinfo, '/delete_post') && preg_match('#^/delete_post/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete-post')), array (  '_controller' => 'AppBundle\\Controller\\RedditController::deleteAction',));
        }

        // test
        if ('/test' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\TestController::indexAction',  '_route' => 'test',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
