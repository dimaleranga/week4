<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Videogame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container py-5" style="max-width: 600px;">
      <div class="card shadow-sm border-0 p-4">
        <h1 class="h3 mb-4">Add a videogame</h1>
        
        <form action="add-game.php" method="post">
          <div class="mb-3">
            <label for="GameName" class="form-label">Game name</label>
            <input type="text" class="form-control" id="GameName" name="GameName" required>
          </div>

          <div class="mb-3">
            <label for="GameDescription" class="form-label">Description</label>
            <textarea class="form-control" id="GameDescription" name="GameDescription" rows="4" required></textarea>
          </div>

          <div class="mb-3">
            <label for="DateReleased" class="form-label">Date released</label>
            <input type="date" class="form-control" id="DateReleased" name="DateReleased" required>
          </div>  

          <div class="mb-3">
            <label for="GameRating" class="form-label">Rating (1 to 5)</label>
            <input type="number" min="1" max="5" class="form-control" id="GameRating" name="GameRating" required>
          </div>         

          <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" value="Add game">
            <a href="list-games.php" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>