<?php

namespace App\Subscriber;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Assert\LazyAssertionException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ExceptionSubscriber
 * @package App\Subscriber
 */
class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            KernelEvents::EXCEPTION => [
                ['processException']
            ]
        ];
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function processException(GetResponseForExceptionEvent $event)
    {
        $exception  = $event->getException();
        $response = new Response();

        switch ($exception) {
            case $exception instanceof LazyAssertionException:
                $response->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                break;
            default:
                $response->setStatusCode(Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $response->setContent($exception->getMessage());

        $event->setResponse($response);

        $event->stopPropagation();
    }
}