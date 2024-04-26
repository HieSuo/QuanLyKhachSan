<?php
include 'database.php';
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Cấu hình website</li>
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
            <div class="panel-heading">Cấu hình website
                <!-- BUTTON bật tắt khối #addRoom -->
            </div>
            <a name="" id="" class="btn btn-primary" href="customerView/trangchu.php" target="blank" role="button">Truy cập trang web</a>
            <?php
            $qr = mysqli_query($connection, "SELECT * FROM thongtinhethong");
            $rs = mysqli_fetch_assoc($qr);

            ?>
            <div class="response">

            </div>
            <form action="" id="formcty">
                <div class="mb-3">
                    <label for="" class="form-label">Tên Công Ty</label>
                    <input type="text" class="form-control" value="<?= $rs['tencongty'] ?>" name="tencty" id="tencty" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Nhập tên congty</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả khu nghỉ dưỡng</label>
                    <textarea class="form-control" name="mota" id="mota" rows="3"><?php echo $rs['mota'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Số điện thoại liên hệ</label>
                  <input type="text" class="form-control" value="<?= $rs['sdt'] ?>" name="sdtcty" id="sdtcty" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <input type="text" class="form-control" value="<?= $rs['email'] ?>" name="emailcty" id="emailcty" aria-describedby="helpId" placeholder="">
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                        <button type="submit" name="" id="" class="btn btn-primary" style="width: 120px">Lưu</button>
                        <button type="reset" name="" id="" class="btn btn-success" style="width: 120px">Reset</button>
                    </div>

                </div>

        </div>
        </form>
    </div>

</div>
</div>
<br>