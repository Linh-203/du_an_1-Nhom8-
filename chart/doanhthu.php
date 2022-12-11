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
 var_dump($hight_chart);

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
$arrX = array_keys($arr);
$arrY = array_values($arr);



?>

<div class="title_act" style="text-align: center;margin-top: 50px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
  </p>
</figure>
<form action="" method="post">
     <select name="category" id="">
      <option value="" hidden>Lọc theo</option>
      <option value="6">1 tuần</option>
      <option value="29">1 tháng </option>
      
     </select>
     <button name="submit" type="submit">Lọc</button>
   </form>
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
