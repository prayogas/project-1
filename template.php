<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sya'BaNdz :: Doc's</title>
    <link rel="icon"       type="image/x-icon" href="bootstrap/images/sya.png" >
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/animate.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/themes/all-themes.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="theme-red">
   <!--  <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Tunggu Sebentar Yaa ...</p>
        </div>
    </div> -->
    <?php  
    include "sidebar.php";
    ?>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-table.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="bootstrap/js/waves.js"></script>
    <script type="text/javascript" src="bootstrap/js/admin.js"></script>
    <script type="text/javascript" src="bootstrap/js/demo.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="bootstrap/js/autosize.js"></script>
    <script type="text/javascript" src="bootstrap/js/moment.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript" src="bootstrap/js/basic-form-elements.js"></script>
    <script type="text/javascript" src="bootstrap/js/chart.js"></script>
    <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 96]
            }
        ]
      };
      var pdata = [
        {
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
    </script>
</body>
</html>