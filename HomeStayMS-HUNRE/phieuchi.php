<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Hóa đơn</li>
    </ol>
</div><!--/.row-->
<!-- khối div để thông báo thành công (được sử lý từ file ajax truyền về) -->
<div class="row">
    <div class="col-lg-12">
        <div id="success"></div>
    </div>
</div>
<br>
<!-- main -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Hóa đơn
                <!-- BUTTON bật tắt khối #addRoom -->
                <!-- <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addPhieuChi">Thêm phiếu chi</button> -->
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
                            <th>Số tiền</th>
                            <!-- <th>ORDER</th> -->
                            <th>Action</th>
                            <!-- <th>Thanh Toán</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        // lấy ra những phiếu kasch hàng có tình trạng=0(thanh toán r)
                        $room_query = "SELECT * FROM phong P  INNER JOIN phieuthuephong PT ON P.id_phong = PT.id_phong
                        INNER JOIN khachhang KH ON PT.id_khachhang = KH.id_khachhang
                        INNER JOIN phieukhachhang ON KH.id_khachhang = phieukhachhang.id_kh
                        INNER JOIN phieuthu ON phieukhachhang.id_pkh = phieuthu.id_pkh
                         WHERE phieukhachhang.tinhtrang = 0;";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['hoten'] ?></td>
                                    <td><?php echo $rooms['sophong'] ?></td>
                                    <td><?php echo $rooms['checkin'] ?></td>
                                    <td><?php echo $rooms['checkout'] ?></td>
                                    <td><?php echo $rooms['sotien'] ?></td>
                                    <!-- <td>
                                        <button title="Thêm dịch vụ" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#themDVSD" data-id="<?php echo $rooms['id_khachhang']; ?>" id="themdv" class="btn btn-info">Thêm Dịch Vụ</button>
                                    </td> -->
                                    <td>

                                        <!-- <button title="Cập nhật thông tin phiếu" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editRoomType" data-id="<?php echo $rooms['id_pkh']; ?>" id="roomTypeEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button> -->
                                        <button title="Xem thông tin phiếu" data-bs-toggle="modal" data-bs-target="#thongtinKH" data-id="<?php echo $rooms['id_pkh']; ?>" id="viewThongTinKH" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>

                                        <!-- <a href="ajax.php?delete_khachhang=<?php echo $rooms['id_khachhang']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a> -->
                                    </td>
                                    <!-- <td>
                                        <button title="Thanh Toán" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#thongtinKH" data-id="<?php echo $rooms['id_pkh']; ?>" id="viewThongTinKH" class="btn  btn-info">Thanh Toán</button>
                                    </td> -->
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
<div id="addPhieuChi" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="formPhieuChi" data-toggle="validator" role="form" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Thêm phiếu chi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="response"></div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="" class="form-label">Số tiền</label>
                                    <input type="number" class="form-control" name="sotien" id="sotien" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Ghi chú</label>
                                    <textarea class="form-control" name="ghichu" id="ghichu" rows="3"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-success pull-right">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!-- end add modal -->
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
                            <!-- <button class="btn btn-success pull-right">Thanh toán</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>