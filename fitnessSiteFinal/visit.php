

<?php

function getVisitsByEmp($employee_id){
    $db = Database::getDB();
    
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
            return $visits;
}

function delVisit(){
        $db = Database::getDB();
    $visit_id = filter_input(INPUT_POST, 'visit_id',FILTER_VALIDATE_INT);
                 $query = 'DELETE FROM visit
                            WHERE visit_id = :visit_id';
                 $statement3 = $db->prepare($query);
                 $statement3->bindValue(":visit_id", $visit_id);
                 $statement3->execute();
                 $statement3->closeCursor(); 
                 
}

function addVisit($fname, $lname,$email,$phone, $interest,$find_us,$questions){
     $db = Database::getDB(); 
     $query = 'INSERT INTO visit
                         (first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
                      VALUES
                         (:first_name, :last_name, :email_address, :phone, :additional, :find_us, :question, NOW(), 1)';
            $statement = $db->prepare($query);
            $statement->bindValue(':first_name', $fname);
            $statement->bindValue(':last_name', $lname);
            $statement->bindValue(':email_address', $email);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':additional', $interest);
            $statement->bindValue(':find_us', $find_us);
            $statement->bindValue(':question', $questions);
            $statement->execute();
            $statement->closeCursor();
}

?>

