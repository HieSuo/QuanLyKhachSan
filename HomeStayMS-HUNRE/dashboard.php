<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Dashboard</li>
    </ol>
</div>

<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-bed color-blue"></em>
                    <div class="large"><?php include 'counters/sophong.php' ?></div>
                    <div class="text-muted">Phòng</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-bookmark color-orange"></em>
                    <div class="large"><?php include 'counters/soloaiphong.php' ?></div>
                    <div class="text-muted">Loại phòng</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large"><?php include 'counters/songuoidung.php' ?></div>
                    <div class="text-muted">Người dùng</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-comments color-red"></em>
                    <div class="large"><?php include 'counters/sodichvu.php' ?></div>
                    <div class="text-muted">Dịch vụ</div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <hr>

    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-reorder color-red"></em>
                    <div class="large"><?php include 'counters/phongtronghomnay.php' ?></div>
                    <div class="text-muted">Phòng trống hôm nay</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-check-circle color-green"></em>
                    <div class="large"><?php include 'counters/phongdangsudung.php' ?></div>
                    <div class="text-muted">Phòng đang được sử dụng</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-check-square-o color-magg"></em>
                    <div class="large"><?php include 'counters/sokhachhang.php' ?></div>
                    <div class="text-muted">Số khách hàng hiện tại</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-spinner color-blue"></em>
                    <div class="large"><?php include 'counters/bookonline.php' ?></div>
                    <div class="text-muted">Số phòng đặt online</div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <hr>

    <div class="row">
        <div class="col-xs-6 col-md-2 col-lg-2 no-padding">

        </div>

        <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
            <div class="panel panel-red panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-money color-red"></em>
                    <div class="large">$<?php include 'counters/tongthu.php' ?></div>
                    <div class="text-muted">Tổng thu</div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
            <div class="panel panel-orange panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-credit-card color-purp"></em>
                    <div class="large">$<?php include 'counters/tongchi.php' ?></div>
                    <div class="text-muted">Tổng chi</div>
                </div>
            </div>
        </div> -->
        <div class="col-xs-6 col-md-2 col-lg-2 no-padding">

        </div>
    </div><!--/.row-->
</div>