<div class="container">
	<div class="row">
		<div class="col m6 text-center align-center center-align center">
			<img src="/assets/img/Full_Logo_alyric.png" class="at-item" style="width: 90%;margin: auto;padding: initial;display: block;" alt="logo">
		</div>
		<div class="col m6">
			<div class="col-5">
				<h2 style="color: white">Iniciar sesión</h2>
				<?php if ( session ()->getFlashdata ( 'msg' ) ): ?>
					<div class="alert alert-warning">
						<?= session ()->getFlashdata ( 'msg' ) ?>
					</div>
				<?php endif; ?>
				<form id="signinForm" name="signinForm">
					<div class="form-group mb-3">
						<input
								type="text" name="email" id="email" placeholder="Correo electrónico o Nickname" value=""
								class="form-control">
						<label for="email"></label>
					</div>
					<div class="form-group mb-3">
						<input
								type="password" name="password" id="password" placeholder="Contraseña"
								class="form-control">
						<label for="password"></label>
					</div>
					<div class="d-grid">
						<button type="submit" class="btn btn-success red">Iniciar sesión</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<style>
    input {
        color: white;
    }

    .at-item {
        filter: drop-shadow(4px 6px 3px rgb(0 0 0 / 0.4));
        animation-name: angry-animation;
        animation-duration: 5s;
        animation-timing-function: linear;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
    }

    @keyframes angry-animation {
        100% {
            -webkit-transform: rotatey(360deg);
            transform: rotatey(360deg);
        }

</style>
<script>
	$(document).ready(function () {
		$("#signinForm").on("submit", function (e) {
			e.preventDefault();
			const formData = new FormData(this);
			$.ajax({
				url: "/signin",
				type: "POST",
				data: formData,
				beforeSend: function () {
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