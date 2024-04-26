<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Đặt phòng</li>
    </ol>
</div><!--/.row-->

<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">Đặt phòng
                <button class="btn btn-secondary pull-right" style="border-radius:0%" data-bs-toggle="modal" data-bs-target="#addRoomType">RESET</button>
            </div> -->
            <form role="form" id="booking" method="post">
                <div class="response"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin phòng thuê:
                        <a class="btn btn-secondary pull-right" style="border-radius:0%" href="index.php?reservation">Replan Booking</a>
                    </div>
                    <div class="panel-body">
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="form-group col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Ngày đến</label>
                                    <input required type="text" placeholder="yyyy/mm/dd" autocomplete="off" class="form-control date-picker" id="ngayden" onchange="sum_day();" name="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Ngày đi</label>
                                    <input required type="text" placeholder="yyyy/mm/dd" autocomplete="off" class="form-control date-picker" id="ngaydi" onchange="sum_day();" name="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center g-2">

                            <div class="form-group col-lg-6">
                                <label>Loại phòng</label>
                                <select class="form-control" id="room_type" onchange="fetch_room(this.value);" data-error="chọn loại phòng" required>
                                    <option selected disabled>Chọn loại phòng</option>
                                    <?php $sql = "SELECT * FROM loaiphong";
                                    $qr = mysqli_query($connection, $sql);
                                    while ($rows = mysqli_fetch_assoc($qr)) {
                                    ?>
                                        <option value="<?= $rows['id_loaiphong'] ?>"><?= $rows['loaiphong'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Room No</label>
                                <select class="form-control" id="sophong" onchange="fetch_price(this.value)" required data-error="Select Room No">
                                    <option selected disabled>Select Room No</option>
                                    <option selected value=""></option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-lg-12">
                                <h4 style="font-weight: 500">Tổng số ngày : <span id="soNgay">0</span> Ngày</h4>
                                <h4 style="font-weight: 500">Giá phòng: <span id="price"></span> /-</h4>
                                <h4 style="font-weight: 500">Tổng tiền : <span id="total_price">0</span> /-</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin khách hàng:</div>
                    <div class="panel-body">
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Họ tên khách hàng</label>
                                    <input required type="text" class="form-control" name="hoten" id="hoten" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <input required type="text" class="form-control" name="sdt" id="sdt" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Căn cước công dân</label>
                                    <input required type="text" class="form-control" name="cccd" id="cccd" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Địa chỉ</label>
                                    <input required type="text" class="form-control" name="diachi" id="diachi" placeholder="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-success" style="border-radius:0%">Đặt phòng</button>
            </form>
        </div>

    </div>
</div>