<?php
class forms{
        public function signup(){
            ?>
            <form>
            <p>WELCOME................PLEASE SIGN UP </p>
  <div class="row mb-3">
    <label for="firstname" class="col-sm-2 col-form-label">First Name: </label>
    <div class="col-sm-10">
      <input type="firstname" class="form-control" id="firstname" placeholder="First Name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="lastname" class="col-sm-2 col-form-label">Last Name: </label>
    <div class="col-sm-10">
      <input type="lastname" class="form-control" id="lastname" placeholder="Last Name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Username: </label>
    <div class="col-sm-10">
      <input type="username" class="form-control" id="username" placeholder="Username">
    </div>
  </div>
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email: </label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <button type="submit" class="btn btn-success">Next</button>
</form>
<?php
        }
    }