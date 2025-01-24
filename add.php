<?php 

    include"connection.php";

    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['name']) || empty($_POST['roll']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['grade'])){
            echo "All field must not be empty";
        }else{
            $name = $_POST['name'];
            $roll = $_POST['roll'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $grade = $_POST['grade'];

            //New data insert into database sql

            $sql = "INSERT INTO student(name, roll, email, phone, grade) VALUES('$name', '$roll', '$email', '$phone', '$grade')";

            //query from database

            $query = mysqli_query($conn, $sql);

            if($query){
                $msg =  "Student Data Inserted Successfully !!";
                header("Location: index.php?msg=".$msg);
            }else{
                echo "Error! Student Data Not Inserted !!";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | CRUD</title>
    <!-- milligram css  start-->
    <span class="pln">
    </span><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic"><span class="pln">
    </span><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css"><span class="pln">
    </span><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css"><span class="pln">
    </span>
    <!-- milligram css  end-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>View Student Details</h2>
                <h3>
                    
                    <a class="button" href="index.php"> View Student </a>
                </h3>
                <form action="" method="POST"> 
                    <label for="nameField"><span class="pln">Name</span>
                    <input type="text" placeholder="Input Your Name" id="nameField" name="name">
                    <label for="rollField"><span class="pln">Roll</span>
                    <input type="number" placeholder="Input Your Roll" id="rollField" name="roll">
                    <label for="emailField"><span class="pln">Email</span>
                    <input type="email" placeholder="Input Your Email" id="emailField" name="email">
                    <label for="phoneField"><span class="pln">Phone</span>
                    <input type="text" placeholder="Input Your Phone Number" id="phoneField" name="phone">
                    <label for="gradeField"><span class="pln">Grade</span>
                    <input type="text" placeholder="Input Your Grade" id="gradeField" name="grade">
                    <button class="button" type="submit" name="submit">Add Student</button>
                </form>
                
                                
            </div>
        </div>
    </div>
</body>
</html>