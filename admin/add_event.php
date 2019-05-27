<?php
include('../databases/connection.php');
session_start();

if (isset($_POST['add_event_button'])) {
    $e_id=strtolower(mysqli_real_escape_string($conn, $_POST['event_id']));
    $e_name=strtolower($_POST['event_name']);
    $e_description=strtolower($_POST['event_description']);
    $e_rules=mysqli_real_escape_string($conn, $_POST['event_rules']);
    $e_department=strtolower($_POST['department_id']);
    $e_semester=$_POST['event_semester'];
    $e_start_date=date('Y-m-d', strtotime($_POST['event_start']));
    $e_end_date=date('Y-m-d', strtotime($_POST['event_end']));
    $e_amount=$_POST['event_amount'];
    $e_location=strtolower($_POST['event_location']);
}

if (empty($e_id) || empty($e_name) || empty($e_department) || empty($e_semester) || empty($e_rules) || empty($e_description)
 || empty($e_end_date)|| empty($e_location)|| empty($e_amount)|| empty($e_start_date)) {
    header("Location: add_event_form.php?message=empty_fields");
    exit();
} elseif (!preg_match("/^[a-zA-Z ]*$/", $e_name)) {
    header("Location: add_event_form.php?message=invalid_username");
    exit();
} else {
    $sql="SELECT * FROM events WHERE event_id='$e_id'";
    $result=mysqli_query($conn, $sql);

    $result_check=mysqli_num_rows($result);
    if ($result_check > 0) {
        header("Location: add_event_form.php?message=Registeration_failed");
        exit();
    } else {
        $query ="INSERT INTO events_table (event_id, event_title, department_id, semester,event_rules,event_desc,start_date,end_date,amount,location)
         VALUES('$e_id', '$e_name', '$e_department', '$e_semester', '$e_rules', '$e_description', '$e_start_date', '$e_end_date', '$e_amount','$e_location')";
        $result=mysqli_query($conn, $query);
        if (!$result) {
            echo mysqli_error($conn);
        }else{
          header("Location: add_event_form.php?message=register_success");
          echo '<script language="javascript">';
          echo 'alert("Successfully registered the event")';
          echo '</script>';
          exit();
        }

    }
}
