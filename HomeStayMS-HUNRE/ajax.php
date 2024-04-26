<?php
include_once 'database.php';
session_start();
// LOGIN
if (isset($_GET['login'])) {
    $email = $_GET['email'];
    $matkhau = $_GET['matkhau'];

    if (!$email && !$matkhau) {
        header('Location:login.php?empty');
    } else {
        $query = "SELECT * FROM nguoidung WHERE taikhoan = '$email' OR email = '$email' AND matkhau='$matkhau'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['taikhoan'];
            $_SESSION['user_id'] = $user['id_nguoidung'];
            $_SESSION['role'] = $user['role'];
            echo "loginoke";
            header('Location:index.php?dashboard');
        } else {

            header('Location:login.php?loginE');
        }
    }
}

if (isset($_POST['add_room_type'])) {
    $loaiphong = $_POST['loaiphong'];
    $giaphong = $_POST['giaphong'];
    $songuoi = $_POST['songuoi'];
    $mota = $_POST['mota'];

    if ($loaiphong != '') {
        $sql = "SELECT * FROM loaiphong WHERE loaiphong = '$loaiphong'";
        if (mysqli_num_rows(mysqli_query($connection, $sql)) >= 1) {
            $response['done'] = false;
            $response['data'] = "Loại phòng đã tồn tại";
        } else {
            $query = "INSERT INTO loaiphong (id_loaiphong, loaiphong, giaphong, songuoi, mota) 
            VALUES ('','$loaiphong', '$giaphong','$songuoi', '$mota')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $response['done'] = true;
                $response['data'] = 'Successfully Added Room';
            } else {
                $response['done'] = false;
                $response['data'] = "DataBase Error";
            }
        }
    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}

if (isset($_POST['id_loaiphong'])) {
    $id_loaiphong = $_POST['id_loaiphong'];

    $sql = "SELECT * FROM loaiphong WHERE id_loaiphong = '$id_loaiphong'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['loaiphong'] = $room['loaiphong'];
        $response['songuoi'] = $room['songuoi'];
        $response['giaphong'] = $room['giaphong'];
        $response['mota'] = $room['mota'];
        $response['id_loaiphong'] = $room['id_loaiphong'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }

    echo json_encode($response);
}

if (isset($_POST['edit_room_type'])) {
    $id_loaiphong = $_POST['id_loaiphong'];
    $loaiphong = $_POST['loaiphong'];
    $giaphong = $_POST['giaphong'];
    $songuoi = $_POST['songuoi'];
    $mota = $_POST['mota'];

    if ($id_loaiphong != '') {
        $query = "UPDATE loaiphong SET loaiphong = '$loaiphong',giaphong = '$giaphong',songuoi = '$songuoi',mota = '$mota' where id_loaiphong = '$id_loaiphong'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $response['done'] = true;
            $response['data'] = 'Successfully Edit Room';
        } else {
            $response['done'] = false;
            $response['data'] = "DataBase Error";
        }
    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}
if (isset($_GET['delete_room_type'])) {
    $room_id = $_GET['delete_room_type'];
    $sql = "DELETE FROM `loaiphong` WHERE id_loaiphong = '$room_id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location:index.php?loaiphong&success");
    } else {
        header("Location:index.php?loaiphong&error");
    }
}


// Quản lý dịch vụ
if (isset($_POST['addDV'])) {
    $tendichvu = $_POST['tendichvu'];
    $gianhap = $_POST['gianhap'];
    $giaban = $_POST['giaban'];
    $mota = $_POST['mota'];
    $tendichvu = trim($tendichvu);
    if ($tendichvu != '') {
        $sql = "SELECT * FROM dichvu WHERE tendichvu = '$tendichvu'";
        if (mysqli_num_rows(mysqli_query($connection, $sql)) >= 1) {
            $response['done'] = false;
            $response['data'] = "Loại phòng đã tồn tại";
        } else {
            $query = "INSERT INTO dichvu (id_dichvu, tendichvu, gianhap, giaban, mota) 
            VALUES ('','$tendichvu', '$gianhap','$giaban', '$mota')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $response['done'] = true;
                $response['data'] = 'Successfully Added Room';
            } else {
                $response['done'] = false;
                $response['data'] = "DataBas    e Error";
            }
        }
    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}

if (isset($_POST['dichvu'])) {
    $id_dichvu = $_POST['id_dichvu'];

    $sql = "SELECT * FROM dichvu WHERE id_dichvu = '$id_dichvu'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['tendichvu'] = $room['tendichvu'];
        $response['gianhap'] = $room['gianhap'];
        $response['giaban'] = $room['giaban'];
        $response['mota'] = $room['mota'];
        $response['id_dichvu'] = $room['id_dichvu'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }

    echo json_encode($response);
}

if (isset($_POST['edit_dv'])) {
    $id_dichvu = $_POST['id_dichvu'];
    $tendichvu = $_POST['tendichvu'];
    $gianhap = $_POST['gianhap'];
    $giaban = $_POST['giaban'];
    $mota = $_POST['mota'];

    if ($id_dichvu != '') {

        $query = "UPDATE dichvu SET tendichvu = '$tendichvu',gianhap = '$gianhap',giaban = '$giaban',mota = '$mota' 
        where id_dichvu = '$id_dichvu'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $response['done'] = true;
            $response['data'] = 'Successfully Edit';
        } else {
            $response['done'] = false;
            $response['data'] = "DataBase Error";
        }
    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}

if (isset($_GET['delete_dichvu'])) {
    $id = $_GET['delete_dichvu'];
    $sql = "DELETE FROM `dichvu` WHERE id_dichvu = '$id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location:index.php?dichvu&success");
    } else {
        header("Location:index.php?dichvu&error");
    }
}

if (isset($_POST['add_room'])) {
    $loaiphong = $_POST['loaiphong'];
    $sophong = $_POST['sophong'];

    $img_name = $_FILES['srcanh']['name'];
    $img_size = $_FILES['srcanh']['size'];
    $tmp_name = $_FILES['srcanh']['tmp_name'];
    $error = $_FILES['srcanh']['error'];

    $response['done'] = false;
    $response['data'] = $img_name . $img_size .  $tmp_name . $error;
    if (trim($sophong) != "") {
        $sql = "SELECT * FROM phong WHERE sophong = '$sophong'";

        if (mysqli_num_rows(mysqli_query($connection, $sql)) >= 1) {
            $response['done'] = false;
            $response['data'] = "Số phòng đã tồn tại";
        } else {
            if ($error === 0) {
                if ($img_size > 1000000) {
                    $msg = "Ảnh quá lớn, hãy chọn ảnh có kích thước nhỏ hơn";
                    $response['done'] = false;
                    $response['data'] = $msg;
                } else {
                    $validImageExtension = ['jpg', 'jpeg', 'png'];
                    //lấy đuôi file ảnh
                    $imageExtension = explode('.', $img_name);
                    // chuyển vè chữ thường
                    $imageExtension = strtolower(end($imageExtension));
                    // kiểm tra xem đuôi file có đúng trong 3 loại trên
                    if (!in_array($imageExtension, $validImageExtension)) {
                        $msg = "Ảnh không đúng định dạng, hãy chọn ảnh có định dạng jpg, jpeg hoặc png.";
                        $response['done'] = false;
                        $response['data'] = $msg;
                    } else {
                        // trường hợp ảnh hợp lệ;
                        //tạo tên mã hóa bằng uniqid() để tránh trùng tên file 
                        $newImageName = uniqid();
                        $newImageName .= '.' . $imageExtension;
                        // di chuyển file đến thư mục img/
                        move_uploaded_file($tmp_name, 'img/' . $newImageName);
                        $msg = "Tải ảnh thành công" . $newImageName;
                        $response['done'] = false;
                        $response['data'] = $msg;

                        $query = "INSERT INTO phong (id_phong, id_loaiphong, sophong, anh) 
                                        VALUES ('','$loaiphong', '$sophong','$newImageName')";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            $response['done'] = true;
                            $response['data'] = 'Successfully Added Room';
                        } else {
                            $response['done'] = false;
                            $response['data'] = "DataBase Error";
                        }
                    }
                }
            }
        }
    } else {
        $response['done'] = false;
        $response['data'] = "Hãy nhập vào số phòng";
    }
    echo json_encode($response);
}

if (isset($_POST['roomDetails'])) {
    $response['done'] = true;
    $sophong = $_POST['room_id'];
    $sql = "SELECT * FROM phong 
    INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE sophong = '$sophong'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['id_phong'] = $room['id_phong'];
        $response['sophong'] = $room['sophong'];
        $response['loaiphong'] = $room['loaiphong'];
        $response['giaphong'] = $room['giaphong'];
        $response['mota'] = $room['mota'];
        $response['songuoi'] = $room['songuoi'];
        $response['anh'] = $room['anh'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }
    echo json_encode($response);
}
if (isset($_POST['room_ed'])) {
    $response['done'] = true;
    $id_phong = $_POST['room_id'];
    $sql = "SELECT * FROM phong 
    INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE phong.id_phong = $id_phong";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['id_phong'] = $room['id_phong'];
        $response['sophong'] = $room['sophong'];
        $response['loaiphong'] = $room['loaiphong'];
        $response['id_loaiphong'] = $room['id_loaiphong'];
        $response['anh'] = $room['anh'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }

    echo json_encode($response);
}
if (isset($_POST['edit_room'])) {
    $sophong = $_POST['sophong'];
    $id_phong = $_POST['id_phong'];
    $id_loaiphong = $_POST['loaiphong'];
    $new_img_name = $_FILES['srcanh']['name'];
    if (trim($sophong) == "") {
        $response['done'] = false;
        $response['data'] = "Hãy nhập số phòng.";
    } else {
        $sql = "SELECT * FROM phong WHERE sophong = '$sophong'";
        if (mysqli_num_rows(mysqli_query($connection, $sql)) > 1) {
            $response['done'] = false;
            $response['data'] = "Số phòng đã tồn tại.";
        } else {
            $img_name = $_FILES['srcanh']['name'];
            $img_size = $_FILES['srcanh']['size'];
            $tmp_name = $_FILES['srcanh']['tmp_name'];
            $error = $_FILES['srcanh']['error'];
            if ($error === 0) {
                if ($img_size > 1000000) {
                    $msg = "Ảnh quá lớn, hãy chọn ảnh có kích thước nhỏ hơn";
                    $response['done'] = false;
                    $response['data'] = $msg;
                } else {
                    $validImageExtension = ['jpg', 'jpeg', 'png'];
                    $imageExtension = explode('.', $img_name);
                    $imageExtension = strtolower(end($imageExtension));
                    if (!in_array($imageExtension, $validImageExtension)) {
                        $msg = "Ảnh không đúng định dạng, hãy chọn ảnh có định dạng jpg, jpeg hoặc png.";
                        $response['done'] = false;
                        $response['data'] = $msg;
                    } else {
                        // trường hợp ảnh hợp lệ;
                        $newImageName = uniqid();
                        $newImageName .= '.' . $imageExtension;
                        move_uploaded_file($tmp_name, 'img/' . $newImageName);
                        $msg = "Tải ảnh thành công" . $newImageName;
                        $response['done'] = false;
                        $response['data'] = $msg;

                        $query = "UPDATE `phong` SET `id_loaiphong`='$id_loaiphong',`anh`='$newImageName',`sophong`='$sophong' WHERE id_phong = $id_phong";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            // xóa file cũ sau khi thêm ảnh khác
                            $imageOLD = $_POST['old_img'];
                            $imageOldPath = "img/" . $imageOLD;
                            if (file_exists($imageOldPath)) {
                                echo " file toofn tai";
                                // xóa file
                                if (unlink($imageOldPath)) {
                                    echo "Tệp đã được xóa thành công.";
                                } else {
                                    echo "Không thể xóa tệp.";
                                }
                            } else {
                                echo "Tệp không tồn tại.";
                            }
                            $response['done'] = true;
                            $response['data'] = 'Successfully Added Room';
                        } else {
                            $response['done'] = false;
                            $response['data'] = "DataBase Error";
                        }
                    }
                }
            }
        }
    }
    echo json_encode($response);
}
if (isset($_POST['f_loaiphong'])) {
    $id_loaiphong = $_POST['id_loaiphong'];

    $checkins = $_POST['ngayden'];
    $checkouts = $_POST['ngaydi'];
    $room_query = "SELECT phong.id_phong, phong.sophong FROM phong
    INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong
    LEFT JOIN phieuthuephong ON phong.id_phong = phieuthuephong.id_phong
    LEFT JOIN khachhang ON phieuthuephong.id_khachhang = khachhang.id_khachhang
    WHERE  (phieuthuephong.id_phong IS NULL OR ('$checkouts' < phieuthuephong.checkin AND '$checkins' > phieuthuephong.checkout))
     AND phong.id_loaiphong = '$id_loaiphong' GROUP BY phong.id_phong;";
//đổi or =and
    // $sql = "SELECT * FROM phong WHERE id_loaiphong = '$id_loaiphong'";
    $result = mysqli_query($connection, $room_query);
    if (mysqli_num_rows($result) == 0) {
        echo "<option selected disabled>Hãy chọn loại phòng</option>";
    } else {
        if ($result) {
            echo "<option selected disabled>Hãy chọn phòng</option>";
            while ($room = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $room['id_phong'] . "'>" . $room['sophong'] . "</option>";
            }
        } else {
            echo "<option>No Available</option>";
        }
    }
}
if (isset($_POST['giaphong'])) {
    $id_phong = $_POST['id_phong'];

    $sql = "SELECT * FROM phong NATURAL JOIN loaiphong WHERE id_phong = $id_phong";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        echo $room['giaphong'];
    } else {
        echo "0";
    }
}

if (isset($_POST['booking'])) {
    $ngayden = $_POST['ngayden'];
    $ngaydi = $_POST['ngaydi'];
    $room_type = $_POST['room_type'];
    $id_phong = $_POST['sophong'];

    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $cccd = $_POST['cccd'];
    $diachi = $_POST['diachi'];

    $sqlKhachHang = "INSERT INTO `khachhang` (`id_khachhang`, `hoten`, `cccd`, `sdt`, `trangthai`, `diachi`)
                                        VALUES ('', '$hoten', '$cccd', '$sdt', '0', '$diachi')";
    $qrKhachHang = mysqli_query($connection, $sqlKhachHang);
    if ($qrKhachHang) {
        $id_khachhang = mysqli_insert_id($connection);
        $sqlPhongThue = "INSERT INTO `phieuthuephong` (`id_khachhang`, `id_phong`, `checkin`, `checkout`)
                                                VALUES ('$id_khachhang', '$id_phong', '$ngayden', '$ngaydi')";
        $qrPhongThue = mysqli_query($connection, $sqlPhongThue);
        if ($qrPhongThue) {
            $sqlPhieuKH = "INSERT INTO `phieukhachhang` (`id_pkh`, `id_kh`, `id_nguoidung`, `ngaytao`, `tinhtrang`, `ghichu`) 
                                                VALUES ('', '$id_khachhang', '1', NOW(), '1', '')";
            $qrPhieuKH = mysqli_query($connection, $sqlPhieuKH);
            if ($qrPhieuKH) {
                $response['done'] = true;
                $response['data'] = "themthanhcong";
            } else {
                $response['done'] = false;
                $response['data'] = "Lỗi thêm phiếu kh";
            }
        } else {
            $response['done'] = false;
            $response['data'] = "Lỗi thêm phiếu thuê phòng";
        }
    } else {
        $response['done'] = false;
        $response['data'] = "Lỗi thêm phiếu khách hàng";
    }
    echo json_encode($response);
}

if (isset($_POST['themDVSD'])) {
    $id_khachhang = $_POST['id_khachhang'];
    $id_dichvu = $_POST['dichvus'];
    $soluong = $_POST['soluong'];
    $sql = "INSERT INTO `phieudichvu` (`id_khachhang`, `id_dichvu`, `soluong`) VALUES ('$id_khachhang', '$id_dichvu', '$soluong')";
    $qr = mysqli_query($connection, $sql);
    if ($qr) {
        $response['done'] = true;
    } else {
        $response['done'] = false;
        $response['data'] = "Da nhan thong tin" . $_POST['dichvus'] . $_POST['id_khachhang'];
    }
    echo json_encode($response);
}


if (isset($_POST['edit_DVSD'])) {
    $id_khachhang = $_POST['id_khachhang'];
    $sql = "SELECT phieudichvu.id, dichvu.tendichvu, phieudichvu.soluong, dichvu.giaban FROM phieudichvu INNER JOIN dichvu ON phieudichvu.id_dichvu = dichvu.id_dichvu WHERE id_khachhang = $id_khachhang";
    $qr = mysqli_query($connection, $sql);
?>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_array($qr)) {
            ?>
                <tr>
                    <td><?= $rows['id'] ?></td>
                    <td><?= $rows['tendichvu'] ?></td>
                    <td class="soluong<?= $rows['id'] ?>"><?= $rows['soluong'] ?></td>
                    <td><?= $rows['giaban'] ?></td>
                    <td>
                        <button type="button" name="" data-id="<?= $rows['id'] ?>" id="tangsoluong" class="btn btn-primary">Tăng</button>
                        <button type="button" name="" data-id="<?= $rows['id'] ?>" id="giamsoluong" class="btn btn-primary">Giảm</button>

                        <a name="" id="" class="btn btn-danger" href="ajax.php?xoaDVSD=<?= $rows['id'] ?>" role="button">Xóa</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}

if (isset($_POST['tangsoluong'])) {
    $response['done'] = false;
    $id_phieudichvu = $_POST['id_phieudichvu'];

    $res = mysqli_query($connection, "SELECT * FROM phieudichvu WHERE id = '$id_phieudichvu'");
    $row = mysqli_fetch_assoc($res);
    $soluong = $row['soluong'];
    $soluong += 1;
    if ($soluong > 0) {
        $update = mysqli_query($connection, "UPDATE `phieudichvu` SET `soluong` = '$soluong' WHERE `phieudichvu`.`id` = '$id_phieudichvu'");
        if ($update) {
            $response['done'] = true;
            $response['soluong'] = $soluong;
        } else {
            $response['data'] = "loi db";
        }
    } else {
        $response['data'] = "Soluong khong hop le: ";
    }
    echo json_encode($response);
}
if (isset($_POST['giamsoluong'])) {
    $response['done'] = false;
    $id_phieudichvu = $_POST['id_phieudichvu'];

    $res = mysqli_query($connection, "SELECT * FROM phieudichvu WHERE id = '$id_phieudichvu'");
    $row = mysqli_fetch_assoc($res);
    $soluong = $row['soluong'];
    $soluong -= 1;
    if ($soluong > 0) {
        $update = mysqli_query($connection, "UPDATE `phieudichvu` SET `soluong` = '$soluong' WHERE `phieudichvu`.`id` = '$id_phieudichvu'");
        if ($update) {
            $response['done'] = true;
            $response['soluong'] = $soluong;
        } else {
            $response['data'] = "loi db";
        }
    } else {
        $response['data'] = "Soluong khong hop le: ";
    }
    echo json_encode($response);
}
if (isset($_GET['xoaDVSD'])) {
    $id_phieudichvu = $_GET['xoaDVSD'];
    $qr = mysqli_query($connection, "DELETE FROM phieudichvu WHERE `phieudichvu`.`id` = '$id_phieudichvu'");
    if ($result) {
        header("Location:index.php?khachhang");
    } else {
        header("Location:index.php?khachhang");
    }
}
if (isset($_POST['viewpkh'])) {
    $id_pkh = $_POST['id_phieukhachhang'];
    $sql = "SELECT * FROM phieukhachhang INNER JOIN nguoidung ON phieukhachhang.id_nguoidung = nguoidung.id_nguoidung WHERE id_pkh = '$id_pkh'";
    $qr = mysqli_query($connection, $sql);
    $pkh = mysqli_fetch_assoc($qr);

    $id_kh = $pkh['id_kh'];

    $sqlkh = "SELECT * FROM khachhang WHERE id_khachhang = '$id_kh'";
    $qrkh = mysqli_query($connection, $sqlkh);
    $kh = mysqli_fetch_assoc($qrkh);

    echo "<span>Họ tên: </span>" . $kh['hoten'];
    echo "<br><span>SDT: </span>" . $kh['sdt'];
    echo "<br><span>CCCD: </span>" . $kh['cccd'];
    echo "<br><span>Địa chỉ: </span>" . $kh['diachi'];

    echo "<br> Nhân viên thực hiện: " . $pkh['hoten'];
    echo "<br>Ngày tạo: " . $pkh['ngaytao'];
    echo "<table id='resultTable'  class='table' border='1'>
            <tbody id='resultBody'> ";

    // dịch vụ
    echo "<thead>
            <tr>
                <th>STT</th>
                <th>Số phòng</th>
                <th>Loại phòng</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Số ngày</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>";
    $sqlPhongKH = "SELECT * FROM phieuthuephong INNER JOIN phong ON phieuthuephong.id_phong = phong.id_phong INNER JOIN loaiphong ON loaiphong.id_loaiphong = phong.id_loaiphong WHERE id_khachhang = '$id_kh'";
    $qrPhongKH = mysqli_query($connection, $sqlPhongKH);
    $tongtienphong = 0;
    while ($phongKH = mysqli_fetch_assoc($qrPhongKH)) {
        echo "<tr>";
        echo "<td>" . 1 . "</td>";
        echo "<td>" . $phongKH['sophong'] . "</td>";
        echo "<td>" . $phongKH['loaiphong'] . "</td>";
        $dateString1 =  $phongKH['checkin'];

        // Chuỗi ngày 2
        $dateString2 =  $phongKH['checkout'];

        // Chuyển đổi chuỗi thành đối tượng DateTime
        $date1 = new DateTime($dateString1);
        $date2 = new DateTime($dateString2);

        // Tính khoảng cách giữa hai ngày
        $interval = $date1->diff($date2);

        // Lấy số ngày trong khoảng cách
        $daysDifference = $interval->days;
        echo "<td>" . $phongKH['checkin'] . "</td>";
        echo "<td>" . $phongKH['checkout'] . "</td>";
        echo "<td>" . $daysDifference . "</td>";
        echo "<td>" . $phongKH['giaphong'] . "</td>";
        $tienphong = $daysDifference * $phongKH['giaphong'];
        echo "<td>" . $tienphong . "</td>";
        $tongtienphong += $tienphong;
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='7'> Tổng tiền phòng </td>";
    echo "<td>" . $tongtienphong . "</td>";
    echo "</tr>";


    echo " </tbody>
    </table>";
    // phòng table
    echo "<table id='resultTable'  class='table' border='1'>
            <tbody id='resultBody'> ";


    // dịch vụ
    echo "<thead>
            <tr>
                <th>STT</th>
                <th>Tên Dịch Vụ</th>
                <th>Sô Lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>";
        // lấy những dv kh sử dụng
    $sqlDVSD = "SELECT * FROM phieudichvu INNER JOIN dichvu ON dichvu.id_dichvu = phieudichvu.id_dichvu WHERE id_khachhang = $id_kh";
    $qrDVSV = mysqli_query($connection, $sqlDVSD);
    $tongtiendv = 0;
    while ($dvsd = mysqli_fetch_assoc($qrDVSV)) {
        echo "<tr>";
        echo "<td>" . $dvsd['id'] . "</td>";
        echo "<td>" . $dvsd['tendichvu'] . "</td>";
        echo "<td>" . $dvsd['soluong'] . "</td>";
        echo "<td>" . $dvsd['giaban'] . "</td>";
        // tính tiền dịch vụ sử dụng
        $tiendv = $dvsd['soluong'] * $dvsd['giaban'];
        echo "<td>" .  $tiendv . "</td>";
        $tongtiendv += $tiendv;
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='4'> Tổng tiền dịch vụ </td>";
    echo "<td>" . $tongtiendv . "</td>";
    echo "</tr>";
    echo " </tbody>
    </table>";
    // in ra tổng tiền
    $tongtien = $tongtiendv + $tongtienphong;
    $sotienconlai = $tongtien -  $pkh['dathanhtoan'];
    echo "<h4>Số tiền đã thanh toán: " . $pkh['dathanhtoan'] . "</h4>";

    echo "<h3>Tổng tiền phải trả: " . $sotienconlai . "</h3>";

    echo "<input type='hidden' id='tongtien' value='" . $tongtien . "'>";
    echo "<input type='hidden' id='id_pkh' value='" . $id_pkh . "'>";
    echo "<input type='hidden' id='hotenkh' value='" . $kh['hoten'] . "'>";
    echo "<input type='hidden' id='khachhang' value='" . $id_kh . "'>";
}
if (isset($_POST['edit_thuephong'])) {
    $id_khachhang = $_POST['id_khachhang'];
    $qr = mysqli_query($connection, "SELECT * FROM khachhang WHERE id_khachhang = '$id_khachhang'");
    $row = mysqli_fetch_assoc($qr);

    $response['hoten'] = $row['hoten'];
    $response['sdt'] = $row['sdt'];
    $response['cccd'] = $row['cccd'];
    $response['diachi'] = $row['diachi'];
    $response['id_khachhang'] = $row['id_khachhang'];

    $qrphong = mysqli_query($connection, "SELECT * FROM phieuthuephong WHERE id_khachhang = '$id_khachhang'");
    $phongthue = mysqli_fetch_assoc($qrphong);
    $response['checkin'] = $phongthue['checkin'];
    $response['checkout'] = $phongthue['checkout'];
    $response['id_phieuthue'] = $phongthue['id'];


    echo json_encode($response);
}

if (isset($_POST['update_thuephong'])) {
    $response['done'] = false;
    $response['data'] = "sent";

    $edit_hotenkh = $_POST['edit_hotenkh'];
    $edit_cccd = $_POST['edit_cccd'];
    $edit_sdt = $_POST['edit_sdt'];
    $edit_diachi = $_POST['edit_diachi'];
    $edit_id_khachhang = $_POST['edit_id_khachhang'];
    $edit_id_phieuthue = $_POST['edit_id_phieuthue'];
    $edit_checkin = $_POST['edit_checkin'];
    $edit_checkout = $_POST['edit_checkout'];
    $qrupdatekh = mysqli_query($connection, "UPDATE `khachhang`
     SET `hoten` = '$edit_hotenkh', `cccd` = '$edit_cccd',
      `sdt` = '$edit_sdt', `diachi` = '$edit_diachi'
       WHERE `khachhang`.`id_khachhang` = $edit_id_khachhang");

    $qrupdatephongthue = mysqli_query($connection, "UPDATE `phieuthuephong`
     SET `checkin` = '$edit_checkin', `checkout` = '$edit_checkout' WHERE `phieuthuephong`.`id` = $edit_id_phieuthue");
    if ($qrupdatekh) {
        if ($qrupdatephongthue) {
            $response['done'] = true;
        } else {
            $response['data'] = "loi sua phong thue";
        }
    } else {
        $response['data'] = "loi sua kh";
    }
    echo json_encode($response);
}

if (isset($_GET['delete_khachhang'])) {
    $id_kh = $_GET['delete_khachhang'];
    echo $id_kh;
    $sql = "DELETE FROM `phieuthuephong` WHERE id_khachhang = '$id_kh'";
    $result = mysqli_query($connection, $sql);

    $sqldv = "DELETE FROM `phieudichvu` WHERE id_khachhang = '$id_kh'";
    $resultDV = mysqli_query($connection, $sqldv);

    $sqlphieukh = "DELETE FROM `phieukhachhang` WHERE id_kh = '$id_kh'";
    $resultPKH = mysqli_query($connection, $sqlphieukh);

    $sqlkhachhang = "DELETE FROM `khachhang` WHERE id_khachhang = '$id_kh'";
    $resultKH = mysqli_query($connection, $sqlkhachhang);



    if ($result && $resultDV && $resultPKH && $sqlkhachhang) {
        header("Location:index.php?khachhang&success");
    } else {
        header("Location:index.php?khachhang&error");
    }
}
if (isset($_POST['thanhtoanhoadon'])) {
    $tongtien = $_POST['tongtien'];
    $id_kh = $_POST['id_kh'];
    $tenkh = $_POST['tenkh'];
    $user = $_SESSION['username'];
    $idnv =  $_SESSION['user_id'];
    $id_pkh = $_POST['id_pkh'];
    $moTaPhieuThu = "Thanh toán hóa đơn " . $tenkh . " Tổng số tiền: " . $tongtien;

    $sqlThemPT = "INSERT INTO `phieuthu` (`id_phieuthu`, `id_nguoidung`, `sotien`, `ghichu`, `ngaytao`, `ngay`, `id_pkh`)
                 VALUES (NULL, '$idnv', '$tongtien', '$moTaPhieuThu', NOW(), NOW(), '$id_pkh')";
    $qrThemPT = mysqli_query($connection, $sqlThemPT);
    if ($qrThemPT) {
        // $sql = "DELETE FROM `phieuthuephong` WHERE id_khachhang = '$id_kh'";
        // $result = mysqli_query($connection, $sql);

        // $sqldv = "DELETE FROM `phieudichvu` WHERE id_khachhang = '$id_kh'";
        // $resultDV = mysqli_query($connection, $sqldv);

        // $sqlphieukh = "DELETE FROM `phieukhachhang` WHERE id_kh = '$id_kh'";
        // $resultPKH = mysqli_query($connection, $sqlphieukh);

        // $sqlkhachhang = "DELETE FROM `khachhang` WHERE id_khachhang = '$id_kh'";
        // $resultKH = mysqli_query($connection, $sqlkhachhang);
        $updatePKH = "UPDATE `phieukhachhang` SET `tinhtrang`='0' WHERE id_pkh = '$id_pkh'";
        $resultPKH = mysqli_query($connection, $updatePKH);
        if ($resultPKH) {
            $response['done'] = true;
        } else {
            $response['done'] = false;
            $response['data'] = "Lỗi xóa thông tin kh";
        }
    } else {
        $response['done'] = false;
        $response['data'] = "Lỗi thêm phiếu thu";
    }


    echo json_encode($response);
}
if (isset($_POST['themphieuthu'])) {
    $sotien = $_POST['sotien'];
    $ghichu = $_POST['ghichu'];
    $idnv = $_SESSION['user_id'];
    $sqlThemPT = "INSERT INTO `phieuthu` (`id_phieuthu`, `id_nguoidung`, `sotien`, `ghichu`, `ngaytao`, `ngay`)
                                 VALUES (NULL, '$idnv', '$sotien', '$ghichu', NOW(), NOW())";
    $qrThemPT = mysqli_query($connection, $sqlThemPT);
    if ($qrThemPT) {
        $response['done'] = true;
    } else {
        $response['done'] = false;
        $response['data'] = "Lỗi database";
    }


    echo json_encode($response);
}
if (isset($_POST['getphieuthu'])) {
    $id_phieuthu = $_POST['id_phieuthu'];
    $sql = "SELECT * FROM phieuthu WHERE id_phieuthu = '$id_phieuthu'";
    $qr = mysqli_query($connection, $sql);
    if ($qr) {
        $phieuthu = mysqli_fetch_assoc($qr);
        $response['done'] = true;
        $response['sotien'] = $phieuthu['sotien'];
        $response['ghichu'] = $phieuthu['ghichu'];
        $response['id_phieuthu'] = $phieuthu['id_phieuthu'];
    } else {
        $response['done'] = false;
        $response['data'] = "send";
    }
    echo json_encode($response);
}
if (isset($_POST['edit_phieuthu'])) {
    $id_phieuthu = $_POST['id_phieuthu'];
    $sotien = $_POST['sotien'];
    $ghichu = $_POST['ghichu'];
    $idnv = $_SESSION['username'];
    $ghichu = $ghichu . "*edited by " . $idnv;

    $sqlUpdate = "UPDATE `phieuthu` SET `sotien`='$sotien',`ghichu`='$ghichu',`ngaytao`=NOW(), `ngay`=NOW() WHERE id_phieuthu = '$id_phieuthu'";
    $qr = mysqli_query($connection, $sqlUpdate);
    if ($qr) {
        $response['done'] = true;
    } else {
        $response['done'] = false;
        $response['data'] = $sotien . $ghichu;
    }
    echo json_encode($response);
}

if (isset($_GET['delete_phieuthu'])) {
    $id_phieuthu = $_GET['delete_phieuthu'];
    $sql = "DELETE FROM `phieuthu` WHERE id_phieuthu = '$id_phieuthu'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location:index.php?phieuthu&success");
    } else {
        header("Location:index.php?phieuthu&error");
    }
}

if (isset($_POST['add_taikhoan'])) {
    $username = $_POST['username'];
    $hoten = $_POST['hoten'];
    $matkhau = $_POST['matkhau'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    //  kiểm tra tồn tại
    $sqlcheckname = "SELECT * FROM nguoidung WHERE taikhoan = '$username'";
    $qrName = mysqli_query($connection, $sqlcheckname);
    $sqlcheckMail = "SELECT * FROM nguoidung WHERE email = '$email'";
    $qrMail = mysqli_query($connection, $sqlcheckMail);

    if (mysqli_num_rows($qrName) > 0 || mysqli_num_rows($qrMail) > 0) {
        $ermsg = "";
        $response['done'] = false;
        if (mysqli_num_rows($qrName) > 0) {
            $ermsg .= "Username đã tồn tại";
        }
        if (mysqli_num_rows($qrMail) > 0) {
            $ermsg .= " Email đã tồn tại";
        }
        $response['data'] = $ermsg;
    } else {
        // sql thêm vào csdl
        $sqlAdd = "INSERT INTO `nguoidung` (`id_nguoidung`, `taikhoan`, `matkhau`, `hoten`, `email`, `sdt`, `role`)
                                    VALUES ('', '$username', '$matkhau', '$hoten', '$email', '$sdt', '$role')";
        $qr = mysqli_query($connection, $sqlAdd);
        if ($qr) {
            $response['done'] = true;
        } else {
            $response['done'] = false;
            $response['data'] = "Lỗi database";
        }
    }


    echo json_encode($response);
}
if (isset($_POST['getTK'])) {
    $id_nguoidung = $_POST['id_nguoidung'];
    $sqlnguoidung = "SELECT * FROM nguoidung WHERE id_nguoidung = '$id_nguoidung'";
    $qrnguoidung = mysqli_query($connection, $sqlnguoidung);
    if ($qrnguoidung) {
        $nguoidung = mysqli_fetch_assoc($qrnguoidung);
        $response['done'] = true;
        $response['id_nguoidung'] = $nguoidung['id_nguoidung'];
        $response['username'] = $nguoidung['taikhoan'];
        $response['hoten'] = $nguoidung['hoten'];
        $response['matkhau'] = $nguoidung['matkhau'];
        $response['email'] = $nguoidung['email'];
        $response['role'] = $nguoidung['role'];
        $response['sdt'] = $nguoidung['sdt'];
    } else {

        $response['done'] = false;
        $response['data'] = "sent";
    }
    echo json_encode($response);
}
// edit taikhoang
if (isset($_POST['edit_taikhoan'])) {
    
    $edit_username = $_POST['edit_username'];
    $edit_hoten = $_POST['edit_hoten'];
    $edit_email = $_POST['edit_email'];
    $edit_matkhau = $_POST['edit_matkhau'];
    $edit_sdt = $_POST['edit_sdt'];
    $edit_role = $_POST['edit_role'];
    $edit_id_nguoidung = $_POST['edit_id_nguoidung'];

    $sqlUPDATE = "UPDATE `nguoidung` SET `taikhoan` = '$edit_username', `matkhau` = '$edit_matkhau',
         `hoten` = '$edit_hoten', `email` = '$edit_email', `sdt` = '$edit_sdt', `role` = '$edit_role' WHERE `nguoidung`.`id_nguoidung` = '$edit_id_nguoidung'";
    $qr = mysqli_query($connection, $sqlUPDATE);
    if ($qr) {
        $response['done'] = true;
    } else {
        $response['done'] = false;
        $response['data'] = "Lỗi database";
    }
    // $response['done'] = false;
    // $response['data'] = "$edit_username $edit_id_nguoidung";

    echo json_encode($response);
}
if (isset($_GET['delete_taikhoan'])){
    $id_taikhoan = $_GET['delete_taikhoan'];
    $sql = "DELETE FROM `nguoidung` WHERE id_nguoidung = '$id_taikhoan'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location:index.php?taikhoan&success");
    } else {
        header("Location:index.php?taikhoan&error");
    }
}

if (isset($_POST['checkin_bk'])) {
    $response['done'] = false;
    $response['data'] = "sents";
    if (isset($_POST['id_booking'])) {
        $id_onl = $_POST['id_booking'];
        $sql_bk = "SELECT * FROM booking_online WHERE id = '$id_onl'";
        $qr_bk = mysqli_query($connection, $sql_bk);
        $bk_onl = mysqli_fetch_assoc($qr_bk);

        $id_kh = $bk_onl['id_khachhang'];
        $dathanhtoan = $bk_onl['sotien'];
        $id_nguoidung = $_SESSION['user_id'];
        $tinhtrang = 0;

        $update = "UPDATE `booking_online` SET `trangthai`='Da checkin' WHERE id = '$id_onl'";
        $qr_update = mysqli_query($connection, $update);
        $response['data'] = $id_onl . "idkh: " . $id_kh . "dathanhtoan: " . $dathanhtoan . "idus" . $id_nguoidung;
        if ($qr_update) {
            $addPhieu = "INSERT INTO `phieukhachhang`(`id_pkh`, `id_kh`, `id_nguoidung`, `ngaytao`, `tinhtrang`, `ghichu`, `dathanhtoan`)
                                             VALUES ('','$id_kh','$id_nguoidung', NOW(),'$tinhtrang','from online','$dathanhtoan')";
            $qr_addphieu = mysqli_query($connection, $addPhieu);
            if ($qr_addphieu) {
                $response['done'] = true;

                $response['data'] = "da update";
            }
        }
    }
    echo json_encode($response);
}

if (isset($_POST['updateCty'])) {
    $response['done'] = false;

    $tencongty = $_POST['tencongty'];
    $motacongty = $_POST['motacongty'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $qr = mysqli_query($connection, "UPDATE `thongtinhethong` SET `tencongty`='$tencongty',`mota`='$motacongty', `sdt` = '$sdt', `email` = '$email' WHERE id = 1");
    if ($qr) {
        $response['done'] = true;
        $response['data'] = 'oke';
    }

    echo json_encode($response);
}
