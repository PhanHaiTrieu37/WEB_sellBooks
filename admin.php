<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        .nomal {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="main">
        <table border="solid" style="margin:auto; width: 960px; text-align: center;" >
            <tr class="nomal">
                <td colspan="2">Banner</td>
                
            </tr>
            <tr class="nomal" style="width: 100%;">
                <td ><br> <a href="admin.php?Book">Sản phẩm</a> <br> <a href="index.php?Book">Trang chủ</a>
                <br><a href="admin.php?addBook">Thêm sản phẩm</a></td>

                <td style="text-align: right ;"><form action="#" method="get" name="fromSearch"><input type="text" name="txtSearch" style="width: 50%;" id=""> 
                <input type="submit" name="btnSearch" value="Search" id="123">
            
                </form></td> 
            </tr>
            <tr class="_nomal">
                <td id="left">
                    <!-- <a href="admin.php?addBook">Thêm sản phẩm</a> -->
                    <?php
                        include_once("View/vCategoryAdmin.php");
                    ?>
                </td>
                <td id="main">
                    <?php
                        if(isset($_REQUEST["addBook"])){
                            include("View/vAddBook.php");
                        }else{
                            include_once("View/vBookAdmin.php");
                        }
                    ?>
                    
                </td>
            </tr>
            <tr  class="nomal">
                <td colspan="2">Footer</td>
                
            </tr>
        </table>
    </div>
    <!-- <table style="width: 100%;"></table> -->
    <!-- <td style="width: 25%; height: 100px"></td> -->
    <!-- <img width="100px" height="150px"  src="image/" > -->
    <!-- <script>alert('')</script> -->
</body>
</html>
