<?php

namespace App\Twig;

use App\Repository\CircuitRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Fonction Twig nav_circuits() : circuits du menu du header, lus en base.
 * Une seule requête par page (résultat gardé en mémoire).
 */
final class NavigationExtension extends AbstractExtension
{
    private CircuitRepository $circuits;
    private ?array $circuitNav = null;

    public function __construct(CircuitRepository $circuits)
    {
        $this->circuits = $circuits;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('nav_circuits', [$this, 'getCircuitNav']),
        ];
    }

    public function getCircuitNav(): array
    {
        return $this->circuitNav ??= $this->circuits->findNavItems();
    }
}