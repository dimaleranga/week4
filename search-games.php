<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <?php
          include("db.php");
          $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
          
          $sql = "SELECT * FROM videogames 
                  WHERE game_name LIKE '%{$keywords}%' 
                  ORDER BY released_date";
          $results = mysqli_query($mysqli, $sql);
        ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="h3 mb-0">Search Results for "<span class="text-primary"><?=htmlspecialchars($keywords)?></span>"</h2>
          <a href="list-games.php" class="btn btn-outline-secondary btn-sm">Clear Search</a>
        </div>

        <div class="card shadow-sm border-0">
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
              <thead class="table-dark">
                <tr>
                  <th scope="col" class="py-3">Game Title</th>
                  <th scope="col" class="py-3 text-center" style="width: 120px;">Rating</th>
                </tr>
              </thead>
              <tbody>
                <?php if (mysqli_num_rows($results) > 0): ?>
                  <?php while($a_row = mysqli_fetch_assoc($results)): ?>
                    <tr>
                      <td>
                        <a href="game-details.php?id=<?=$a_row['game_id']?>" class="fw-semibold text-decoration-none">
                          <?=$a_row['game_name']?>
                        </a>
                      </td>
                      <td class="text-center">
                        <span class="badge bg-secondary rounded-pill px-3 py-2">
                          <?=$a_row['rating']?> / 5
                        </span>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="2" class="text-center py-4 text-muted">
                      No games found matching your search term.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>