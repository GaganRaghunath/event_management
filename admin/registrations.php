<!DOCTYPE html>
<?php
include('../databases/connection.php');
session_start();

$id=$_GET['e_id'];
$sql   ="SELECT * FROM events_table WHERE event_id='$id'";
$result =  mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);

$e_id=$row['event_id'];
$e_name=$row['event_title'];
$e_department=$row['department_id'];
$e_semester=$row['semester'];
$e_rules=$row['event_rules'];
$e_desc=$row['event_desc'];
$e_start=$row['start_date'];
$e_end=$row['end_date'];
$e_amount=$row['amount'];
$e_location=$row['location'];


?>


</html>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 200);
        }

    </script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/courses.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>
  <div class="">

    <?php if (!strlen(@$_GET['message'])=="") {
    ?>
          <script type="text/javascript">
            alert('<?php echo $_GET['message'] ; ?>');
          </script>
      <?php
}
    ?>

  </div>


  <div class="banner-content inner" id="home">
      <!-- header -->
      <header class="header">
          <div class="container-fluid px-lg-5">
              <!-- nav -->
              <nav class="py-4">
                  <div id="logo">
                    <h1> <a href="../index.php"><span>E</span>vents</a></h1>
                  </div>

                  <label for="drop" class="toggle">Menu</label>
                  <input type="checkbox" id="drop" />
                  <ul class="menu mt-2">
                    <li class="active"><a href="admin_dashboard.php">Home</a></li>
                    <li>

                      <!-- First Signin Drop Down -->
                      <label for="drop-2" class="toggle">Teacher<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                      <a href="#">Teacher <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                      <input type="checkbox" id="drop-2" />
                      <ul>
                        <li><a href="add_teacher_form.php" class="scroll">Add Teacher</a></li>
                      </ul>
                    </li>

                    <li>

                      <!-- First Signin Drop Down -->
                      <label for="drop-3" class="toggle">Remove<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                      <a href="#">Remove <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                      <input type="checkbox" id="drop-3" />
                      <ul>
                        <li><a href="remove_student_form.php" class="scroll">Remove Student</a></li>
                        <li><a href="remove_teacher_form.php">Remove Teacher</a></li>
                      </ul>
                    </li>


                    <li>

                      <!-- First Signin Drop Down -->
                      <label for="drop-4" class="toggle">Add<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                      <a href="#">Add <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                      <input type="checkbox" id="drop-4" />
                      <ul>
                        <li><a href="add_event_form.php" class="scroll">Add Event</a></li>
                        <li><a href="add_department.php">Add Department</a></li>
                      </ul>
                    </li>


                    <li>

                      <!-- First Signin Drop Down -->
                      <label for="drop-5" class="toggle">Profile <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                      <a href="#">Profile <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                      <input type="checkbox" id="drop-5" />
                      <ul>
                        <li> <a href="#" class="scroll">Administrator</a> </li>
                        <li><a href="../logout.php">Logout</a></li>
                      </ul>
                    </li>
                    <li><a href="reset_password_form.php">Reset Password</a></li>

                  </ul>
              </nav>
          </div>
      </header>
  </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="admin_dashboard.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Event Details</li>
    </ol>



    <section class="banner-bottom py-lg-5 py-4">
      <div class="container">
        <div class="inner-sec-w3ls py-lg-5 py-4">
          <h3 class="tittle text-center my-lg-5 my-3"><span class="sub-tittle">Event</span> Details</h3>
          <div class="row mt-lg-5 mt-4 justify-content-center">
            <div class="col-md-6 team-gd text-center">
              <div class="team-info">
                <h3 class="mt-md-4 mt-3 text-uppercase"><span class="sub-tittle-team"><?php echo $e_id; ?></span> <?php echo $e_name; ?></h3>
                <p class="text-uppercase">From <?php echo $e_department; ?> Department</p>
                <ul class="social_section_1info mt-md-4 mt-3">
                  <table class="table table-stripped">


<?php
$que="SELECT * FROM bookings WHERE event_id='$e_id'";
$result=mysqli_query($conn,$que);
while($row=mysqli_fetch_array($result)){
  echo "<tr><td>";
  echo $row['srn'];
  echo "</td></tr>";
}
?>

</table>



                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>



    <footer>
      <section class="footer footer_1its py-5">
        <div class="container py-md-4">
          <div class="row footer-top mb-md-5 mb-4">
            <div class="col-lg-4 col-md-6 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Address</h3>
              </div>
              <div class="footer-text">
                <p>Address : Pallotti Nilaya Road, Chelekere, Kalyan Nagar, Bangalore-560 043</p>
                <p>Mobile : +91 8050527228</p>
                <p>Email : <a href="mailto:svpcblr@gmail.com">svpcblr@gmail.com</a></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-md-0 mt-4 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Quick Links</h3>
              </div>
              <div class="row">
                <ul class="col-6 links">
                  <li><a href="../index.php">Home </a></li>
                  <li><a href="../about">About </a></li>
                  <li><a href="../explore.php">Explore</a></li>
                  <li><a href="../registerform.php">Register</a></li>
                  <li><a href="../index#loginform">Sign in </a></li>
                </ul>
                <ul class="col-6 links">
                  <li><a href="../about.php">About Us </a></li>
                  <li><a href="../Synopsis.pdf">Synopsis </a></li>
                  <li><a href="http://www.stvincentpallotticollege.com">Faq's </a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 mt-lg-0 mt-4 col-sm-12 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Newsletter</h3>
              </div>
              <div class="footer-text">
                <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                <form action="subscribers.php" method="post">
                  <input type="email" name="subscriber" placeholder="Enter your email..." required="">
                  <button type="submit" class="btn1 btn"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>
                  <div class="clearfix"> </div>
                </form>
              </div>
            </div>
          </div>
          <div class="footer-grid_section text-center">
            <div class="footer-title-w3ls mb-3">
              <a href="index.php"><span>E</span>vents</a>
            </div>
            <div class="footer-text">
              <p>Events is a web
  application project developed for students to register and enroll for various events conducted at college
  University professors and lecturers visit the web application
  each day to add events and notifications.</p>
            </div>
            <ul class="social_section_1info">
              <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook mr-1"></span>facebook</a></li>
              <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter mr-1"></span>twitter</a></li>
              <li class="google"><a href="#"><span class="fa fa-google-plus mr-1"></span>google</a></li>
              <li class="linkedin"><a href="#"><span class="fa fa-linkedin mr-1"></span>linkedin</a></li>
            </ul>
          </div>
          <div class="move-top-w3layouts text-center mt-3">
            <a href="#home" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a>
          </div>

        </div>
      </section>
    </footer>
    <!-- //footer -->

    <!-- copyright -->
    <div class="cpy-right text-center py-3">
      <p class="">© 2019 Events. All rights reserved | Design by .
      </p>
    </div>
    <!-- //copyright -->

</body>

</html>
