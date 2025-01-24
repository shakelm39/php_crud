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