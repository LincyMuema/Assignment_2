<?php
    class insert{
        public function signup($conn){
            if(isset($_POST["signup"])){
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $username = $_POST["username"];
    
    $cols = ['firstname','lastname','email', 'username'];
    $vals = [$firstname, $lastname, $email, $username];
    
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
