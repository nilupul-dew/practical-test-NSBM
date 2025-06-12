<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numbers = $_POST['numbers']; 
    $num_array = array_map('floatval', explode(',', $numbers));
    
    $num_array = array_filter($num_array, function($n) { return is_numeric($n); });

    if (count($num_array) === 0) {
        echo json_encode(["error" => "No valid numbers provided."]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO number_lists (numbers) VALUES (?)");
    $stmt->bind_param("s", $numbers);
    $stmt->execute();
    $stmt->close();

    $max = max($num_array);
    $min = min($num_array);
    $avg = array_sum($num_array) / count($num_array);

    echo json_encode([
        "max" => $max,
        "min" => $min,
        "avg" => round($avg, 2)
    ]);
}
?>
