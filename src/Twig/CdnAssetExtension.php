<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CdnAssetExtension extends AbstractExtension
{
    private string $cdnBase;

    public function __construct(string $cdnBase = '')
    {
        $this->cdnBase = rtrim($cdnBase, '/');
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('asset', [$this, 'asset']),
        ];
    }

    public function asset(string $path): string
    {
        // 1. Absolute URLs (http, https, protocol-relative //) → leave alone
        if (preg_match('#^(https?:)?//#', $path)) {
            return $path;
        }

        // 2. No CDN base configured → behave like the default Symfony asset()
        if ($this->cdnBase === '') {
            return '/' . ltrim($path, '/');
        }

        // 3. Normalize: no leading slash, split into path segments
        $path = ltrim($path, '/');

        // 4. Encode each segment (spaces, accents, apostrophes, etc.)
        $segments = explode('/', $path);
        $segments = array_map('rawurlencode', $segments);
        $encodedPath = implode('/', $segments);

        // 5. Prepend CDN base
        return $this->cdnBase . '/' . $encodedPath;
    }
}