<!doctype html>


<?php
    
    $fname = filter_input(INPUT_POST, 'fName');
    $lname = filter_input(INPUT_POST, 'lName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $additional = filter_input(INPUT_POST, 'interest');
    $find_us = filter_input(INPUT_POST, 'reference');
    $questions = filter_input(INPUT_POST, 'questions');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if ($fname == null || $lname == null || $phone == null || 
            $email == null) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
        } else {
           require_once('database.php');
           require_once('visit.php');
           
//
//            try {
//                $db = new PDO($dsn, $username, $password);
//
//            } catch (PDOException $e) {
//                $error_message = $e->getMessage();
//                /* include('database_error.php'); */
//                echo "DB Error: " . $error_message; 
//                exit();
//            }

            // Add the product to the database  
           addVisit($fname, $lname,$email,$phone, $interest,$find_us,$questions);
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */

}

?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The Forward Fitness Club is an elite fitness center dedicated to helping clients achieve their fitness and nutrition goals.">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
	<link rel="icon" sizes="192x192" href="images/android-chrome-192.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- My Style Sheet -->
    <link rel="stylesheet" href="css/styles.css">
    
    <title>Thank you | Forward Fitness Club</title>
  </head>
  <body>
   
   <!-- Bootstrap Navigation bar -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    
        <a class="navbar-brand" href="index.html">Forward Fitness Club</a>
        
        <!-- Hamburger menu icon -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="classes.html">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nutrition.html">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="listemployees.php">Employee</a>
              </li>
              </ul>
        </div>

    </nav>
       
    <!-- Main Content Area -->
    <main class="container mt-5">
		
        <h1>Thank you</h1>
        <h2>Thank you, <?php echo $fname; ?>, for contacting me! I will get back to you shortly.</h2>
			
    </main>
         
    <!-- Footer -->
    <footer class="jumbotron-fluid text-center bg-dark p-5">
       
        <div class="container text-white">
            <p>&copy; Copyright 2021. All Rights Reserved.</p>
            <p><a href="mailto:forwardfitness@club.net" class="text-white">forwardfitness@club.net</a></p>
            <a href="https://www.facebook.com/fwdfitclub" target="_blank"><img src="images/facebook-logo.png" alt="black and white Facebook logo" class="pr-4"></a> 
            <a href="https://twitter.com/fwdfitclub" target="_blank"><img src="images/twitter-logo.png" alt="black and white Twitter logo"></a> 
        </div>
        
    </footer>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
  </body>
</html>