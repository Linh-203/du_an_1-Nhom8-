<?php 
 include "../model/connect.php";

 $query ="SELECT COUNT(users.id) AS 'quantity' FROM users WHERE users.role = 1";
 $user = getOne($query);

 $query ="SELECT COUNT(oder.id) AS 'quantity' FROM oder ";
 $oder = getOne($query);

 $query ="SELECT COUNT(comment.content) AS 'quantity' FROM comment ";
 $comment = getOne($query);

 $query ="SELECT COUNT(category.id) AS 'quantity' FROM category ";
 $cate = getOne($query);

 $query ="SELECT SUM(products.quantity) AS 'quantity' FROM products ";
 $product = getOne($query);
 
//  $query = "SELECT category.id, category.categoryName, COUNT(products.id) AS 'So_luong'  FROM category JOIN products ON category.id = products.categoryId GROUP BY category.id, category.categoryName";
//  $thong_ke= getAll($query);
 $query = "SELECT oder.status as name,
    COUNT(*) AS 'So_luong'
    FROM oder  
   GROUP BY oder.status";
   $thong_ke= getAll($query);
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
echo json_encode($arr);
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
     
    <h3>Tổng số lượng khách hàng: <?php echo $user["quantity"] ?></h3>
   
    <h3>Tổng số lượng sản phẩm: <?php echo $product["quantity"] ?></h3>
    <h3>Tổng số loại sản phẩm: <?php echo $cate["quantity"] ?></h3>
    <h3>Tổng đơn hàng: <?php echo $oder["quantity"] ?></h3>
    <h3>Tổng bình luận: <?php echo $comment["quantity"] ?></h3>
      <!-- google charts -->
    <div id="piechart"></div>
       <!-- end google charts -->

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

   <form action="" method="post">
    <label for="">Lọc theo</label>
     <select name="category" id="">
      <option value="6">1 tuần</option>
      <option value="29">1 tháng </option>
     </select>
     <button name="submit" type="submit">Lọc</button>
   </form>
</body>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Thống kê hàng hóa'],
  <?php 
  $i = 1;
  $status="";
  $sumCart = count($thong_ke);

  foreach($thong_ke as $value){
    if($value["name"]==0){
      $value["name"] = "Chờ xác nhận" ;
    }else if($value["name"]==1){
      $value["name"] = "Chờ lấy hàng" ;
    }
    else if($value["name"]==2){
      $value["name"] = "Đang giao" ;
    }else if($value["name"]==3){
      $value["name"] = "Đã hoàn thành" ;
    }else if($value["name"]==4){
      $value["name"] = "Đã hủy" ;
    }
   if($i == $sumCart) $coma =""; else $coma = ",";
   echo "['".$value["name"]."',".$value["So_luong"]."]".$coma;
   $i+=1;

  }
  ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {
    'title':'Biểu đồ thống kê hàng hóa HIGH TECH', 
    'width':650, 
    'height':500};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

</script>
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