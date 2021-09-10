<!doctype html>


<?php
            $dsn = 'mysql:host=localhost;dbname=fitness';
            $username = 'fitness';   
            $password = 'password';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            $action = filter_input(INPUT_POST, 'action');
            if($action == NULL){
                $action = filter_input(INPUT_GET, 'action');
                if($action == NULL){
                    $action = 'list_visits';
                }
            }
            
            if($action ==  'list_visits'){
                
            
            
            $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
            if ($employee_id == NULL || $employee_id == FALSE) {
                $employee_id = 1;
            }
            
            try{
            $queryEmployee = 'SELECT * FROM employee';
            
            $statement1 = $db->prepare($queryEmployee);
            $statement1->execute();
            $employees = $statement1;
            
            $query2 = 'SELECT visit_id, visit.first_name, visit.last_name, 
visit.email_address, visit.date_of, visit.question, visit.employeeID
FROM visit
JOIN employee on visit.employeeID = employee.employeeID
WHERE employee.employeeID = :employee_id
ORDER BY date_of';
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":employee_id", $employee_id);
            $statement2->execute();
            $visits = $statement2;
            
            } catch(PDOException $e){
                echo 'Error: ' .$e->getMessage();
            }
            
            }else if ($action == 'delete_visit'){
                 $visit_id = filter_input(INPUT_POST, 'visit_id',FILTER_VALIDATE_INT);
                 $query = 'DELETE FROM visit
                            WHERE visit_id = :visit_id';
                 $statement3 = $db->prepare($query);
                 $statement3->bindValue(":visit_id", $visit_id);
                 $statement3->execute();
                 $statement3->closeCursor(); 
                 header("Location: admin.php");
                 
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
    
    <title>Admin | Forward Fitness Club</title>
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
              </ul>
        </div>

    </nav>
       
    <!-- Main Content Area -->
    <main class="container mt-5">
        <br>	
        <h1>Admin</h1>
        <h2></h2>
        <br>
        <h3>Select an employee to view messages</h3>
        <aside>
            <ul style="list-style-type: none">
                <?php foreach($employees as $employee) : ?>
                <li>
                    <a href="?employee_id=<?php echo $employee['employeeID']?>";> 
                        <?php echo $employee['first_name'] . ' ' . $employee['last_name']?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </aside>
        <section>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Question</th>
                    <th></th>
                    
                </tr>
               
                <?php foreach ($visits as $visit) : ?>
                <tr>
                    <td><?php echo $visit['first_name']; ?></td>
                    <td><?php echo $visit['last_name']; ?></td>
                    <td><?php echo $visit['email_address']; ?></td>
                    <td><?php echo $visit['date_of']; ?></td>
                    <td><?php echo $visit['question']; ?></td>
                    <td>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="action" value="delete_visit">
                            <input type="hidden" name="visit_id" value="<?php echo $visit['visit_id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
        <br>
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