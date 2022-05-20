<?php include 'inc/header.php'; ?>


<h2>Feedbacks</h2>

<?php if (count($feedbackData) == 0) : ?>

  <?php if (isset($_SESSION['user'])) : ?>
    <p class="text-dark h5"> No Feedbacks yet, Please create a fedback ! </p>
  <?php else : ?>
    <p class="text-dark h5">
      No Feedbacks yet, Registerand login to create feedback. <a href="/feedback/register.php"> Register</a>
    </p>
  <?php endif ?>
<?php else : ?>
  <?php foreach ($feedbackData as $feedback) : ?>
    <div class="card my-3 w-75 position-relative">
      <div class="card-body">
        <?php echo $feedback->body; ?>
      </div>
      <div class="d-flex justify-content-between text-secondary my-2 mx-3">
        <span class="h6"><?php echo $feedback->username ?></span>
        <span class="h6"><?php echo $feedback->createdAt ?></span>
      </div>
      <?php if (isset($_SESSION['user']) && $feedback->userId == $_SESSION['user']->id) : ?>
        <div class="d-inline mb-2">
          <a href="/feedback/delete.php?id=<?php echo $feedback->id ?>" class="text-danger font-weight-bold mx-3">delete</a>
          <a href="/feedback/update.php?id=<?php echo $feedback->id ?>" class="font-weight-bold">update</a>
        </div>
      <?php else : ?>
        <?php echo '' ?>
      <?php endif ?>
    </div>
  <?php endforeach ?>
<?php endif ?>

<?php include 'inc/footer.php';
