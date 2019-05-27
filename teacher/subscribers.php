<?php
include('databases/connection.php');
session_start();

if (isset($_POST['subscribe_btn'])) {
  $subscriber_var=$_POST['subscriber'];

  if(empty($subscriber_var)){

  }else {
    $sql="SELECT * FROM subscribers WHERE subscriber_email='$subscriber_var'";
    $result=mysqli_query($conn, $sql);

    $result_check=mysqli_num_rows($result);
    if ($result_check > 0) {
      header("Location: teacher_home_page.php?message=Error_Subscribing");
        exit();
  }else{
    $query="INSERT INTO subscribers(subscriber_email) VALUES('$subscriber_var');";
    $result=mysqli_query($conn, $query) ;
    if(!$result){
      header("Location: teacher_home_page.php?message=Error_Subscribing");
      exit();
    }else{
      header("Location: teacher_home_page.php?message=Successfully_subscribed");
      exit();
    }
  }
}
}
