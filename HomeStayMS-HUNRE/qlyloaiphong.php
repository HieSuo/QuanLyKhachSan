<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Quản lý loại phòng</li>
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
            <div class="panel-heading">Quản lý loại phòng
                <!-- BUTTON bật tắt khối #addRoom -->
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addRoomTypeMD">Thêm Loại Phòng</button>
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
                            <th>Loại phòng</th>
                            <th>Giá phòng</th>
                            <th>Số người</th>
                            <th>Ghi chú</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $room_query = "SELECT * FROM loaiphong";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['loaiphong'] ?></td>
                                    <td><?php echo $rooms['giaphong'] ?></td>
                                    <td><?php echo $rooms['songuoi'] ?></td>
                                    <td><?php echo $rooms['mota'] ?></td>
                                    <td>

                                        <button title="Cập nhật thông tin loại phòng" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editRoomType" data-id="<?php echo $rooms['id_loaiphong']; ?>" id="roomTypeEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>

                                        <a href="ajax.php?delete_room_type=<?php echo $rooms['id_loaiphong']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
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
<!-- Add Room Modal -->
<div id="addRoomTypeMD" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Loại Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="addRoomType" data-toggle="validator" role="form">
                            <div class="response"></div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <input class="form-control" placeholder="Loại phòng" id="loaiphong" data-error="Nhập vào loại phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Giá phòng</label>
                                <input type="number" class="form-control" placeholder="Giá phòng" id="giaphong" data-error="Nhập vào giá phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Số người tối đa</label>
                                <input type="number" class="form-control" placeholder="Sô người" id="songuoi" data-error="Nhập vào số người" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea class="form-control" placeholder="Nhập mô tả" name="mota" id="mota" rows="3" required></textarea>
                            </div>
                            <button class="btn btn-success pull-right">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!-- end add modal -->
<!-- edit modal -->
<div id="editRoomType" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="roomEditFrom" data-toggle="validator" role="form">
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <input class="form-control" placeholder="Loại phòng" id="edit_loaiphong" data-error="Nhập vào loại phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Giá phòng</label>
                                <input type="number" class="form-control" placeholder="Giá phòng" id="edit_giaphong" data-error="Nhập vào giá phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Số người tối đa</label>
                                <input type="number" class="form-control" placeholder="Sô người" id="edit_songuoi" data-error="Nhập vào số người" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea class="form-control" placeholder="Nhập mô tả" id="edit_mota" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" class="form-control" placeholder="Sô người" id="edit_id_loaiphong" data-error="Nhập vào số người" required>
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
<!-- end edit modal -->
<div class="edit_response"></div>