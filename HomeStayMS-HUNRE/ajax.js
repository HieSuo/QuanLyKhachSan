$("#addRoomType").submit(function () {
  var loaiphong = $("#loaiphong").val();
  var giaphong = $("#giaphong").val();
  var songuoi = $("#songuoi").val();
  var mota = $("#mota").val();

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      loaiphong: loaiphong,
      giaphong: giaphong,
      songuoi: songuoi,
      mota: mota,
      add_room_type: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("#addRoomTypeMD").modal("hide");
        window.location.href = "index.php?loaiphong";
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });

  return false;
});

// xử lý sửa

$("#roomEditFrom").submit(function () {
  console.log("runing");
  var loaiphong = $("#edit_loaiphong").val();
  var giaphong = $("#edit_giaphong").val();
  var songuoi = $("#edit_songuoi").val();
  var mota = $("#edit_mota").val();
  var id_loaiphong = $("#edit_id_loaiphong").val();
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_loaiphong: id_loaiphong,
      loaiphong: loaiphong,
      giaphong: giaphong,
      songuoi: songuoi,
      mota: mota,
      edit_room_type: "",
    },
    success: function (response) {
      console.log("handling");
      if (response.done == true) {
        console.log("oke");
        $("#editRoomType").modal("hide");
        window.location.href = "index.php?loaiphong";
      } else {
        console.log("k oke");
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
  console.log("complete");
  $("#editRoomType").modal("hide");
  window.location.href = "index.php?loaiphong";
  return false;
});
// lấy thông tin phòng khi ấn chọn sửa
$(document).on("click", "#roomTypeEdit", function (e) {
  e.preventDefault();

  var id_loaiphong = $(this).data("id");

  console.log(id_loaiphong);

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_loaiphong: id_loaiphong,
      roomtype: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("#edit_loaiphong").val(response.loaiphong);
        $("#edit_giaphong").val(response.giaphong);
        $("#edit_songuoi").val(response.songuoi);
        $("#edit_mota").val(response.mota);
        $("#edit_id_loaiphong").val(response.id_loaiphong);
      } else {
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});
// Quan ly dich vu
$("#addDVForm").submit(function () {
  console.log("runing");
  var tendichvu = $("#tendichvu").val();
  var gianhap = $("#gianhap").val();
  var giaban = $("#giaban").val();
  var mota = $("#mota").val();
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      tendichvu: tendichvu,
      gianhap: gianhap,
      giaban: giaban,
      mota: mota,
      addDV: "",
    },
    success: function (response) {
      console.log("handling");
      if (response.done == true) {
        console.log("oke");
        $("#addDichVu").modal("hide");
        window.location.href = "index.php?dichvu";
      } else {
        window.location.href = "index.php?dichvu";
        console.log("k oke");
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
  console.log("complete");
  return false;
});
// lấy thông tin dịch vụ khi ấn chọn sửa
$(document).on("click", "#DichVuEdit", function (e) {
  e.preventDefault();

  var id_dichvu = $(this).data("id");

  console.log(id_dichvu);

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_dichvu: id_dichvu,
      dichvu: "",
    },
    success: function (response) {
      if (response.done == true) {
        // set tt lene form sua
        $("#edit_tendichvu").val(response.tendichvu);
        $("#edit_gianhap").val(response.gianhap);
        $("#edit_giaban").val(response.giaban);
        $("#edit_mota").val(response.mota);
        $("#edit_id_dichvu").val(response.id_dichvu);
      } else {
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});

$("#editDVForm").submit(function () {
  console.log("runing");
  var tendichvu = $("#edit_tendichvu").val();
  var gianhap = $("#edit_gianhap").val();
  var giaban = $("#edit_giaban").val();
  var mota = $("#edit_mota").val();
  var id_dichvu = $("#edit_id_dichvu").val();
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_dichvu: id_dichvu,
      tendichvu: tendichvu,
      gianhap: gianhap,
      giaban: giaban,
      mota: mota,
      edit_dv: "",
    },
    success: function (response) {
      console.log("handling");
      if (response.done == true) {
        console.log("oke");
        $("#editRoomType").modal("hide");
        window.location.href = "index.php?dichvu";
      } else {
        console.log("k oke");
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
  console.log("complete");
  // $("#editRoomType").modal("hide");
  // window.location.href = "index.php?dichvu";
  return false;
});

//  Quản lý phòng
// preview image upload
// $(document).on("change", "#imgFormUp", function (e) {
//   console.log("hehe")
// });
function previewImage(event) {
  var input = event.target;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var preview = document.getElementById("imgprv");
      preview.src = e.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  }
}
function previewImageEdit(event) {
  var input = event.target;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var preview = document.getElementById("edit_img");
      preview.src = e.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#addNewRoom").submit(function (e) {
  e.preventDefault();

  var loaiphong = $("#loaiphong").val();
  var sophong = $("#sophong").val();
  let srcanh = $("#imgFormUp")[0].files;
  let form_data = new FormData();
  // addroom
  form_data.append("add_room", "");

  form_data.append("loaiphong", loaiphong);
  form_data.append("sophong", sophong);
  form_data.append("srcanh", srcanh[0]);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: form_data,
    contentType: false,
    processData: false,
    // data: {
    //   loaiphong: loaiphong,
    //   sophong: sophong,
    //   anh: anh,
    //   add_room: "",
    // },
    success: function (response) {
      if (response.done == true) {
        $("#addNewRoom").modal("hide");
        window.location.href = "index.php?phong";
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });

  return false;
});

$(document).on("click", "#roomDetails", function (e) {
  e.preventDefault();

  var room_id = $(this).data("id");
  // alert(room_id);
  console.log(room_id);

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      room_id: room_id,
      roomDetails: "",
    },
    success: function (response) {
      if (response.done == true) {
        var folderPath = "img/";
        var tenanh = response.anh;
        var anhPath = folderPath + tenanh;
        console.log(tenanh);
        $("#view_sophong").val(response.sophong);
        $("#view_loaiphong").val(response.loaiphong);
        $("#view_giaphong").val(response.giaphong);
        $("#view_songuoi").val(response.songuoi);
        $("#view_mota").val(response.mota);
        // set tt cho img bang .atr("src")
        $("#view_img").attr("src", anhPath);
      } else {
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});

$(document).on("click", "#roomEdit", function (e) {
  e.preventDefault();

  var room_id = $(this).data("id");
  // alert(room_id);
  console.log(room_id);

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      room_id: room_id,
      room_ed: "",
    },
    success: function (response) {
      if (response.done == true) {
        var folderPath = "img/";
        var tenanh = response.anh;
        var anhPath = folderPath + tenanh;
        console.log(anhPath);
        $("#edit_sophong").val(response.sophong);
        $("#edit_loaiphong").val(response.id_loaiphong);
        $("#edit_img").attr("src", anhPath);
        $("#edit_id_phong").val(response.id_phong);
        $("#old_img").val(response.anh);
      } else {
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});
$("#roomEditForm").submit(function (e) {
  e.preventDefault();
  console.log("edting");
  var loaiphong = $("#edit_loaiphong").val();
  var sophong = $("#edit_sophong").val();
  var old_img = $("#old_img").val();
  var id_phong = $("#edit_id_phong").val();
  let srcanh = $("#edit_imgFormUp")[0].files;
  let form_data = new FormData();
  form_data.append("edit_room", "");
  form_data.append("loaiphong", loaiphong);
  form_data.append("sophong", sophong);
  form_data.append("srcanh", srcanh[0]);
  form_data.append("id_phong", id_phong);
  form_data.append("old_img", old_img);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: form_data,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.done == true) {
        $("#editRoom").modal("hide");
        window.location.href = "index.php?phong";
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
  window.location.href = "index.php?phong";
});
// test calendar
$(document).on("click", "#roomCalendar", function (e) {
  e.preventDefault();

  var room_id = $(this).data("id");
  // alert(room_id);
  console.log(room_id);

  $.ajax({
    type: "GET",
    url: "index.php?phong",
    dataType: "JSON",
    data: {
      room_id: room_id,
      room_calendar: "",
    },
    success: function (response) {
      if (response.done == true) {
      } else {
        $(".edit_response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
});

// get phòng qua id_loaiphong
function fetch_room(val) {
  var ngayden = $("#ngayden").val();
  var ngaydi = $("#ngaydi").val();
  console.log(ngayden, ngaydi);
  $.ajax({
    type: "post",
    url: "ajax.php",
    data: {
      ngayden: ngayden,
      ngaydi: ngaydi,
      id_loaiphong: val,
      f_loaiphong: "",
    },
    success: function (response) {
      $("#sophong").html(response);
    },
  });
}
function sum_day() {
  var ngayden = $("#ngayden").val();
  var ngaydi = $("#ngaydi").val();
  var checkinDate = new Date(ngayden);
  var checkoutDate = new Date(ngaydi);
  var khoang_cach = Math.abs(checkoutDate - checkinDate);
  var khoang_cach_ngay = khoang_cach / (1000 * 3600 * 24);
  $("#soNgay").html(khoang_cach_ngay);
  console.log(khoang_cach_ngay);
}
function fetch_price(val) {
  console.log(val);
  $.ajax({
    type: "post",
    url: "ajax.php",
    data: {
      id_phong: val,
      giaphong: "",
    },
    success: function (response) {
      $("#price").html(response);
      var days = document.getElementById("soNgay").innerHTML;
      totalday = Math.round(days);
      $("#total_price").html(Math.round(response * totalday));
    },
  });
}
$("#booking").submit(function (e) {
  e.preventDefault();
  var ngayden = $("#ngayden").val();
  var ngaydi = $("#ngaydi").val();
  var room_type = $("#room_type :selected").val();
  var sophong = $("#sophong :selected").val();
  var total_price = $("#total_price").val();

  var hoten = $("#hoten").val();
  var sdt = $("#sdt").val();
  var cccd = $("#cccd").val();
  var diachi = $("#diachi").val();
  console.log(
    ngayden,
    ngaydi,
    room_type,
    sophong,
    total_price,
    hoten,
    sdt,
    cccd,
    diachi
  );
  var regexName =
    /^[a-zA-Z\sàáạãảâầấậẫẩăằắặẵẳèéẹẽẻêềếệễểìíịĩỉòóọõỏôồốộỗổơờớợỡởùúụũủưừứựữửỳýỵỹỷđĐ]+$/;
  var regexNumb = /^[0-9]+$/;

  var checkinDate = new Date(ngayden);
  var checkoutDate = new Date(ngaydi);
  var khoang_cach = checkoutDate - checkinDate;
  var khoang_cach_ngay = khoang_cach / (1000 * 3600 * 24);

  if (
    hoten.trim() == "" ||
    !regexName.test(hoten) ||
    !regexNumb.test(sdt) ||
    !regexNumb.test(cccd) ||
    khoang_cach_ngay <= 0
  ) {
    var ermsg = "";
    if (khoang_cach_ngay <= 0) {
      ermsg += "Ngày đi phải lớn hơn ngày đến ";
    }
    if (hoten.trim() == "") {
      ermsg += "Tên không không được trống ";
    }
    if (!regexName.test(hoten)) {
      ermsg += "Tên không hợp lệ ";
    }
    if (!regexNumb.test(sdt)) {
      ermsg += "SDT không hợp lệ ";
    }
    if (!regexNumb.test(cccd)) {
      ermsg += "CCCD không hợp lệ ";
    }
    $(".response").html(
      '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
        ermsg +
        "</div>"
    );
  } else {
    $.ajax({
      type: "post",
      url: "ajax.php",
      dataType: "JSON",
      data: {
        ngayden: ngayden,
        ngaydi: ngaydi,
        room_type: room_type,
        sophong: sophong,

        hoten: hoten,
        sdt: sdt,
        cccd: cccd,
        diachi: diachi,

        booking: "",
      },
      success: function (response) {
        if (response.done == true) {
          window.location.href = "index.php?khachhang";
        } else {
          $(".response").html(
            '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
              response.data +
              "</div>"
          );
        }
      },
    });
  }
});

// thêm dịch vụ
$(document).on("click", "#themdv", function (e) {
  e.preventDefault();

  var id_phieukhachhang = $(this).data("id");

  console.log(id_phieukhachhang);
  $("#id_khachhang").val(id_phieukhachhang);
});

$("#themDVSD").submit(function (e) {
  e.preventDefault();
  dichvus = $("#dichvu").val();
  soluong = $("#soluong").val();
  id_khachhang = $("#id_khachhang").val();
  console.log(dichvu, soluong, id_khachhang);
  if (!dichvu || soluong == 0) {
    $(".response").html(
      '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Hãy chọn dịch vụ (sl >0)</div>'
    );
  } else {
    $.ajax({
      type: "post",
      url: "ajax.php",
      dataType: "JSON",
      data: {
        soluong: soluong,
        dichvus: dichvus,
        id_khachhang: id_khachhang,
        themDVSD: "",
      },
      success: function (response) {
        if (response.done == true) {
          $("#themDVSD").modal("hide");
          window.location.href = "index.php?khachhang";
        } else {
          $(".response").html(
            '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
              response.data +
              "</div>"
          );
        }
      },
    });
  }
});

$(document).on("click", "#editDVSDbtn", function (e) {
  e.preventDefault();

  var id_khachhang = $(this).data("id");
  console.log(id_khachhang);
  $("#sp_id").html(id_khachhang);
  $.ajax({
    type: "post",
    url: "ajax.php",
    data: {
      id_khachhang: id_khachhang,
      edit_DVSD: "",
    },
    success: function (response) {
      $("#tabledvsd").html(response);
    },
  });
});

$(document).on("click", "#tangsoluong", function (e){
  e.preventDefault();
  var id_phieudichvu = $(this).data("id");
  var newclas = ".soluong"+id_phieudichvu;
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_phieudichvu: id_phieudichvu,
      tangsoluong: ""
    },
    success: function (response){
      if (response.done == true) {
        $(newclas).html(response.soluong);
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    }
  });
  console.log("Tăng", id_phieudichvu);
})
$(document).on("click", "#giamsoluong", function (e){
  e.preventDefault();
  var id_phieudichvu = $(this).data("id");
  var newclas = ".soluong"+id_phieudichvu;
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_phieudichvu: id_phieudichvu,
      giamsoluong: ""
    },
    success: function (response){
      if (response.done == true) {
        $(newclas).html(response.soluong);
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    }
  });
  console.log("Giảm", id_phieudichvu);
})

// sửa thông tin phòng thuê và thông tin khách hàng
$(document).on("click", "#editPhieuthuebtn", function (e) {
  e.preventDefault();
  var id_khachhang = $(this).data("id");
  console.log(id_khachhang);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_khachhang: id_khachhang,
      edit_thuephong: "",
    },
    success: function (response) {
      $("#edit_hotenkh").val(response.hoten);
      $("#edit_cccd").val(response.cccd);
      $("#edit_sdt").val(response.sdt);
      $("#edit_diachi").val(response.diachi);
      $("#edit_id_khachhang").val(response.id_khachhang);
      $("#edit_checkin").val(response.checkin);
      $("#edit_checkout").val(response.checkout);
      $("#edit_id_phieuthue").val(response.id_phieuthue);
    },
  });
});
$("#editPKH").submit(function (e) {
  e.preventDefault();

  edit_hotenkh = $("#edit_hotenkh").val();
  edit_cccd = $("#edit_cccd").val();
  edit_sdt = $("#edit_sdt").val();
  edit_diachi = $("#edit_diachi").val();
  edit_id_khachhang = $("#edit_id_khachhang").val();
  edit_id_phieuthue = $("#edit_id_phieuthue").val();
  edit_checkin = $("#edit_checkin").val();
  edit_checkout = $("#edit_checkout").val();

  var regexName =
    /^[a-zA-Z\sàáạãảâầấậẫẩăằắặẵẳèéẹẽẻêềếệễểìíịĩỉòóọõỏôồốộỗổơờớợỡởùúụũủưừứựữửỳýỵỹỷđĐ]+$/;
  var regexNumb = /^[0-9]+$/;

  var checkinDate = new Date(edit_checkin);
  var checkoutDate = new Date(edit_checkout);

  var khoang_cach = checkoutDate - checkinDate;
  var khoang_cach_ngay = khoang_cach / (1000 * 3600 * 24);

  if (
    edit_hotenkh.trim() == "" ||
    !regexName.test(edit_hotenkh) ||
    !regexNumb.test(edit_sdt) ||
    !regexNumb.test(edit_cccd) ||
    khoang_cach_ngay <= 0
  ) {
    var ermsg = "";
    if (khoang_cach_ngay <= 0) {
      ermsg += "Ngày đi phải lớn hơn ngày đến ";
    }
    if (edit_hotenkh.trim() == "") {
      ermsg += "Tên không không được trống ";
    }
    if (!regexName.test(edit_hotenkh)) {
      ermsg += "Tên không hợp lệ ";
    }
    if (!regexNumb.test(edit_sdt)) {
      ermsg += "SDT không hợp lệ ";
    }
    if (!regexNumb.test(edit_cccd)) {
      ermsg += "CCCD không hợp lệ ";
    }
    $(".response").html(
      '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
        ermsg +
        "</div>"
    );
  } else {
    $.ajax({
      type: "post",
      url: "ajax.php",
      dataType: "JSON",
      data: {
        edit_hotenkh: edit_hotenkh,
        edit_cccd: edit_cccd,
        edit_sdt: edit_sdt,
        edit_diachi: edit_diachi,
        edit_id_khachhang: edit_id_khachhang,
        edit_id_phieuthue: edit_id_phieuthue,
        edit_checkin: edit_checkin,
        edit_checkout: edit_checkout,
        update_thuephong: "",
      },
      success: function (response) {
        if (response.done == true) {
          $("#editPKH").modal("hide");
          window.location.href = "index.php?khachhang";
        } else {
          $(".response").html(
            '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
              response.data +
              "</div>"
          );
        }
      },
    });
  }
});

$(document).on("click", "#viewThongTinKH", function (e) {
  e.preventDefault();

  var id_phieukhachhang = $(this).data("id");
  console.log(id_phieukhachhang);
  $("#sp_tenkh").html(id_phieukhachhang);
  $.ajax({
    type: "post",
    url: "ajax.php",
    data: {
      id_phieukhachhang: id_phieukhachhang,
      viewpkh: "",
    },
    success: function (response) {
      $("#tbalepkh").html(response);
    },
  });
});

$(document).on("click", "#thanhtoankh", function (e) {
  e.preventDefault();

  var id_phieukhachhang = $(this).data("id");
  console.log(id_phieukhachhang);
  $("#spKH").html("hehe");
  // $.ajax({
  //   type: "post",
  //   url: "ajax.php",
  //   data: {
  //     id_phieukhachhang: id_phieukhachhang,
  //     viewpkh: "",
  //   },
  //   success: function (response) {
  //     $("#tbalepkh").html(response);
  //   },
  // });
});

$("#thanhtoan").submit(function (e) {
  e.preventDefault();
  tongtien = $("#tongtien").val();
  id_kh = $("#khachhang").val();
  tenkh = $("#hotenkh").val();
  id_pkh = $("#id_pkh").val();
  console.log(tongtien, id_kh, id_pkh);

  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      tongtien: tongtien,
      id_kh: id_kh,
      tenkh: tenkh,
      id_pkh: id_pkh,
      thanhtoanhoadon: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("#themDVSD").modal("hide");
        window.location.href = "index.php?khachhang&success";
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
$("#formPhieuThu").submit(function (e) {
  e.preventDefault();
  sotien = $("#sotien").val();
  ghichu = $("#ghichu").val();
  console.log(sotien, ghichu);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      sotien: sotien,
      ghichu: ghichu,
      themphieuthu: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("formPhieuThu").modal("hide");
        window.location.href = "index.php?phieuthu";
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
$(document).on("click", "#phieuthuEdit", function (e) {
  var id_phieuthu = $(this).data("id");
  console.log(id_phieuthu);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_phieuthu: id_phieuthu,
      getphieuthu: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("#edit_sotien").val(response.sotien);
        $("#edit_ghichu").val(response.ghichu);
        $("#edit_id_phieuthu").val(response.id_phieuthu);
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
$("#phieuthueditForm").submit(function (e) {
  e.preventDefault();
  sotien = $("#edit_sotien").val();
  ghichu = $("#edit_ghichu").val();
  id_phieuthu = $("#edit_id_phieuthu").val();
  console.log(sotien, ghichu);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      sotien: sotien,
      ghichu: ghichu,
      id_phieuthu: id_phieuthu,
      edit_phieuthu: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("editPhieuThu").modal("hide");
        window.location.href = "index.php?phieuthu";
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

// Quản lý tài khoản
$("#formTaoTaiKhoan").submit(function (e) {
  e.preventDefault();
  username = $("#username").val();
  hoten = $("#hoten").val();
  email = $("#email").val();
  matkhau = $("#matkhau").val();
  sdt = $("#sdt").val();
  role = $("#role").val();
  var regexName =
    /^[a-zA-Z\sàáạãảâầấậẫẩăằắặẵẳèéẹẽẻêềếệễểìíịĩỉòóọõỏôồốộỗổơờớợỡởùúụũủưừứựữửỳýỵỹỷđĐ]+$/;
  var regexNumb = /^[0-9]+$/;

  if (
    username.trim() == "" ||
    hoten.trim() == "" ||
    !regexName.test(hoten) ||
    !regexNumb.test(sdt)
  ) {
    var ermsg = "";
    if (username.trim() == "") {
      ermsg += "username không được trống ";
    }
    if (hoten.trim() == "") {
      ermsg += " Họ tên không được trống ";
    }
    if (!regexName.test(hoten)) {
      ermsg += "Tên không hợp lệ ";
    }
    if (!regexNumb.test(sdt)) {
      ermsg += "SDT không hợp lệ ";
    }
    $(".response").html(
      '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
        ermsg +
        "</div>"
    );
  } else {
    $.ajax({
      type: "post",
      url: "ajax.php",
      dataType: "JSON",
      data: {
        username: username,
        hoten: hoten,
        email: email,
        matkhau: matkhau,
        sdt: sdt,
        role: role,
        //thông báo làm j
        add_taikhoan: "",
      },
      success: function (response) {
        if (response.done == true) {
          $("addTaiKhoan").modal("hide");
          //reload
          window.location.href = "index.php?taikhoan";
        } else {
          $(".response").html(
            '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
              response.data +
              "</div>"
          );
        }
      },
    });
  }
});
$(document).on("click", "#editTK", function (e) {
  // lấy từ data-id của button
  var id_nguoidung = $(this).data("id");
  console.log(id_nguoidung);
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      id_nguoidung: id_nguoidung,
      getTK: "",
    },
    success: function (response) {
      if (response.done == true) {
        // set thông tin lên form 
        $("#edit_username").val(response.username);
        $("#edit_hoten").val(response.hoten);
        $("#edit_email").val(response.email);
        $("#edit_matkhau").val(response.matkhau);
        $("#edit_sdt").val(response.sdt);
        $("#edit_role").val(response.role);
        $("#edit_id_nguoidung").val(response.id_nguoidung);
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
$("#editTKForm").submit(function (e) {
  e.preventDefault();
  edit_username = $("#edit_username").val();
  edit_hoten = $("#edit_hoten").val();
  edit_email = $("#edit_email").val();
  edit_matkhau = $("#edit_matkhau").val();
  edit_sdt = $("#edit_sdt").val();
  edit_role = $("#edit_role").val();
  edit_id_nguoidung = $("#edit_id_nguoidung").val();
  console.log(edit_username, edit_hoten,edit_id_nguoidung )
  
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      edit_username: edit_username,
      edit_hoten: edit_hoten,
      edit_email: edit_email,
      edit_matkhau: edit_matkhau,
      edit_sdt: edit_sdt,
      edit_role: edit_role,
      edit_id_nguoidung: edit_id_nguoidung,
      //thông báo làm j
      edit_taikhoan: "",
    },
    success: function (response) {
      if (response.done == true) {
        $("editTaikhoan").modal("hide");
        //reload
        window.location.href = "index.php?taikhoan";
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

$(document).on("click", "#checkinOnline", function (e) {
  e.preventDefault();
  var userConfirmed = confirm(
    "Bạn có chắc chắn muốn checkin cho khách hàng này?"
  );
  var id_booking = $(this).data("id");
  if (userConfirmed) {
    $.ajax({
      type: "post",
      url: "ajax.php",
      dataType: "JSON",
      data: {
        id_booking: id_booking,
        checkin_bk: "",
      },
      success: function (response) {
        if (response.done == true) {
          window.location.href = "index.php?bookingonline";
        } else {
          $(".response").html(
            '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
              response.data +
              "</div>"
          );
        }
      },
    });
  }
});

$("#formcty").submit(function (e) {
  e.preventDefault();
  tencongty = $("#tencty").val();
  motacongty = $("#mota").val();
  sdt = $("#sdtcty").val();
  email = $("#emailcty").val();
  $.ajax({
    type: "post",
    url: "ajax.php",
    dataType: "JSON",
    data: {
      tencongty: tencongty,
      motacongty: motacongty,
      sdt: sdt,
      email: email,
      updateCty: "",
    },
    success: function (response) {
      if (response.done == true) {
        window.location.href = "index.php?cauhinh";
      } else {
        $(".response").html(
          '<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' +
            response.data +
            "</div>"
        );
      }
    },
  });
  console.log(tencongty, motacongty, sdt,email );
});
