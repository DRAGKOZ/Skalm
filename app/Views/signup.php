<div class="container mt-5">
	<div class="row justify-content-md-center">
		<div class="">
			<h2 style="color: white">Registrar usuario</h2>
			<form id="formSignUp" name="formSignUp" method="POST">
				<div class="row">
					<div class="input-field inline col s4">
						<input id="name" name="name" type="text" class="validate" required>
						<label for="name">Nombre *</label>
					</div>
					<div class="input-field inline col s4">
						<input id="lastName" name="lastName" type="text" class="validate" required>
						<label for="lastName">Primer apellido * </label>
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
					<button id="btnSend" name="btnSend" type="submit" class="btn btn-dark blue">Registrarse</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--suppress JSUnresolvedReference -->
<script>
	$(document).ready(function () {
		let toastHTML;
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
					$("#skalmLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: obj.offset().left,
						top: obj.offset().top,
						width: obj.width(),
						height: obj.height(),
						zIndex: 999999
					}).focus();
				},
				success: function () {
					toastHTML = "<span>Registro exitoso!!</span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					setTimeout(function () {
						window.location.href = "<?=base_url ();?>";
					}, 2000);
				},
				error: function (data) {
					const errors = data.responseJSON.reason;
					if ((typeof errors) === "object") {
						$.each(errors, function (index, value) {
							toastHTML = "<span>" + value + "</span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						});
					} else {
						toastHTML = "<span>" + errors + "</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					}
				},
				complete: function () {
					$("#skalmLoader").css({
						display: "none"
					});
				},
			});
		});
		$("#nickname").on("input", function () {
			$.ajax({
				url: "/validateNickname",
				data: {nickname: $("#nickname").val()},
				dataType: "JSON",
				method: "POST",
				beforeSend: function () {
					const obj = $(formSignUp);
					$("#skalmLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: obj.offset().left,
						top: obj.offset().top,
						width: obj.width(),
						height: obj.height(),
						zIndex: 999999
					}).focus();
				},
				success: function () {
					M.Toast.dismissAll();
					toastHTML = "<span>Nickname valido!</span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 5000, duration: 4000});
				},
				error: function (data) {
					M.Toast.dismissAll();
					const errors = data.responseJSON.reason;
					if ((typeof errors) === "object") {
						$.each(errors, function (index, value) {
							toastHTML = "<span>" + value + "</span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						});
					} else {
						toastHTML = "<span>" + errors + "</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					}
				},
				complete: function () {
					$("#skalmLoader").css({
						display: "none"
					});
				},
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

    input {
        color: white;
    }
</style>