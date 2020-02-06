<script type="text/javascript">

	function addGol(id_partido, numEquipo, tip) {
		$.post("AddGool",
	{
		IDPartido: id_partido,
		num_equipo: numEquipo,
		Tipo: tip,
	},
	function (data, status) {
		location.reload();
	});
	}


	function Finalizar(id_partido) {
		$.post("FinisPartido",
	{
		IDPartido: id_partido,
	},
	function (data, status) {
		location.reload();
	});
	}
</script>
