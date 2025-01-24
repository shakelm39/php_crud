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