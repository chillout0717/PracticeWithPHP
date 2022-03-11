<?php

use LDAP\Result;

      require_once __DIR__ . '/dbconn.php';

      $fullName = $_POST["fullName"];
      $phone = $_POST["phone"];
      $zip = $_POST["zip"];
      $id = $_POST["id"];
      $pw = $_POST["pw"];
      $fullName = $_POST["fullName"];
      $user_email = $_POST["user_email"];
      $password = $_POST["password"];

      if($id==1){

        $sql = "SELECT user_email FROM usercontrol WHERE user_fullname=? AND user_phone=? AND user_zip=?";

        $result = $pdo -> prepare($sql);
  
        $result -> execute([$fullName, $phone, $zip]);
  
        $user_email = $result->fetchColumn();

        $pdo = null;
  
        if($user_email != null){
          echo $user_email;
        }else{
          echo "bad";
        }

      }else if($pw ==2){
  
          $sql = "SELECT user_pw FROM usercontrol WHERE user_fullname=? AND user_email=?";
  
          $result = $pdo -> prepare($sql);
    
          $result -> execute([$fullName, $user_email]);
    
          $user_email = $result->fetchColumn();

          if($user_email != null){

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql1 = "UPDATE usercontrol SET user_pw=? WHERE user_email=?";

            $result1 = $pdo -> prepare($sql1);
    
            $result1 -> execute([$hashedPassword, $user_email]);

            $pdo = null;

            echo "good";
          }else{
            echo "bad";
          }
      }


?>