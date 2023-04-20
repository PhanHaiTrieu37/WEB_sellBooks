<?php
    include_once("ketnoi.php");

    class modelCategory {
        function selectAllCategory(){
            $con;
            $p = new conDB();
            $result = $p->connectDB ($con);
            if ($result) {
                $stringQuery = "select * from Category";
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB ($con);
                return $table;
            }
            else{
                return false;
            }
        }
    }

?>