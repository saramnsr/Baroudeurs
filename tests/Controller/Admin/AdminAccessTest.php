<?php

namespace App\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Vérifie que l'admin est protégé.
 */
final class AdminAccessTest extends WebTestCase
{
    // Un visiteur non connecté est renvoyé vers la connexion
    public function testDashboardRedirectsToLogin(): void
    {
        $client = static::createClient();
        $client->request('GET', '/admin');

        self::assertResponseRedirects('/admin/login');
    }

    // La page de connexion s'affiche, avec CSRF et sans indexation
    public function testLoginPageIsSecure(): void
    {
        $client = static::createClient();
        $client->request('GET', '/admin/login');

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('X-Robots-Tag', 'noindex, nofollow');
        self::assertSelectorExists('input[name="_csrf_token"]');
    }
}