<?php
    include_once("Controller/cBook.php");
    $v = new controlBook();

    if(isset($_REQUEST["Category"])){
        $Cate = $_REQUEST["Category"];
        $tblBook = $v ->getAllBookByCategory($Cate);
    }
    elseif(isset($_REQUEST["txtSearch"])){
        $find = $_REQUEST["txtSearch"];
        $tblBook = $v ->SearchAllBookByCategory($find);
    }else{
        // $page = $_REQUEST["page"];
        // $count = $v ->countBook();
        // $Bookperpage = 8;
        // $tblBook = $v ->getAllBookPage($page,$Bookperpage);
        $tblBook = $v ->getAllBook();
    }


    if($tblBook){
        if(mysqli_num_rows($tblBook) > 0){
            $dem = 0;
            // create table
            
            echo "<table style='width: 100%;'>";

            while ($row = mysqli_fetch_assoc($tblBook)){
                if($dem == 0){
                    echo "<tr>";
                }
                $image = $row['BookImage'];

                // echo "<img src='image/$image' alt='$image' />";
                echo "<td style='width: 25%; height: 100px'>";
                echo "<img width='200px' height='200px'  src='image/$image'  />";
                echo "<br>".$row['BookName']."<br>".$row['BookPrice']."<br>"."</td>";
                $dem ++;
                if ($dem % 4 == 0){
                    echo "</tr>";
                    $dem = 0;
                }
            }
            echo "</table>";
            
        }else{
            echo " 0 result";
        }
    }else{
        echo "error";
    }
?>