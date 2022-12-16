<?php 
 include "../model/connect.php";
 
   $max_date = "";
 if(isset($_POST["submit"])){
      $max_date = $_POST["category"];
 }else{
  $max_date = 6;
 }
 
$arr =[];
$today = date('d');
 $query = "SELECT DATE_FORMAT(received_date,'%e-%m') AS Ngay, SUM(total) as doanh_thu FROM oder 
 WHERE DATE(received_date) >= CURDATE() - INTERVAL $max_date  DAY 
 GROUP BY DATE_FORMAT(received_date,'%e-%m')";
 $hight_chart = getAll($query);
//  var_dump($hight_chart);

if($today <= $max_date){
$get_day_last_month = $max_date- $today;
$last_month = date('m', strtotime("-1 month"));
$last_month_date = date('Y-m-d', strtotime("-1 month"));
$max_day_last_month = (new DateTime($last_month_date))->format('t');
$start_day_last_month= $max_day_last_month - $get_day_last_month;
for($i = $start_day_last_month; $i <= $max_day_last_month; $i++){
  $key = $i .'-'.$last_month;
  $arr[$key]=0;

}
    $index =1;
}else{
     $index = $today - $max_date;
}
$this_month = date('m');
for($i = $index; $i <= $today; $i++){
  $key = $i .'-'.$this_month;
  $arr[$key]=0;
  
}
foreach($hight_chart as $value){
   $arr[$value["Ngay"]] = $value["doanh_thu"];

}
// echo json_encode($arr);
$arrX = array_keys($arr);
$arrY = array_values($arr);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<style>
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 360px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
<body>
   

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<!-- google charts -->
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
  </p>
</figure>

   <form action="" method="post" style="display: flex;">
     <select name="category" id="" style="width: 100px;">
      <option value="6">1 tuần</option>
      <option value="29">1 tháng </option>
     </select>
     <button name="submit" type="submit" style="width: 100px;border: 1px solid #2e6da4;background-color: #2e6da4;color:white;border-radius: 4px;">Lọc</button>
   </form>
</body>

<!-- end google charts -->
<script>
    Highcharts.chart('container', {

title: {
  text: 'Biểu đồ thống kê doanh thu HIGH TECH trong 1 tuần'
},

subtitle: {
  text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>'
},

yAxis: {
  title: {
    text: 'HIGH TECH 2022'
  }
},

xAxis: {
    categories: <?php echo json_encode($arrX) ?>,
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},



series: [{
  name: 'Doanh thu',
  data: <?php echo json_encode($arrY) ?>
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
</script>
</html>