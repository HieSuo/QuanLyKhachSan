<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Quản lý Dịch vụ</li>
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
            <div class="panel-heading">Quản lý Dịch vụ
                <!-- BUTTON bật tắt khối #addRoom -->
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addDichVu">Thêm dịch vụ</button>
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
                            <th>Tên dịch vụ</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Mô tả</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $room_query = "SELECT * FROM dichvu ";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['tendichvu'] ?></td>
                                    <td><?php echo $rooms['gianhap'] ?></td>
                                    <td><?php echo $rooms['giaban'] ?></td>
                                    <td><?php echo $rooms['mota'] ?></td>
                                    <td>

                                        <button title="Cập nhật thông tin dịch vụ" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editDichVu" data-id="<?php echo $rooms['id_dichvu']; ?>" id="DichVuEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>

                                        <a href="ajax.php?delete_dichvu=<?php echo $rooms['id_dichvu']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
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
</div> <!-- end row -->
<script>
  $("#daubuoi").submit(function () {
    console.log("submited");
    return false;
});  
</script>
<!-- ADD Modal -->
<div id="addDichVu" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="addDVForm" data-toggle="validator" role="form">
                            <div class="response"></div>
                            <div class="form-group">
                                <label>Tên dịch vụ</label>
                                <input class="form-control" placeholder="Tên dv" id="tendichvu" data-error="Nhập vào dv" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Giá nhập</label>
                                <input type="number" class="form-control" placeholder="Giá nhập" id="gianhap" data-error="Nhập vào giá nhập" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input type="number" class="form-control" placeholder="Giá bán" id="giaban" data-error="Nhập vào giá bán" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea class="form-control" placeholder="Nhập mô tả" name="mota" id="mota" rows="3" required></textarea>
                            </div>
                            <button class="btn btn-success pull-right"">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!-- end add modal -->

<br>

<div id="editDichVu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="editDVForm" data-toggle="validator" role="form">
                            <div class="form-group">
                                <label>Tên dịch vụ</label>
                                <input class="form-control" placeholder="Tên dv" id="edit_tendichvu" data-error="Nhập vào loại phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Giá Nhập</label>
                                <input type="number" class="form-control" placeholder="Giá Nhập" id="edit_gianhap" data-error="Nhập vào giá phòng" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input type="number" class="form-control" placeholder="Giá bán" id="edit_giaban" data-error="Nhập vào số người" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea class="form-control" placeholder="Nhập mô tả" id="edit_mota" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" class="form-control" placeholder="" id="edit_id_dichvu" data-error="Nhập vào số người" required>
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