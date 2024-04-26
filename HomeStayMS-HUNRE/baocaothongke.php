<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Báo cáo thống kê</li>
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
            <div class="panel-heading">Báo cáo thống kê
                <!-- BUTTON bật tắt khối #addRoom -->
                <a name="" id="" class="btn btn-primary" href="index.php?baocao&from=" role="button">Tháng trước</a>
                <a name="" id="" class="btn btn-primary" href="index.php?baocao&thismonth=" role="button">Tháng này</a>
                <a name="" id="" class="btn btn-primary" href="index.php?baocao" role="button">Toàn bộ</a>

            </div>
            <div class="panel-body">
                <?php
                if(isset($_GET['from'])){
                    $query ="SELECT ngay, SUM(sotien) as total FROM phieuthu WHERE ngaytao >= '2023-11-01' AND ngaytao < '2023-12-02' GROUP BY ngay";
                }else if(isset($_GET['thismonth'])){
                    $query ="SELECT ngay, SUM(sotien) as total FROM phieuthu WHERE ngaytao >= '2023-12-1' AND ngaytao < '2023-12-30' GROUP BY ngay";
                }else {

                    $query = "SELECT ngay, SUM(sotien) as total FROM phieuthu GROUP BY ngay ";
                }
                $result = mysqli_query($connection, $query);
                
                $dataFromDatabase = array();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $dataFromDatabase[] = $row;
                    }
                }
                ?>
                <canvas id="incomeChart" width="400" height="200"></canvas>

            </div>
        </div>

    </div>
</div>
<br>
<script>
        var ctx = document.getElementById('incomeChart').getContext('2d');
        var data = <?php echo json_encode($dataFromDatabase); ?>;
                console.log(data);
        var labels = data.map(function(item) {
            console.log(item.ngay);
            return item.ngay;
        });

        var values = data.map(function(item) {
            return item.total;
        });

        var incomeData = {
            labels: labels,
            datasets: [
                {
                    label: 'Thu nhập',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        };

        var incomeChart = new Chart(ctx, {
            type: 'line',
            data: incomeData
        });
</script>