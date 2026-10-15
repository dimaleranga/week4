<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Game Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <?php
          include("db.php");
          $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
          $sql = "SELECT * FROM videogames WHERE game_id = {$id}";
          $rst = mysqli_query($mysqli, $sql);
          $a_row = mysqli_fetch_assoc($rst);
        ?>

        <?php if ($a_row): ?>
          <div class="card shadow-sm border-0">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <h1 class="card-title h2 mb-0"><?=$a_row['game_name']?></h1>
                <span class="badge bg-warning text-dark fs-6">★ <?=$a_row['rating']?> / 5</span>
              </div>
              <p class="text-muted small mb-3">Released: <?=$a_row['released_date']?></p>
              <p class="card-text lead fs-6"><?=$a_row['game_description']?></p>
              <hr class="my-4">
              <a href="list-games.php" class="btn btn-outline-primary">&larr; Back to list</a>
            </div>
          </div>
        <?php else: ?>
          <div class="alert alert-danger" role="alert">
            Game record not found. <a href="list-games.php" class="alert-link">Return to the list</a>.
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

</body>
</html>