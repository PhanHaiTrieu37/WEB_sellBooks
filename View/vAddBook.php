<body>
    <h2>ADD Book</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="margin: auto; text-align: left;">
            <tr>
                <td>Tên sản phẩm: </td>
                <td><input type="text" name="txtName" id="" required></td>
            </tr>

            <tr>
                <td>Giá: </td>
                <td><input type="number" name="txtGia" id="" required></td>
            </tr>

            <tr>
                <td>Hình ảnh: </td>
                <td><input type="file" name="ffile" id="" required></td>
            </tr>

            <tr>
                <td>Mô tả: </td>
                <td><textarea rows="5" cols="22" name="txtMoTa" id="" required> </textarea></td>
            </tr>

            <tr>
                <td>Công ty cung cấp: </td>
                <td><select  name="checkboxCategory" id="" required>
                    <option value="" selected disabled hidden>Choose here</option>
                    <?php
                        include_once("Controller/cCategory.php");
                        
                        $Category = new controlCategory;
                        $table = $Category ->getAllCategory();
                        if($table){
                            if(mysqli_num_rows($table)){
                                while ($row = mysqli_fetch_assoc($table)){
                                    echo "<option value=".$row["ID"].">".$row["CategoryName"]."</option>";
                                }
                                
                            }
                        }
                        

                    ?>
                    <!-- <option value=""></option> -->
                    </select></td>
            </tr>

            <tr>
                <td><input type="submit" name="btnSubmit" value="Submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>

<!-- <script>
    alert()
</script> -->
<?php
    include("./Controller/cBook.php");
    if (isset($_REQUEST["btnSubmit"])){
        $ten = $_REQUEST["txtName"];
        $gia = $_REQUEST["txtGia"];
        $mota = $_REQUEST["txtMoTa"];
        $loaiSach = $_REQUEST["checkboxCategory"];
        $file = $_FILES["ffile"]["tmp_name"];
        $type = $_FILES["ffile"]["type"];   
        $namefile = $_FILES["ffile"]["name"];
        $size = $_FILES["ffile"]["size"];

        $p = new controlBook();
        $kq = $p ->addBook($ten, $gia, $mota, $loaiSach, $file, $type, $namefile, $size);
        
        if($kq == 1){
            echo "<script> alert('them du lieu thanh cong! ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        }
        else if ( $kq == 0){
            
            echo "<script> alert('khong the insert! ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        }
        else if ( $kq == -1){
            echo "<script> alert('khong the upload! ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        }else if ( $kq == -2){
            echo "<script> alert('file qua lon! ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        }else if ( $kq == -3){
            // echo $type;
            echo "<script> alert('khong dung dinh dang! ') </script>";
            echo header("refresh: 0; url = 'admin.php?Book'");
        } else {
            echo "errorr something";
        }

    }
?>