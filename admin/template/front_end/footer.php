<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/lib/chart/chart.min.js"></script>
    <script src="public/lib/easing/easing.min.js"></script>
    <script src="public/lib/waypoints/waypoints.min.js"></script>
    <script src="public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="public/lib/tempusdominus/js/moment.min.js"></script>
    <script src="public/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- datatable -->
    
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!-- Template Javascript --> 
    <script src="public/js/main.js"></script>
    <script>
        $(document).ready( function () {
            $('#my_table').DataTable();
        } );      
    </script>

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
    'title':'Biểu đồ thống kê trạng thái đơn hàng HIGH TECH', 
    'width':850, 
    'height':700};
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