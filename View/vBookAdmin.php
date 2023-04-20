<?php
    include_once("Controller/cBook.php");
    $v = new controlBook();

    if(isset($_REQUEST["Category"])){
        $Cate = $_REQUEST["Category"];
        
        $tblBook = $v ->getAllBookByCategory($Cate);
    }
    elseif(isset($_GET['update'] ) &&isset($_REQUEST["BookID"]) ){
        $BookID = $_REQUEST["BookID"];
        
        include_once("View/vEditBook.php");
        
    }
    elseif(isset($_GET['delete'])  &&isset($_REQUEST["BookID"]) ){
        $deleteBookID = $_REQUEST["BookID"];
        $resultDelete = $v ->deleteBook($deleteBookID);
        if (isset($resultDelete)) {
            echo "<script> alert('xoa san pham thanh cong ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        }else {
            echo "<script> alert('loi khong xoa duoc ') </script>";
        }
        
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
                    echo "<tr ><tr   >";
                }
                $image = $row['BookImage'];

                // echo "<img src='image/$image' alt='$image' />";
                echo "<td style='width: 25%; height: 100px'>";
                echo "<img width='100px' height='100px'  src='image/$image'  /></td>";
                echo "<td>".$row['BookName']."</td><td>".$row['BookPrice'].""."</td>";
                echo "<td><a href='admin.php?BookID=".$row["BookID"]."&update'>Sửa</a> | <a href='admin.php?BookID=".$row["BookID"]."&delete'>Xóa</a></td>";
                $dem ++;
                if ($dem  == 1){
                    echo "</tr></tr>";
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