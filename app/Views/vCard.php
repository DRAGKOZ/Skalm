<style>
    .container {
        width: 85% !important;
    }

    .datepicker-date-display, .is-selected {
        background-color: #e53935 !important;
        color: #FFFFFFFF !important;
    }

    .is-today.is-selected {
        color: #FFFFFFFF !important;
    }

    .datepicker-cancel, .datepicker-done, .is-today {
        color: #e53935 !important;
    }

    .active, .valid {
        border-bottom: #1a237e !important;
    }

    .valid, .valid:focus {
        box-shadow: 0 1px 0 0 #1a237e !important;
    }

    .dark-input {
        color: white !important;
    }

    .dark-input:focus {
        box-shadow: 0 1px 0 0 #1a237e !important;
    }

</style>
<?php
var_dump ( base_url( '/assets/emergency.png' ));
?>
<div class="container">
	<form>
		<div class="row">
			<div class="col l6">
				<fieldset class="">
					<legend class="red darken-4">Datos personales</legend>
					<div class="input-field col s6">
						<input id="name" type="text" class="validate dark-input" required>
						<label for="name">Nombre (*)</label>
					</div>
					<div class="input-field col s6">
						<input id="lastName" type="text" class="validate dark-input" required>
						<label for="lastName">Apellidos (*)</label>
					</div>
					<div class="input-field col s6">
						<input id="alias" type="text" class="validate dark-input">
						<label for="alias">Alias</label>
					</div>
					<div class="input-field col s6">
						<input id="birth" type="text" class="datepicker dark-input" required>
						<label for="birth">Fecha de nacimiento (*)</label>
					</div>
				</fieldset>
			</div>
			<div class="col l6">
				<fieldset class="">
					<legend class="red darken-4">Datos medicos</legend>
					<div class="input-field col s6">
						<input id="blood" type="text" class="validate dark-input" required>
						<label for="blood">Tipo de sangre (*)</label>
					</div>
					<div class="input-field col s6">
						<input id="allergies" type="text" class="validate dark-input" required>
						<label for="allergies">Alergias (*)</label>
					</div>
					<div class="input-field col s12">
						<input id="nss" type="text" class="validate dark-input">
						<label for="nss">Seguro social</label>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col l12">
				<fieldset class="">
					<legend class="red darken-4">Contactos de emergencia</legend>
					<div class="input-field col s6">
						<input id="nameE1" type="text" class="validate dark-input" required>
						<label for="nameE1">Nombre (*)</label>
					</div>
					<div class="input-field col s6">
						<input id="phone1" type="text" class="validate dark-input" required>
						<label for="phone1">Teléfono (*)</label>
					</div>
					<div class="input-field col s6">
						<input id="nameE2" type="text" class="validate dark-input" >
						<label for="nameE2">Nombre </label>
					</div>
					<div class="input-field col s6">
						<input id="phone2" type="text" class="validate dark-input" >
						<label for="phone2">Teléfono</label>
					</div>
				</fieldset>
			</div>
			<div class="col l12">
				<fieldset >
					<legend class="red darken-4">Datos moteros</legend>
					<fieldset>
						<legend>Moto</legend>
						<div class="input-field col s6">
							<input placeholder="Modelo y marca" id="moto" type="text" class="validate dark-input" required>
							<label for="moto">Moto (*)</label>
						</div>
						<div class="input-field col s6">
							<input id="plate" type="text" class="validate dark-input" required>
							<label for="plate">Placas (*)</label>
						</div>
						<div class="input-field col s6">
							<input id="color" type="text" class="validate dark-input" required>
							<label for="color">Color (*)</label>
						</div>
					</fieldset>
					<fieldset>
						<legend>Agrupación</legend>
						<div class="input-field col s6">
							<input id="group" type="text" class="validate dark-input" >
							<label for="group">MC/MG/RG/Asociación/Independiente (*)</label>
						</div>
						<div class="input-field col s6">
							<input id="groupPresident" type="text" class="validate dark-input">
							<label for="groupPresident">Presidente</label>
						</div>
						<div class="input-field col s6">
							<input id="groupPhone" type="text" class="validate dark-input">
							<label for="groupPhone">Teléfono de contacto</label>
						</div>
						<div class="input-field col s6">
							<input id="groupWeb" type="text" class="validate dark-input">
							<label for="groupWeb">Pagina de contacto</label>
						</div>
						
					</fieldset>
					
					
				</fieldset>
			</div>
		</div>
	</form>
</div>