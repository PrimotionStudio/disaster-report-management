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
	?>
	var dataFirst = {
		data: [0, 19, 15, 20, 30, 40, 40, 50, 25, 30, 50, 70],
		fill: false,
		borderColor: '#fbc658',
		backgroundColor: 'transparent',
		pointBorderColor: '#fbc658',
		pointRadius: 4,
		pointHoverRadius: 4,
		pointBorderWidth: 8,
	};

	var dataSecond = {
		data: [0, 5, 10, 12, 20, 27, 30, 34, 42, 45, 55, 63],
		fill: false,
		borderColor: '#51CACF',
		backgroundColor: 'transparent',
		pointBorderColor: '#51CACF',
		pointRadius: 4,
		pointHoverRadius: 4,
		pointBorderWidth: 8
	};

	var speedData = {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [dataFirst, dataSecond]
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