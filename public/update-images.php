<?php

// Database connection from your .env
$host = '127.0.0.1';
$port = 5432;
$dbname = 'app';
$user = 'app';
$password = '!ChangeMe!';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ============================================
    // 1. TATAOUINE & KSAR GHILANE (ID 88)
    // ============================================
    echo "=== 1. UPDATING TATAOUINE & KSAR GHILANE (ID 88) ===\n";
    $images = [
        'details/Tataouine/1.jpg',
        'details/Tataouine/2.jpg',
        'details/Tataouine/3.jpg',
        'details/Tataouine/4.webp',
        'details/Tataouine/5.jpg',
        'details/Tataouine/6.jpg',
        'details/Tataouine/7.jpg',
        'details/Tataouine/8.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 88");
    $stmt->execute([':images' => $json]);
    echo "✅ Tataouine updated!\n\n";
    
    // ============================================
    // 2. DESERT CHARM (ID 86)
    // ============================================
    echo "=== 2. UPDATING DESERT CHARM (ID 86) ===\n";
    $images = [
        'details/Charm/1.jpg',
        'details/Charm/2.jpg',
        'details/Charm/3.jpg',
        'details/Charm/4.webp',
        'details/Charm/5.jpeg',
        'details/Charm/6.jpg',
        'details/Charm/7.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 86");
    $stmt->execute([':images' => $json]);
    echo "✅ Desert Charm updated!\n\n";
    
    // ============================================
    // 3. CALL OF THE DESERT (ID 87)
    // ============================================
    echo "=== 3. UPDATING CALL OF THE DESERT (ID 87) ===\n";
    $images = [
        'details/Call/1.jpg',
        'details/Call/2.jpg',
        'details/Call/3.jpg',
        'details/Call/4.jpg',
        'details/Call/5.jpeg',
        'details/Call/6.jpg',
        'details/Call/7.jpg',
        'details/Call/8.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 87");
    $stmt->execute([':images' => $json]);
    echo "✅ Call of the Desert updated!\n\n";
    
    // ============================================
    // 4. ENDLESS DESERT (ID 91)
    // ============================================
    echo "=== 4. UPDATING ENDLESS DESERT (ID 91) ===\n";
    $images = [
        'details/Endless/1.jpg',
        'details/Endless/2.jpg',
        'details/Endless/3.jpg',
        'details/Endless/4.jpg',
        'details/Endless/5.jpg',
        'details/Endless/6.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 91");
    $stmt->execute([':images' => $json]);
    echo "✅ Endless Desert updated!\n\n";
    
    // ============================================
    // 5. DESERT MIRAGE (ID 92)
    // ============================================
    echo "=== 5. UPDATING DESERT MIRAGE (ID 92) ===\n";
    $images = [
        'details/Mirage/1.jpg',
        'details/Mirage/2.jpg',
        'details/Mirage/3.jpg',
        'details/Mirage/4.jpg',
        'details/Mirage/5.jpg',
        'details/Mirage/6.jpg',
        'details/Mirage/7.jpg',
        'details/Mirage/8.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 92");
    $stmt->execute([':images' => $json]);
    echo "✅ Desert Mirage updated!\n\n";
    
    // ============================================
    // 6. 4x4 CIRCUIT - DOUZ SAHARA (ID 94)
    // ============================================
    echo "=== 6. UPDATING 4x4 CIRCUIT - DOUZ SAHARA (ID 94) ===\n";
    $images = [
        'details/Circuit/1.jpg',
        'details/Circuit/2.jpg',
        'details/Circuit/3.jpg',
        'details/Circuit/4.jpg',
        'details/Circuit/5.jpg',
        'details/Circuit/6.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 94");
    $stmt->execute([':images' => $json]);
    echo "✅ 4x4 Circuit - Douz Sahara updated!\n\n";
    
    // ============================================
    // 7. DESERT ROSE (ID 89)
    // ============================================
    echo "=== 7. UPDATING DESERT ROSE (ID 89) ===\n";
    $images = [
        'details/Rose/1.jpg',
        'details/Rose/2.jpg',
        'details/Rose/3.jpg',
        'details/Rose/4.jpg',
        'details/Rose/5.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 89");
    $stmt->execute([':images' => $json]);
    echo "✅ Desert Rose updated!\n\n";
    
    // ============================================
    // 8. 4x4 CIRCUIT DOUZ - TEMBAÏNE (ID 93)
    // ============================================
    echo "=== 8. UPDATING 4x4 CIRCUIT DOUZ - TEMBAÏNE (ID 93) ===\n";
    $images = [
        'details/Tembaïne/1.jpg',
        'details/Tembaïne/2.jpg',
        'details/Tembaïne/3.jpg',
        'details/Tembaïne/4.jpg',
        'details/Tembaïne/5.jpg',
        'details/Tembaïne/6.jpg',
        'details/Tembaïne/7.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 93");
    $stmt->execute([':images' => $json]);
    echo "✅ 4x4 Circuit Douz - Tembaïne updated!\n\n";
    
    // ============================================
    // 9. DESERT BAROUDEURS (ID 90)
    // ============================================
    echo "=== 9. UPDATING DESERT BAROUDEURS (ID 90) ===\n";
    $images = [
        'details/Baroudeurs/1.jpg',
        'details/Baroudeurs/2.jpg',
        'details/Baroudeurs/3.jpg',
        'details/Baroudeurs/4.jpg',
        'details/Baroudeurs/5.jpg',
        'details/Baroudeurs/6.jpg',
        'details/Baroudeurs/7.jpg',
        'details/Baroudeurs/8.jpg'
    ];
    $json = json_encode($images);
    $stmt = $pdo->prepare("UPDATE programme SET images = :images WHERE id = 90");
    $stmt->execute([':images' => $json]);
    echo "✅ Desert Baroudeurs updated!\n\n";
    
    // ============================================
    // VERIFY ALL UPDATES
    // ============================================
    echo "========================================\n";
    echo "=== VERIFICATION OF ALL UPDATES ===\n";
    echo "========================================\n\n";
    
    $ids = [88, 86, 87, 91, 92, 94, 89, 93, 90];
    foreach ($ids as $id) {
        $stmt = $pdo->query("SELECT id, title_en, images FROM programme WHERE id = $id");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo "ID {$row['id']} - {$row['title_en']}\n";
            $images = json_decode($row['images'], true);
            echo "  Images: " . count($images) . " images\n";
            echo "  First: " . $images[0] . "\n\n";
        }
    }
    
    echo "✅ ALL 9 PROGRAMMES UPDATED SUCCESSFULLY!\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}