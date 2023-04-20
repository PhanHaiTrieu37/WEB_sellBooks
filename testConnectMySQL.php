<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		// $conn = mysqli_connect('localhost','trieu','Trieuphan37@');
		// if(!$conn){
		// 	echo "Error connecting";
		// }else {
		// 	$db = mysqli_select_db($conn,"trieu");
		// 	if(!$db) echo "nothing";
		// 	else {
		// 		echo "Database <br>";
		// 		$sql = "SELECT * FROM DanhMucSach";
		// 		$result = $conn->query($sql);

		// 		if ($result->num_rows > 0) {
		// 		// output data of each row
		// 		while($row = $result->fetch_assoc()) {
		// 			echo "id: " . $row["MaSach"]. " - Name: " . $row["TenSach"]. " - TenTacGia: " . $row["TacGia"]." - MaNhom: "
        //              . $row["MaNhom"]." - Don gia: " . $row["DonGia"]." - So Luong Ton: " . $row["SoLuongTon"]. "<br>";
		// 		}
		// 		} else {
		// 		echo "0 results";
		// 		}
		// 	}
		// }

        // cách khác
        $host = "localhost"; // tên máy chủ
        $user = "trieu"; // tên đăng nhập của người dùng
        $password = "Trieuphan37@"; // mật khẩu của người dùng
        $dbname = "test1"; // tên database

        // Tạo kết nối
        $conn = mysqli_connect($host, $user, $password, $dbname);
    
        // Kiểm tra kết nối
        if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
        }

        // Thực hiện truy vấn để lấy dữ liệu từ bảng students
        $sql = "SELECT * FROM haitrieu";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra kết quả trả về
        if (mysqli_num_rows($result) > 0) {
        // Lặp qua các bản ghi và hiển thị các trường dữ liệu tương ứng
        while($row = mysqli_fetch_assoc($result)) {
            // echo "ID: " . $row["id"]. " - Họ và tên: " . $row["name"]. " - Địa chỉ email: " . $row["email"]. "<br>";
            echo "id: " . $row["IDTen"]. " - First Name: " . $row["Fname"]. " - Last name : " . $row["Lname"]." - sinh nhat: "
                      . $row["Date"]. "<br>";
        }
        } else {
        echo "Không có kết quả trả về.";
        }

        // Đóng kết nối
        mysqli_close($conn);



	?>
</body>
</html> 