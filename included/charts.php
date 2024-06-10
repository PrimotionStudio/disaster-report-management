<script>
	var speedCanvas = document.getElementById("speedChart");
	<?php
	$select_disasters = "SELECT * FROM disasters";
	$query_disasters = mysqli_query($con, $select_disasters);
	$disaster_types = [];
	while ($get_disaster = mysqli_fetch_assoc($query_disasters)) {
		$disaster_types[] = $get_disaster["disaster"];
	}

	$disasters = [];
	foreach ($disaster_types as $type) {
		$severity = [];
		$select_disasters = "SELECT * FROM disasters WHERE disaster='$type'";
		$query_disasters = mysqli_query($con, $select_disasters);
		while ($get_disaster = mysqli_fetch_assoc($query_disasters)) {
			$severity[] = $get_disaster["severity"];
		}
		$disasters[$type] = $severity;
	}
	$colors = ['51cbce', '6c757d', '6bd098', 'ef8157', 'fbc658', '51bcda', '212529', '343a40'];
	$x = 0;
	foreach ($disasters as $type => $disaster) {
	?>
		var <?= $type ?> = {
			data: [<?php
					foreach ($disaster as $i => $sever) {
						if ($i != 0) {
							echo ", ";
						}
						echo $sever;
					}
					?>],
			fill: false,
			borderColor: '#<?= $colors[$x] ?>',
			backgroundColor: 'transparent',
			pointBorderColor: '#<?= $colors[$x] ?>',
			pointRadius: 4,
			pointHoverRadius: 4,
			pointBorderWidth: 8,
		};
	<?php
		$x++;
	}
	?>

	var speedData = {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [<?php
					foreach ($disaster_types as $i => $type) {
						if ($i != 0) {
							echo ", ";
						}
						echo $type;
					}
					?>]
	};

	var chartOptions = {
		legend: {
			display: false,
			position: 'top'
		}
	};

	var lineChart = new Chart(speedCanvas, {
		type: 'line',
		hover: false,
		data: speedData,
		options: chartOptions
	});
</script>