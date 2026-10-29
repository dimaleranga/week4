<?php
// Set response header to return JSON
header('Content-Type: application/json; charset=utf-8');

// Include your database connection ($mysqli object)
include("db.php");

// Query all games
$sql = "SELECT game_id, game_name FROM videogames ORDER BY released_date";
$result = $mysqli->query($sql);

$games = array();

// Collect all rows into an array
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $games[] = $row;
    }
}

// Output array encoded as JSON
echo json_encode($games);
?>