<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numbers = $_POST['numbers']; 
    $num_array = array_map('floatval', explode(',', $numbers));
    
    $num_array = array_filter($num_array, function($n) { return is_numeric($n); });//filter the numeric values

    //empty submission checked
    if (count($num_array) === 0) {
        echo json_encode(["error" => "No valid numbers provided."]);
        exit;
    }

    //calc the max, min, avg
    $max = max($num_array);
    $min = min($num_array);
    $avg = array_sum($num_array) / count($num_array);

    //prepared statement to add data to the db
    $stmt = $conn->prepare("INSERT INTO number_lists (numbers, max, min, avg) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddd", $numbers, $max, $min, $avg); 
    $stmt->execute();
    $stmt->close();

    //send the data back to index.php
    echo json_encode([
        "max" => $max,
        "min" => $min,
        "avg" => round($avg, 2)
    ]);
}
?>
