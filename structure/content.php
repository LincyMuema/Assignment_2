<?php
 class content{
    public function mainContent(){
        ?>
        <div class="row align-items-md-stretch">
        <div class="col-md-8">
                <h1>Welcome to Assignment TWO!!!!</h1>
                <h5>
               This is the landing page for assignment 2. <br>Please click on sign up at the navigation bar to proceed.
                </h5>
                <p>
                    Have a lovely day
                </p>
            </div>
        <?php
    }
    public function afterSignUp(){
        ?>
        <div class="row align-items-md-stretch">
        <div class="col-md-8">
                <h1>Welcome, You are signed in!!!</h1>
                <h5>
              Do you want to see other users?
                </h5>
                <form action="displayUsers.php" method="get">
    <button type="submit" class="btn btn-success">Go to Display User</button>
</form>
                <p>
                    Have a lovely day
                </p>
            </div>
        <?php
    }
    public function displayUsers($conn) {
        ?>
        <div class="row align-items-md-stretch">
            <div class="col-md-8">
               
                <h2>User Details</h2>
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Verification Code</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        $users = $conn->select('users');
                        if (!empty($users)) {
                            foreach ($users as $row) {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['userID'] . '</th>';
                                echo '<td>' . $row['firstname'] . '</td>';
                                echo '<td>' . $row['lastname'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phoneNo'] . '</td>';
                                echo '<td>' . $row['verificationcode'] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No users found.</td></tr>'; 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}