<?php error_reporting(E_ALL); ?>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Test Page PHP</title>
<body>
<?php
include ("header.php");
?>
	<div id="indexBG"></div>
	<div class="container">
		<div id="carousel_Content" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel_Content" data-slide-to="0" class="active"></li>
				<li data-target="#carousel_Content" data-slide-to="1"></li>
				<li data-target="#carousel_Content" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="/DocApp/images/background.png" alt=""
						style="width: 100%;">
				</div>

				<div class="item">
					<img src="/DocApp/images/happyfull.jpg" alt="" style="width: 100%;">
				</div>

				<div class="item">
					<img src="/DocApp/images/happydentwhite.jpg" alt=""
						style="width: 100%;">
				</div>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#carousel_Content"
				data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a> <a class="right carousel-control" href="#carousel_Content"
				data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div id="contentQuemSomos"></div>
</body>
