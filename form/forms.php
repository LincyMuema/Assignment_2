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
}
