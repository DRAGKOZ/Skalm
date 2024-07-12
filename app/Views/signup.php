<div class="container mt-5">
	<div class="row justify-content-md-center">
		<div class="">
			<h2>Registrar usuario</h2>
			<form id="formSignUp" name="formSignUp" method="POST">
				<div class="row">
					<div class="input-field inline col s4">
						<input id="name" name="name" type="text" class="validate " required>
						<label for="name">Nombre *</label>
					</div>
					<div class="input-field inline col s4">
						<input id="lastname" name="lastname" type="text" class="validate" required>
						<label for="lastname">Primer apellido * </label>
					</div>
					<div class="input-field inline col s4">
						<input id="sureName" name="sureName" type="text" class="validate">
						<label for="sureName">Segundo apellido</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field inline col s6">
						<input id="birthday" name="birthday" type="text" class="validate datepicker" required>
						<label for="birthday">Fecha de nacimiento *</label>
					</div>
					<div class="input-field inline col s6">
						<select id="gender" name="gender" class="validate ">
							<option value="" disabled selected>Escoge una opción</option>
							<option value="Femenino">Femenino</option>
							<option value="Masculino">Masculino</option>
							<option value="Otro">Otro</option>
						</select>
						<label for="gender">Genero *</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field inline col s4">
						<input id="nickname" name="nickname" type="text" class="validate" required>
						<label for="nickname">Nickname *</label>
					</div>
					<div class="input-field inline col s4">
						<input id="email" name="email" type="email" class="validate" required>
						<label for="email">Correo *</label>
						<span class="helper-text" data-error="formato erróneo"></span>
					</div>
					<div class="input-field inline col s4">
						<input id="phone" name="phone" type="text">
						<label for="phone">Teléfono</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field inline col s6">
						<input
								id="password" name="password" type="password" class="validate" data-length="256"
								minlength="8" required>
						<label for="password">Contraseña</label>
						<span
								class="helper-text"
								data-error="longitud minima de 8 caracteres (mayúsculas, minúsculas, números)"></span>
					</div>
					<div class="input-field inline col s6">
						<input
								id="passwordConfirm" name="passwordConfirm" type="password" class="validate"
								data-length="256" minlength="8" required>
						<label for="passwordConfirm">Repetir contraseña</label>
						<span
								class="helper-text"
								data-error="longitud minima de 8 caracteres (mayúsculas, minúsculas, números), contraseña no coincide"></span>
					</div>
				</div>
				<div class="d-grid">
					<button id="btnSend" name="btnSend" type="submit" class="btn btn-dark blue  ">Registrarse</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--suppress JSUnresolvedReference -->
<script>
	$(document).ready(function () {
		let now = new Date("now");
		const formSignUp = $("#formSignUp");
		$("select").formSelect();
		$("input#password, input#passwordConfirm").characterCounter();
		$(".datepicker").datepicker({
			defaultDate: new Date((new Date().getFullYear() - 18) + "-" + (new Date().getMonth() + 1) + "-" + new Date().getDate()),
			minDate: new Date((now.getFullYear() - 99) + "-01-31"),
			maxDate: new Date("now"),
			yearRange: [new Date().getFullYear() - 90, new Date().getFullYear() - 18],
			i18n: {
				months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
				monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
				weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
				weekdaysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
				weekdaysAbbrev: ["D", "L", "M", "MI", "J", "V", "S"]
			}
		});
		formSignUp.on("keyup change", function () {
			const validation = 1;
			const btn = $("#btnSend");
			btn.disabled = validation === 0;
		});
		formSignUp.on("submit", function (e) {
			e.preventDefault();
			const formData = {};
			$(this).serializeArray().forEach(function (item) {
				formData[item.name] = item.value;
			});
			const jsonData = JSON.stringify(formData);
			$.ajax({
				url: "/signup",
				dataType: "json",
				data: jsonData,
				processData: false,
				contentType: false,
				method: "POST",
				beforeSend: function () {
					const obj = $(formSignUp);
					const left = obj.offset().left;
					const top = obj.offset().top;
					const width = obj.width();
					const height = obj.height();
					// $("#skalmLoader").delay(50000).css({
					// 	display: "block",
					// 	opacity: 1,
					// 	visibility: "visible",
					// 	left: left,
					// 	top: top,
					// 	width: width,
					// 	height: height,
					// 	zIndex: 999999
					// }).focus();
				},
				success: function (data) {
					console.log(data);
				},
				error: function (data) {
				}
			});
		});
	});
</script>
<style>
    .input-field.inline.col {
        margin: 0 !important;
    }

    .row {
        margin-bottom: 0 !important;
    }
</style>