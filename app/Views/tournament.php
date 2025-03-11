<link rel="stylesheet" href="/assets/css/jquery.bracket.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/assets/js/jquery.bracket.min.js"></script>
<div class="container mt-5">
	<div class="row justify-content-md-center" id="torneo"></div>
</div>
<script>
	$(document).ready(function () {
		const datosTorneo = {
			teams: [
				["Team 1", "Team 2"],
				["Team 3", null],
				["Team 4", null],
				["Team 5", null]
			],
			results: []
		};
		$(function () {
			$("#torneo").bracket({
				teamWidth: 100,
				scoreWidth: 43,
				matchMargin: 25,
				roundMargin: 60,
				init: datosTorneo,
				save: function (data) {
					console.log("Datos actualizados:", data);
				}
			});
		});
	});
</script>
