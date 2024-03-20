<!DOCTYPE html>
<html lang="es">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link
			rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css"
			integrity="sha512-t38vG/f94E72wz6pCsuuhcOPJlHKwPy+PY+n1+tJFzdte3hsIgYE7iEpgg/StngunGszVMrRfvwZinrza0vMTA=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link
			rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
			integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>.:SKALM:.</title>
	<style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
	</style>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script
		src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"
		integrity="sha512-m2PhLxj2N91eYrIGU2cmIu2d0SkaE4A14bCjVb9zykvp6WtsdriFCiXQ/8Hdj0kssUB/Nz0dMBcoLsJkSCto0Q=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
		src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"
		integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).ready(function () {
		$(".dropdown-trigger").dropdown({
			hover: true,
			constrain_width: false,
			gutter: 25,
			belowOrigin: true,
			alignment: "right"
		});
	});
</script>
<header>
	<div class="navbar-fixed blue-grey darken-4">
		<nav>
			<div class="nav-wrapper blue-grey darken-4">
				<a href="#" class="brand-logo">SKALM ᛋᚲᚨᛚᛗ</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="/">Inicio</a></li>
					<li><a href="/bikersQR">Tarjeta QR</a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<main class="blue-grey darken-3">
