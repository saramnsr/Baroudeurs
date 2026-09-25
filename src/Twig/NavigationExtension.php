<?php

namespace App\Twig;

use App\Repository\CircuitRepository;
use App\Repository\ExcursionRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Fonctions Twig nav_circuits() et nav_excursions() :
 * alimentent les menus déroulants du header depuis la base.
 * Une seule requête par page (résultat gardé en mémoire).
 */
final class NavigationExtension extends AbstractExtension
{
    private CircuitRepository $circuits;
    private ExcursionRepository $excursions;

    private ?array $circuitNav = null;
    private ?array $excursionNav = null;

    public function __construct(
        CircuitRepository $circuits,
        ExcursionRepository $excursions,
    ) {
        $this->circuits = $circuits;
        $this->excursions = $excursions;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('nav_circuits', [$this, 'getCircuitNav']),
            new TwigFunction('nav_excursions', [$this, 'getExcursionNav']),
        ];
    }

    public function getCircuitNav(): array
    {
        return $this->circuitNav ??= $this->circuits->findNavItems();
    }

    public function getExcursionNav(): array
    {
        return $this->excursionNav ??= $this->excursions->findNavItems();
    }
}