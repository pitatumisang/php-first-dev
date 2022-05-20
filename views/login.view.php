<?php include 'inc/header.php'; ?>

<h2>Log In</h2>
<p class="lead text-center">Log in and Leave a feedback </p>

<span class="text-danger h6 my-2"><?php echo $errors['credentials'] ?? '' ?></span>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="mt-4 w-75">

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $isSubmitted && !$allInputsFilled ? $email : '' ?>">
        <span class="text-danger"> <?php echo $errors['email'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?php echo $isSubmitted && !$allInputsFilled ? $password : '' ?>"></input>
        <span class="text-danger"> <?php echo $errors['password'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Log In" class="btn btn-dark w-100 h6">
    </div>
</form>

<p class="my-2 h6">Not registered? <a href="/feedback/register.php">Register</a></p>


<?php include 'inc/footer.php';
