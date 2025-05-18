<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';







?>

<style>

    table {
        border: none !important;
    }
</style>
<body>
    <main>
        <div class="main_page">
            <div class="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="page " style="height: 100vh;">
                            <?php
                            require_once __DIR__ . '/inc/_sidebar.php';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <div class="status">
                                <?php
                                    $controllers->add_new_customer();
                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Manage <span class="text-primary">customers</span>
                                </div>
                            </div>
                        </div>

                        <div class="manage_custmers_main">
                            <div class="container">
                                <div class="manage_customers page m-4 p-4 rounded-4">
                                    <table class="table" id="datatable_info_table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Employee name</th>
                                                                <th scope="col">Age</th>
                                                                <th scope="col">Mobile No</th>
                                                                <th scope="col">Action</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $result_get_cus_data = $controllers->get_data("customers");

                                                            if ($result_get_cus_data) {
                                                                if ($result_get_cus_data->num_rows > 0) {
                                                                    // that means the table is not blank
                                                            
                                                                    $sl_no = 1;

                                                                    while ($row_cus_data = $result_get_cus_data->fetch_assoc()) {
                                                                        echo '
                                                                                <tr class="hover_table" >
                                                                                    <th scope="row">'. $sl_no .'</th>
                                                                                    <td>'. $row_cus_data['cus_name'] .'</td>
                                                                                    <td>'. $row_cus_data['cus_email'] .'</td>
                                                                                    <td>'. $row_cus_data['cus_phone'] .'</td>
                                                                                    <td> 
                                                                                    
                                                                                    <a href="'. $row_cus_data['cus_id'] .'"> <button class="btn btn-success" >Edit</button></a>
                                                                                    <a href="'. $row_cus_data['cus_id'] .'"> <button class="btn btn-danger" >Delete</button></a>
                                                                                    
                                                                                    </td>
                                                                                    
                                                                                    
                                                                                    
                                                                                </tr>
                                                                            ';
                                                                            $sl_no++;
                                                                    }

                                                                }
                                                            }



                                                            ?>
                                                        </tbody>
                                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php
    require_once __DIR__ . '/inc/_footer_script.php';

    ?>