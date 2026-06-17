<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'sistem_umkm');
$tables = $conn->query("SHOW TABLES");
echo "Tables:\n";
while($t = $tables->fetch_array()) {
    echo "- " . $t[0] . "\n";
    $cols = $conn->query("SHOW COLUMNS FROM " . $t[0]);
    while($c = $cols->fetch_assoc()) {
        echo "   - " . $c['Field'] . "\n";
    }
}
