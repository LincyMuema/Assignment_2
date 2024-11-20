<?php
class forms {
  public function signupform($errors = []) {
      ?>
      <form action="" method="post" enctype="multipart/form-data">
          <p>WELCOME................PLEASE SIGN UP </p>
        
          <div class="row mb-3">
              <label for="firstname" class="col-sm-2 col-form-label">First Name: </label>
              <div class="col-sm-10">
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>" required>
                  <?php if (isset($errors['firstname'])): ?>
                        <div class="text-danger"><?php echo $errors['firstname']; ?></div>
                    <?php endif; ?>
              </div>
          </div>

          <div class="row mb-3">
              <label for="lastname" class="col-sm-2 col-form-label">Last Name: </label>
              <div class="col-sm-10">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"required>
                  <?php if (isset($errors['lastname'])): ?>
                        <div class="text-danger"><?php echo $errors['lastname']; ?></div>
                    <?php endif; ?>
              </div>
          </div>

          <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email: </label>
              <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"required>
                  <?php if (isset($errors['email'])): ?>
                        <div class="text-danger"><?php echo $errors['email']; ?></div>
                    <?php endif; ?>
              </div>
          </div>

          <div class="row mb-3">
              <label for="phoneNo" class="col-sm-2 col-form-label">Phone Number: </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" value="<?php echo isset($_POST['phoneNo']) ? htmlspecialchars($_POST['phoneNo']) : ''; ?>"minlength="10" maxlength="13" required>
                  <?php if (isset($errors['phoneNo'])): ?>
                        <div class="text-danger"><?php echo $errors['phoneNo']; ?></div>
                    <?php endif; ?>
              </div>
          </div>

          <button type="submit" name="signup" class="btn btn-success">Next</button>
      </form>
      <?php
  }
  public function verifyform($errors = []) {
    ?>
    <p>Please enter the verification code sent to your email.</p>
    <form action="verify.php" method="post">
        <div>
            <label for="verificationcode">Verification Code:</label>
            <input type="text" name="verificationcode" placeholder="Enter verification code" required>
            <?php if (isset($errors['verificationcode'])): ?>
                <div class="text-danger"><?php echo $errors['verificationcode']; ?></div>
            <?php endif; ?>
        </div>
        
        <button type="submit" name="verify">Verify</button>
    </form>
    <?php
    if (isset($errors['email'])) {
        echo '<div class="text-danger">'.$errors['email'].'</div>';
    }
    if (isset($errors['update'])) {
        echo '<div class="text-danger">'.$errors['update'].'</div>';
    }
}
public function editform($errors = []) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>EDIT USER </p>
      
        <div class="container mt-5">
    <h2 class="mb-4">Edit User Details</h2>
    <form method="post" action="edit_user.php">
        <input type="hidden" name="userID" value="<?= $user['userID'] ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user['firstname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="phoneNo" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="<?= $user['phoneNo'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="displayUsers.php" class="btn btn-secondary">Cancel</a>
    </form>

    <?php
}

public function genderform($errors = []) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Pick Gender</p>
      
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender"  required>
        </div>
        <button type="submit" class="btn btn-primary">Complete</button>
    </form>
    <?php
}
}
