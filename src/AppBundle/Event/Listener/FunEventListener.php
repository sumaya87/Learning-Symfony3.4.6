<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 28/03/18
 * Time: 2:20 PM
 */

namespace AppBundle\Event\Listener;

use AppBundle\Event\FunEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class FunEventListener
{

    public function onFunEvent(FunEvent $event)
    {
        dump('Fun Event Listener:onFunEvent (event) => '.$event);
    }

    public function onNewUser(
        FunEvent $event,
        string $eventName,
        EventDispatcherInterface $eventDispatcher)
    {
        dump('Fun Event Listener:onNewUser (event) => '.$event);
        dump('Fun Event Listener:onNewUser (eventName) => '.$eventName);
        dump('Fun Event Listener:onNewUser (eventDispatcher) => '.$eventDispatcher);
    }


}