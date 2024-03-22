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
<div class="container">
    <form id="vcard">
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
                        <input id="nameE2" type="text" class="validate dark-input">
                        <label for="nameE2">Nombre </label>
                    </div>
                    <div class="input-field col s6">
                        <input id="phone2" type="text" class="validate dark-input">
                        <label for="phone2">Teléfono</label>
                    </div>
                </fieldset>
            </div>
            <div class="col l12">
                <fieldset>
                    <legend class="red darken-4">Datos moteros</legend>
                    <fieldset>
                        <legend style="color: white">Moto</legend>
                        <div class="input-field col s6">
                            <input placeholder="Modelo y marca" id="moto" type="text" class="validate dark-input"
                                   required>
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
                        <legend style="color: white">Agrupación</legend>
                        <div class="input-field col s6">
                            <input id="group" type="text" class="validate dark-input">
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
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Generar
                            QR
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </fieldset>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#vcard').on("submit", function (e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append("name", $('#name').val());
            formData.append("lastName", $('#lastName').val());
            formData.append("alias", $('#alias').val());
            formData.append("birth", $('#birth').val());
            formData.append("blood", $('#blood').val());
            formData.append("allergies", $('#allergies').val());
            formData.append("nss", $('#nss').val());
            formData.append("nameE1", $('#nameE1').val());
            formData.append("phone1", $('#phone1').val());
            formData.append("nameE2", $('#nameE2').val());
            formData.append("phone2", $('#phone2').val());
            formData.append("moto", $('#moto').val());
            formData.append("plate", $('#plate').val());
            formData.append("color", $('#color').val());
            formData.append("group", $('#group').val());
            formData.append("groupPresident", $('#groupPresident').val());
            formData.append("groupPhone", $('#groupPhone').val());
            formData.append("groupWeb", $('#groupWeb').val());
            $.ajax({
                url: "/generateQR",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                method: "post",
                beforeSend: function () {
                },
                success: function (data) {
                    console.log(data);
                },
                complete: function () {
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>