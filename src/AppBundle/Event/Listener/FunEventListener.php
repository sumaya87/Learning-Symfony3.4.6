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
        dump('Fun Event Listener:onFunEvent => ');
        dump($event);
    }

    public function onNewUser(
        FunEvent $event,
        string $eventName,
        EventDispatcherInterface $eventDispatcher)
    {
        dump('Fun Event Listener:onNewUser => ');
        dump($event);
        dump($eventName);
        dump($eventDispatcher);
    }


}