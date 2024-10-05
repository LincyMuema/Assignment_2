<?php
class forms{
        public function signupform(){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
            <p>WELCOME................PLEASE SIGN UP </p>
  <div class="row mb-3">
    <label for="firstname" class="col-sm-2 col-form-label">First Name: </label>
    <div class="col-sm-10">
      <input type="firstname" name="firstname" class="form-control" id="firstname" placeholder="First Name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="lastname" class="col-sm-2 col-form-label">Last Name: </label>
    <div class="col-sm-10">
      <input type="lastname" name= "lastname" class="form-control" id="lastname" placeholder="Last Name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email: </label>
    <div class="col-sm-10">
      <input type="email" name ="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="row mb-3">
      <label for="phoneNo" class="col-sm-2 col-form-label">Phone Number: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" >
        </div>
    </div>
  <button type="submit" name="signup" class="btn btn-success">Next</button>
</form>
<?php
        }
      public function signup_2(){
          ?>
          <form method="POST" action="">
            <p>Set your password and phone number.</p>
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username: </label>
                <div class="col-sm-10">
                  <input type="username" class="form-control" id="username" placeholder="Username">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password: </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <?php
        }

    }