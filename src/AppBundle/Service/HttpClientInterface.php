<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 27/03/18
 * Time: 9:33 AM
 */

namespace AppBundle\Service;

interface HttpClientInterface
{

    public function get($url);

    public function post($url, $data);

}

