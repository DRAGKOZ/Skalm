<style>
    td, th {
        padding: 15px !important;
    }

    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        opacity: 0 !important;
    }

    input:disabled::placeholder {
        color: #ad8db8 !important;
        /* Cambia el color según tus preferencias */
        /* Otros estilos que desees aplicar al marcador de posición */
    }

    /* Modal */
    .text-modal {
        font-size: 13px;
    }

    .modal {
        max-height: 83% !important;
        width: 80% !important;
    }

    /* Fix show checkbox and radiobutton*/
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        opacity: 1;
        position: relative;
        pointer-events: auto;
    }

    [type="radio"]:not(:checked),
    [type="radio"]:checked {
        opacity: 1;
        position: relative;
        pointer-events: auto;
    }

    /* Fix button selected but all class selected afect */
    .selected {
        background-color: black !important;
        color: white !important;
        height: 50px;
        border: 2px solid black !important;
        border-radius: 10px;
    }

    #toast-container {
        min-width: 10%;
        top: 50%;
        right: 50%;
        transform: translateX(50%) translateY(50%);
    }

    .receptor {
        color: #52A447 !important;
        font-weight: bold;
    }

    .receptor:hover {
        color: #52A447 !important;
    }

    [type="radio"] {
        display: none
    }
</style>
<div class="p-5">
	<?php
		$company = "eyJreWNfaWQiOiIxIiwicHRfaWQiOiIxIiwicHJvcGlldGFyaW9SZWFsIjoiMSIsImlkIjoiMSIsImxlZ2FsX25hbWUiOiJXSElURUZJU0ggU09MVkUgVEVDSCIsInNob3J0X25hbWUiOiJXSElURUZJU0giLCJpZF90eXBlIjoiMiIsInJmYyI6IldTVDIzMDIwMkNRMiIsImlkX2Zpc2NhbCI6IjEiLCJkaWFzX3BhZ28iOiI0NSIsImlkX3Bvc3RhbF9jb2RlIjoiNDcxIiwiaWRfY291bnRyeSI6IjkiLCJhZGRyZXNzIjoiQm9zcXVlIGRlIFJhZGlhdGFzIDI2IiwidGVsZXBob25lIjoiMTI4NDU3NjQ1OCIsImNvcnJlb2UiOiJhbGVqYW5kcm9Ad2hpdGVmaXNoLm14IiwiYWNjb3VudF9jbGFiZSI6IjAxNDE4MDU2Nzc0NjU3OTY1NSIsImlkX2Jyb2FkY2FzdF9iYW5rIjoiNSIsImFydGVyaWFfaWQiOm51bGwsInVuaXF1ZV9rZXkiOiI2NTJmZWRhYjc2ZWFiLTE2IiwiY3JlYXRlZF9hdCI6IjE2OTc2NDA5NjAiLCJ1cGRhdGVkX2F0IjoiMTcwNjczODM0NCIsImNhbmNlbF9hdCI6bnVsbCwiU3RwVXN1YXJpb3MiOiIyIiwiU3RwQ29udGFjdG9zIjoiMiIsImZpbmNsYWJlIjoiNzIzOTY5MDAwMDU4ODU4ODk3In0=";
		$rfcActual = json_decode ( base64_decode ( $company ), TRUE )[ 'rfc' ];
		$id = json_decode ( base64_decode ( $company ), TRUE )[ 'id' ];
		$user = 'eyJpZCI6IjEwIiwidXNlciI6IldoaXRlZmlzaCIsInBhc3N3b3JkIjoiMG55NVVhOUxRKzdlb1lneGNqeHZWZz09IiwicHJvZmlsZSI6IjAiLCJuYW1lIjoiQWxlamFuZHJvIiwibGFzdF9uYW1lIjoiVHJldmlcdTAwZjFvIiwiZW1haWwiOiJhbGVqYW5kcm9Ad2hpdGVmaXNoLm14IiwidGVsZXBob25lIjoiNzcxMjYyNTM1NSIsImlkX3F1ZXN0aW9uIjoiMSIsImFuc3dlciI6IlN0YXIgV2FycyIsImlkX2NvbXBhbnkiOiIxIiwidW5pcXVlX2tleSI6IjY1MmZmMTNlMmI4MTYtMTYiLCJjcmVhdGVkX2F0IjoiMTY5NzY0MDk2MCIsInVwZGF0ZWRfYXQiOiIxNzExOTkxMjYxIiwiY2FuY2VsX2F0IjpudWxsfQ';
	?>
	<h5>Conciliaciones</h5>
	<!-- head con el calendario -->
	<div class="row card esquinasRedondas" style="padding-top: 10px;">
		<div class="col l3">
			<div class="row" style="margin-bottom: 0;">
				<div class="col valign-wrapper"><p>Desde:</p></div>
				<div class="col">
					<label for="start">
						<input type="hidden" name="idInc" id="idInc" value="<?= $id ?>">
						<input
								type="date" id="start" name="trip-start" value="2023-10-01" min="2023-10-01"
								max="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>" />
					</label>
				</div>
			</div>
		</div>
		<div class="col l3">
			<div class="row" style="margin-bottom: 0;">
				<div class="col valign-wrapper"><p>Hasta:</p></div>
				<div class="col">
					<label for="fin">
						<input
								type="date" id="fin" name="trip-start"
								value="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>" min="2023-10-01"
								max="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>" />
					</label>
				</div>
			</div>
		</div>
		<div class="col l4"></div>
		<div class="col l4 right" style="display: block; text-align: center; padding-top: 10px;">
			<a id="masiva" class="modal-trigger button-gray" href="#modal-conciliacionPlus">Conciliación Masiva</a>
			<a id="btnAction" class="modal-trigger button-gray" href="#modal-CFDI">Subir CFDI</a>
		</div>
	</div>
	
	<!-- Las tablas principales que se muestran Facturas-->
	<div class="card esquinasRedondas" id="tblsViewer">
		<div class="card-content" style="padding: 10px; ">
			<div class="row" style="margin-bottom: 1px">
				<div id="Menus" class="row l12 p-3" style="margin-bottom: 5px">
					<div class="col l5 valign-wrapper">
						<button
								id="btnConciliation" class="button-table" style="margin-right: 0.75rem"
								onclick="conciliation()">
							Conciliación
						</button>
						<button
								id="btnConciliationPlus" class="button-table" style="margin-right: 0.75rem"
								onclick="conciliationPlus()">
							Conciliación Masiva
						</button>
						<button
								id="btnInvoice" class="button-table" style="margin-right: 0.75rem"
								onclick="cfdi()">
							CFDIs
						</button>
					</div>
					<div class="col l2">
					
					</div>
				</div>
			</div>
			<div style="overflow-x: auto;" id="tablaActiva">
				<!--<table
					id="activeTbl" class="stripe row-border order-column nowrap">
					<tbody>
					<tr>
						<td class="center-align" colspan="14">No hay datos</td>
					</tr>
					</tbody>
				</table>-->
			</div>
		</div>
	</div>
	<!-- darle rechazar una factura -->
	<div id="modal-rechazo" class="modal p-5">
		<h5>Operación rechazada</h5>
		<div class="card esquinasRedondas">
			<form>
				<div class="card-content ">
					<div class="row">
						<div class="col l12">
							<label style="top: 0!important; color: #212121; font-size: 18px;" for="rejectText">
								Indique la razón específica de la cancelación de la operación.</label>
							<textarea
									style="min-height: 30vh;" id="rejectText" name="rejectText"
									class="materialize-textarea validate" required></textarea>
							<input type="hidden" id="idReject" name="idReject">
						</div>
						<div class="col l12 d-flex justify-content-flex-end" style="margin-top:10px">
							<div class="col"><a class="button-orange modal-close ">Cancelar</a></div>
							<div class="col"><a class="button-gray modal-close " id="btnReject">Enviar</a></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- darle aceptar a una factura -->
	<div
			id="modal-aut-conciliation" class="modal modal-fixed-footer"
			style="max-height: 98% !important; height: 95%; width: 90% !important">
		<div class="modal-content" style="padding-top:10px;">
			<h5>Por favor, autoriza la transacción</h5>
			<div class="card esquinasRedondas">
				<div class="card-content" style="padding-top:0">
					<div class="row" style="margin-bottom: 0">
						<div class="row" style="margin-bottom: 0">
							<div class="col l2"><h6>Emisor:</h6></div>
							<div class="col l5"><h6>CFDI:</h6></div>
							<div class="col l5"><h6>Nota de crédito/Factura</h6></div>
						</div>
						<div class="row" style="font-size: 22px;">
							<div class="col l2" id="autEmisor">Emisor:</div>
							<div class="col l5" id="autCFDI">Factura:</div>
							<div class="col l5" id="autConciliador">Nota de crédito/Factura</div>
						</div>
					</div>
					<div class="row" style="margin-bottom: 0">
						<div class="row" style="margin-bottom: 0">
							<div class="col l4"><h6>Referencia:</h6></div>
							<div class="col l4"><h6>Monto inicial:</h6></div>
							<div class="col l4"><h6>Monto conciliador</h6></div>
						</div>
						<div class="row" style="font-size: 22px;">
							<div class="col l4" id="autReferencia">Emisor:</div>
							<div class="col l4" id="autMonto1">Factura:</div>
							<div class="col l4" id="autMonto2">Nota de crédito/Factura</div>
						</div>
					</div>
					<div class="row" style="margin-bottom: 0">
						<div class="row" style="margin-bottom: 0">
							<div class="col l4"><h6>Cuenta clabe del proveedor:</h6></div>
							<div class="col l4">
								<h6>Fecha de pago estimada:
									<i
											class="small material-icons" title="Fecha maxima para realizar el pago"
											style="cursor: help">help</i>
								</h6>
							</div>
						</div>
						<div class="row" style="font-size: 22px;">
							<div class="col l4" id="autClabe">Emisor:</div>
							<div class="col l4">
								<label>
									<input
											type="date" id="autPayDate"
											min="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>"
											max="<?= date ( 'Y-m-d', strtotime ( 'now +3 month' ) ) ?>"
											value="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>" />
								</label>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom: 0; align-content: center; text-align: center;">
						<div class="col l9"></div>
						<div class="col l3">
							<div class="col l6" id="autCancel"></div>
							<div class="col l6" id="autAceptar"></div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
		</div>
	</div>
	<!-- Subir los CFDI -->
	<div id="modal-CFDI" class="modal modal" style=" height: 95%; width: 90% !important">
		<div class="modal-content">
			<h5>Carga tus CFDI</h5>
			<div class="card esquinasRedondas">
				<div class="card-content">
					<h6 class="p-3">Carga tu CFDI en formato .xml o múltiples .xml en un archivo .zip</h6>
					<form id="uploadCFDI" enctype="multipart/form-data">
						<div class="file-field input-field">
							<div class="file-path-wrapper" style="width: 75%;margin-left: auto;float: left;">
								<input
										class="file-path validate" type="text"
										placeholder="Una factura en xml o múltiples en .zip" disabled>
							</div>
							<div style="width: 25%;margin-left: auto;">
								<label for="containerCFDI" class="custom-file-upload button-gray">Seleccionar</label>
								<input
										name="containerCFDI" id="containerCFDI" type="file" accept=".zip, .xml"
										maxFileSize="5242880" required />
							</div>
						</div>
						<div class="row">
							<div class="col l12 center-align">
								<a class="modal-close button-orange">Cancelar</a>
								<input class="button-gray" type="submit" value="Siguiente">
							</div>
						</div>
						<div class="row">
							<div class="col l12 d-flex">
								<div class="p-5">
									<div class="switch">
										<label>
											<input type="checkbox" required>
											<span class="lever"></span>
										</label>
									</div>
								</div>
								<p class="text-modal" style="text-align: justify;">
									En caso de utilizar la presente factura para conciliar con una nota de crédito, el
									Proveedor acepta y otorga su
									consentimiento en este momento para que, una vez recibido el pago por la misma,
									Solve descuente y transfiere
									de manera automática a nombre y cuenta del Proveedor, el monto debido por el
									Proveedor en relación con dicha
									factura en favor del Cliente. Los términos utilizados en mayúscula tendrán el
									significado que se le atribuye
									dicho término en los Términos y Condiciones. En caso de utilizar esta factura para
									conciliar con una factura
									de un Proveedor, al momento de dar clic en “Aceptar” el Cliente acuerda que la
									factura en cuestión será utilizada
									para efectos de las operaciones en la Plataforma conforme a los <a
											href="terminosycondiciones">Términos y Condiciones</a>.
								</p><br>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- crear conciliación -->
	<div
			id="modal-new-conciliation" class="modal modal"
			style="max-height: 95% !important; height: 85%; width: 90% !important">
		<div class="modal-content" style="padding-bottom: 10px">
			<h5 style="margin-top:0">Crear conciliación</h5>
			<div class="card esquinasRedondas">
				<div class="card-content">
					<form id="uploadNoteForm" enctype="multipart/form-data">
						<div class="row">
							<p style="margin-left: 10px;">
								<label>
									<input
											class="with-gap" name="typeConcilia" id="receptorWay" type="radio"
											style="visibility: hidden;" />
									<span style="font-size: 1.15rem;font-weight: 400; color: rgba(0,0,0,0.87);">Conciliar contra un CFDI de tu proveedor</span>
								</label>
								
								<!--<input name="typeConcilia" id="receptorWay" type="radio" />
								<label for="receptorWay">
									<span style="font-size: 1.15rem;font-weight: 400; color: rgba(0,0,0,0.87);">
										Conciliar contra un CFDI de tu proveedor</span>
								</label>-->
							</p>
							<p style="margin-left: 10px;">
								<label>
									<input
											class="with-gap" name="typeConcilia" id="issuingWay" type="radio"
											style="visibility: hidden;" />
									<span style="font-size: 1.15rem;font-weight: 400; color: rgba(0,0,0,0.87);">Conciliar con tu cliente utilizando nota de crédito propia</span>
								</label>
								
								<!--<input name="typeConcilia" id="issuingWay" type="radio" />
								<label for="issuingWay">
									<span style="font-size: 1.15rem;font-weight: 400; color: rgba(0,0,0,0.87);">
										Conciliar con tu cliente utilizando nota de crédito propia</span>
								</label>-->
							</p>
						</div>
						<div class="row" id="contentVariable"></div>
						<div class="row" style="margin-bottom: 0;">
							<div class="row" style="margin-bottom: 0">
								<div class="row" style="margin-bottom: 0">
									<div class="col l4">
										<h6>Fecha de pago estimada:
											<i
													class="small material-icons"
													title="Fecha maxima para realizar el pago"
													style="cursor: help">help</i>
										</h6>
									</div>
								</div>
								<div class="row" style="font-size: 22px;margin-bottom: 5px">
									<div class="col l4">
										<label>
											<input
													type="date" id="conciliaDate"
													min="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>"
													max="<?= date ( 'Y-m-d', strtotime ( 'now +3 month' ) ) ?>"
													value="<?= date ( 'Y-m-d', strtotime ( 'now' ) ) ?>" />
										</label>
										<input type="hidden" id="OriginCFDI">
										<input type="hidden" id="OriginUUID">
										<input type="hidden" id="OriginAmount">
										<input type="hidden" id="ReceiverId">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col l12 center-align">
								<a class="modal-close button-orange">Cancelar</a>
								&nbsp;
								<input class="button-gray" type="submit" value="Siguiente" id="sbtNF" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Crear conciliación masiva -->
	<div id="modal-conciliacionPlus" class="modal" style=" height: 95%; width: 90% !important">
		<div class="modal-content">
			<h5>Carga de conciliaciones masivas</h5>
			<div class="card esquinasRedondas">
				<input type="hidden" name="rfcActual" id="rfcActual" value="<?= $rfcActual ?>">
				<div class="card-content" id="contentCPlus">
					<h6 class="p-3">Carga múltiples .xml en un archivo .zip</h6>
					<form id="uploadCFDIPlus" enctype="multipart/form-data">
						<div class="file-field input-field">
							<div class="file-path-wrapper" style="width: 75%;margin-left: auto;float: left;">
								<input
										class="file-path validate" type="text"
										placeholder="Una factura en xml o múltiples en .zip" disabled>
							</div>
							<div style="width: 25%;margin-left: auto;">
								<label
										for="containerCFDIPlus"
										class="custom-file-upload button-gray">Seleccionar</label>
								<input
										name="containerCFDIPlus" id="containerCFDIPlus" type="file" accept=".zip"
										required />
								<input type="hidden" name="sCompany" id="sCompany" value="<?= $company ?>">
								<input type="hidden" name="sUser" id="sUser" value="<?= $user ?>">
							</div>
						</div>
						<div class="row">
							<div class="col l12 center-align">
								<a href="<?= base_url ( 'Conciliaciones' ) ?>" class="modal-close button-orange">Cancelar</a>
								<input class="button-gray" type="submit" value="Siguiente">
							</div>
						</div>
						<div class="row">
							<div class="col l12 d-flex">
								<div class="p-5">
									<div class="switch">
										<label>
											<input type="checkbox" required>
											<span class="lever"></span>
										</label>
									</div>
								</div>
								<p class="text-modal" style="text-align: justify;">
									En caso de utilizar la presente factura para conciliar con una nota de crédito, el
									Proveedor acepta y otorga su
									consentimiento en este momento para que, una vez recibido el pago por la misma,
									Solve descuente y transfiere
									de manera automática a nombre y cuenta del Proveedor, el monto debido por el
									Proveedor en relación con dicha
									factura en favor del Cliente. Los términos utilizados en mayúscula tendrán el
									significado que se le atribuye
									dicho término en los Términos y Condiciones. En caso de utilizar esta factura para
									conciliar con una factura
									de un Proveedor, al momento de dar clic en “Aceptar” el Cliente acuerda que la
									factura en cuestión será utilizada
									para efectos de las operaciones en la Plataforma conforme a los <a
											href="terminosycondiciones">Términos y Condiciones</a>.
								</p><br>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	let btnActive = 0;
	let conciliateWay = 0;
	$(document).ready(function () {
		conciliation();
		$(".dropdown-button").dropdown({hover: true, gutter: 0,});
		$("select").formSelect();
		$("#btndrop").dropdown({
			constrainWidth: true, // Does not change width of dropdown to that of the activator
			hover: true, // Activate on hover
			closeOnClick: false,
		});
		$("#start").on("change", function () {
			switch (btnActive) {
				case 0:
					conciliation();
					break;
				case 1:
					cfdi();
					break;
			}
		});
		$("#fin").on("change", function () {
			switch (btnActive) {
				case 0:
					conciliation();
					break;
				case 1:
					cfdi();
					break;
			}
		});
		$("#uploadCFDI").on("submit", function (e) {
			e.preventDefault();
			const formData = new FormData();
			const files = $("#containerCFDI")[0].files[0];
			formData.append("file", files);
			$.ajax({
				url: "/Conciliaciones/cargarComprobantes",
				data: formData,
				dataType: "json",
				contentType: false,
				processData: false,
				method: "post",
				beforeSend: function () {
					const obj = $("#modal-CFDI");
					const left = obj.offset().left;
					const top = obj.offset().top;
					const width = obj.width();
					const height = obj.height();
					$("#solveLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: left,
						top: top,
						width: width,
						height: height,
						zIndex: 999999
					}).focus();
				},
				success: function (data) {
					let toastHTML;
					if (data.code === 500 || data.code === 404) {
						let toastHTML = "<span><strong>" + data.message + "</strong></span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						toastHTML = "<span><strong>" + data.reason + "</strong></span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					} else {
						$("#modal-CFDI").modal("close");
						toastHTML = "<span>" + data.message + "</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					}
				},
				complete: function () {
					$("#solveLoader").css({
						display: "none"
					}).delay(2000);
					cfdi();
				},
				error: function (data) {
					$("#solveLoader").css({
						display: "none"
					});
					let toastHTML = "<span><strong>Ha ocurrido un problema</strong></span>";
					M.toast({html: toastHTML, displayLength: 1000, duration: 1000, edge: "rigth"});
					toastHTML = "<span>Por favor intente mas tarde</span>";
					M.toast({html: toastHTML, displayLength: 1000, duration: 1000, edge: "rigth"});
					toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>";
					M.toast({html: toastHTML, displayLength: 1000, duration: 1000, edge: "rigth"});
					
				}
			});
		});
		$("#uploadNoteForm").on("submit", function (e) {
			$("#sbtNF").attr("disabled", true);
			e.preventDefault();
			if (conciliateWay === 0) {
				const formData = new FormData();
				const files = $("#containerNote")[0].files[0];
				formData.append("file", files);
				formData.append("conciliaDate", $("#conciliaDate").val());
				formData.append("OriginCFDI", $("#OriginCFDI").val());
				formData.append("OriginUUID", $("#OriginUUID").val());
				formData.append("OriginAmount", $("#OriginAmount").val());
				$.ajax({
					url: "/Conciliaciones/cargarNote",
					data: formData,
					dataType: "json",
					contentType: false,
					processData: false,
					method: "post",
					beforeSend: function () {
						const obj = $("#modal-new-conciliation");
						const left = obj.offset().left;
						const top = obj.offset().top;
						const width = obj.width();
						const height = obj.height();
						$("#solveLoader").delay(50000).css({
							display: "block",
							opacity: 1,
							visibility: "visible",
							left: left,
							top: top,
							width: width,
							height: height,
							zIndex: 999999
						}).focus();
					},
					success: function (data) {
						let toastHTML;
						if (data.code === 500 || data.code === 404) {
							let toastHTML = "<span><strong>" + data.message + "</strong></span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							toastHTML = "<span><strong>" + data.reason + "</strong></span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							
						} else {
							$("#modal-new-conciliation").modal("close");
							let toastHTML = "<span>" + data.message + "</span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							conciliation();
						}
					},
					complete: function () {
						$("#solveLoader").css({
							display: "none"
						}).delay(2000);
						cfdi();
						$("#sbtNF").attr("disabled", false);
					},
					error: function (data) {
						$("#solveLoader").css({
							display: "none"
						});
						let toastHTML = "<span><strong>Ha ocurrido un problema</strong></span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						toastHTML = "<span>Por favor intente mas tarde</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					}
				});
			} else {
				$.ajax({
					url: "/Conciliaciones/WayContraCFDI",
					data: {
						OriginCFDI: $("#OriginCFDI").val(),
						OriginAmount: $("#OriginAmount").val(),
						ReceiverId: $("#ReceiverId").val(),
						cfdiConciation: $("input:radio[name=cfdiConciation]:checked").val(),
						conciliaDate: $("#conciliaDate").val(),
						OriginUUID: $("#OriginUUID").val()
					},
					dataType: "json",
					method: "post",
					beforeSend: function () {
						const obj = $("#modal-new-conciliation");
						const left = obj.offset().left;
						const top = obj.offset().top;
						const width = obj.width();
						const height = obj.height();
						$("#solveLoader").delay(50000).css({
							display: "block",
							opacity: 1,
							visibility: "visible",
							left: left,
							top: top,
							width: width,
							height: height,
							zIndex: 999999
						}).focus();
					},
					success: function (data) {
						let toastHTML;
						if (data.code === 500 || data.code === 404) {
							let toastHTML = "<span><strong>" + data.message + "</strong></span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							toastHTML = "<span><strong>" + data.reason + "</strong></span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							// location.reload()
						} else {
							$("#modal-new-conciliation").modal("close");
							toastHTML = "<span>" + data.message + "</span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							conciliation();
						}
					},
					complete: function () {
						$("#solveLoader").css({
							display: "none"
						}).delay(2000);
						cfdi();
					},
					error: function (data) {
						$("#solveLoader").css({
							display: "none"
						});
						let toastHTML = "<span><strong>Ha ocurrido un problema</strong></span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						toastHTML = "<span>Por favor intente mas tarde</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
						
					}
				});
			}
		});
		document.querySelectorAll("input[name='typeConcilia']").forEach((input) => {
			input.addEventListener("change", function (e) {
				let contenVar = $("#contentVariable");
				if (e.target.id === "issuingWay") {
					$("#conciliaDate").attr("disabled", true);
					conciliateWay = 0;
					let debit = "<div class=\"file-field input-field\" ><div class=\"file-path-wrapper\" " +
						"style=\"width: 75%;margin-left: auto;float: left;\">" +
						"<input class=\"file-path validate\" type=\"text\" placeholder=\"Sube tu nota de crédito en formato .xml\" " +
						"disabled ></div>" +
						"<div style=\"width: 25%;margin-left: auto;\"><label for=\"containerNote\" class=\"custom-file-upload button-gray\">" +
						"Seleccionar</label>" +
						"<input name=\"containerNote\" id=\"containerNote\" type=\"file\" accept=\".xml\" maxFileSize=\"5242880\" required />" +
						"</div></div>";
					contenVar.empty();
					contenVar.append(debit);
				} else {
					$("#conciliaDate").attr("disabled", false);
					conciliateWay = 1;
					contenVar.empty();
					$.ajax({
						url: "/Conciliaciones/ContraCFDI",
						data: {
							amount: $("#OriginAmount").val(),
							receiverId: $("#ReceiverId").val(),
						},
						dataType: "json",
						method: "post",
						beforeSend: function () {
							const obj = $("#modal-new-conciliation");
							const left = obj.offset().left;
							const top = obj.offset().top;
							const width = obj.width();
							const height = obj.height();
							$("#solveLoader").delay(50000).css({
								display: "block",
								opacity: 1,
								visibility: "visible",
								left: left,
								top: top,
								width: width,
								height: height,
								zIndex: 999999
							}).focus();
						},
						success: function (data) {
							let contra = "<table class=\"striped\">" +
								"<thead><tr>" +
								"<th>Crear conciliación</th>" +
								"<th>UUID</th>" +
								"<th>Emisor</th>" +
								"<th>Monto</th>" +
								"</tr></thead>" +
								"<tbody id=\"contraCFDI\"></tbody>" +
								"</table>";
							contenVar.append(contra);
							if (data.code === 500) {
								let toastHTML = "<span><strong>" + data.message + "</strong></span>" +
									"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
									"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
								M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
								toastHTML = "<span><strong>" + data.reason + "</strong></span>" +
									"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
									"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
								M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							} else if (data.code === 404) {
								let nf = "<tr><td colspan=\"4\" style='text-align: center'>No hay facturas disponibles</td></tr>";
								$("#contraCFDI").append(nf);
							} else {
								$.each(data, function (index, value) {
									let li = $("<tr><td>" +
										"<p>" +
										"<label>" +
										"<input class=\"with-gap\" name=\"cfdiConciation\" id=\"cfdiConciation" + value.id + "\" type=\"radio\" " +
										"style=\"visibility: hidden;\" value = \"" + value.id + "\" />" +
										"<span style=\"font-size: 1.15rem;font-weight: 400; color: rgba(0,0,0,0.87);\">Seleccionar</span>" +
										"</label>" +
										"</p>" +
										"</td>" +
										"<td><a href=\"" + value.idurl + "\" target=\"_blank\">" + value.uuid + "</a></td>" +
										"<td>" + value.sender + "</td>" +
										"<td>$" + value.total + "</td>" +
										"</tr>");
									$("#contraCFDI").append(li);
								});
							}
						},
						complete: function () {
							$("#solveLoader").css({
								display: "none"
							});
						},
						error: function (data) {
							$("#solveLoader").css({
								display: "none"
							});
							let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
								"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
								"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
							M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
							
						}
					});
				}
				
			});
		});
		$("#btnReject").on("click", function () {
			$.ajax({
				url: "/Conciliaciones/reject",
				data: {
					comments: $("#rejectText").val(),
					idConciliation: $("#idReject").val(),
				},
				dataType: "json",
				method: "post",
				beforeSend: function () {
					const obj = $("#tblsViewer");
					const left = obj.offset().left;
					const top = obj.offset().top;
					const width = obj.width();
					const height = obj.height();
					$("#solveLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: left,
						top: top,
						width: width,
						height: height,
						zIndex: 999999
					}).focus();
				},
				success: function (data) {
					if (data.code === 500 || data.code === 404) {
						let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
							"</strong></span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					} else {
						let toastHTML = "<span><strong>" + data.message + " </strong> </span>" +
							"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
							"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
						M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					}
				},
				complete: function () {
					$("#solveLoader").css({
						display: "none"
					});
					conciliation();
				},
				error: function (data) {
					$("#solveLoader").css({
						display: "none"
					});
					let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				}
			});
		});
		$("#uploadCFDIPlus").on("submit", function (e) {
			e.preventDefault();
			const formData = new FormData($("#formulario")[0]);
			const files = $("#containerCFDIPlus")[0].files[0];
			const company = $("#sCompany").val();
			const user = $("#sUser").val();
			formData.append("file", files);
			formData.append("company", company);
			formData.append("user", user);
			$.ajax({
				url: "https://api-solve.local/uploadCFDIPlus",
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend: function () {
					const obj = $("#contentCPlus");
					const left = obj.offset().left;
					const top = obj.offset().top;
					const width = obj.width();
					const height = obj.height();
					$("#solveLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: left,
						top: top,
						width: width,
						height: height,
						zIndex: 999999
					}).focus();
				},
				success: function (response) {
					if (response.conciliaciones !== null) {
						chooseCPlus(response, user, company);
					}
					console.log("Respuesta del servidor:", response);
				},
				complete: function () {
					$("#solveLoader").css({
						display: "none"
					});
				},
				error: function (status, error) {
					// Maneja los errores de la solicitud
					console.error("Error en la solicitud:", status);
				}
			});
			
		});
		$("li.optgroup").on("click", function () {
			$("li.optgroup-option").trigger("click");
		});
	});
	
	function noSelect() {
		$("#btnConciliationPlus").removeClass("selected");
		$("#btnConciliation").removeClass("selected");
		$("#btnInvoice").removeClass("selected");
		$("#tablaActiva").empty();
		$("#btnAction").empty();
	}
	
	function getToken() {
		$.ajax({
			url: "/Conciliaciones/conciliation",
			data: {
				from: $("#start").val(),
				to: $("#fin").val(),
			},
			dataType: "json",
			method: "post",
			beforeSend: function () {
				const obj = $("#tblsViewer");
				const left = obj.offset().left;
				const top = obj.offset().top;
				const width = obj.width();
				const height = obj.height();
				$("#solveLoader").delay(50000).css({
					display: "block",
					opacity: 1,
					visibility: "visible",
					left: left,
					top: top,
					width: width,
					height: height,
					zIndex: 999999
				}).focus();
			},
			success: function (data) {
				if (data.code === 500) {
					let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
						"</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				} else if (data.code === 404) {
					console.log("");
				} else {
					$("#tblBody").empty();
					$.each(data, function (index, value) {
						let uuid, status, uuid2, clabe;
						let aut, cancel, acept;
						let flag;
						let opNumber;
						uuid = "<a href=\"" + value.idurl + "\" target=\"_blank\">" + value.uuid1 + "</a>";
						uuid2 = "<a href=\"" + value.idur2 + "\" target=\"_blank\">" + value.uuid2 + "</a>";
						if (value.role === "receptor") {
							switch (value.status) {
								case "0":
									aut = $("<a class=\"modal-trigger\" href=\"#modal-aut-conciliation\">Autorizar</a>");
									cancel = $("<a class=\"modal-trigger button-orange modal-close\" href=\"#modal-rechazo\">Rechazar</a>");
									acept = $("<a style='cursor: pointer;' class=\"button-gray \">Aceptar</a>");
									cancel.click(function () {
										$("#rejectText").empty();
										$("#idReject").val(value.id);
									});
									acept.click(function () {
										aceptOp(value.id, $("#autPayDate").val());
									});
									aut.click(function () {
										let autEmisor = $("#autEmisor");
										let autCFDI = $("#autCFDI");
										let autConciliador = $("#autConciliador");
										let autReferencia = $("#autReferencia");
										let autMonto1 = $("#autMonto1");
										let autMonto2 = $("#autMonto2");
										let autClabe = $("#autClabe");
										let autPayDate = $("#autPayDate");
										autEmisor.empty();
										autCFDI.empty();
										autConciliador.empty();
										autReferencia.empty();
										autMonto1.empty();
										autMonto2.empty();
										autClabe.empty();
										autEmisor.append(value.emisor);
										autCFDI.append(uuid);
										autConciliador.append(uuid2);
										autReferencia.append(value.operation_number);
										autMonto1.append("$" + value.total1);
										autMonto2.append("$" + value.total2);
										autClabe.append(value.account_clabe);
										let dateS = (value.datePago);
										dateS = dateS.split("-");
										autPayDate.attr("value", dateS[2] + "-" + dateS[1] + "-" + dateS[0]);
										$("#autAceptar").empty();
										$("#autCancel").empty();
										$("#autAceptar").append(acept);
										$("#autCancel").append(cancel);
									});
									break;
								case "1":
								case "3":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							flag = value.role;
							opNumber = value.operation_number;
							clabe = value.account_clabe;
						} else if (value.role === "emisor" && (value.status === "3" || value.status === "4")) {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							opNumber = value.operation_number;
							clabe = "xxxxxxxxxxxxxx" + value.account_clabe.substring(value.account_clabe.length - 4);
						} else {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							opNumber = "-";
							clabe = "-";
						}
						switch (value.status) {
							case "0":
								status = "<p><span class=\"estatus\">Por autorizar</span></p>";
								break;
							case "1":
								status = "<p><span class=\"estatus\" style=\"background-color:#8225fc\">Autorizada</span></p>";
								break;
							case "2":
								status = "<p><span class=\"estatus\" style=\"background-color:#c20005\">Rechazada</span></p>";
								break;
							case "3":
								status = "<p><span class=\"estatus\" style=\"background-color:#52A447\">Realizada</span></p>";
								break;
							case "4":
								status = "<p><span class=\"estatus\" style=\"background-color:#dedc48\">Vencida</span></p>";
								break;
						}
						const tr = $("<tr " + flag + ">" +
							"<td class='tabla-celda center-align' id=\"aut" + value.id + "\"></td>" +
							"<td class='tabla-celda center-align' style='text-wrap: nowrap;'>" + status + "</td>" +
							"<td class='center-align " + flag + "'>" + clabe + "</td>" +
							"<td class='center-align " + flag + "'>" + opNumber + "</td>" +
							"<td class='center-align'>" + value.emisor + "</td>" +
							"<td class='center-align'>" + value.receptor + "</td>" +
							"<td class='center-align' style='white-space: nowrap; max-width: 100px; overflow: hidden; text-overflow: ellipsis;'>"
							+ uuid + "</td>" +
							"<td class='center-align " + flag + "'>$ " + value.total1 + "</td>" +
							"<td class='center-align'> " + value.dateCFDI1 + "</td>" +
							"<td class='center-align'>" + value.datePago + "</td>" +
							"<td class='center-align'>" + value.senderConciliation + "</td>" +
							"<td class='center-align'>" + value.receiverConciliation + "</td>" +
							"<td class='center-align' style='white-space: nowrap; max-width: 100px; overflow: hidden; word-wrap: break-word;" +
							"text-overflow: ellipsis;'>" + uuid2 + "</td>" +
							"<td class='center-align'>$ " + value.total2 + "</td>" +
							"<td class='center-align' style='text-wrap: nowrap;'>" + value.dateCFDI2 + "</td>" +
							"<td class='center-align'  style='text-wrap: nowrap;' id=\"tblPayD" + value.id + "\" >" + value.datePago + "</td>" +
							"</tr>");
						$("#tblBody").append(tr);
						$("#aut" + value.id).append(aut);
						//$("#tabla_conciliaciones").DataTable({
						//	retrieve: true,
						//	paging: false,
						//	deferRender: true,
						//	language: {
						//		decimal: ".",
						//		thousands: ",",
						//		url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
						//	},
						//	info: false,
						//	searching: false,
						//	sort: true
						//});
						
					});
				}
			},
			complete: function () {
				$("#solveLoader").css({
					display: "none"
				});
			},
			error: function (data) {
				$("#solveLoader").css({
					display: "none"
				});
				let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
			}
		});
	}
	
	function conciliation() {
		$("#tablaActiva").empty();
		btnActive = 0;
		noSelect();
		$("#btnConciliation").addClass("selected");
		let btnAction = $("#btnAction").append("Subir CFDI");
		btnAction.attr("href", "#modal-CFDI");
		const tableBase = "<table id=\"tabla_conciliaciones\" class=\"stripe row-border order-column nowrap\"><thead><tr>" +
			"<th>Autorizar</th>" +
			"<th class=\"center-align\">Estatus<br />conciliación</th>" +
			"<th class='center-align'>Clabe Interbancaria Transferencia Inicial</th>" +
			"<th style=\"min-width: 142px; text-align: center\">ID Operación /<br />Número de Referencia</th>" +
			"<th class=\"center-align\">Emisor<br />CFDI Inicial</th>" +
			"<th class=\"center-align\">Receptor<br />CFDI Inicial</th>" +
			"<th class=\"center-align\">CFDI<br />Inicial</th>" +
			"<th style=\"min-width: 128px; text-align: center\" class=\"center-align\">Monto<br />CFDI Inicial </th>" +
			"<th style='min-width: 128px;' class=\"center-align\">Fecha Alta<br />CFDI Inicial</th>" +
			"<th style='min-width: 162px;' class=\"center-align\">Fecha Límite de Pago<br />CFDI Inicial</th>" +
			"<th style=\"text-align: center\">Emisor<br />CFDI Conciliación</th>" +
			"<th style=\"text-align: center\" class=\"center-align\">Receptor<br />CFDI Conciliación</th>" +
			"<th class=\"center-align\">CFDI<br />Conciliación</th>" +
			"<th class=\"center-align\">Monto<br />CFDI Conciliación</th>" +
			"<th class=\"center-align\">Fecha Alta<br />CFDI Conciliación</th>" +
			"<th class=\"center-align\">Fecha<br />Conciliación</th>" +
			"</tr></thead>" +
			"<tbody id=\"tblBody\"></tbody></table>";
		$("#tablaActiva").append(tableBase);
		$.ajax({
			url: "/Conciliaciones/conciliation",
			data: {
				from: $("#start").val(),
				to: $("#fin").val(),
			},
			dataType: "json",
			method: "post",
			beforeSend: function () {
				const obj = $("#tblsViewer");
				const left = obj.offset().left;
				const top = obj.offset().top;
				const width = obj.width();
				const height = obj.height();
				$("#solveLoader").delay(50000).css({
					display: "block",
					opacity: 1,
					visibility: "visible",
					left: left,
					top: top,
					width: width,
					height: height,
					zIndex: 999999
				}).focus();
			},
			success: function (data) {
				if (data.code === 500) {
					let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
						"</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				} else if (data.code === 404) {
					console.log("");
				} else {
					$("#tblBody").empty();
					$.each(data, function (index, value) {
						let uuid, status, uuid2, clabe;
						let aut, cancel, acept;
						let flag;
						let opNumber;
						uuid = "<a href=\"" + value.idurl + "\" target=\"_blank\">" + value.uuid1 + "</a>";
						uuid2 = "<a href=\"" + value.idur2 + "\" target=\"_blank\">" + value.uuid2 + "</a>";
						if (value.role === "receptor") {
							switch (value.status) {
								case "0":
									aut = $("<a class=\"modal-trigger\" href=\"#modal-aut-conciliation\">Autorizar</a>");
									cancel = $("<a class=\"modal-trigger button-orange modal-close\" href=\"#modal-rechazo\">Rechazar</a>");
									acept = $("<a style='cursor: pointer;' class=\"button-gray \">Aceptar</a>");
									cancel.click(function () {
										$("#rejectText").empty();
										$("#idReject").val(value.id);
									});
									acept.click(function () {
										aceptOp(value.id, $("#autPayDate").val());
									});
									aut.click(function () {
										let autEmisor = $("#autEmisor");
										let autCFDI = $("#autCFDI");
										let autConciliador = $("#autConciliador");
										let autReferencia = $("#autReferencia");
										let autMonto1 = $("#autMonto1");
										let autMonto2 = $("#autMonto2");
										let autClabe = $("#autClabe");
										let autPayDate = $("#autPayDate");
										autEmisor.empty();
										autCFDI.empty();
										autConciliador.empty();
										autReferencia.empty();
										autMonto1.empty();
										autMonto2.empty();
										autClabe.empty();
										autEmisor.append(value.emisor);
										autCFDI.append(uuid);
										autConciliador.append(uuid2);
										autReferencia.append(value.operation_number);
										autMonto1.append("$" + value.total1);
										autMonto2.append("$" + value.total2);
										autClabe.append(value.account_clabe);
										let dateS = (value.datePago);
										dateS = dateS.split("-");
										autPayDate.attr("value", dateS[2] + "-" + dateS[1] + "-" + dateS[0]);
										$("#autAceptar").empty();
										$("#autCancel").empty();
										$("#autAceptar").append(acept);
										$("#autCancel").append(cancel);
									});
									break;
								case "1":
								case "3":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							flag = value.role;
							opNumber = value.operation_number;
							clabe = value.account_clabe;
						} else if (value.role === "emisor" && (value.status === "3" || value.status === "4")) {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							opNumber = value.operation_number;
							clabe = "xxxxxxxxxxxxxx" + value.account_clabe.substring(value.account_clabe.length - 4);
						} else {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							opNumber = "-";
							clabe = "-";
						}
						switch (value.status) {
							case "0":
								status = "<p><span class=\"estatus\">Por autorizar</span></p>";
								break;
							case "1":
								status = "<p><span class=\"estatus\" style=\"background-color:#8225fc\">Autorizada</span></p>";
								break;
							case "2":
								status = "<p><span class=\"estatus\" style=\"background-color:#c20005\">Rechazada</span></p>";
								break;
							case "3":
								status = "<p><span class=\"estatus\" style=\"background-color:#52A447\">Realizada</span></p>";
								break;
							case "4":
								status = "<p><span class=\"estatus\" style=\"background-color:#dedc48\">Vencida</span></p>";
								break;
						}
						const tr = $("<tr " + flag + ">" +
							"<td class='tabla-celda center-align' id=\"aut" + value.id + "\"></td>" +
							"<td class='tabla-celda center-align' style='text-wrap: nowrap;'>" + status + "</td>" +
							"<td class='center-align " + flag + "'>" + clabe + "</td>" +
							"<td class='center-align " + flag + "'>" + opNumber + "</td>" +
							"<td class='center-align'>" + value.emisor + "</td>" +
							"<td class='center-align'>" + value.receptor + "</td>" +
							"<td class='center-align' style='white-space: nowrap; max-width: 100px; overflow: hidden; text-overflow: ellipsis;'>"
							+ uuid + "</td>" +
							"<td class='center-align " + flag + "'>$ " + value.total1 + "</td>" +
							"<td class='center-align'> " + value.dateCFDI1 + "</td>" +
							"<td class='center-align'>" + value.datePago + "</td>" +
							"<td class='center-align'>" + value.senderConciliation + "</td>" +
							"<td class='center-align'>" + value.receiverConciliation + "</td>" +
							"<td class='center-align' style='white-space: nowrap; max-width: 100px; overflow: hidden; word-wrap: break-word;" +
							"text-overflow: ellipsis;'>" + uuid2 + "</td>" +
							"<td class='center-align'>$ " + value.total2 + "</td>" +
							"<td class='center-align' style='text-wrap: nowrap;'>" + value.dateCFDI2 + "</td>" +
							"<td class='center-align'  style='text-wrap: nowrap;' id=\"tblPayD" + value.id + "\" >" + value.datePago + "</td>" +
							"</tr>");
						$("#tblBody").append(tr);
						$("#aut" + value.id).append(aut);
						//$("#tabla_conciliaciones").DataTable({
						//	retrieve: true,
						//	paging: false,
						//	deferRender: true,
						//	language: {
						//		decimal: ".",
						//		thousands: ",",
						//		url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
						//	},
						//	info: false,
						//	searching: false,
						//	sort: true
						//});
						
					});
				}
			},
			complete: function () {
				$("#solveLoader").css({
					display: "none"
				});
			},
			error: function (data) {
				$("#solveLoader").css({
					display: "none"
				});
				let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
			}
		});
	}
	
	function cfdi() {
		$("#tablaActiva").empty();
		btnActive = 0;
		noSelect();
		$("#btnInvoice").addClass("selected");
		let btnAction = $("#btnAction").append("Subir CFDI");
		btnAction.attr("href", "#modal-CFDI");
		const tableBase = "<table id=\"tabla_cfdis\" class=\"stripe row-border order-column nowrap\"><thead style=\"position:sticky; top: 0;\">" +
			"<tr>" +
			"<th>Conciliación</th>" +
			"<th class='center-align'>Estatus CFDI</th>" +
			"<th class='center-align'>UUID del CFDI</th>" +
			"<th class=\"center-align\">Emisor</th>" +
			"<th class='center-align'>Receptor</th>" +
			"<th class='center-align'>Fecha del CFDI</th>" +
			"<th class='center-align' style=\"min-width: 135px\">Fecha de Alta del CFDI</th>" +
			"<th class='center-align' style=\"min-width: 110px\">Fecha Límite de Pago</th>" +
			"<th class='center-align'>Monto Total</th>" +
			"<th class='center-align'>Tipo de CFDI</th>" +
			"</tr></thead>" +
			"<tbody id=\"tblBody\"></tbody></table>";
		$("#tablaActiva").append(tableBase);
		$.ajax({
			url: "/Conciliaciones/CFDI",
			data: {
				from: $("#start").val(),
				to: $("#fin").val(),
			},
			dataType: "json",
			method: "post",
			beforeSend: function () {
				const obj = $("#tblsViewer");
				const left = obj.offset().left;
				const top = obj.offset().top;
				const width = obj.width();
				const height = obj.height();
				$("#solveLoader").delay(50000).css({
					display: "block",
					opacity: 1,
					visibility: "visible",
					left: left,
					top: top,
					width: width,
					height: height,
					zIndex: 999999
				}).focus();
			},
			success: function (data) {
				if (data.code === 500) {
					let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
						"</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				} else if (data.code === 404) {
					console.log("");
				} else {
					$("#tblBody").empty();
					$.each(data, function (index, value) {
						let status = "";
						let uuid = "<a href=\"" + value.idurl + "\" target=\"_blank\">" + value.uuid + "</a>";
						let initC = $("<a class=\"modal-trigger\" href=\"#modal-new-conciliation\">Crear conciliación</a>");
						switch (value.status) {
							case "0":
								initC.click(function () {
									let dateS = (value.dateToPay);
									dateS = dateS.split("-");
									$("#conciliaDate").attr("value", dateS[2] + "-" + dateS[1] + "-" + dateS[0]);
									$("#OriginCFDI").val(value.id);
									$("#OriginUUID").val(value.uuid);
									$("#OriginAmount").val(value.total);
									$("#ReceiverId").val(value.receptorId);
									$("#receptorWay").trigger("change");
									$("#receptorWay").trigger("click");
								});
								break;
							case "1":
							case "3":
								initC = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
								break;
							case "2":
								initC = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
								break;
						}
						switch (value.status) {
							case "0":
								status = "<p><span class=\"estatus\">Libre</span></p>";
								break;
							case "1":
								status = "<p><span class=\"estatus\" style=\"background-color:#8225fc\">En operación</span></p>";
								break;
							case "2":
								status = "<p><span class=\"estatus\" style=\"background-color:#f36115\">Rechazada</span></p>";
								break;
							case "3":
								status = "<p><span class=\"estatus\" style=\"background-color:#569700\">Pagada</span></p>";
								break;
						}
						const tr = $("<tr>" +
							"<td class='center-align' id=\"initC" + value.id2 + "\"></td>" +
							"<td class='center-align'>" + status + "</td>" +
							"<td class='center-align' style='white-space: nowrap; max-width: 100px; overflow: hidden; word-wrap: break-word;" +
							"text-overflow: ellipsis;'>" + uuid + "</td>" +
							"<td class='center-align'>" + value.emisor + "</td>" +
							"<td class='center-align'>" + value.receptor + "</td>" +
							"<td class='center-align'>" + value.dateCFDI + "</td>" +
							"<td class='center-align'>" + value.dateCreate + "</td>" +
							"<td class='center-align'>" + value.dateToPay + "</td>" +
							"<td class='center-align'>$ " + value.total + "</td>" +
							"<td class='center-align' style='min-width:105px;'>" + value.tipo + "</td>" +
							"</tr>");
						$("#tblBody").append(tr);
						
						$("#initC" + value.id2).append(initC);
						//$("#tabla_cfdis").DataTable({
						//	retrieve: true,
						//	paging: false,
						//	deferRender: true,
						//	language: {
						//		decimal: ".",
						//		thousands: ",",
						//		url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
						//	},
						//	info: false,
						//	searching: false,
						//	sort: true
						//});
					});
				}
			},
			complete: function () {
				$("#solveLoader").css({
					display: "none"
				});
			},
			error: function (data) {
				$("#solveLoader").css({
					display: "none"
				});
				let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				
			}
		});
	}
	
	function aceptOp(id, payDate) {
		$.ajax({
			url: "/Conciliaciones/accept",
			data: {
				id: id,
				payDate: payDate,
			},
			dataType: "json",
			method: "post",
			beforeSend: function () {
				const obj = $("#modal-aut-conciliation");
				const left = obj.offset().left;
				const top = obj.offset().top;
				const width = obj.width();
				const height = obj.height();
				$("#solveLoader").delay(50000).css({
					display: "block",
					opacity: 1,
					visibility: "visible",
					left: left,
					top: top,
					width: width,
					height: height,
					zIndex: 999999
				}).focus();
			},
			success: function (data) {
				let toastHTML;
				if (data.code === 500) {
					let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
						"</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				} else {
					$("#modal-aut-conciliation").modal("close");
					conciliation();
					toastHTML = "<span>" + data.message + "</span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
					$("#aut" + id).empty();
					$("#tblPayD" + id).empty();
					let aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
					$("#aut" + id).append(aut);
					let dateS = (payDate);
					dateS = dateS.split("-");
					$("#tblPayD" + id).append(dateS[2] + "-" + dateS[1] + "-" + dateS[0]);
				}
			},
			complete: function () {
				$("#solveLoader").css({
					display: "none"
				});
			},
			error: function (data) {
				$("#solveLoader").css({
					display: "none"
				});
				let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				
			}
		});
	}
	
	function chooseCPlus(response, user, company) {
		let rfcActual = $("#rfcActual").val();
		$("#contentCPlus").empty();
		let chooseC = "<h6 class=\"p-3\">Seleccionar conciliaciones</h6>" +
			"<form id=\"chooseCPlus\"><div class=\"row\">" +
			"<select multiple id=\"conciliaItems\" name=\"conciliaItems\">" +
			"</select><label for=\"conciliaItems\">Conciliaciones</label></div>" +
			"<div class=\"row\"><div class=\"col l12 center-align\">" +
			'<a  href="<?=base_url ( 'Conciliaciones' )?>" class="modal-close button-orange">Cancelar</a>' +
			"<input class=\"button-gray\" type=\"submit\" value=\"Siguiente\"></div></div></form>";
		$("#contentCPlus").append(chooseC);
		let opt = $("<optgroup label=\"Seleccionar todas\" id=\"optGpo\"></optgroup>");
		$("#conciliaItems").append(opt);
		let conciliation = response.conciliaciones;
		let optionsC = "";
		$.each(conciliation, function (index, value) {
			if (value.sender === rfcActual) {
				if (value.out > value.in) {
					optionsC += "<option value=\"" + value.receiver + "|" + value.sender + "|" + value.tmp + "|" + value.in + "|" + value.out + "\"> <strong>" + value.receiver + "</strong> | ↑ Depositas $" + value.out + " | ↓ Regresan $" + value.in + "</option>";
				} else {
					optionsC += "<option value=\"" + value.sender + "|" + value.receiver + "|" + value.tmp + "|" + value.out + "|" + value.in + "\"> <strong>" + value.receiver + "</strong> | ↑ Regresas $" + value.out + " | ↓ Depositan $" + value.in + "</option>";
				}
			} else {
				if (value.out > value.in) {
					optionsC += "<option value=\"" + value.sender + "|" + value.receiver + "|" + value.tmp + "|" + value.out + "|" + value.in + "\"> <strong>" + value.sender + "</strong> | ↓ Depositan $" + value.out + " | ↑ Regresas $" + value.in + "</option>";
				} else {
					optionsC += "<option value=\"" + value.receiver + "|" + value.sender + "|" + value.tmp + "|" + value.in + "|" + value.out + "\"> <strong>" + value.sender + "</strong> | ↓ Regresan $" + value.out + " | ↑ Depositas $" + value.in + "</option>";
				}
			}
		});
		$("#optGpo").append(optionsC);
		$("select").formSelect();
		$("li.optgroup").on("click", function () {
			$("li.optgroup-option").trigger("click");
		});
		$("#chooseCPlus").on("submit", function (e) {
			e.preventDefault();
			const formData2 = new FormData($("#formulario2")[0]);
			const conciliationSelected = $("#conciliaItems").val();
			formData2.append("conciliaciones", conciliationSelected);
			formData2.append("company", company);
			formData2.append("user", user);
			$.ajax({
				url: "https://api-solve.local/chosenConciliation",
				type: "POST",
				data: formData2,
				processData: false,
				contentType: false,
				beforeSend: function () {
					const obj = $("#contentCPlus");
					const left = obj.offset().left;
					const top = obj.offset().top;
					const width = obj.width();
					const height = obj.height();
					$("#solveLoader").delay(50000).css({
						display: "block",
						opacity: 1,
						visibility: "visible",
						left: left,
						top: top,
						width: width,
						height: height,
						zIndex: 999999
					}).focus();
				},
				success: function (response) {
					if (response.error == null) {
						chooseDPlus(response, user, company);
					}
				},
				complete: function () {
					$("#solveLoader").css({
						display: "none"
					});
				},
				error: function (status, error) {
					// Maneja los errores de la solicitud
					console.error("Error en la solicitud:", status);
				}
			});
		});
	}
	
	function chooseDPlus(response, user, company) {
		let content = $("#contentCPlus");
		let rfcActual = $("#rfcActual").val();
		content.empty();
		let base = "<h6 class='p-3'>¿Deseas crear una dispersion masiva?</h6>" +
			"<form id='chooseCPlus'><div class='row'>" +
			"<p><label><input name='makeDPlus' id='SiConciliation' value='1' type='radio' /> <span>Si</span></label></p>" +
			"<p><label><input name='makeDPlus' id='NoConciliation' value='2' type='radio' checked/> <span>No</span></label></p>" +
			"<div id='chooseD' class='row'></div>" +
			"<div id='buttonsSpace' class='row'><div class='col l12 center-align'>" +
			'<a href="<?=base_url ( 'Conciliaciones' )?>" class="modal-close button-orange">Terminar</a>' +
			"</div></div></form>";
		content.append(base);
		let chooseD = $("#chooseD");
		let buttonsSpace = $("#buttonsSpace");
		$("input[type=radio][name=makeDPlus]").change(function () {
			if (this.value === "1") {
				chooseD.empty();
				buttonsSpace.empty();
				let selector = "<select multiple id='dispersionItems' name='dispersionItems'></select><label for='dispersionItems'>Conciliaciones</label>";
				let opt = $("<optgroup label=\"Seleccionar todas\" id=\"optGpo2\"></optgroup>");
				chooseD.append(selector);
				$("#dispersionItems").append(opt);
				let options = "";
				$.each(response[0], function (index, value) {
					if (value[1] === rfcActual) {
						options += "<option value='" + value.idConciliation + "' >" + value[1] + " | " + value[0] + " | Depositan ↓ $" + value[3] + " | Regresas ↑ $" + value[4] + "</option> ";
					} else {
						options += "<option value='" + value.idConciliation + "' >" + value[1] + " | " + value[0] + " | Depositas ↑ $" + value[3] + " | Regresan ↓ $" + value[4] + "</option> ";
					}
				});
				$("#optGpo2").append(options);
				$("select").formSelect();
				$("li.optgroup").on("click", function () {
					$("li.optgroup-option").trigger("click");
				});
				let buttons = "<div class='col l12 center-align'>" +
					'<a href="<?=base_url ( 'Conciliaciones' )?>" class="modal-close button-orange">Terminar</a>' +
					"<input class='button-gray' type='submit' value='Siguiente'></div>";
				buttonsSpace.append(buttons);
				$("#chooseCPlus").on("submit", function (e) {
					e.preventDefault();
					const formData3 = new FormData();
					const conciliationSelected = $("#dispersionItems").val();
					formData3.append("conciliaciones", conciliationSelected);
					formData3.append("company", company);
					formData3.append("user", user);
					$.ajax({
						url: "https://api-solve.local/chosenForDispersion",
						type: "POST",
						data: formData3,
						processData: false,
						contentType: false,
						beforeSend: function () {
							const obj = $("#contentCPlus");
							const left = obj.offset().left;
							const top = obj.offset().top;
							const width = obj.width();
							const height = obj.height();
							$("#solveLoader").delay(50000).css({
								display: "block",
								opacity: 1,
								visibility: "visible",
								left: left,
								top: top,
								width: width,
								height: height,
								zIndex: 999999
							}).focus();
						},
						success: function (response) {
							if (response.error === null) {
								toastHTML = "<span>Dispersion masiva creada correctamente</span>" +
									"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
									"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
								M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
								conciliationPlus();
								setTimeout(function () {
									location.reload();
								}, 3000);
							}
						},
						complete: function () {
							$("#solveLoader").css({
								display: "none"
							});
						},
						error: function (status, error) {
							// Maneja los errores de la solicitud
							console.error("Error en la solicitud:", status);
						}
					});
				});
			} else if (this.value === "2") {
				chooseD.empty();
				buttonsSpace.empty();
				let buttons = "<div class='col l12 center-align'>" +
					'<a href="<?=base_url ( 'Conciliaciones' )?>" class="modal-close button-orange">Terminar</a></div>';
				buttonsSpace.append(buttons);
			}
		});
	}
	
	function conciliationPlus() {
		$("#tablaActiva").empty();
		btnActive = 0;
		noSelect();
		$("#btnConciliationPlus").addClass("selected");
		let btnAction = $("#btnAction").append("Subir CFDI");
		btnAction.attr("href", "#modal-CFDI");
		const tableBase = "<table id=\"tabla_conciliaciones\" class=\"stripe row-border order-column nowrap\"><thead><tr>" +
			"<th>Autorizar</th>" +
			"<th class=\"center-align\">Estatus<br />conciliación</th>" +
			"<th class='center-align'>Clabe Interbancaria Transferencia Inicial</th>" +
			"<th style=\"min-width: 142px; text-align: center\">Número de Referencia</th>" +
			"<th style=\"min-width: 142px; text-align: center\">Folio</th>" +
			"<th class=\"center-align\">Grupo de CFDI</th>" +
			"<th style=\"min-width: 128px; text-align: center\" class=\"center-align\">Monto a pagar</th>" +
			"<th style=\"min-width: 128px; text-align: center\" class=\"center-align\">Monto de regreso</th>" +
			"<th style=\"text-align: center\" class=\"center-align\">Emisor del pago</th>" +
			"<th style=\"text-align: center\" class=\"center-align\">Receptor del pago</th>" +
			"<th class=\"center-align\">Fecha<br />Conciliación</th>" +
			"</tr></thead>" +
			"<tbody id=\"tblBody\"></tbody></table>";
		$("#tablaActiva").append(tableBase);
		$.ajax({
			url: "https://api-solve.local/conciliationPlus",
			data: JSON.stringify({
				company: $("#idInc").val(),
				environment:"SANDBOX",
			}),
			headers: {"Content-Type": "application/json"},
			dataType: "JSON",
			method: "POST",
			beforeSend: function () {
				const obj = $("#tblsViewer");
				const left = obj.offset().left;
				const top = obj.offset().top;
				const width = obj.width();
				const height = obj.height();
				$("#solveLoader").delay(50000).css({
					display: "block",
					opacity: 1,
					visibility: "visible",
					left: left,
					top: top,
					width: width,
					height: height,
					zIndex: 999999
				}).focus();
			},
			success: function (data) {
				if (data.code === 500) {
					let toastHTML = "<span><strong>" + data.message + " </strong> </span>&nbsp;<br><p><span><strong>" + data.reason +
						"</strong></span>" +
						"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
						"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
					M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				} else if (data.code === 404) {
					console.log("");
				} else {
					$("#tblBody").empty();
					let rfcActual = $("#rfcActual").val();
					$.each(data, function (index, value) {
						let uuid, status, uuid2, clabe;
						let aut, cancel, acept;
						let exitMoney, entryMoney;
						let flag = "receptor";
						exitMoney = value.exit_money;
						entryMoney = value.entry_money;
						if (value.rfc === rfcActual) {
							flag = "emisor";
							switch (value.status) {
								case "0":
									aut = $("<a class=\"modal-trigger\" href=\"#modal-aut-conciliation\">Autorizar</a>");
									cancel = $("<a class=\"modal-trigger button-orange modal-close\" href=\"#modal-rechazo\">Rechazar</a>");
									acept = $("<a style='cursor: pointer;' class=\"button-gray \">Aceptar</a>");
									cancel.click(function () {
										$("#rejectText").empty();
										$("#idReject").val(value.id);
									});
									acept.click(function () {
										aceptOp(value.id, $("#autPayDate").val());
									});
									aut.click(function () {
										let autEmisor = $("#autEmisor");
										let autCFDI = $("#autCFDI");
										let autConciliador = $("#autConciliador");
										let autReferencia = $("#autReferencia");
										let autMonto1 = $("#autMonto1");
										let autMonto2 = $("#autMonto2");
										let autClabe = $("#autClabe");
										let autPayDate = $("#autPayDate");
										autEmisor.empty();
										autCFDI.empty();
										autConciliador.empty();
										autReferencia.empty();
										autMonto1.empty();
										autMonto2.empty();
										autClabe.empty();
										autEmisor.append(value.emisor);
										autCFDI.append(uuid);
										autConciliador.append(uuid2);
										autReferencia.append(value.operation_number);
										autMonto1.append("$" + value.total1);
										autMonto2.append("$" + value.total2);
										autClabe.append(value.account_clabe);
										let dateS = (value.datePago);
										dateS = dateS.split("-");
										autPayDate.attr("value", dateS[2] + "-" + dateS[1] + "-" + dateS[0]);
										$("#autAceptar").empty();
										$("#autCancel").empty();
										$("#autAceptar").append(acept);
										$("#autCancel").append(cancel);
									});
									break;
								case "1":
								case "3":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							clabe = value.clabeTransferencia;
							exitMoney = value.entry_money;
							entryMoney = value.exit_money;
							
						} else if (flag === "receptor" && (value.status === 3 || value.status === 4)) {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							clabe = "xxxxxxxxxxxxxx" + value.clabeTransferencia.substring(value.clabeTransferencia.length - 4);
						} else {
							switch (value.status) {
								case "0":
									aut = "<i class=\"small material-icons\">panorama_fish_eye</i>";
									break;
								case "3":
								case "1":
									aut = "<i class=\"small material-icons\" style=\"color: green;\">check_circle</i>";
									break;
								case "2":
									aut = "<i class=\"small material-icons\" style=\"color: red;\">cancel</i>";
									break;
							}
							clabe = "-";
						}
						switch (value.status) {
							case "0":
								status = "<p><span class=\"estatus\">Por autorizar</span></p>";
								break;
							case "1":
								status = "<p><span class=\"estatus\" style=\"background-color:#8225fc\">Autorizada</span></p>";
								break;
							case "2":
								status = "<p><span class=\"estatus\" style=\"background-color:#c20005\">Rechazada</span></p>";
								break;
							case "3":
								status = "<p><span class=\"estatus\" style=\"background-color:#52A447\">Realizada</span></p>";
								break;
							case "4":
								status = "<p><span class=\"estatus\" style=\"background-color:#dedc48\">Vencida</span></p>";
								break;
						}
						const tr = $("<tr " + flag + ">" +
							"<td class='tabla-celda center-align' id='aut" + value.id + "'></td>" +
							"<td class='tabla-celda center-align' style='text-wrap: nowrap;'>" + status + "</td>" +
							"<td class='center-align " + flag + "'>" + clabe + "</td>" +
							"<td class='center-align " + flag + "'>" + value.reference_number + "</td>" +
							"<td class='center-align'>" + value.folio + "</td>" +
							"<td class='center-align'>Ver CFDI </td>" +
							"<td class='center-align' >$ " + exitMoney + "</td>" +
							"<td class='center-align' >$ " + entryMoney + "</td>" +
							"<td class='center-align'> " + value.deudor + "</td>" +
							"<td class='center-align'>" + value.receptor + "</td>" +
							"<td class='center-align'  style='text-wrap: nowrap;' id=\"tblPayD" + value.id + "\" >" + value.payment_date + "</td>" +
							"</tr>");
						$("#tblBody").append(tr);
						$("#aut" + value.id).append(aut);
					});
				}
			},
			complete: function () {
				$("#solveLoader").css({
					display: "none"
				});
			},
			error: function (data) {
				$("#solveLoader").css({
					display: "none"
				});
				let toastHTML = "<span><strong>Ha ocurrido un problema, por favor intente mas tarde</strong></span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
				toastHTML = "<span>Si el problema persiste levante ticket en el apartado de soporte</span>" +
					"<button onclick='M.Toast.dismissAll()' class='btn-flat toast-action'>" +
					"<span class='material-icons' style='display: block; color: white;'>cancel</span></button>";
				M.toast({html: toastHTML, displayLength: 20000, duration: 20000});
			}
		});
	}
</script>
