<?php

require __DIR__ . '/../vendor/autoload.php';

use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Search\SearchApi;

$envFile = __DIR__ . '/../.env.local';
$env = parse_ini_file($envFile);
$url = parse_url($env['CLOUDINARY_URL']);

$config = [
    'cloud_name' => $url['host'],
    'api_key'    => $url['user'],
    'api_secret' => $url['pass'],
];

$adminApi = new AdminApi($config);
$searchApi = new SearchApi($config);

echo "<pre style='background:#111;color:#0f0;padding:20px;font-size:13px;line-height:1.5;'>";

// METHOD 1: assets() with prefix
echo "=== METHOD 1: assets() with prefix 'baroudeurs/gallery/' ===\n";
try {
    $r = $adminApi->assets([
        'type' => 'upload',
        'prefix' => 'baroudeurs/gallery/',
        'max_results' => 500,
    ]);
    echo "Found: " . count($r['resources']) . "\n\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n\n";
}

// METHOD 2: assets() with prefix 'baroudeurs/gallery/Desert Oasis'
echo "=== METHOD 2: assets() with prefix 'baroudeurs/gallery/Desert Oasis/' ===\n";
try {
    $r = $adminApi->assets([
        'type' => 'upload',
        'prefix' => 'baroudeurs/gallery/Desert Oasis/',
        'max_results' => 500,
    ]);
    echo "Found: " . count($r['resources']) . "\n\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n\n";
}

// METHOD 3: Search API (newer, more reliable)
echo "=== METHOD 3: Search API for folder 'baroudeurs/gallery/Desert Oasis' ===\n";
try {
    $result = $searchApi
        ->expression('folder:"baroudeurs/gallery/Desert Oasis"')
        ->maxResults(500)
        ->execute();

    echo "Found: " . count($result['resources']) . "\n\n";
    foreach ($result['resources'] as $img) {
        echo "  - {$img['public_id']}\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n\n";
}

// METHOD 4: Search API with wildcard
echo "\n=== METHOD 4: Search API for folder:'baroudeurs/gallery/*' ===\n";
try {
    $result = $searchApi
        ->expression('folder:"baroudeurs/gallery/*"')
        ->maxResults(500)
        ->execute();

    echo "Found: " . count($result['resources']) . "\n\n";
    foreach ($result['resources'] as $img) {
        echo "  - {$img['public_id']}  (folder: {$img['folder']})\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n\n";
}

// METHOD 5: List all subfolders of gallery
echo "\n=== METHOD 5: subfolders of 'baroudeurs/gallery' ===\n";
try {
    $subs = $adminApi->subFolders('baroudeurs/gallery');
    echo "Folders found: " . count($subs['folders']) . "\n\n";
    foreach ($subs['folders'] as $f) {
        echo "  - {$f['path']}\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n\n";
}

echo "</pre>";