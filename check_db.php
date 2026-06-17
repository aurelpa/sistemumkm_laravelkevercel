<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'sistem_umkm');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SHOW COLUMNS FROM umkm");
$columns = [];
while ($row = $result->fetch_assoc()) {
    $columns[] = $row['Field'];
}

echo "Columns: " . implode(', ', $columns) . "\n\n";

$result = $conn->query("SELECT * FROM umkm LIMIT 1");
$row = $result->fetch_assoc();
echo "First Row Data:\n";
print_r($row);
