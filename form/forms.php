<?php
class forms{
        public function signup(){
            ?>
            <form>
 
  <div class="row mb-3">
    <label for="fullname" class="col-sm-2 col-form-label">Fullname: </label>
    <div class="col-sm-10">
      <input type="fullname" class="form-control" id="fullname" placeholder="Fullname">
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
  <button type="submit" class="btn btn-success">Sign Up</button>
</form>
<?php
        }
    }