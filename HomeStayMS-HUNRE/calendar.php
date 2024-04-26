<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">/Full Calendar</li>
    </ol>
</div><!--/.row-->
<?php
if(isset($_GET['room'])){
    $id_phong = $_GET['room'];
    $sql = "SELECT * FROM phong WHERE id_phong = $id_phong";
    $qr = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($qr);
    echo "<h1>Lịch đặt phòng ". $row['sophong']. " </h1>";
}else{
    echo "<h1>Lịch đặt phòng</h1>";
}
?>

<br>
<div id='calendar'></div>
<?php
$schedule_arr = [];
if(isset($_GET['room'])){
    $id_phong = $_GET['room'];
    
    $where = "WHERE P.id_phong = '$id_phong'";
}else{
    $where = "";
}
$schedule_qry = $connection->query("SELECT *
FROM phong P
INNER JOIN phieuthuephong PT ON P.id_phong = PT.id_phong
INNER JOIN khachhang KH ON PT.id_khachhang = KH.id_khachhang {$where}");

while ($row = $schedule_qry->fetch_assoc()) {
    $schedule_arr[] = $row;
}
?>
<script>
    var scheds = $.parseJSON('<?= isset($schedule_arr) ? json_encode($schedule_arr) : '{}' ?>');
    var events = [];
    $(document).ready(function() {

        if (Object.keys(scheds).length > 0) {
            Object.keys(scheds).map(k => {
                var data = scheds[k]
                var event_item = {
                    id: data.id_phong,
                    title: data.sophong,
                    start: data.checkin,
                    end: data.checkout,
                    backgroundColor: '#3788d8',
                    borderColor: '#3788d8',
                    allDay: data.is_whole == 1,
                    className: 'cursor-pointer'
                }
                events.push(event_item)
            })
        }


        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',
            themeSystem: 'bootstrap5',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            weekNumbers: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events
        });

        calendar.render();

    });
</script>