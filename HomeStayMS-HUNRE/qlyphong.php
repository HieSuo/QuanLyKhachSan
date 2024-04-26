<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">
            <?php if (isset($_GET['searchroom'])) {
                echo "/Quản lý phòng/Tìm phòng trống";
            } else {
                echo "/Quản lý phòng";
            } ?>
        </li>
    </ol>
</div><!--/.row-->

<br>

<div class="row">
    <div class="col-lg-12">
        <div id="success"></div>
    </div>
</div>
<!-- main -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Quản lý phòng
                <!-- BUTTON bật tắt khối #addRoom -->
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addRoom">Thêm Phòng</button>
            </div>
            <div class="row searchroom mt-4 mb-4">
                <form action="index.php?phong&searchroom" method="post">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-2">
                            <input type="text" class="form-control date-picker" placeholder="Ngày đến" name="checkins" aria-label="checkin" autocomplete="off" value="
                            <?php
                            if (isset($_POST['checkins'])) {
                                echo $_POST['checkins'];
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control date-picker" placeholder="Ngày đi" name="checkouts" aria-label="checkout" autocomplete="off" value="
                            <?php
                            if (isset($_POST['checkouts'])) {
                                echo $_POST['checkouts'];
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                        <div class="col"><button type="submit" class="btn btn-primary">Tìm phòng trống</button></div>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <?php
                if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Delete !
                            </div>";
                }
                if (isset($_GET['success'])) {
                    echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Delete !
                            </div>";
                }
                ?>


                <table class="table table-striped table-bordered table-responsive" id="tableexample" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Số Phòng</th>
                            <th>Loại phòng</th>
                            <th>Tình trạng</th>
                            <th>Đặt phòng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        // 
                        $room_query = "SELECT phong.id_phong, phong.sophong, phong.anh, loaiphong.id_loaiphong, loaiphong.loaiphong, phieuthuephong.checkin, phieuthuephong.checkout, khachhang.hoten FROM phong
                                    INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong
                                    LEFT JOIN phieuthuephong ON phong.id_phong = phieuthuephong.id_phong
                                    LEFT JOIN khachhang ON phieuthuephong.id_khachhang = khachhang.id_khachhang GROUP BY phong.id_phong;";
                        if (isset($_GET['searchroom'])) {
                            $checkins = $_POST['checkins'];
                            $checkouts = $_POST['checkouts'];
                            $room_query = "SELECT * FROM phong
                                INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong
                                LEFT JOIN phieuthuephong ON phong.id_phong = phieuthuephong.id_phong
                                LEFT JOIN khachhang ON phieuthuephong.id_khachhang = khachhang.id_khachhang 
                                WHERE  (phieuthuephong.id_phong IS NULL OR 
                                ('$checkouts' < phieuthuephong.checkin OR '$checkins' > phieuthuephong.checkout)) 
                                GROUP BY phong.id_phong;";
                        }
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['sophong'] ?></td>
                                    <td><?php echo $rooms['loaiphong'] ?></td>
                                    <td><?php
                                        $homnay = date("Y-m-d");
                                        // kiểm tra tình trạng phòng, nếu trên checkout < ngay hom nay => phfong trong
                                        if ($rooms['hoten'] == "" or $rooms['checkout'] < $homnay) {
                                            echo "Trống";
                                        } else {
                                            //  nếu đã được đặt thì in ra ngày đến ngày đi
                                            echo $rooms['hoten'] . "_" . $rooms['checkin'] . "->" . $rooms['checkout'];
                                        } ?> <a href="index.php?calendar&room=<?php echo $rooms['id_phong']; ?>">__Chi tiết</a></td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary" href="index.php?datphong" role="button">Đặt phòng</a>

                                    </td>
                                    <td>

                                        <button title="Cập nhật thông tin phòng" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editRoom" data-id="<?php echo $rooms['id_phong']; ?>" id="roomEdit" class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button title="Xem thông tin phòng" data-bs-toggle="modal" data-bs-target="#viewRoomDetail" data-id="<?php echo $rooms['sophong']; ?>" id="roomDetails" class="btn btn-warning" style="border-radius:60px;">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <a href="ajax.php?delete_room_type=<?php echo $rooms['id_phong']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- script date picker -->
<script>
    $(document).ready(function() {
        // Lấy ngày hôm nay
        var today = new Date();

        // Kích hoạt DateTimePicker cho cả hai trường
        $(".date-picker").datetimepicker({
            format: "Y-m-d", // Định dạng ngày giờ
            step: 15, // Bước thời gian là 15 phút
            timepicker: false, // Cho phép chọn thời gian
            datepicker: true, // Cho phép chọn ngày
            minDate: today, // Ngày tối thiểu là ngày hôm nay
        });

        // Xử lý sự kiện khi ngày đến thay đổi
        $("#date-from").on("change", function() {
            var selectedDate = new Date($("#date-from").val());
            var minDate = new Date(selectedDate);
            minDate.setDate(minDate.getDate() + 1); // Thêm một ngày

            // Cập nhật DateTimePicker của ngày đi để ngăn người dùng chọn ngày trước ngày đến
            $("#date-to").datetimepicker({
                minDate: minDate
            });
        });

        $("#stay-duration").on("change", function() {
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
                    ("0" + departureDate.getDate()).slice(-2) + "-" + ("0" + (departureDate.getMonth() + 1)).slice(-2) + "-" + departureDate.getFullYear();
                $("#departure-date").val(formattedDate);
            }
        });
    });
</script>
<br>

<!-- Add modal -->
<div id="addRoom" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="addNewRoom" role="form" enctype="multipart/form-data" method="post">
                            <div class="response"></div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="" class="form-label">Loại phòng</label>
                                    <select class="form-select" name="loaiphong" id="loaiphong">
                                        <!-- <option selected>Select one</option> -->
                                        <?php
                                        $sqlgetroomtype = "SELECT * FROM loaiphong";
                                        $qr = mysqli_query($connection, $sqlgetroomtype);
                                        while ($rows = mysqli_fetch_assoc($qr)) {
                                        ?>
                                            <option value="<?= $rows['id_loaiphong'] ?>"><?= $rows['loaiphong'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Số phòng</label>
                                <input type="text" class="form-control" placeholder="Room no" id="sophong" name="sophong" data-error="Nhập vào số phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="imgFormUp" class="form-label">Ảnh phòng</label>
                                <input required class="form-control" type="file" id="imgFormUp" onchange="previewImage(event)">
                            </div>
                            <div class="mb-3">
                                <img src="" alt="img-review" id="imgprv" style="width: 100%; height: 430px; object-fit: cover;">
                            </div>
                            <input type="text" hidden name="add_room" value="1">
                            <button class="btn btn-success pull-right">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Xem chi tiet  -->
<div id="viewRoomDetail" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông Tin Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="roomView" data-toggle="validator" role="form">
                            <div class="form-group">
                                <label>Số phòng</label>
                                <input class="form-control" placeholder="Loại phòng" id="view_sophong" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <input class="form-control" placeholder="Loại phòng" id="view_loaiphong" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Giá phòng</label>
                                <input type="number" class="form-control" placeholder="Giá phòng" id="view_giaphong" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Số người tối đa</label>
                                <input type="number" class="form-control" placeholder="Sô người" id="view_songuoi" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea class="form-control" placeholder="Nhập mô tả" id="view_mota" rows="3" readonly required></textarea>
                            </div>
                            <div class="mb-3">
                                <img src="" alt="img-review" id="view_img" style="width: 100%; height: 430px; object-fit: cover;">
                            </div>
                            <!-- <input type="hidden" id="edit_id_loaiphong"> -->
                            <!-- <button class="btn btn-success pull-right">Cập nhật</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editRoom" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông Tin Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="roomEditForm" data-toggle="validator" role="form">
                            <div class="response"></div>
                            <div class="mb-3">
                                <label for="" class="form-label">Loại phòng</label>
                                <select class="form-select" name="loaiphong" id="edit_loaiphong">
                                    <!-- <option selected>Select one</option> -->
                                    <?php
                                    $sqlgetroomtype = "SELECT * FROM loaiphong";
                                    $qr = mysqli_query($connection, $sqlgetroomtype);
                                    while ($rows = mysqli_fetch_assoc($qr)) {
                                    ?>
                                        <option value="<?= $rows['id_loaiphong'] ?>"><?= $rows['loaiphong'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số phòng</label>
                                <input class="form-control" placeholder="Loại phòng" id="edit_sophong" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="imgFormUp" class="form-label">Ảnh phòng</label>
                                <input required class="form-control" type="file" id="edit_imgFormUp" onchange="previewImageEdit(event)">
                            </div>
                            <div class="mb-3">
                                <img src="" alt="img-review" id="edit_img" style="width: 100%; height: 430px; object-fit: cover;">
                            </div>
                            <input type="hidden" name="" id="old_img">
                            <input type="hidden" id="edit_id_phong">
                            <button class="btn btn-success pull-right">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- view calendar -->
<div id="viewRoomCalendar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông Tin Đặt Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>