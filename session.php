<?php
  session_start();
  if( isset( $_SESSION[ 'user_fullname' ] ) ) {
    $jb_login = TRUE;
  }
?>