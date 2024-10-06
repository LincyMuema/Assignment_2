<?php
class insert {
    public function signup($conn) {
        $errors = [];

        if (isset($_POST["signup"])) {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $phoneNo = $_POST["phoneNo"];

            if (empty($firstname)) {
                $errors['firstname'] = "First name is required.";
            } elseif (!preg_match("/^[a-zA-Z' -]+$/", $firstname)) {
                $errors['firstname'] = "Invalid first name. Only letters, spaces, hyphens, or apostrophes are allowed.";
            }

            if (empty($lastname)) {
                $errors['lastname'] = "Last name is required.";
            } elseif (!preg_match("/^[a-zA-Z' -]+$/", $lastname)) {
                $errors['lastname'] = "Invalid last name. Only letters, spaces, hyphens, or apostrophes are allowed.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }

            if (empty($phoneNo)) {
                $errors['phoneNo'] = "Phone number is required.";
            } elseif (!preg_match("/^\d+$/", $phoneNo)) {
                $errors['phoneNo'] = "Phone number must contain only numbers.";
            }

            if (empty($errors)) {
                $existingUser = $conn->select('users', 'email', $email);
                if (!empty($existingUser)) {
                    $errors['email'] = "Email already exists.";
                } else {
                   
                    $verificationCode = rand(10000, 99999);

                    $cols = ['firstname', 'lastname', 'email', 'phoneNo'];
                    $vals = [$firstname, $lastname, $email, $phoneNo];

                    $data = array_combine($cols, $vals);
                    $insert = $conn->insert('users', $data);

                    if ($insert === TRUE) {
                        
                        $updateData = ['verificationcode' => $verificationCode];
                        $whereCondition = ['email' => $email];

                        $update = $conn->update('users', $updateData, $whereCondition);

                        if ($update === TRUE) {
                          
                            $mailSender = new mail();
                            $mailSender->sendVerificationEmail($email, $firstname . ' ' . $lastname, $verificationCode);

                            header('Location: signup.php');
                            exit();
                        } else {
                            die("Failed to update verification code.");
                        }
                    } else {
                        die($insert);
                    }
                }
            }
        }

        return $errors;
    }
}
