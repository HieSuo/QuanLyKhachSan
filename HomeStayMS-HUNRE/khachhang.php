<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Booking</li>
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
            <div class="panel-heading">Booking
                <!-- BUTTON bật tắt khối #addRoom -->
                <a href="index.php?datphong" class="btn btn-secondary" style="border-radius:0;">Đặt phòng</i></a>

                <!-- <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addRoomType">Đặt phòng</button> -->
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
                            <th>Họ tên</th>
                            <th>Số phòng</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Đã thanh toán</th>
                            <th>ORDER</th>
                            <th>Action</th>
                            <th>Thanh Toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $room_query = "SELECT * FROM phong P  INNER JOIN phieuthuephong PT ON P.id_phong = PT.id_phong
                        INNER JOIN khachhang KH ON PT.id_khachhang = KH.id_khachhang
                        INNER JOIN phieukhachhang ON KH.id_khachhang = phieukhachhang.id_kh WHERE phieukhachhang.tinhtrang = 1;";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['hoten'] ?></td>
                                    <td><?php echo $rooms['sophong'] ?></td>
                                    <td><?php echo $rooms['checkin'] ?></td>
                                    <td><?php echo $rooms['checkout'] ?></td>
                                    <td><?php echo $rooms['dathanhtoan'] ?></td>
                                    <td>
                                        <button title="Thêm dịch vụ" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#themDVSD" data-id="<?php echo $rooms['id_khachhang']; ?>" id="themdv" class="btn btn-info">Thêm Dịch Vụ</button>
                                        <button title="Xem thông tin phiếu" data-bs-toggle="modal" data-bs-target="#editDVSD" data-id="<?php echo $rooms['id_khachhang']; ?>" id="editDVSDbtn" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                                    </td>
                                    <td>

                                        <button title="Cập nhật thông tin phiếu" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editPKH" data-id="<?php echo $rooms['id_khachhang']; ?>" id="editPhieuthuebtn" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <button title="Xem thông tin phiếu" data-bs-toggle="modal" data-bs-target="#thongtinKH" data-id="<?php echo $rooms['id_pkh']; ?>" id="viewThongTinKH" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                                        <a href="ajax.php?delete_khachhang=<?php echo $rooms['id_khachhang']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                    <td>
                                        <button title="Thanh Toán" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#thongtinKH" data-id="<?php echo $rooms['id_pkh']; ?>" id="viewThongTinKH" class="btn  btn-info">Thanh Toán</button>
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
<br>
<div id="themDVSD" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm dịch vụ sử dụng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="themDVSD" data-toggle="validator" role="form" method="post">
                            <div class="response"></div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="" class="form-label">Chọn dịch vụ</label>
                                    <select class="form-select form-select" name="dichvu" id="dichvu">

                                        <?php
                                        $sql = "SELECT * FROM dichvu";
                                        $qr = mysqli_query($connection, $sql);
                                        while ($row = mysqli_fetch_assoc($qr)) {
                                        ?>
                                            <option value="<?= $row['id_dichvu'] ?>"><?php echo $row['tendichvu'] . "-" . $row['giaban'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" class="form-control" placeholder="Số lượng" id="soluong" data-error="Nhập vào số lượng" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>ID Khách hàng</label>
                                <input type="number" readonly class="form-control" placeholder="Sô người" id="id_khachhang" data-error="Nhập vào số người" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <!-- <input type="hidden" id="edit_id_loaiphong"> -->
                            <button class="btn btn-success pull-right">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal thoong tin khasch hang -->

<div id="thongtinKH" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Khách hàng <span id="sp_tenkh">-</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="thanhtoan" role="form" method="post">
                            <div class="response"></div>
                            <!-- <div class="mb-3">
                                <label for="" class="form-label">Họ Tên</label>
                                <input type="text" class="form-control" name="hotenkh" id="hotenkh" aria-describedby="helpId" placeholder="">
                            </div> -->
                            <div class="mb-3" id="tbalepkh">

                            </div>
                            <input type="hidden" id="edit_id_loaiphong" value="">
                            <button class="btn btn-success pull-right">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal edit phieu khachhang -->

<div id="editPKH" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Khách hàng <span id="sp_tenkh">-</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="editPKH" role="form" method="post">
                            <div class="response"></div>
                            <h3>Thông tin khách hàng</h3>
                            <div class="mb-3">
                                <label for="" class="form-label">Họ Tên</label>
                                <input type="text" class="form-control" name="hotenkh" id="edit_hotenkh" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Cắn cước công dân</label>
                                <input type="text" class="form-control" name="edit_cccd" id="edit_cccd" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="edit_sdt" id="edit_sdt" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="edit_diachi" id="edit_diachi" aria-describedby="helpId" placeholder="">
                            </div>
                            <input type="hidden" name="edit_id_khachhang" id="edit_id_khachhang">
                            <input type="hidden" name="edit_id_phieuthue" id="edit_id_phieuthue">
                            <h3>Thông tin thuê phòng</h3>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <label for="" class="form-label">Ngày đến</label>
                                    <input type="text" class="form-control date-picker-free" name="edit_checkin" id="edit_checkin" aria-describedby="helpId" placeholder="">

                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Ngày đi</label>
                                    <input type="text" class="form-control date-picker-free" name="edit_checkout" id="edit_checkout" aria-describedby="helpId" placeholder="">

                                </div>

                            </div>

                    </div>
                    <input type="hidden" id="edit_id_kh" value="">
                    <button class="btn btn-success pull-right mt-5">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editDVSD" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order dịch vụ <span id="sp_id">-</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="editDVSDForm" role="form" method="post">
                            <div class="response"></div>
                            <button title="Xem thông tin phiếu" data-bs-toggle="modal" data-bs-target="#fomrsec" id="editDVSDbtn" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                            <div class="mb-3" id="tabledvsd">

                            </div>
                            <input type="hidden" id="edit_id_loaiphong" value="">
                            <!-- <button class="btn btn-success pull-right">Cập nhật</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
