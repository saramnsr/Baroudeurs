<?php

namespace App\EventSubscriber\Admin;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * En-têtes appliqués à toutes les pages /admin :
 * - jamais indexées par Google
 * - jamais mises en cache (bouton Retour après déconnexion)
 * - pas d'affichage dans une iframe
 */
final class AdminResponseHeadersSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::RESPONSE => 'onKernelResponse'];
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $path = $event->getRequest()->getPathInfo();
        if ($path !== '/admin' && !str_starts_with($path, '/admin/')) {
            return;
        }

        $response = $event->getResponse();
        $response->setPrivate();
        $response->headers->addCacheControlDirective('no-store', true);
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
    }
}