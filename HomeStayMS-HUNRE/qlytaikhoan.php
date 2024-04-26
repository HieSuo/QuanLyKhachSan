<div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">/Quản lý tài khoản người dùng</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
    <div class="col-lg-12">
        <!-- thông báo được trả về từ file ajax.js -->
        <div id="success"></div>
    </div>
</div>
<!-- main -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Quản lý tài khoản
                <!-- BUTTON bật tắt khối #addRoom -->
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addTaiKhoan">Thêm tài khoản</button>
            </div>
            <div class="panel-body">
                <?php
                // error từ trên đường dẫn, thông báo về việc xóa thành công
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
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>ROLE</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        // câu lệnh sql lấy từ bảng nguoidung
                        $room_query = "SELECT *
                        FROM nguoidung";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            // nếu số lượng >0
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['taikhoan'] ?></td>
                                    <td><?php echo $rooms['matkhau'] ?></td>
                                    <td><?php echo $rooms['hoten'] ?></td>
                                    <td><?php echo $rooms['email'] ?></td>
                                    <td><?php echo $rooms['sdt'] ?></td>
                                    <td><?php echo $rooms['role'] ?></td>
                                    
                                    <td>
                                        <!-- id button  -->
                                        <button title="Cập nhật thông tin tài khoản" style="border-radius:60px;" data-bs-toggle="modal" data-bs-target="#editTaikhoan" data-id="<?php echo $rooms['id_nguoidung']; ?>" id="editTK" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <!-- <button title="Xem thông tin tài khoảng" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="' . $rooms['id_nguoidung'] . '" id="cutomerDetails" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button> -->

                                        <a href="ajax.php?delete_taikhoan=<?php echo $rooms['id_nguoidung']; ?>" class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Chắc chắn mua xóa???')"><i class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } else {
                            echo "Khong co tai khoan";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<br>

<div id="addTaiKhoan" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- idform  -->
                        <form id="formTaoTaiKhoan" data-toggle="validator" role="form" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Thêm tài khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="response"></div>
                            <div class="modal-body">
                                <!--modal body  -->
                                <div class="mb-3">
                                  <label for="" class="form-label">USERNAME</label>
                                  <input required type="text"
                                    class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Họ tên</label>
                                  <input required type="text"
                                    class="form-control" name="hoten" id="hoten" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Email</label>
                                  <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Mật khẩu</label>
                                  <input required type="text"
                                    class="form-control" name="matkhau" id="matkhau" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Số điện thoại</label>
                                  <input required type="text"
                                    class="form-control" name="sdt" id="sdt" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">ROLE</label>
                                    <select class="form-select form-select-lg" name="role" id="role">
                                        <option value="1">1-Admin</option>
                                        <option value="2">2-Nhân viên thường</option>
                                    </select>
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

<div id="editTaikhoan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="editTKForm" data-toggle="validator" role="form">
                            <div class="response"></div>
                            <div class="modal-body">
                                <!--modal body  -->
                                <div class="mb-3">
                                  <label for="" class="form-label">USERNAME</label>
                                  <input required type="text"
                                    class="form-control" name="username" id="edit_username" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Họ tên</label>
                                  <input required type="text"
                                    class="form-control" name="hoten" id="edit_hoten" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Email</label>
                                  <input required type="email" class="form-control" name="email" id="edit_email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Mật khẩu</label>
                                  <input required type="text"
                                    class="form-control" name="matkhau" id="edit_matkhau" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Số điện thoại</label>
                                  <input required type="text"
                                    class="form-control" name="sdt" id="edit_sdt" aria-describedby="helpId" placeholder="">
                                  
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">ROLE</label>
                                    <select class="form-select form-select-lg" name="role" id="edit_role">
                                        <option value="1">1-Admin</option>
                                        <option value="2">2-Nhân viên thường</option>
                                    </select>
                                </div>
                                <input type="hidden" name="" id="edit_id_nguoidung">
                            <button class="btn btn-success pull-right">Cập nhật</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>