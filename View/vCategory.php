<?php
    include_once("Controller/cCategory.php");
    $v = new controlCategory();

    $tblCategory = $v ->getAllCategory();

    if($tblCategory){
        if(mysqli_num_rows($tblCategory) > 0){
            while ($row = mysqli_fetch_assoc($tblCategory)){
                echo "<a href='index.php?Category=".$row["ID"]."'>".$row["CategoryName"]."</a>"."<br>";
            }
            
        }else{
            echo " 0 result";
        }
    }else{
        echo "error";
    }
?>