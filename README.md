//add php script

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

//read php script
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
                <h2>Student Details</h2>
                <h3>
                    
                    <a class="button" href="add.php"> Add Student </a>
                </h3>
                <?php 
                    if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                ?>
                <table>
                    <thead>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Grade</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            include"connection.php";
                            //select data from student table;
                            $sql = "SELECT * FROM student";

                            $query = mysqli_query($conn, $sql);
                            $serial = 1;
                            while($row = mysqli_fetch_assoc($query)){

                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['roll']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td>
                                <a class="button" href="update.php?id=<?php echo $row['id']?>"> Update </a>
                                <a class="button" href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are You Sure to delete this Data ?')"> Delete </a>
                            </td>
                        </tr>
                        <?php 
                            $serial++;

                            }
                            
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>
//update script

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

//delete 

<?php 
    //include database connection file

    include "connection.php";
    
    //delete database data

    if(isset($_GET['id'])){

        $id = $_GET['id'];


        $sql = "DELETE FROM student where id = $id";
        $query = mysqli_query($conn, $sql);

        if($query){
            $msg =  "Student Data Deleted Successfully !!";
            header("Location: index.php?msg=".$msg);
        }else{
            echo "Error! Student Data Not Deleted !!";
        }
    }

?>

//database file 
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 05:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll`, `email`, `phone`, `grade`) VALUES
(1, 'Mostofa kamal', 1, 'mostofkamal@gmail.com', '017544454545', 'A'),
(2, 'Shakel Kawsar', 2, 'shakelkawsar@gmail.com', '01739412054', 'A+'),
(3, 'Sarah Kawsar', 3, 'sarahkawsar@gmail.com', '01545484545', 'A+'),
(5, 'Habib Khan', 5, 'habib@gmail.com', '01475289884', 'A+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

//data base connection 

<?php 

    //database connection

    $conn = new mysqli('localhost','root','','crud');

    if(!$conn){
        die(mysqli_error($conn));
    }

?>
