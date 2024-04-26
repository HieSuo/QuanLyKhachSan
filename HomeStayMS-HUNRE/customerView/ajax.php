<?php
include "../database.php";


if (isset($_POST['dangkytaikhoan'])) {
    $response['done'] = false;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlcheckemail = "SELECT * FROM `tk_kh_online` WHERE email = '$email'";
    $qrcheckemail = mysqli_query($connection, $sqlcheckemail);
    $response['data'] = $email . $password;
    if (mysqli_num_rows($qrcheckemail) > 0) {
        $response['data'] = 'Email đã tồn tại trên hệ thống.';
    } else {
        $sqlInsert = "INSERT INTO `tk_kh_online` (`id_tk_online`, `matkhau`, `email`, `diachi`, `sdt`, `cccd`, `hoten`)
                                            VALUES ('', '$password', '$email', NULL, NULL, NULL, NULL)";
        $qr_insert = mysqli_query($connection, $sqlInsert);
        if($qr_insert){
            $response['done']=true;
            
        }else{

            $response['data'] = 'Chuan bi dang ky';
        }
    }

    echo json_encode($response);
}


if (isset($_POST['dangnhaponl'])){
    session_start();
    $response['done'] =false;
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sqllogin = "SELECT * FROM tk_kh_online WHERE email = '$email' AND matkhau = '$password'";
    $qrlogin = mysqli_query($connection, $sqllogin);
    if(mysqli_num_rows($qrlogin)>0){
        $user = mysqli_fetch_assoc($qrlogin);
        $_SESSION['id_tk_online'] = $user['id_tk_online'];
        $response['done']=true;
        $response['data']="Ton tai session: ".$_SESSION['id_tk_online'];
    }else{
        $response['data']= "Tên đăng nhập hoặc mật khẩu không đúng!";
        // $response['data']= $email . $password ;

    }

    echo json_encode($response);
}
if(isset($_POST['update_tk_online'])){
    $response['done']=false;
    $response['data']="sent";
    
    $id_kh_online = $_POST['id_kh_online'];
    $hoten = $_POST['hoten'];
    $cccd = $_POST['cccd'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

    $qrupdate= mysqli_query($connection,"UPDATE `tk_kh_online` SET `diachi`='$diachi',`sdt`='$sdt',`cccd`='$cccd',`hoten`='$hoten' WHERE id_tk_online = '$id_kh_online'");
    if($qrupdate){
        $response['done']=true;
        $response['data']='Cap nhat thanh cong';
    }else{

        $response['data']=$id_kh_online."-".$hoten."-".$cccd."-".$diachi."-".$sdt;
    }
    echo json_encode($response);
}
