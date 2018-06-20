<!doctype html>
<html lang="pl">
<head>
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116276306-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-116276306-1');
    </script>

    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- moje CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Animacje -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
     
    <title>Astrofotografia</title>
</head>

<body>      
    <div class="container1">
        <div class="container">                             
            <div class="row" id="row-menu">
		<div class="col-md-12 header1">
			<a class="btn btn-outline-primary button animated fadeInLeftBig" href="index.php" role="button">HOME</a>
			<a class="btn btn-link button animated fadeInLeftBig" href="galeria.html" role="button">GALERIA</a>
			<a class="btn btn-link button animated fadeInLeftBig" href="obserwatorium.php" role="button">ATACAMA</a>
			<a class="btn btn-link button animated fadeInLeftBig" href="setup.html" role="button">SPRZĘT</a>
			<a class="btn btn-link button animated fadeInLeftBig" href="budowa.html" role="button">BUDOWA astrobudki</a>  
		</div>			   
            </div> 
        </div>
        <div class="container"> 
                <div class="row" >
                    <div class="col-md-12 header1">
                        <h1 class="text1 text-center">A<small id="textSmall">trakcyjna</small>T<small id="textSmall">otalnie</small>A<small id="textSmall">matorska</small>C<small id="textSmall">ałoroczna</small>A<small id="textSmall">groturystyczna</small>M<small id="textSmall">iejscówka</small>A<small id="textSmall">stronomiczna</small></h1>             
                    </div>
                </div> 
        </div> 
        <!--php-->
		<div class="container text1" >	
			<?php

			$servername = "xxx";
			$username = "xxx";
			$password = "xxx";
			$dbname = "sensors";
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "select * from sensors order by Id desc limit 1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo" | "."<b>Data:</b> ". $row["Data"]." | ".
					 "<b>Temperatura:</b> ". $row["Temp"]."*C"." | ".
					 "<b>Wilgotniść:</b> ". $row["Hum"]."%"." | ".
					 "<b>Punkt rosy:</b> ". $row["DefPoint"]."*C"." | ".
					 "<b>Chmury:</b> ". $row["Clouds"]." | ".
					 "<b>Opady:</b> ". $row["Rain"]." | ".
					 "<b>Ciśnienie:</b> ". $row["Presurre"]."Hpa"." | ";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
			?>		
		</div>
 
		<!--wykres-->
		
		<div class="container">
			<div class="row">
				<?php
				$connect = mysqli_connect("xxx", "xxx", "xxx", "sensors");
				$query = 'select Temp,UNIX_TIMESTAMP(CONCAT_WS(" ", Data)) AS datetime from sensors order by Data DESC limit 500';
				$result = mysqli_query($connect, $query);
				$rows = array();
				$table = array();

				$table['cols'] = array(
				 array(
				  'label' => 'Date Time', 
				  'type' => 'datetime'
				 ),
				 array(
				  'label' => 'Temperatura (°C)', 
				  'type' => 'number'
				 )
				);

				while($row = mysqli_fetch_array($result))
				{
				 $sub_array = array();
				 $datetime = explode(".", $row["datetime"]);
				 $sub_array[] =  array(
					  "v" => 'Date(' . $datetime[0] . '000)'
					 );
				 $sub_array[] =  array(
					  "v" => $row["Temp"]
					 );
				 $rows[] =  array(
					 "c" => $sub_array
					);
				}
				$table['rows'] = $rows;
				$jsonTable = json_encode($table);
				?>


				<html>
				 <head>
				  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				  <script type="text/javascript">
				   google.charts.load('current', {'packages':['corechart']});
				   google.charts.setOnLoadCallback(drawChart);
				   function drawChart()
				   {
					var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

					var options = {
					 title:'DHT22',
					 legend:{position:'bottom'},
					 chartArea:{width:'95%', height:'65%'}
					};

					var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

					chart.draw(data, options);
				   }
				  </script>
				  <style>
				  .page-wrapper
				  {
				   width:1000px;
				   margin:0 auto;
				  }
				  </style>
				 </head>  
				 <body>
				  <div class="page-wrapper">
				   <br />
				   <h2 class="text1" align="center">Wykres temperatury</h2>
				   <div id="line_chart" style="width: 100%; height: 300px"></div>
				  </div>
				 </body>
				</html>
			</div>
		</div>

		<div class="container" >                             
             <div class="row">          
                <div class="col-md-5 col-sm tabela-left" style="padding-top: 30px">
                    <row>
                        <img src="https://www.meteo.pl/um/metco/mgram_pict.php?ntype=0u&amp;row=482&amp;col=218&amp;lang=pl" class="border img-fluid" id="image_60 ICM" alt="miasto" width="450" height="540" style="margin-bottom: 50px">
                    </row> 
                       
                       
                    <row>  
                        <!--Google map-->

                        <div class="card border-primary" id="googleMap" style="width:270px;height:270px;" ></div>

                        <script>
                        function myMap() {
                            var location = {lat: 49.483,lng: 19.138};
                            var mapProp= {
                                center:new google.maps.LatLng(49.483,19.138),
                                zoom:10,
                                center: location
                            };
                            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            var marker = new google.maps.Marker({
                                position: location,
                                map: map
                            });
                        }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAq20hz3xncASUVsPoiIDi_mZJ618Ieles&callback=myMap"></script> 
                    </row>                    
                </div>
                <div class="col-md-7 col-sm tabela-right" style="padding-top: 30px">           
                    <div class="container selector-for-some-widget" >
			<p class="text1">Kamerka AllSky</p>
			<img class="card border-primary img-fluid" src="allsky/image.jpg" width="500" height="380">
		    </div>
                    
                    <div class="container">
                        <h1 class="text1">A T A C A M A</h1>
                        <p class="text1">Obecnie w obserwatorium na montażu HEQ5 Pro zamontowany jest Newton SkyWatcher 150-750 z TS72APO jako guider.
                            Detektor to kamerka Atik428ex mono. Jako komputer do prowadzenia sesji używany jest RaspberryPi3 z systemem <a href="https://github.com/rkaczorek/astroberry-server">AstroberryServer</a> i programami kStars i EKos. <br>
Tutaj szczególne podziekowania dla Radka Kaczorka, za bezcenne rady i wszelką pomoc.                                                       
                         <div id="telep">
                             <img class="card border-primary img-fluid" src="images/newton.jpg" alt="Teleskop" width="450" height="320">
                         </div>                       
                    </div>       
                </div>
             </div>               
        </div>  
   </div>
          <!-- footer -->
    <div class="container1">                             
        <div class="container">
            <div class="row">
                <div class="col-md-12 header1">
                    <p class="text1">Copyright &copy; Dariusz Nowakowski 2018</p>                    
                </div>
            </div>
        </div>     
    </div>
    
    <!---Jquery-->
    <script src="js/jquery-3.2.1.min.js"></script>
   
    <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
   
</body>
</html>
