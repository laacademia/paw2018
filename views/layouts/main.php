<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Este es el layout principal</title>
</head>
<body>
	<header class="bar-container">
		<!-- <h1>Layout Principal</h1> -->
		<nav id="main-menu">
			<ul>
				<li><a href="/app/?c=productos&a=inicio">Inicio</a></li>
				<li><a href="/app/?c=productos&a=test">Test</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">Link 3</a></li>
			</ul>
		</nav>
	</header>
	<section id="main-container">
		<h2>Aca le estamos metiendo el contenido de la vista que llama la accion del controlador</h2>	
		<div class="bar-container"><?=$title?></div>		
		<div class="view-container"><?=$content?></div>					
	</section>
	<footer></footer>
</body>
</html>