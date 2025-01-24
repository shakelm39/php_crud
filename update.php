<?php 

    include"connection.php";

    //fetch data from database
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM student WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        $name = $row['name'];
        $roll = $row['roll'];
        $email = $row['email'];
        $phone = $row['phone'];
        $grade = $row['grade'];

    }

    // update database from from data

    if(isset($_POST['update'])){
        if(empty($_POST['name']) || empty($_POST['name']) || empty($_POST['roll']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['grade'])){
            echo "All field must not be empty";
        }else{
            $name = $_POST['name'];
            $roll = $_POST['roll'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $grade = $_POST['grade'];

            $update_sql = "UPDATE student SET name='$name', roll='$roll', email='$email', phone='$phone', grade='$grade' WHERE id=$id";
            $update_qry = mysqli_query($conn, $update_sql);

            if( $update_qry) {
                    $msg =  "Student Data Updated Successfully !!";
                    header("Location: index.php?msg=".$msg);
                }else{
                    echo "Error! Student Data Not Updated !!";
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
                <h2>Update Student Details</h2>
                <h3>
                    
                    <a class="button" href="index.php"> View Student </a>
                </h3>
                <form action="" method="POST"> 
                    <input type="hidden" value="<?php echo $id; ?>" id="idField" name="id">
                    <label for="nameField"><span class="pln">Name</span>
                    <input type="text" value="<?php echo $name; ?>" id="nameField" name="name">
                    <label for="rollField"><span class="pln">Roll</span>
                    <input type="number" value="<?php echo $roll; ?>" id="rollField" name="roll">
                    <label for="emailField"><span class="pln">Email</span>
                    <input type="email" value="<?php echo $email; ?>" id="emailField" name="email">
                    <label for="phoneField"><span class="pln">Phone</span>
                    <input type="text" value="<?php echo $phone; ?>" id="phoneField" name="phone">
                    <label for="gradeField"><span class="pln">Grade</span>
                    <input type="text" value="<?php echo $grade; ?>" id="gradeField" name="grade">
                    <button class="button" type="submit" name="update">Update Student</button>
                </form>
                
                                
            </div>
        </div>
    </div>
</body>
</html>