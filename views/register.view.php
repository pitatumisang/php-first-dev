<?php include 'inc/header.php'; ?>

<h2>Create An Account</h2>
<p class="lead text-center">Create an Account to Leave feedback </p>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="mt-4 w-75">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value="<?php echo $isSubmitted && !$allInputsFilled ? $username : '' ?>">
        <span class="text-danger"><?php echo $errors['username'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $isSubmitted && !$allInputsFilled ? $email : '' ?>">
        <span class="text-danger"><?php echo $errors['email'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?php echo $isSubmitted && !$allInputsFilled ? $password : '' ?>"></input>
        <span class="text-danger"><?php echo $errors['password'] ?? '' ?></span>
    </div>
    <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password" value="<?php echo $isSubmitted && !$allInputsFilled ? $password2 : '' ?>"></input>

        <span class="text-danger"><?php echo $errors['password2'] ?? '' ?></span>

    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Register" class="btn btn-dark w-100 h6">
    </div>
</form>

<p class="my-2 h6">Already have an account ? <a href="/feedback/login.php">Login</a></p>



<?php include 'inc/footer.php';
