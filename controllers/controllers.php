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
                            $_SESSION['admin_user_id'] = $row['user_id'];
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

    // check if the email is exists into the software
    public function is_email_exists($table_name, $table_row_name, $table_value_name){
        $check_data = $this->get_data_where("$table_name", "`$table_row_name` = '$table_value_name'");

        if($check_data->num_rows > 0){
            return true;
        }else{
            return false;
        }

    }

    public function add_new_customer(){
        if(isset($_POST['add_new_customer'])){
            $cus_name = $this->pure_data($_POST['cus_name']);
            $cus_email = $this->pure_data($_POST['cus_email']);
            $cus_phone = $this->pure_data($_POST['cus_phone']);
            
            if($cus_name == '' || $cus_email == '' || $cus_phone == ''){
                echo '
                    <script>
                        danger_alert("Error !!", "Please fillup all the information !!");
                    </script>
                ';
                return;
            }

            // check if the email already exists or not
            $check_email = $this->is_email_exists("customers", "cus_email", "$cus_email");

            if($check_email){
                // that means the user is already exists and it should through an error
                echo '
                    <script>
                        danger_alert("Error !!", "The submitted email already exists !!");
                    </script>
                ';

                return;
            }

            // now continue the process
            $add_cus = $this->insert("customers", " `cus_name`, `cus_email`, `cus_phone` ", " '$cus_name', '$cus_email', '$cus_phone' ");

            if($add_cus){
                // that means the customer has been inserted successfully
                echo '
                    <script>
                        success_alert("Success !!", "The customer has beed added successfully !!");
                    </script>
                ';

            }else{
                // that means there was sonmething error
                echo '
                    <script>
                        danger_alert("Error !!", "There was something error while adding the customer into the software !!");
                    </script>
                ';
            }


        }
    }
//     public function generate_unique_account_number() {
//     do {
//         $account_number = uniqid("AC_", true);
//         $check = $this->get_data_where("accounts", " `account_number` = '$account_number' ");
//     } while ($check && $check->num_rows > 0);

//     return $account_number;
// }


public function generate_unique_account_number() {
    do {
        // Fixed bank prefix (e.g., '1022'), branch (e.g., '0100')
        $prefix = "10220100"; // 8 digits

        // Generate a 6-digit unique part (could be random or user-based)
        $unique_part = str_pad((string)random_int(0, 999999), 6, "0", STR_PAD_LEFT);

        // Optional checksum (e.g., last 2 digits random or hash-based)
        $checksum = str_pad((string)random_int(0, 99), 2, "0", STR_PAD_LEFT);

        // Final account number: 8 (prefix) + 6 (unique) + 2 (checksum) = 16 digits
        $account_number = $prefix . $unique_part . $checksum;

        // Check uniqueness in DB
        $check = $this->get_data_where("accounts", "`account_number` = '$account_number'");
    } while ($check && $check->num_rows > 0);

    return $account_number;
}



public function create_new_account() {
    if (isset($_POST['create_new_account'])) {
        $cus_id = $this->pure_data($_POST['cus_id']);
        $ac_type = $this->pure_data($_POST['ac_type']);

        // the starting balance will be 0
        $balance = 0;
        $status = "active";

        if ($cus_id == '' || $ac_type == '') {
            echo '<script> danger_alert("Error !!", "Please fill up all the information !!"); </script>';
            return;
        }

        // Check if account of that type already exists for the customer
        $check_ac = $this->get_data_where("accounts", " `cus_id` = '$cus_id' AND `account_type` = '$ac_type' ");
        if ($check_ac && $check_ac->num_rows > 0) {
            echo '<script> danger_alert("Error !!", "Account of this type already exists for this customer."); </script>';
            return;
        }

        // Generate unique account number
        $account_number = $this->generate_unique_account_number();

        // Insert into accounts table
        $result = $this->insert("accounts", 
            "`account_number`, `cus_id`, `balance`, `account_type`, `status`", 
            "'$account_number', '$cus_id', '$balance', '$ac_type', '$status'"
        );

        if ($result) {
            echo '<script> success_alert("Success !!", "New account has been created successfully."); </script>';
        } else {
            echo '<script> danger_alert("Error !!", "Error creating account."); </script>';
        }
    }
}

public function close_account($account_number) {
    $account_number = $this->pure_data($account_number);

    // Check if the account exists
    $check = $this->get_data_where("accounts", " `account_number` = '$account_number' ");
    if (!$check || $check->num_rows === 0) {
        echo '<script> danger_alert("Error !!", "Account not found."); </script>';
        return;
    }

    // Soft delete by setting is_closed to 1
    // $update = $this->update("accounts", "`is_closed` = 1", "`account_number` = '$account_number'");
    $update = $this->update_where("accounts", "`status` = 'closed'", "`account_number` = '$account_number'");

    if ($update) {
        echo '<script> success_alert("Success !!", "Account closed successfully."); </script>';
    } else {
        echo '<script> danger_alert("Error !!", "Failed to close the account."); </script>';
    }
}

public function close_ac(){
    if(isset($_POST['close_ac'])){
        $ac_number = $this->pure_data($_POST['ac_number']);

        $this->close_account($ac_number);

    }
}



    // public function genereate_ac_uid(){
    //       $generate_uid = uniqid("AC_", true);

    //              // check if the email already exists or not
    //         $check_uid = $this->get_data_where("accounts", " `account_number` = '$generate_uid' AND");
    // }
    // public function create_new_account(){
    //     if(isset($_POST['add_new_customer'])){
    //         $cus_id = $this->pure_data($_POST['cus_id']);
    //         $ac_type = $this->pure_data($_POST['ac_type']);
    //         // $cus_phone = $this->pure_data($_POST['cus_phone']);
            
    //         if($cus_id == '' || $ac_type == ''){
    //             echo '
    //                 <script>
    //                     danger_alert("Error !!", "Please fillup all the information !!");
    //                 </script>
    //             ';
    //             return;
    //         }

    //         // check if the email already exists or not
    //         $check_ac = $this->get_data_where("accounts", " `cus_id` = '$cus_id' AND `account_type` = '$ac_type' ");

    //         if($check_ac){
    //             if($check_ac->num_rows > 0){
    //                 // that means the user is already exists and it should through an error
    //            $this->genereate_ac_uid();

    //             return;
    //             }
    //         }

    //         $generate_uid = uniqid("AC_", true);

    //              // check if the email already exists or not
    //         $check_uid = $this->get_data_where("accounts", " `account_number` = '$generate_uid' AND");

    //         if($check_uid){
    //             if($check_ac->num_rows > 0){
    //                 // that means the user is already exists and it should through an error
    //             echo '
    //                 <script>
    //                     danger_alert("Error !!", "The submitted email already exists !!");
    //                 </script>
    //             ';

    //             return;
    //             }
    //         }



    //         // now continue the process
    //         $add_cus = $this->insert("customers", " `cus_name`, `cus_email`, `cus_phone` ", " '$cus_name', '$cus_email', '$cus_phone' ");

    //         if($add_cus){
    //             // that means the customer has been inserted successfully
    //             echo '
    //                 <script>
    //                     success_alert("Success !!", "The customer has beed added successfully !!");
    //                 </script>
    //             ';

    //         }else{
    //             // that means there was sonmething error
    //             echo '
    //                 <script>
    //                     danger_alert("Error !!", "There was something error while adding the customer into the software !!");
    //                 </script>
    //             ';
    //         }


    //     }
    // }


    public function edit_customer(){
        if(isset($_POST['update_customer'])){
            $get_cus_id = $_GET['get_cus_id'];
            $cus_name = $this->pure_data($_POST['cus_name']);
            $cus_email = $this->pure_data($_POST['cus_email']);
            $cus_phone = $this->pure_data($_POST['cus_phone']);
            
            if($cus_name == '' || $cus_email == '' || $cus_phone == ''){
                echo '
                    <script>
                        danger_alert("Error !!", "Please fillup all the information !!");
                    </script>
                ';
                return;
            }

            // check if the email already exists or not
            $check_email = $this->is_email_exists("customers", "cus_email", "$cus_email");

            if(!$check_email){
                // that means the user is already exists and it should through an error
                echo '
                    <script>
                        danger_alert("Error !!", "The submitted email is not exists !!");
                    </script>
                ';

                return;
            }

            // now continue the process
            // $add_cus = $this->insert("customers", " `cus_name`, `cus_email`, `cus_phone` ", " '$cus_name', '$cus_email', '$cus_phone' ");

            $update_cus = $this->update_where("customers", " `cus_name` = '$cus_name', `cus_email` = '$cus_email', `cus_phone` = '$cus_phone' ", " `cus_id` = '$get_cus_id' ");

            if($update_cus){
                // that means the customer has been inserted successfully
                echo '
                    <script>
                        success_alert("Success !!", "The customer has beed updated successfully !!");
                    </script>
                ';

            }else{
                // that means there was sonmething error
                echo '
                    <script>
                        danger_alert("Error !!", "There was something error while adding the customer into the software !!");
                    </script>
                ';
            }


        }
    }


    public function delete_customer(){
        if(isset($_POST['delete_customer'])){
            $get_cus_id = $this->pure_data($_POST['delete_get_cus_id']);

            // delete the customer information
            $cus_delete = $this->delete("customers", " `cus_id` = '$get_cus_id' ");

            if($cus_delete){
                echo '
                    <script>
                        success_alert("Success !!", "The customer information has been deleted successfully !!");
                    </script>
                ';

                return;
            }else{
                echo '
                    <script>
                        danger_alert("Error !!", "There has been something issues while deleting the customer information !!");
                    </script>
                ';
            }

        }
    }

    public function enter_deposit_interface(){
        if(isset($_POST['enter_deposit_interface'])){
            $ac_number = $this->pure_data($_POST['ac_number']);

            if($ac_number == ''){
                echo '
                    <script>
                        danger_alert("Error !!", "Please enter the account number !!");
                    </script>
                ';
                return;
            }

            $get_current_admin_user_id = $_SESSION['admin_user_id'];

            // now continue the process
            // now enter into the deposit interface and create a session
            $generate_uid = uniqid("depo_session_", true);
            // $make_depo_session = 'ad_user_' . $get_current_admin_user_id . '_' . $generate_uid;
            $make_depo_session = 'depo_session_ac_number_'. $ac_number . '_ad_user_' . $get_current_admin_user_id;

            $depo_session_name = 'deposit_session_ad_user_' . $get_current_admin_user_id;
            $_SESSION[$depo_session_name] = $make_depo_session;
            
            $depo_ad_user_session = 'deposit_session_ad_user_' . $get_current_admin_user_id;

            // $_SESSION[$depo_ad_user_session] = 

            echo '
                <script>
                    window.location.href="/deposit_interface?get_ac_number='. $ac_number .'&ad_user='. $get_current_admin_user_id .'";
                </script>
            ';

        }
    }

    

    public function deposit($account_number, $cus_id, $amount, $description = '') {
    // $account_number = $this->pure_data($account_number);
    $amount = floatval($amount);

    if ($amount <= 0) return false;

    // Update balance
    $this->make_query("UPDATE accounts SET balance = balance + $amount WHERE `account_number` = '$account_number' AND `status` = 'active'");

    // Insert transaction
    $ref = uniqid("TXN_", true);
    $inset_depo = $this->insert("transactions", 
        "`reference_id`, `account_number`, `customer_id`,  `transaction_type`, `amount`, `remarks`, `status`, `transaction_date`",
        "'$ref', '$account_number', '$cus_id', 'deposit', '$amount', '$description', 'success', 'NOW()'"
    );

    if($inset_depo){
        return true;
    }else{
        return false;
    }



    // $this->insert("transactions", 
    //     "`reference_id`, `account_number`, `type`, `amount`, `description`, `status`, `created_at`",
    //     "'$ref', '$account_number', 'deposit', '$amount', '$description', 'success', NOW()'"
    // );
}

public function make_deposit(){
    if(isset($_POST['make_deposit'])){
        $ac_number = $this->pure_data($_POST['ac_number']);
        $cus_id = $this->pure_data($_POST['cus_id']);
        $depo_amount = $this->pure_data($_POST['depo_amount']);

        $depo = $this->deposit($ac_number, $cus_id, $depo_amount);

        if($depo){
            echo '
                <script>
                    success_alert("Success !!", "The money has been deposited successfully !!");
                </script>
            ';
        }else{
            echo '
                <script>
                    danger_alert("Error !!", "There has been something error while depositing the money into the account !!");
                </script>
            ';
        }

    }
}



// the withdraw process

public function enter_withdraw_interface() {
    if (isset($_POST['enter_withdraw_interface'])) {
        $ac_number = $this->pure_data($_POST['ac_number']);

        if ($ac_number == '') {
            echo '
                <script>
                    danger_alert("Error !!", "Please enter the account number !!");
                </script>
            ';
            return;
        }

        $get_current_admin_user_id = $_SESSION['admin_user_id'];

        // Generate unique session name
        $generate_uid = uniqid("withdraw_session_", true);
        $make_withdraw_session = 'withdraw_session_ac_number_' . $ac_number . '_ad_user_' . $get_current_admin_user_id;

        $withdraw_session_name = 'withdraw_session_ad_user_' . $get_current_admin_user_id;
        $_SESSION[$withdraw_session_name] = $make_withdraw_session;

        // Redirect to withdraw interface with parameters
        echo '
            <script>
                window.location.href="/withdraw_interface?get_ac_number=' . $ac_number . '&ad_user=' . $get_current_admin_user_id . '";
            </script>
        ';
    }
}



public function withdraw($account_number, $cus_id, $amount, $description = '') {
    $amount = floatval($amount);

    if ($amount <= 0) return false;

    // Check if account has sufficient balance
    $check_balance_query = $this->get_data_where("accounts", "`account_number` = '$account_number' AND `status` = 'active'");
    
    if (!$check_balance_query || $check_balance_query->num_rows == 0) return false;

    $account = $check_balance_query->fetch_assoc();

    if ($account['balance'] < $amount) {
        echo '
            <script>
                danger_alert("Error !!", "Insufficient balance to perform withdrawal.");
            </script>
        ';
        return false;
    }

    // Deduct balance
    $this->make_query("UPDATE accounts SET balance = balance - $amount WHERE `account_number` = '$account_number'");

    // Insert transaction
    $ref = uniqid("TXN_", true);
    $insert_withdraw = $this->insert("transactions", 
        "`reference_id`, `account_number`, `customer_id`, `transaction_type`, `amount`, `remarks`, `status`, `transaction_date`",
        "'$ref', '$account_number', '$cus_id', 'withdraw', '$amount', '$description', 'success', 'NOW()'"
    );

    // return $insert_withdraw ? true : false;

    if($insert_withdraw){
        return true;
    }else{
        return false;
    }

}


public function make_withdraw() {
    if (isset($_POST['make_withdraw'])) {
        $ac_number = $this->pure_data($_POST['ac_number']);
        $cus_id = $this->pure_data($_POST['cus_id']);
        $withdraw_amount = $this->pure_data($_POST['withdraw_amount']);

        $withdraw = $this->withdraw($ac_number, $cus_id, $withdraw_amount);

        if ($withdraw) {
            echo '
                <script>
                    success_alert("Success !!", "The money has been withdrawn successfully !!");
                </script>
            ';
        } else {
            echo '
                <script>
                    danger_alert("Error !!", "There has been an error while withdrawing the money from the account !!");
                </script>
            ';
        }
    }
}


// the transfer process

public function enter_transfer_interface() {
    if (isset($_POST['enter_transfer_interface'])) {
        $ac_number = $this->pure_data($_POST['ac_number']);

        if ($ac_number == '') {
            echo '
                <script>
                    danger_alert("Error !!", "Please enter the account number !!");
                </script>
            ';
            return;
        }

        $get_current_admin_user_id = $_SESSION['admin_user_id'];

        $make_transfer_session = 'transfer_session_ac_number_' . $ac_number . '_ad_user_' . $get_current_admin_user_id;

        $transfer_session_name = 'transfer_session_ad_user_' . $get_current_admin_user_id;
        $_SESSION[$transfer_session_name] = $make_transfer_session;

        echo '
            <script>
                window.location.href="/transfer_interface?get_ac_number=' . $ac_number . '&ad_user=' . $get_current_admin_user_id . '";
            </script>
        ';
    }
}

// public function get_to_cus_id(){

// }


public function transfer($from_ac, $to_ac, $from_cus_id, $to_cus_id, $amount, $description = '') {
    $amount = floatval($amount);

    if ($amount <= 0) return false;

    // Check if source and destination accounts are valid and active
    $from_check = $this->get_data_where("accounts", "`account_number` = '$from_ac' AND `status` = 'active'");
    $to_check = $this->get_data_where("accounts", "`account_number` = '$to_ac' AND `status` = 'active'");

    if (!$from_check || !$to_check || $from_check->num_rows == 0 || $to_check->num_rows == 0) {
        return false;
    }

    // Check if source account has enough balance
    $from_data = $from_check->fetch_assoc();
    if ($from_data['balance'] < $amount) {
        return false;
    }

    // Deduct from sender
    $this->make_query("UPDATE accounts SET balance = balance - $amount WHERE `account_number` = '$from_ac'");

    // Add to receiver
    $this->make_query("UPDATE accounts SET balance = balance + $amount WHERE `account_number` = '$to_ac'");

    // Insert transaction log
    $ref = uniqid("TXN_", true);

    $this->insert("transactions", 
        "`reference_id`, `account_number`, `customer_id`, `transaction_type`, `amount`, `remarks`, `status`, `transaction_date`",
        "'$ref', '$from_ac', '$from_cus_id', 'transfer_to_$to_ac', '$amount', '$description', 'success', 'NOW()'"
    );

    // Optional: Insert a reverse log for recipient
    $this->insert("transactions", 
        "`reference_id`, `account_number`, `customer_id`, `transaction_type`, `amount`, `remarks`, `status`, `transaction_date`",
        "'$ref', '$to_ac', '$to_cus_id', 'transfer_from_$from_ac', '$amount', '$description', 'success', 'NOW()'"
    );

    return true;
}


public function make_transfer() {
    if (isset($_POST['make_transfer'])) {
        $from_ac = $this->pure_data($_POST['from_ac']);
        $to_ac = $this->pure_data($_POST['to_ac']);
        $from_cus_id = $this->pure_data($_POST['cus_id']);
        $amount = $this->pure_data($_POST['amount']);
        // $description = $this->pure_data($_POST['description']);

        // check if all the information are submitted
        if($to_ac == ''){
            echo '
                <script>
                    danger_alert("Error !!", "Please enter the reciver account number !!");
                </script>
            ';
            return;
        }

        if($amount == ''){
            echo '
                <script>
                    danger_alert("Error !!", "Please enter the amount you want to transfer !!");
                </script>
            ';
            return;
        }

        // find the to cus_id

        $get_to_cus_id = $this->get_data_where("accounts", " `account_number` = '$to_ac' ");

        if($get_to_cus_id){
            if($get_to_cus_id->num_rows > 0){
                while($row_to_cus_id = $get_to_cus_id->fetch_assoc()){
                    $to_cus_id = $row_to_cus_id['cus_id'];
                }
            }else{
                $to_cus_id = '';
            }
        }



        $transfer = $this->transfer($from_ac, $to_ac, $from_cus_id, $to_cus_id, $amount);

        if ($transfer) {
            echo '
                <script>
                    success_alert("Success !!", "The money has been transferred successfully.");
                </script>
            ';
        } else {
            echo '
                <script>
                    danger_alert("Error !!", "Transfer failed. Please check account numbers, balance, or status.");
                </script>
            ';
        }
    }
}



    





}
