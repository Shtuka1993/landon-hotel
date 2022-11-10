<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorSubscriber implements EventSubscriberInterface {
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onError(ExceptionEvent $event) {
        $e = $event->getException();
        if ($e instanceof Exception) {
            $request =  $event->getRequest();
            $responseData = [
                'error' => $e->getMessage(),
                'IP' => $request->getClientIp(),
                'url' => $request>getRequestUri(),
                'file' => $request>getFile(),
            ];
            $this->logger->info("_______________________");
            $this->logger->info("Some exeption epriared.");
            $this->logger->info("IP : " . $responseData['IP']);
            $this->logger->info("URL : " . $responseData['url']);
            $this->logger->info("FILE : " . $responseData['file']);
            $this->logger->info("Error message : " . $responseData['error']);
            $this->logger->info("_______________________");
        }

        return;
    }

    public static function getSubscribedEvents() {
        return [
            KernelEvents::EXCEPTION => 'onError',
        ];
    }
}