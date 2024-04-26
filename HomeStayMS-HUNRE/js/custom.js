new DataTable("#tableexample");

$(document).ready(function () {
  // Lấy ngày hôm nay
  var today = new Date();

  // Kích hoạt DateTimePicker cho cả hai trường
  $(".date-picker").datetimepicker({
    format: "Y-m-d H:i", // Định dạng ngày giờ
    step: 60, // Bước thời gian là 15 phút
    timepicker: true, // Cho phép chọn thời gian
    datepicker: true, // Cho phép chọn ngày
    minDate: today, // Ngày tối thiểu là ngày hôm nay
  });
  $(".date-picker-free").datetimepicker({
    format: "Y-m-d H:i", // Định dạng ngày giờ
    step: 120, // Bước thời gian là 15 phút
    timepicker: true, // Cho phép chọn thời gian
    datepicker: true, // Cho phép chọn ngày
  });
  // Xử lý sự kiện khi ngày đến thay đổi
  $("#date-from").on("change", function () {
    var selectedDate = new Date($("#date-from").val());
    var minDate = new Date(selectedDate);
    minDate.setDate(minDate.getDate() + 1); // Thêm một ngày

    // Cập nhật DateTimePicker của ngày đi để ngăn người dùng chọn ngày trước ngày đến
    $("#date-to").datetimepicker({ minDate: minDate });
  });

  $("#stay-duration").on("change", function () {
    // Lấy giá trị của trường "Số ngày ở"
    var stayDuration = parseInt($(this).val());

    // Lấy ngày đến từ trường "Ngày đến"
    var arrivalDate = new Date($("#arrival-date").val());

    // Tính ngày đi bằng cộng số ngày ở vào ngày đến
    if (!isNaN(stayDuration)) {
      var departureDate = new Date(arrivalDate);
      departureDate.setDate(departureDate.getDate() + stayDuration);

      // Định dạng ngày đi theo "dd-MM-yyyy"
      var formattedDate =
        ("0" + departureDate.getDate()).slice(-2) +
        "-" +
        ("0" + (departureDate.getMonth() + 1)).slice(-2) +
        "-" +
        departureDate.getFullYear();
      $("#departure-date").val(formattedDate);
    }
  });
});
