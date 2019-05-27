<!DOCTYPE html>
<?php include('../databases/connection.php');
session_start();
?>
<html lang="en">

<head>
  <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
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

    <?php if(!strlen(@$_GET['message'])=="")
        {
          ?>
          <script type="text/javascript">
            alert('<?php echo $_GET['message'] ;?>');
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
                      <li class="active"><a href="teacher_home_page.php">Home</a></li>
                      <li><a href="add_event_form.php">Add Event</a></li>
                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-2" class="toggle">Profile <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Profile <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                          <li> <a href="#" class="scroll"> <?php echo $_SESSION['teacher_name_session']; ?>  </a> </li>
                          <li><a href="teacher_profile_page.php" class="">Profile Details</a></li>
                          <li><a href="../logout.php">Logout</a></li>
                        </ul>
                      </li>
                      <li><a href="check_events.php">Check events</a></li>

                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="teacher_home_page.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Add Event</li>
    </ol>
    <!---->

    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-5 py-4">
            <h3 class="tittle text-center mb-lg-5 mb-3"><span class="sub-tittle">Add</span>Event here</h3>

            <div class="login p-md-5 p-4 mx-auto bg-white mw-100 col-lg-5">
              <form action="add_event.php" method="post">
                <div class="form-group">
                  <label>Event ID</label>

                    <input type="text" class="form-control" name="event_id" placeholder="enter event id">
                </div>

                <div class="form-group">
                  <label>Event title</label>

                    <input type="text" class="form-control" name="event_name" value="" placeholder="Enter event name">
                </div>

                <div class="form-group">
                  <label>Event Description</label>
                  <input type="text" class="form-control" name="event_description" value="" placeholder="Enter event description">
                </div>

                <div class="form-group">
                  <label>Enter Rules</label>
                  <textarea class="form-control" name="event_rules" rows="8" cols="80"></textarea>
                </div>


                  <div class="form-group">
                    <label>Department</label>

                    <select class="form-control" name="department_id">
                      <?php

                      $select_department_query="SELECT `department_id`,`department_name` from `department`";
                      $department_result=mysqli_query($conn, $select_department_query);
                      //select semester
                      while ($row = mysqli_fetch_array($department_result)) {
                          $display_id=$row['department_id'];
                          $display_name=$row['department_name'];
                          echo '<option value="'.$display_id.'">'.$display_name.'</option>';
                      }
                                                 ?>
                    </select>
                  </div>


                <div class="form-group row">

              <div class="col-4 form-group">
                <label>Select Semester</label>
                <select class="form-control" name="event_semester">
                  <option value="">Select Semester</option>
                  <option value="1">First</option>
                  <option value="2">Second</option>
                  <option value="3">Third</option>
                  <option value="4">Fourth</option>
                  <option value="5">Fifth</option>
                  <option value="6">Sixth</option>
                  <option value="7">Seventh</option>
                  <option value="8">Eighth</option>
                </select>
              </div>



                  <div class="col-4">
                    <label>Start Date</label>

                    <input class="form-control" class="form-control" type="date" name="event_start"  placeholder="Start Date">
                  </div>

                  <div class="col-4">
                    <label>End Date</label>

                    <input class="form-control" class="form-control" type="date" name="event_end"  placeholder="End Date">
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-6">
                    <label>Amount</label>

                    <input type="number" min="0" max="99999" class="form-control" name="event_amount" placeholder="enter Amount">
                  </div>

                <div class="col-6">
                  <label>Location</label>

                  <input type="text" class="form-control" name="event_location" placeholder="Enter location">
                </div>

                </div>


                <button type="submit" name="add_event_button" class="btn btn-primary submit mb-4">Add event</button>

              </form>

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
                  <li><a href="#about">About </a></li>
                  <li><a href="../check_events.php">check_events</a></li>
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
      <p class="">© 2019 Events. All rights reserved | Design by.
      </p>
    </div>
    <!-- //copyright -->

</body>

</html>
