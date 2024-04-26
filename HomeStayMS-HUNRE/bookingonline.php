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
            <div class="panel-heading">Booking Online
                <!-- BUTTON bật tắt khối #addRoom -->
                <!-- <a href="index.php?datphong" class="btn btn-secondary" style="border-radius:0;">Đặt phòng</i></a> -->

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

                <div class="response"></div>
                <table class="table table-striped table-bordered table-responsive" id="tableexample" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>OrderID</th>
                            <th>Họ tên</th>
                            <th>CCCD</th>
                            <th>Số phòng</th>
                            <th>Email</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Đã thanh toán</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Checkin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $room_query = "SELECT * FROM booking_online";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rooms['orderId'] ?></td>
                                    <td><?php echo $rooms['hoten'] ?></td>
                                    <td><?php echo $rooms['cccd'] ?></td>
                                    <td><?php echo $rooms['id_phong'] ?></td>
                                    <td><?php echo $rooms['email'] ?></td>
                                    <td><?php echo $rooms['checkin'] ?></td>
                                    <td><?php echo $rooms['checkout'] ?></td>
                                    <td><?php echo $rooms['sotien'] ?></td>
                                    <td><?php echo $rooms['ngaytao'] ?></td>
                                    <td>
                                        <?php echo $rooms['trangthai'] ?>
                                    </td>
                                    <td>
                                        <?php if ($rooms['trangthai'] == "Dat thanh cong") {
                                        ?>
                                            <!-- data-bs-toggle="modal" data-bs-target="#thongtinKH" -->
                                            <button title="Checkin" style="border-radius: 2px;" data-id="<?php echo $rooms['id']; ?>" id="checkinOnline" class="btn  btn-info">CheckIn</button>

                                        <?php
                                        } else {
                                        ?>
                                            <a name="" id="" class="btn btn-info" href="index.php?khachhang" role="button">Xem</a>

                                        <?php
                                        }
                                        ?>
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
