<?php
    include_once("ketnoi.php");

    class modelBook {
        function selectAllBook(){
            $con;
            $p = new conDB();
            $result = $p->connectDB ($con);
            if ($result) {
                $stringQuery = "select * from Book";
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB ($con);
                return $table;
            }
            else{
                return false;
            }
        }

        function selectOneBook($BookID){
            $con;
            $p = new conDB();
            $result = $p->connectDB ($con);
            if ($result) {
                $stringQuery = "select * from Book where BookID =".$BookID ;
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB ($con);
                return $table;
            }
            else{
                return false;
            }
        }

        function selectAllBookByCategory ($category){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "select * from Book where ID = ".$category;
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
            
        }

        function selectAllBookSearch ($txtSearch){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "select * from Book where BookName like '%$txtSearch%' OR BookPrice = ".$txtSearch ;

                
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
            
        }


        function selectAllBookPage ($limit, $count){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "select * from Book order by BookID desc limit $limit,$count";
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
        }

        function insertBook ($ten, $gia, $mota, $namefile, $cty){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "INSERT INTO Book VALUES ( NULL, ";
                $stringQuery .= "N'$ten', '$gia', '$namefile', N'$mota', '$cty')";
                
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
            

        }

        function updateBook ($bookID, $ten, $gia, $mota, $namefile, $loaiSach){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "UPDATE book SET BookName = ";
                $stringQuery .= "N'".$ten."',BookPrice = '$gia', BookImage = '$namefile', BookDetail = N'$mota', ID = '$loaiSach' WHERE BookID =$bookID";
                // UPDATE book SET BookName = N 'update mới thứ 2 ',
                // BookPrice = '123',
                // BookImage = N 'nn',
                // BookDetail = N 'mới ew',
                // ID = '3' WHERE BookID =58;
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
        }

        function deleteOneBook ($bookID){
            $p = new conDB();

            $con;
            $result = $p->connectDB ($con);
            if( $result){
                $stringQuery = "DELETE FROM book WHERE BookID =".$bookID;
                $table = mysqli_query($con, $stringQuery);
                $p->disconnectDB($con);
                return $table;
            }else{
                return false;

            }
        }

    }

?>