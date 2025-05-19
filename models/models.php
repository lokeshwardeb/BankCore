<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/controllers.php';

// $conn = new database;

class models extends database{

     public function insert($table_name, $table_rows, $table_rows_values){

        $sql = "INSERT INTO `$table_name`($table_rows) VALUES ($table_rows_values)";

        $result = $this->connect()->query($sql);

        return $result;

        
     }
     public function update($table_name, $table_rows_values){

        $sql = "UPDATE `$table_name` SET $table_rows_values WHERE 1";

        $result = $this->connect()->query($sql);

        return $result;

     }
     public function update_where($table_name, $table_rows_values, $where_conditions_and_values){

        $sql = "UPDATE `$table_name` SET $table_rows_values WHERE $where_conditions_and_values";

        $result = $this->connect()->query($sql);

        return $result;


     }
     public function get_data($table_name){

        $sql = "SELECT * FROM `$table_name` WHERE 1";

        $result = $this->connect()->query($sql);

        return $result;



     }
     public function get_data_where($table_name, $where_conditions_and_values, $order_by_add_status = '', $order_table_cond_and_asc_or_desc_value = ''){

        $sql = "SELECT * FROM `$table_name` WHERE $where_conditions_and_values  $order_by_add_status $order_table_cond_and_asc_or_desc_value";

        $result = $this->connect()->query($sql);

        return $result;



     }

     public function delete($table_name, $where_conditions_and_values){
      $sql = "DELETE FROM `$table_name` WHERE $where_conditions_and_values";

      $result = $this->connect()->query($sql);

      return $result;


     }

     public function pure_data($data){

        $result = htmlspecialchars(mysqlI_real_escape_string($this->connect(), $data), ENT_QUOTES);

        return $result;



     }


   public function join_data($first_table, $second_table, $table_join_conditions){
      $sql = "SELECT * FROM $first_table INNER JOIN $second_table ON $table_join_conditions";

      $result = $this->connect()->query($sql);

      return $result;

   }

   public function show_last_no(){
      $sql = "SELECT * FROM `club_members` ORDER BY `club_members`.`member_id` DESC";
      $result = $this->connect()->query($sql);


      return $result;

   }

   public function get_the_last_id(){
   // $sql = "SELECT LAST_INSERT_ID() as last_id";
   $sql = "SELECT MAX(`member_id`) AS max_user_id FROM `club_members`";

      // $sql = "SELECT * FROM `club_members` ORDER BY `club_members`.`member_id` DESC";
      $result = $this->connect()->query($sql);


      return $result;
   }




}




?>