<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 28/03/18
 * Time: 2:50 PM
 */

namespace AppBundle\Service;

use AppBundle\Event\FunEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class OurCustomService
{

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {

        $this->eventDispatcher = $eventDispatcher;
    }

    public function someMethodName()
    {
        $this->eventDispatcher->dispatch(
            FunEvent::FUN_EVENT,
            new FunEvent()
        );

    }

}