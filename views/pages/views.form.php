<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new controllers;





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UoB Computer Club</title>

    <!-- favicon icon logo -->
    <link rel="shortcut icon" href="/assets/img/club_logo.jpg" type="image/x-icon">

    <!-- bootstrap css files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/alert.js"></script>


</head>

<body class="">

    <!-- main code starts here -->

    <main class="">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">

            <div class="container mt-4 ">
                <?php

                $controllers->insert_form();

                ?>
            </div>

                <div class="container page mt-4 pt-2 pb-2 form_section mb-4">
                    <div
                        class="container m-auto border-primary border-bottom border-5 pb-4 text-center form_header_info_section">
                        <div class="row mt-5  ">
                            <div class="col-md-2 col-sm-12 mb-4">
                                <img src="/assets/img/club_logo.jpg" alt="Logo" class="img-fluid">
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="club_heading fs-2 fw-bold inter_font">
                                    UoB Computer <span class="text-primary">Club</span>
                                </div>
                                <div class="university_info roboto_font fs-4">
                                    University of Brahmanbaria
                                </div>
                                <div class="university_address_info roboto_font">
                                    1020/15 Bypass Road, Datiara, Brahmanbaria
                                    <br>
                                    <!-- <p class="link">
                                        uob.computerclub@gmai.com
                                    </p> -->
    
                                    <a href="mailto:uob.computerclub@gmail.com" class="nav-link text-dark">
                                        uob.computerclub@gmail.com
    
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form_main_content mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="membership_info fs-2 container inter_font fw-bold">
                                    MEMBERSHIP <span class="text-primary">FORM</span>
                                    <p class="fw-normal fs-4">This is the space where you can learn, share your ideas and
                                        teach others</p>
                                </div>
                            </div>
                            <div class="col-4 inter_font fs-5">Date: <?php echo date("d/m/Y"); ?>
    
                                <br>
    
                                Serial No: <?php
                            
                            // $result =  $controllers->get_data_where("club_members", "ORDER BY club_members`.`member_id","DESC");



                            // Get the ID of the last inserted row
// $query_last_id = "SELECT LAST_INSERT_ID() as last_id";
// $result_last_id = mysqli_query($connection, $query_last_id);
// $row = mysqli_fetch_assoc($result_last_id);
// $last_inserted_id = $row['last_id'];

// echo "Last inserted ID into your_table_name is: " . $last_inserted_id;


                            // $result = $controllers->show_last_no();
                            
                            $result = $controllers->get_the_last_id();

                            if($result->num_rows > 0){
                                if($row = $result->fetch_assoc()){
                                    echo $row['max_user_id'] + 1;
                                }
                            }



                                ?>
    
                            </div>
                        </div>
    
                        <div class="info_section container playfair_font mt-4 pt-4">
                            <span class="info_section_title mt-4 border-primary border-3 fw-bold border-bottom fs-2">
                                INFO <span class="text-danger">*</span>
                            </span>
    
                            <div class="info_section_content mt-4 fs-5 fw-bold">
                                <div class="input-group mb-3">
                                    <span class=" fw-bold fs-5 pe-4 " id="basic-addon1">Name : </span>
                                    <input type="text" class="form-control fs-5 fw-normal" name="name" required>
                                </div>
    
    
                                <div class="input-group mb-3">
                                    <span class=" fw-bold fs-5 pe-4 ">Department : </span>
    
                                    <input type="text" class="form-control fs-5" aria-label="department" name="department" required>
                                    <span class="fw-bold fs-5 pe-4 ps-4">ID : </span>
                                    <input type="number" class="form-control fs-5" aria-label="id" name="id" required>
                                </div>
    
                                <div class="input-group mb-3">
                                    <span class=" fw-bold fs-5 pe-4 ">Batch : </span>
    
                                    <input type="number" class="form-control fs-5" aria-label="batch" name="batch" required>
                                    <span class="fw-bold fs-5 pe-4 ps-4">Email : </span>
                                    <input type="email" class="form-control fs-5" aria-label="email" name="email" required>
                                </div>
    
    
                                <div class="input-group mb-3">
                                    <span class=" fw-bold fs-5 pe-4 ">Phone : </span>
    
                                    <input type="number" class="form-control fs-5" aria-label="phone" name="phone" required>
                                    <span class="fw-bold fs-5 pe-4">Gender : </span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Male" id="gender_male" onchange="select_gender()" name="gender[]">
                                        <label class="form-check-label" for="gender_male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check ms-4">
                                        <input class="form-check-input" type="checkbox" value="Female" id="gender_female" onchange="select_gender()" name="gender[]">
                                        <label class="form-check-label" for="gender_female">
                                            Female
                                        </label>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <span class=" fw-bold fs-5 pe-4 " id="basic-addon1">Address : </span>
                                    <input type="text" class="form-control fs-5 fw-normal" aria-label="address" aria-describedby="basic-addon1" name="address" required>
                                </div>
    
                              
                            </div>
    
                         
    
                        </div>
    
                        <div class="field_section container playfair_font mt-5 pt-4">
                            
                            <span class="field_section_title playfair_font fw-bold fs-2 border-primary border-bottom border-3">
                                FIELD OF INTEREST <span class="text-danger">*</span>
                            </span>
    
                            <div class="info_section_content inter_font mt-4 fs-4 fw-normal">
                                <p>The activities, hobbies and topics that you enjoy and that naturally capture your attention.</p>
    
                                <div class="row container">
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="None" name="interest[]" id="interest_none" onchange="select_interest()">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                None (None of below)
                                            </label>
                                          </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" value="CTF(Capture the flag)" name="interest[]">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                CTF(Capture the flag)
                                            </label>
                                          </div>
    
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Competitive Programming" >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Competitive Programming
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="App development">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                App development
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Machine Learning" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Machine Learning
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Cybersecurity" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cybersecurity
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Networking" >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Networking
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Digital Marketing">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Digital Marketing
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Artificial Intelligence" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Artificial Intelligence
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Safety Critical Systems" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Safety Critical Systems
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Databases" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Databases
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Robotics and Mechatronics" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Robotics and Mechatronics
                                            </label>
                                          </div>
    
    
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Game Development" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Game Development
                                            </label>
                                          </div>
    
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Software Architecture" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Software Architecture
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="UI/UX" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                UI/UX
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="IoT" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                IoT
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Gaming" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Gaming
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Photography" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Photography
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Videography" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Videography
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Cinematography" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cinematography
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest_graphics_and_computer_vision" value="Graphics and Computer Vision" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Graphics and Computer Vision
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Debate" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Debate
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input field_of_interest_select" type="checkbox" name="interest[]" value="Anchoring" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Anchoring
                                            </label>
                                          </div>
                                          
    
                                    </div>
                                </div>
    
                                <div class="interested_section mt-4">
                                    I am also interested in learning about <span class="text-danger">*</span> <input type="text" class="interested_input" name="learning_about" required>
                                </div>
    
                            </div>
    
                           
                        </div>
    
                        <div class="weapon_section container playfair_font mt-5 pt-4">
                            <span class="field_section_title playfair_font fw-bold fs-2 border-primary border-bottom border-3">
                                WEAPONS <span class="text-danger">*</span>
                            </span>
    
                            <div class="weapon_section_content inter_font mt-4 fs-4 fw-normal">
                                <p>If you want to be a virtual fighter, you must have some weapons. What are the weapons do you have -</p>
    
                                <div class="row container">
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input " type="checkbox" name="weapons[]" value="None" id="weapons_none" onchange="select_weapons()">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                None (None of below)
                                            </label>
                                          </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="HTML/CSS" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                HTML/CSS
                                            </label>
                                          </div>
    
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Visual Studio code" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Visual Studio code
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Code blocks" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Code blocks
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Github" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Github
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Git" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Git
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Database" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Database
                                            </label>
                                          </div>
                                          
    
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="XAMPP Server" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                XAMPP Server
                                            </label>
                                          </div>
    
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Server" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Server
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Linux" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Linux
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Googling" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Googling
                                            </label>
                                          </div>
                                          <div class="form-check mb-3">
                                            <input class="form-check-input weapons_select" type="checkbox" name="weapons[]" value="Emailing" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Emailing
                                            </label>
                                          </div>
                                          
    
                                    </div>
                                </div>
    
                                <!-- <div class="interested_section input-group mt-4">
                                    Programming languages <input type="text" class="form-control fs-5 fw-normal ms-2" >
                                </div> -->
                                <div class="interested_section mt-4">
                                    Programming languages <span class="text-danger">*</span> <input type="text" class="interested_input" name="programming_languages" required>
                                </div>
    
                            </div>
    
    
    
                        </div>
    
    
                        <div class="benefits_section container inter_font fs-4 mt-5 pt-4 ">
                           <div class="container">
                            <div class="benefits_section_content container border border-dark border-3">
                                <p><span class="fw-bold">Membership Benefits:</span> Monthly meetings with Member2Member and vendor software/hardware presentations + questions & answer session; monthly newsletter (DATALINE); free software for review; free help from members, Gather IT Knowledge; Participating in Contests.</p>
                            </div>
                           </div>
                        </div>
    
                        <div class="membership_price fs-4 mt-5 text-center pt-5 mb-5 pb-5">
                            <table class="m-auto">
                                <tr>
                                    <th class="table_th_border">Annual Membership</th>
                                    <th></th>
                                
                                </tr>
                                <tr>
                                    <!-- <td>Row 1, Cell 1</td> -->
                                    <td>Quarterly</td>
                                    <td>100.00 Taka</td>
                                    
                                </tr>
                                <tr>
                                    <td>Yearly</td>
                                    <td>360.00 Taka</td>
                                    
                                </tr>
                            </table>
                        </div>
    
    
                        <div class="sign_section mt-5 pt-5 fs-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <input type="text" class="sign_section_input" name="member_sign"><br>
                                        <span class="">Member</span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <input type="text" class="text-center sign_section_input" name="treasures_sign" disabled value="<?php 
                                        
                                        $result = $controllers->get_data_where("club_members", "`member_type` = 'treasurer'");

                                        if($result){
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo $row['name'];
                                                }
                                            }
                                        }



                                        ?>"><br>
                                        <span class="">Treasurer</span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <input type="text" class="text-center sign_section_input" name="secretary_sign" disabled value="<?php 
                                        
                                        $result = $controllers->get_data_where("club_members", "`member_type` = 'secretary'");

                                        if($result){
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo $row['name'];
                                                }
                                            }
                                        }



                                        ?>"><br>
                                        <span class="">Secretary</span>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="submit_form mt-5 pt-5 text-center">
                            <button type="submit" class="btn btn-primary" name="submit_form">Submit</button>
                        </div>
    
    
    
                    </div>
    
                </div>
    
    
            </div>
        </form>
    </main>


    <!-- main code ends here -->


    <footer class="">


        <div class="copyright_section">
            <div class="mt-5 mb-5 pb-5 text-center">
                &copy; Copyright UoB Computer Club || University of Brahmanbaria
            </div>
        <small>
        <div class="dese text-end  m-2 p-2  justify-content-end">
            Developed by<a href="https://lokeshwardebportfolio.epizy.com/" target="_blank" class="ms-2 nav-link text-dark ">
                Lokeshwar Deb ( Protik ) <br>
                Department : Computer Science and Engineering (CSE) <br>
                Batch : 232 <br>
                University of Brahmanbaria

            </a>
            </div>
        </small>
        </div>
        


      <!-- <div class="dev_in_mai_inf">
        <div class="mt-5 mb-4 pb-5 text-center"><span>Developed by :</span> 
            <a href="https://lokeshwardebportfolio.epizy.com/" target="_blank" class="nav-link">
            <div class="dev_info">Lokeshwar Deb Protik</div>
            <div class="dev_info">Computer Science and Engineering ( CSE )</div>
            <div class="dev_info">1st year (1st semester)</div>
            <div class="dev_info">Batch : 232</div>
            <div class="dev_info">University of Brahmanbaria</div>
            </a>
            </div>
      </div> -->


      

    <!-- bootstrap script files -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- custom scripts files -->
    <script src="/assets/js/scripts.js"></script>


    </footer>


</body>

</html>