<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 28/03/18
 * Time: 4:23 PM
 */

namespace AppBundle\Event\Subscriber;


use AppBundle\Event\FunEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FunEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            FunEvent::FUN_EVENT => [
                [
                    'logEvent',
                ],
            ],
        ];
    }

    public function logEvent(FunEvent $event)
    {
        dump('Fun Event Subscriber:logEvent => '.'log event');
    }
}