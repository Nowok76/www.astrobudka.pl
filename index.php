<!doctype html>
<html lang="en">

<head>
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116276306-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-116276306-1');
    </script>
  <!------------------------ Required meta tags -------------------->
    <meta charset="utf-8">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="Keywords" content="astronomia, astrofotografia, astrofoto, astrobudka, hobby">
	<meta name="description" content="Strona poświęcona mojej pasji, jaką jest astronomia. Znajdziesz tutaj zdjęcia, oraz opis budowy mojego obserwatorium.	Zapraszam również do ogladania moich astrofotigrafii." />
    <!------------------------- Bootstrap CSS------------------------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!--------------------------OWL------------------------------>
    <link rel="stylesheet" href="css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl/owl.theme.default.min.css">

    <!----------------------------- moje CSS -------------------->
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<meta name="google-site-verification" content="xs4LeTu6x_xWRv9mOU3879C-Jjrht1d5H2QjLDe3LGk" />
    <title>Astrofotografia - Dariusz Nowakowski</title>
</head>
<body data-spy="scroll" data-target=".fixed-top" data-offset="65">
    <!------HEADER----->
    <header>
        <nav class="navbar navbar-expand-lg  fixed-top " role="navigation">
            <div class="container-fluid">
                <div class="col-md-10">
                    <div class="astro-nav-wraper">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#astro-menu">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="astro-menu">
                            <ul class="nav navbar-nav">
                                <li><a class="smooth-scroll nav-item nav-link hvr-bounce-to-top" href="#home">HOME</a></li>
                                <li><a class="smooth-scroll nav-item nav-link hvr-bounce-to-top" href="#info">INFO</a></li>
                                <li><a class="smooth-scroll nav-item nav-link hvr-bounce-to-top" href="#galeria">GALERIA</a></li>
                                <li><a class="smooth-scroll nav-item nav-link hvr-bounce-to-top" href="#budowa">BUDOWA astrobudki</a></li>
                                <li><a class="smooth-scroll nav-item nav-link hvr-bounce-to-top" href="#setup-section">SPRZĘT</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <ul>
                        <a id="ikona-navbar" href="https://www.facebook.com/darek.nowakowski.754" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a id="ikona-navbar" href="https://github.com/Nowok76" target="_blank"><i class="fab fa-github-square fa-2x"></i></a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!------HOME----->
    <section id="home">
        <div id="home-cover" class="bg-parallax animated fadeIn">
            <div id="home-content-box">
                <div id="home-content-box-inner">
                    <div id="home-heading" class="animated zoomIn">
                        <h1>ASTROFOTOGRAFIA</h1>
			<h2 id="opis-home">Strona poświęcona mojej pasji, jaką jest astronomia. Znajdziesz tutaj zdjęcia, oraz opis budowy mojego obserwatorium.
			Zapraszam również do ogladania moich astrofotigrafii.</h2>
                    </div>
                    <div id="home-btn" class="animated zoomIn">
                        <a class="btn btn-lg btn-general btn-white" href="obserwatorium.php" role="button">ATACAMA                        
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------INFO----->
    <section id="info">
        <div id="info-heading" class="container1 ">
            <h2 id="info-text">Pogoda</h2>
        </div>
        <!----php---->
		<div class="container1 text1" >	
			<?php

			$servername = "xxx";
			$username = "xxx";
			$password = "xxx";
			$dbname = "sensors";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "select * from sensors order by Id desc limit 1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

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
        <div id="info-row" class="row container1">
            <div id="info-icm" class="col-md-5 col-sm-12">
                <img src="https://www.meteo.pl/um/metco/mgram_pict.php?ntype=0u&amp;row=482&amp;col=218&amp;lang=pl" class="border img-fluid" id="image_60" alt="miasto" width="500" height="600" style="margin-bottom: 50px">
            </div>
            <div id="moon" class="col-md-4 col-sm-12">
                <script type="text/javascript" src="http://moonphases.co.uk/js/widget.js" id="moonphase_widget" widget="wide" lat="" lng="" date="" tz=""></script>
                <img id="sat24" class="img-fluid" src="http://api.sat24.com/animated/PL/visual/1/Central%20European%20Standard%20Time/7504660" width="410" height="300">
            </div>
            <div class="col-md-3 col-sm-12">
                <script type="text/javascript" src="//rf.revolvermaps.com/0/0/6.js?i=5vnf56l3yn8&amp;m=7&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
            </div>
        </div>
    </section>
    <!------GALERIA----->
    <section id="galeria">
        <div id="galeria-cover" class="bg-parallax animated fadeIn">
            <div id="galeria-content-box">
                <div id="galeria-content-box-inner">
                    <div class="service-item-icon wow rollIn">
                        <i class="far fa-images fa-6x"></i>
                    </div>
                    <div id="home-heading" class="wow bounceInDown">
                        <h2>Galeria astrofoto</h2>
                    </div>
                    <div class="container">                             
                        <div id="gallery-boton" class="gallery row">
                            <div><h3 class="text1 text-center">Mgławice</h3>
                                <a href="nebulas.html"><img src="images/galeria/M78_s.JPG" alt=""></a>
                            </div>
                            <div><h3 class="text1 text-center">Galaktyki</h3>
                                <a href="galaktyki.html"><img src="images/galeria/M101_s.JPG" alt=""></a>
                            </div>
                            <div><h3 class="text1 text-center">Gromady</h3>
                                <a href="gromady.html"><img src="images/galeria/M12_s.JPG" alt=""></a>
                            </div> 
                        </div> 
		            </div>
                </div>
            </div>
        </div>
    </section>
    <!------BUDOWA BUDKI----->
    <section id="budowa">
        <div id="budowa-cover" class="container1 animated fadeIn height: auto">
            <div id="budowa-content-box">
                <div id="budowa-content-box-inner">
                    <div id="home-heading" class="wow lightSpeedIn">
                        <h2>Budowa obserwatorium</h2>
                    </div>
                    <div id="home-btn" class="animated zoomIn">
                        <a class="btn btn-lg btn-general btn-white" href="budowa.html" role="button">BUDOWA</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="fotki-budowa" class="owl-carousel owl-theme wow bounceIn">
                    <div class="foto-budowa">
                        <img src="images/buda/20170616_101431s.jpg" class="img-responsive" alt="foto budowa">
                    </div>
                    <div class="foto-budowa">
                        <img src="images/buda/20170616_134352s.jpg" class="img-responsive" alt="foto budowa">
                    </div>
                    <div class="foto-budowa">
                        <img src="images/buda/20170621_164017s.jpg" class="img-responsive" alt="foto budowa">
                    </div>
                    <div class="foto-budowa">
                        <img src="images/buda/20170621_164047s.jpg" class="img-responsive" alt="foto budowa">
                    </div>
                    <div class="foto-budowa">
                        <img src="images/buda/20170621_184536s.jpg" class="img-responsive" alt="foto budowa">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------Sprzęt-------------->
    <section id="setup-section">
        <div id="setup-cover" class="bg-parallax">
            <div id="setup-content-box">
                <div id="setup-content-box-inner">
                    <div class="service-item-icon">
                        <i class="fa fa-camera fa-6x"></i>
                    </div>
                    <div id="home-heading" class="">
                        <h2>Sprzęt do fotografii nocnego nieba</h2>
                    </div>
                    <div class="container">                             
                        <div class="row"> 
                            <div class="col-md-6 tabela">
                                <div class="container2">  
                                   <h2 class="text1">Refraktor</h2>
                                   <p class="text2" >-  TS-Optics Photoline 72 mm, 400mm f/5,5 FPL53 Apo - 2" </p> 
                                   <p class="text2" >-  TS-Optics Flattener  / Ogniskowa refraktora zmienia się na 330mm </p>    
                                    <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                        <img class="card-img-top img-fluid" src="images/setup/ts.jpg"alt="Card image cap">
                                    </div> 
                                </div>                                   
                            </div>
                            <div class="col-md-6 tabela">
                                <div class="container2">  
                                   <h2 class="text1">Newton</h2>
                                   <p class="text2" >-  SkyWatcher 150-750 </p> 
                                   <p class="text2" >-  Korektor comy Beader Mark III </p>    
                                    <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                        <img class="card-img-top img-fluid" src="images/setup/newto.jpg"alt="Card image cap">
                                    </div> 
                                </div>    
                            </div>     
                        </div>
					 
                        <div class="row">         
                            <div class="col-md-6 tabela">
                                 <div class="container2">  
                                       <h2 class="text1">Montaż</h2>
                                       <p class="text2" >-  HEQ5 Pro / Belt mod </p> 
                                       <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                            <img class="card-img-top img-fluid" src="images/setup/heq5.jpg"alt="Card image cap">
                                        </div> 
                                 </div>                  
                            </div>
                            <div class="col-md-6 tabela">
                                <div class="container2">  
                                   <h2 class="text1">Kamera</h2>
                                   <p class="text2" >-  Atik 428ex mono </p> 
                                    <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                        <img class="card-img-top img-fluid" src="images/setup/ATIK-428EX.jpg"alt="Card image cap">
                                    </div> 
                                </div>
                            </div>                               
                        </div>
                        <div class="row"> 
                            <div class="col-md-6 tabela">     
                                <div class="container2">  
                                   <h2 class="text1">Koło filtrowe</h2>
                                   <p class="text2" >-  Quantum filter wheel x7 </p>                      
                                    <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                        <img class="card-img-top img-fluid" src="images/setup/filter_wheel.jpg"alt="Card image cap">
                                    </div> 
                                </div>
                             </div>
                            <div class="col-md-6 tabela">                         
                                <div class="container2">  
                                    <h2 class="text1">Filtry</h2>
                                    <p class="text2" >-  Beader LRGB 1,25"</p>
                                    <p class="text2" >-  Beader Halfa 7nm 1,25"</p> 
                                    <p class="text2" >-  Astrodon OIII/SII 5nm 1,25"</p>
                                    <div class="card border-primary mb-3 karta2" style="width: 18rem;">
                                        <img class="card-img-top img-fluid" src="images/setup/lrgb.jpg"alt="Card image cap">
                                    </div>
                                </div>
                            </div>     
                        </div>
		     </div>
                </div> 
            </div>
        </div>
    </section>
    <Section id="footer">
        <div class="container1">
            <div id="footer-content-box">
                <div id="galeria-content-box-inner">
                    <div id="footer-heading" class="row">
                        <div class="col-md-12">
                            <h5 class="text-left" id="footer-text">Copyright &copy; Dariusz Nowakowski 2018 www.astrobudka.pl</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>
    <!------Font-awesome------>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!---Jquery-->
    <script src="js/jquery.js"></script>
    <!---WOW-->
    <script src="js/wow/wow.min.js"></script>
    <!---------OWL--------->
    <script src="js/owl/owl.carousel.min.js"></script>
    <!-----easing------>
    <script src="js/jquery.easing.1.3.js"></script>
    <!---Custom-->
    <script src="js/custom.js"></script>
    <!-----easing------>
    <script src="js/jquery.easing.1.3.js"></script>
    <!---Custom-->
    <script src="js/custom.js"></script>
</body>
