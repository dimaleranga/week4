<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Video Games Directory</title>
  <!-- Load Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Header -->
        <header class="mb-4 text-center">
          <h1 class="display-5 fw-bold text-primary">All Video Games</h1>
          <p class="text-muted">Browse collection or click to add a new game</p>
        </header>

        <!-- Top Bar: Search Form + Modal Trigger Button -->
        <div class="card shadow-sm mb-4 border-0">
          <div class="card-body">
            <div class="row g-2 align-items-center">
              
              <!-- Search Box Form -->
              <div class="col-sm-8">
                <form action="search-games.php" method="post" class="d-flex gap-2">
                  <input type="text" name="keywords" class="form-control" placeholder="Search by game title..." required>
                  <button type="submit" class="btn btn-primary">Search</button>
                </form>
              </div>

              <!-- Button to open the Modal Pop-up window -->
              <div class="col-sm-4 d-grid">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGameModal">
                  + Add Game
                </button>
              </div>

            </div>
          </div>
        </div>

        <?php
          // Include database connection
          include("db.php");

          // Query games sorted by date
          $sql = "SELECT * FROM videogames ORDER BY released_date";
          $results = mysqli_query($mysqli, $sql);
        ?>

        <!-- Video Games Table -->
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
                <!-- Loop through database rows -->
                <?php while($a_row = mysqli_fetch_assoc($results)): ?>
                  <tr>
                    <td>
                      <!-- Clickable link to details page -->
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
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- POP-UP MODAL WINDOW (Bootstrap Modal)  -->

  <div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <!-- Form submits to add-game.php -->
        <form action="add-game.php" method="post">
          
          <div class="modal-header">
            <h5 class="modal-title" id="addGameModalLabel">Add a Videogame</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            
            <!-- Game Name Input -->
            <div class="mb-3">
              <label for="GameName" class="form-label">Game Name</label>
              <input type="text" class="form-control" id="GameName" name="GameName" required>
            </div>

            <!-- Description Textarea -->
            <div class="mb-3">
              <label for="GameDescription" class="form-label">Description</label>
              <textarea class="form-control" id="GameDescription" name="GameDescription" rows="4" required></textarea>
            </div>

            <!-- Date Released Input -->
            <div class="mb-3">
              <label for="DateReleased" class="form-label">Date Released</label>
              <input type="date" class="form-control" id="DateReleased" name="DateReleased" required>
            </div>

 
            <!-- RATING AS A BOOTSTRAP SELECT DROPDOWN  -->
          
            <div class="mb-3">
              <label for="GameRating" class="form-label">Rating</label>
              <select class="form-select" id="GameRating" name="GameRating" required>
                <option value="" disabled selected>Select a rating (1 - 5)</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
              </select>
            </div>

          </div>

          <div class="modal-footer">
            <!-- Close button dismisses modal without submitting -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- Submit button sends form data to add-game.php -->
            <button type="submit" class="btn btn-primary">Save Game</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JavaScript Bundle (Required for modal pop-up interaction) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>