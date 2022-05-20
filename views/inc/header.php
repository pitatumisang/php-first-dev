<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Leave Feedback </title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="/feedback/index.php">Clickify Lesotho</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item h6">
            <p class="nav-link text-uppercase text-dark">
              <?php echo isset($_SESSION['user']) ? $_SESSION['user']->username : '' ?>
            </p>
          </li>
          <li class="nav-item h6">
            <a class="nav-link" href="/feedback/index.php">Feedbacks</a>
          </li>
          <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item h6">
              <a class="nav-link" href="/feedback/create_feedback.php">Create Feedback</a>
            </li>
            <li class="nav-item h6 ">
              <a class="nav-link text-danger" href="/feedback/logout.php">Log Out</a>
            </li>
          <?php else : ?>
            <li class="nav-item h6">
              <a class="nav-link" href="/feedback/register.php">Register</a>
            </li>
            <li class="nav-item h6">
              <a class="nav-link" href="/feedback/login.php">Login</a>
            </li>
          <?php endif ?>

        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container d-flex flex-column align-items-center">