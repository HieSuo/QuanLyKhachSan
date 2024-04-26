<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Phiếu thu</li>
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
            <div class="panel-heading">Phiếu thu
                <!-- BUTTON bật tắt khối #addRoom -->
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addPhieuThu">Thêm phiếu thu</button>
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
                            <th>Người tạo</th>
                            <th>Số tiền</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $room_query = "SELECT * FROM phieuthu INNER JOIN nguoidung ON phieuthu.id_nguoidung = nguoidung.id_nguoidung";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['hoten'] ?></td>
                                    <td><?php echo $rooms['sotien'] ?></td>
                                    <td><?php echo $rooms['ghichu'] ?></td>
                                    <td><?php echo $rooms['ngaytao'] ?></td>
                                    <td>

                                        <button title="Cập nhật thông tin phieuthu" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editPhieuThu" data-id="<?php echo $rooms['id_phieuthu']; ?>" id="phieuthuEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>

                                        <a href="ajax.php?delete_phieuthu=<?php echo $rooms['id_phieuthu']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
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
<!-- Button trigger modal -->

<!-- Modal -->
<div id="addPhieuThu" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="formPhieuThu" data-toggle="validator" role="form" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Thêm phiếu thu</h5>
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
<div id="editPhieuThu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật phiếu thu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="phieuthueditForm" data-toggle="validator" role="form">
                            <div class="response"></div>
                            <div class="mb-3">
                                <label for="" class="form-label">Số tiền</label>
                                <input type="number" class="form-control" name="sotien" id="edit_sotien" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ghi chú</label>
                                <textarea class="form-control" name="ghichu" id="edit_ghichu" rows="3"></textarea>
                            </div>
                            <input type="hidden" id="edit_id_phieuthu">
                            <button class="btn btn-success pull-right">Cập nhật</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>