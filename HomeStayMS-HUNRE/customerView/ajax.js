// $("#searchform").submit(function (e) {
//     e.preventDefault();
//     checkin = $("#checkin").val();
//     checkout = $("#checkout").val();
//     songuoi = $("#songuoi").val();
//     console.log(checkin, checkout, songuoi);
// });
$("#dangkytaikhoan").submit(function (e) {
  e.preventDefault();
  email = $('#email').val();
  password = $('#password').val();
  confirmpassword = $('#confirmpassword').val();
  if (password.length < 8) {
    alert("Mật khẩu phải có ít nhất 8 ký tự!");
    return false;
  }
  if(password !== confirmpassword){
    alert("Mật khẩu nhập lại không trùng khớp!")
    return false;
  }
  console.log(email, password,confirmpassword);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      email: email,
      password: password,
      dangkytaikhoan: "",
    },
    success: function (response) {
      if (response.done == true) {
        window.location.href = "loginonline.php";
      } else {
        $(".responsesignup").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});
$("#loginonline").submit(function (e) {
    e.preventDefault();
    email = $('#emaillogin').val();
    password = $('#passwordlogin').val();
    $.ajax({
        type: "post",
        url: "ajax.php",
        dataType: "JSON",
        data: {
          email: email,
          password: password,
          dangnhaponl: "",
        },
        success: function (response) {
          if (response.done == true) {
            window.location.href = "trangchu.php";
          } else {
            $(".response").html(
              '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
                response.data +
                "</div>"
            );
          }
        },
      });
});
  
$("#thongtin_tk_onl").submit(function(e){
  e.preventDefault();
  id_kh_online = $('#id_kh_online').val();
  hoten = $('#hoten').val();
  cccd = $('#cccd').val();
  sdt = $('#sdt').val();
  diachi = $('#diachi').val();

  if(sdt.length!=10){
    alert("Số điện thoại không howjp9 lệ");
    return false;
  }
  

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_kh_online: id_kh_online,
      hoten: hoten,
      cccd: cccd,
      sdt: sdt,
      diachi: diachi,
      update_tk_online: ''
    },
    success: function (response){
      if(response.done == true){
        window.location.href = "viewtaikhoan.php";
      }else{
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    }
  })
  console.log(hoten, id_kh_online, cccd, diachi);
});
