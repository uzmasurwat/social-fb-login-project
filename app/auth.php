<?php

//auth check

function authCheck($table, $col, $data){
    $login_data = connect()->query("SELECT * FROM {$table} WHERE {$col}='$data'");

   if($login_data->num_rows == 1){
       return $login_data->fetch_object();
   }else{
    return false;
   }
}
/**
 * password check
 * 
 */

 function passChk($user_pass, $db_pass){

    $data = password_verify($user_pass, $db_pass);

        if($data == true){
            return true;
        }else{
            return false;
        }

}
/**
 * user login check
 */


 function userLogin(){

    if( isset($_SESSION['id']) ){
        return true;
    }else{
        return false;
    }
 }
 /**
  * login user data
  */

  function userLoginData($table, $id)
  {
      $data = connect()->query("SELECT * FROM {$table} WHERE id='$id' ");
      return $data->fetch_object();
  }


?>