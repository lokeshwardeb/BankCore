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

    public function insert_form()
    {

        if (isset($_POST['submit_form'])) {

            // getting the info data

            $name = $this->pure_data($_POST['name']);
            $department = $this->pure_data($_POST['department']);
            $id = $this->pure_data($_POST['id']);
            $batch = $this->pure_data($_POST['batch']);
            $email = $this->pure_data($_POST['email']);
            $phone = $this->pure_data($_POST['phone']);
            
            // learning_about data
            $learning_about = $this->pure_data($_POST['learning_about']);

            // programming languages data
            $programming_languages = $this->pure_data($_POST['programming_languages']);

            // initializing the member type

            $member_type = "member";


            // echo 
            $address = $this->pure_data($_POST['address']);

            // checking if the gendar is selected or not

            if (!isset($_POST['gender'])) {
                echo $this->alert("danger", "The gender is not selected ! Please specify you gender ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The gender is not selected !", " Please specify you gender ! It is required !");
                
                </script>

                
                ';


            }else{
                // that means the gender section is selected

                $gender = $_POST['gender'];

                 $get_gender = implode(",", $gender);
                // echo $get_gender;
                
            }

            // checking if the interest is selected or not

            if(!isset($_POST['interest'])){
                // that means the interes section is not selected

                echo $this->alert("danger", "The interested section is not selected ! Please select your interests ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The interested section is not selected ! ", "Please select your interests ! It is required !");
                
                </script>

                
                ';

            }else{
                // that means the interest section is selected

                $interest = $_POST['interest'];
                
            $all_interests = implode(',', $interest);

            // echo $all_interests;

            }

            // checking if the weapon section is selected

            if(!isset($_POST['weapons'])){
                // that means the weapons section is not selected

                echo $this->alert("danger", "The weapons section is not selected ! Please select your weapons ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The weapons section is not selected ! ", "Please select your weapons ! It is required !");
                
                </script>

                
                ';

                

            }else{

                // that means the weapon section is selected

                $weapons = $_POST['weapons'];

                $all_weapons = implode(",", $weapons);

                // echo $all_weapons;



            }

            // checking if all the checkbox are selected

            if(isset($_POST['gender']) && isset($_POST['interest']) && isset($_POST['weapons'])){
                // that means all the checkbox are selected and no checkbox are blank
                
                // check form the db if the member already exists on the db

                $result = $this->get_data_where("club_members", "`name` = '$name' AND `department` = '$department' AND `id` = '$id' AND `batch` = '$batch'");

                if($result){
                    if($result->num_rows > 0){
                        // that means the member is already exists on the db

                        // then show the error
                        echo $this->alert("danger", "The member is already exists on the club !");

                        echo '
                    
                        <script>
                        
                        danger_alert("The member is already exists on the club !");
                        
                        </script>
        
                        
                        ';

                    }else{
                        // that means the member is not exists on the db

                        // then register and add the member and continue the execution

                        $result = $this->insert("club_members", "`member_type`, `name`, `department`, `id`, `batch`, `email`, `phone`, `gender`, `address`, `field_of_interest`, `interested_learning_about`, `weapons`, `programming_languages`", "'$member_type','$name','$department','$id','$batch','$email','$phone','$get_gender','$address','$all_interests','$learning_about','$all_weapons','$programming_languages'");

                        if($result){
                            echo $this->alert("success", "Welcome to the world of programming ! Welcome you to the UoB computers club !");

                            echo '
                            <script>
                            success_alert("Welcome to the world of programming !",  "Welcome you to the UoB computers club !");
                            </script>
                            ';

                        }else{
                            echo $this->alert("danger", "Something went wrong ! Cannot registered succesfully ! We are handling with the issue ! Please try again later");

                            echo '
                            
                            <script>
                            danger_alert("Something went wrong ! Cannot registered succesfully ! ", "We are handling with the issue ! Please try again later")
                            </script>
                            
                            ';

                        }
                        

                    }
                }
                
                

            

            }else{
                echo $this->alert("danger", "You have not registed on the computers club successfully ! Please select and fillup all the informations correctly to register !");
                
                echo '
                
                <script>
                
                danger_alert("You have not registed on the computers club successfully ! ", "Please select and fillup all the informations correctly to register !")

                </script>

                ';
            }
            

        }
    }
}
