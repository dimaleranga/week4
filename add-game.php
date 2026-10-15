<?php
  // 1. Read values from the submitted form
  $game_name = $_POST['GameName'];
  $game_description = $_POST['GameDescription'];
  $game_release_date = $_POST['DateReleased'];
  $game_rating = $_POST['GameRating'];

  // 2. Connect to database
  include("db.php");

  // 3. Build the SQL statement
  $sql = "INSERT INTO videogames(game_name, game_description, released_date, rating)
          VALUES('{$game_name}', '{$game_description}', '{$game_release_date}', '{$game_rating}')";

  // 4. Run the SQL statement and report errors if any
  if (!$mysqli->query($sql)) {
      echo("<h4>SQL error description: " . $mysqli->error . "</h4>");
      exit();
  }

  // 5. Redirect back to list
  header("Location: list-games.php");
  exit();
?>