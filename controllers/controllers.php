<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/models.php';


class controllers extends models
{

    public function alert($alert_type, $alert_data)
    {
        if ($alert_type == 'success') {
            return ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !!</strong> ' . $alert_data . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
        if ($alert_type == 'danger') {
            return ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error !!</strong> ' . $alert_data . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }

    // register the admin into the software
    public function admin_register(){
        if(isset($_POST['register_admin'])){
            $username = $this->pure_data($_POST['username']);
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);
            $cpassword = $this->pure_data($_POST['cpassword']);


            // first of all check if the data is blank or not
            if($username == '' || $email == '' || $password == '' || $cpassword == ''){
                echo '
                    <script>
                        danger_alert("Error !!", "Please fillup all the data !!");
                    </script>
                ';
                
                return;

            }

            // now check if the cpassword and password are matched or not
            if($password != $cpassword){
                // that means the password and cpassword are not same

                echo '
                
                    <script>
                        danger_alert("Error !!", "Password doesnot matched !!");
                    </script>
                
                
                ';

                return;

            }

            // now check if the email exists on the software
            $check_data = $this->get_data_where("admin_users", "`admin_email` = '$email'");

            if($check_data){
                if($check_data->num_rows > 0){
                    // that means the users already exists with the same email and it should not continue the process
                    echo '
                        <script>
                            danger_alert("Error !!", "The user already exists with the email !!");
                        </script>
                    ';

                    return;

                }
            }

            // now that means the user is an unique user and it should register into the software and continue the process

            // first of all make the hash of the password
            $hash = password_hash($password, PASSWORD_DEFAULT);


            // now insert the data into the software
            $insert_admin = $this->insert("admin_users", " `username`, `admin_email`, `password` ", " '$username', '$email', '$hash' ");

            
            if($insert_admin){
                // that means the admin user has been registred successfully
                echo '
                    <script>
                        success_alert("Success !!", "The admin has been registered successfully !!");
                    </script>
                ';
                return;
            }else{
                // that means there was something issues while registering the admin user
                echo '
                    <script>
                        danger_alert("Error !!", "There was something issues while registering the user into the software !! Plesae contact the developer to resolve the issue !!");
                    </script>
                ';
                return;
            }


        }
    }



    // login the admin into the software
    public function admin_login(){
        if(isset($_POST['admin_login'])){
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);

            // check if the data is blank or not
            if($email == '' || $password == ''){
                echo '
                    <script>
                        danger_alert("Error !!", "Please fillup all the data !!");
                    </script>
                ';
                return;
            }

            // check if the user alredy exist or not
            $check_user = $this->get_data_where("admin_users", " `admin_email` = '$email' ");

            if($check_user){
                if($check_user->num_rows > 0){
                    // that means the user already exists into the software and it should continue the process
                    while($row = $check_user->fetch_assoc()){
                        $get_db_pass = $row['password'];

                        // now verify the password
                        if(password_verify($password, $get_db_pass)){
                            // that means the password is verified and the user is loggedin
                            $_SESSION['loggedin_status'] = true;
                            $_SESSION['admin_username'] = $row['username'];
                            $_SESSION['admin_email'] = $row['admin_email'];

                            // now redirect the user into the dashboard
                            echo '
                                <script>
                                    window.location.href="/dashboard";
                                </script>
                            ';



                        }else{
                            echo '
                                <script>
                                    danger_alert("Error !!", "Password doesnot matched !!");
                                </script>
                            ';
                        }
                    }
                }else{
                    // that means the user doesnot exists into the software
                    echo '
                        <script>
                            danger_alert("Error !!", "The user doesnot exists into the software !!");
                        </script>
                    ';
                }
            }


        }
    }



    // check the login status
    public function check_login(){
        if(!isset($_SESSION['admin_username'])){
            echo '
                <script>
                    window.location.href = "/";
                </script>
            ';
        }
    }


    





}
