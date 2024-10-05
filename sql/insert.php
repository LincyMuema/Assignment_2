<?php
    class insert{
        public function signup($conn){
            if(isset($_POST["signup"])){
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $phoneNo = $_POST["phoneNo"];
        $errors = array();
    if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid Email format';
    }

    $cols = ['firstname','lastname','email', 'phoneNo'];
    $vals = [$firstname, $lastname, $email, $phoneNo];
    
    $data = array_combine($cols, $vals);
    
    $insert = $conn->insert('users', $data);
        if($insert === TRUE){
            header('Location: signup.php');
            exit();
        }else{
            die($insert);
        }
            }
        }
    }
