<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 28/03/18
 * Time: 2:20 PM
 */

namespace AppBundle\Event\Listener;

use AppBundle\Event\FunEvent;

class FunEventListener
{

    public function onFunEvent(FunEvent $event)
    {
        //dump($event);
    }


}