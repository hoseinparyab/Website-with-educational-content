<?php include 'header.php';
include 'config/aout.php';
function persian_to_english($string) {
    return strtr($string, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
}
$result = $conn->prepare("SELECT * FROM store");
$result->execute();
$tranactions = $result->fetchall(PDO::FETCH_ASSOC);
$timeNow = time();
$timeYearNow =  strtotime(jalali_to_gregorian(jdate("Y",$timeNow),"1","1","/"));
$timeNextYear =  strtotime(jalali_to_gregorian(jdate("Y",($timeNow+31536000)),"1","1","/"));
$result = $conn->prepare("SELECT * FROM store WHERE time > $timeYearNow AND time < $timeNextYear");
$result->execute();
$records = $result->fetchall(PDO::FETCH_ASSOC);
$months = [
    "1" => 0,
    "2" => 3,
    "3" => 5,
    "4" => 0,
    "5" => 0,
    "6" => 1,
    "7" => 0,
    "8" => 0,
    "9" => 0,
    "10" => 0,
    "11" => 0,
    "12" => 0
];
foreach($records as $record){
    $month = persian_to_english(jdate("m",$record["time"]));  
    switch($month){
        case 1:
            $months["1"] = $months["1"] +1;
            break;
        case 2:
                $months["2"] = $months["2"] +1;
                break;
        case 9:
            $months["9"] = $months["9"] +1;
            break;
        case 10:
            $months["10"] = $months["10"] +1;
            break;
        case 11:
            $months["11"] = $months["11"] +1;
            break;
        case 12:
            $months["12"] = $months["12"] +1;
            break;
    }
}
// echo "<pre style='text-align: left;'>";
// var_dump($months);
$data = json_encode($months);
?>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
    integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var data_chart = JSON.stringify(<?= $data ?>)
var data_values = []
$.each(JSON.parse(data_chart), function(index, value) {
    data_values.push(value)
})
</script>
<div class="row">
    <div class="col-12 col-lg-6">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>

<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['فروردین', 'اردیبهشت', 'خرداد', '4', '3', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
            label: '# of Votes',
            data: data_values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php include 'footer.php'; ?>