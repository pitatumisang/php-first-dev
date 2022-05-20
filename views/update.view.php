<?php include 'inc/header.php' ?>

<img src="../feedback/img/logo.png" class=" mb-3" style="width:160px" alt="">
<h2>Update Feedback</h2>
<p class="lead text-center">Update feedback for Traversy Media</p>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="mt-4 w-75">

    <div class="mb-3">
        <textarea class="form-control" id="body" name="body" rows="6" placeholder=" Enter your feedback">
            <?php echo trim($feedback->body) ?>
        </textarea>
        <span class="text-danger"> <?php echo $errors['feedback'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Update" class="btn btn-dark w-100">
    </div>
</form>


<?php include 'inc/footer.php';
