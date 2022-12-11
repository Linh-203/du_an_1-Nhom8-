<?php 
session_start();
   include "../model/connect.php";
   $query = "SELECT category.id, category.categoryName, COUNT(products.id) AS 'So_luong'  FROM category JOIN products ON category.id = products.categoryId GROUP BY category.id, category.categoryName";

   $thong_ke= getAll($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy API</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="shortcut icon" href="../src/images/logoap.png" type="image/x-icon" >
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
 <style>
    table, tr,th,td{
        border: none;
        text-align: center;
     }
     td{
        background-color: white;
     }
     tr{
        border-bottom: 15px solid rgba(230, 234, 241, 1);
     }
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 30px;
        overflow: hidden scroll;
    }
    
    #action{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #delete{
        color: red;
    }
    #update{
        color: darkorange;
        margin-right: 10px;
    }
    th,td{
        padding: 10px;
    }
    .right{
        display: flex;
        align-items: center;
    }
   
    
 </style>
<body>
<div id="piechart"></div>
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
  $sumCart = count($thong_ke);
  foreach($thong_ke as $value){
   if($i == $sumCart) $coma =""; else $coma = ",";
   echo "['".$value["categoryName"]."',".$value["So_luong"]."]".$coma;
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

</html>