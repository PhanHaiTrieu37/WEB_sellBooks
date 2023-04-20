<?php
    include_once("Model/mBook.php");

    class controlBook{
        function countBook() {
            $Book = new modelBook();
            $tblBook = $Book ->selectAllBook();
            return mysqli_num_rows($tblBook);
        }

        function getAllBook(){
            $Book = new modelBook();
            $tblBook = $Book ->selectAllBook();
            return $tblBook;
        }

        function getAllBookByCategory($cty){
            $Book = new modelBook();
            $tblBook = $Book ->selectAllBookByCategory($cty);
            return $tblBook;
        }

        function getAllBookPage($page, $count){
            $Book = new modelBook();
            $tblBook = $Book ->selectAllBookPage(($page-1)*$count, $count);
            return $tblBook;
        }

        function SearchAllBookByCategory($txtSearch){
            $Book = new modelBook();
            $tblBook = $Book ->selectAllBookSearch($txtSearch);
            return $tblBook;
        }

        function getOneBook( $BookID){
            $Book = new modelBook();
            $tblBook = $Book ->selectOneBook( $BookID);
            return $tblBook;
        }

        function deleteBook( $BookID){
            $Book = new modelBook();
            $tblBook = $Book ->deleteOneBook( $BookID);
            return $tblBook;
        }

        function addBook($ten, $gia, $mota, $cty, $file, $type, $namefile, $size){
            if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg" ||$type == "image/gif" )
            {
                if ($size <= 2 *1024 * 1024){
                    if(move_uploaded_file($file, "image/".$namefile)){
                        $p = new modelBook();
                        $ins = $p ->insertBook($ten, $gia, $mota, $namefile, $cty);
                        if ($ins){
                            return 1;

                        }else{
                            return 0; // khong insert duoc
                        }
                    }
                    else {
                        return -1; // khong upfile duoc
                    }
                }else{
                    return -2; // file qua lon
                }
            }else {
                return -3; // file khong dung dinh dang
            }
        }

        function editBook($bookID, $ten, $gia, $mota, $loaiSach, $file, $type, $namefile, $size){
            if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg" ||$type == "image/gif" )
            {
                if ($size <= 2 *1024 * 1024){
                    if(move_uploaded_file($file, "image/".$namefile)){
                        $p = new modelBook();
                        $ins = $p ->updateBook($bookID, $ten, $gia, $mota, $namefile, $loaiSach);
                        if ($ins){
                            return 1;

                        }else{
                            return 0; // khong insert duoc
                        }
                    }
                    else {
                        return -1; // khong upfile duoc
                    }
                }else{
                    return -2; // file qua lon
                }
            }else {
                return -3; // file khong dung dinh dang
            }
        }

    }
?>