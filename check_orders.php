<?php
$mysqli = new mysqli('localhost', 'root', '', 'nandsecond');

if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

echo "=== Orders ===\n";
$result = $mysqli->query('SELECT id, order_number, total_harga, status FROM orders ORDER BY id DESC LIMIT 5');
while ($row = $result->fetch_assoc()) {
    echo json_encode($row) . "\n";
}

echo "\n=== Order Details (Last 10) ===\n";
$result = $mysqli->query('SELECT id, order_id, product_id, quantity, harga_satuan, subtotal FROM order_details ORDER BY id DESC LIMIT 10');
while ($row = $result->fetch_assoc()) {
    echo json_encode($row) . "\n";
}

$mysqli->close();
?>