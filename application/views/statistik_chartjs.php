<div class="container-fluid mt-3">
	<canvas id="myChart" width="400" height="400"></canvas>
	<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	    	labels: [
	    	<?php 
	    		foreach ($stat as $s) {
	    			echo "'".$s->provinsi."', ";
	    		}
	    	?>
	    	],
	        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
	        datasets: [{
	            label: '# of Votes',
	            data: [
	            <?php 
	            	foreach ($stat as $s) {
	            		echo $s->jumlah.', ';
	            	}
	            ?>
	            ],
	            // data: [12, 19, 3, 5, 2, 3],
	            backgroundColor: [

	            	// hitung provinsi
	    //         	<?php
	    //         		$a = "";
	    //         		foreach ($count as $c) {
					// 	echo $c->count;
					// 	};
					// ?>

					// looping warna
					<?php
	            		$i=1;
						while ( $i<=6 ) {
							echo "
							'rgba(255, 99, 132, 0.2)', 
							'rgba(54, 162, 235, 0.2)', 
							'rgba(255, 206, 86, 0.2)', 
							'rgba(75, 192, 192, 0.2)', 
							'rgba(153, 102, 255, 0.2)', 
							'rgba(255, 159, 64, 0.2)', 
							";
						$i++;
						}
	            	?>
	                // 'rgba(255, 99, 132, 0.2)',
	                // 'rgba(54, 162, 235, 0.2)',
	                // 'rgba(255, 206, 86, 0.2)',
	                // 'rgba(75, 192, 192, 0.2)',
	                // 'rgba(153, 102, 255, 0.2)',
	                // 'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	            	<?php
	            		$i=1;
						while ( $i<=6 ) {
							echo "
							'rgba(255, 99, 132, 1)', 
							'rgba(54, 162, 235, 1)', 
							'rgba(255, 206, 86, 1)', 
							'rgba(75, 192, 192, 1)', 
							'rgba(153, 102, 255, 1)', 
							'rgba(255, 159, 64, 1)', 
							";
						$i++;
						}
	            	?>
	                // 'rgba(255, 99, 132, 1)',
	                // 'rgba(54, 162, 235, 1)',
	                // 'rgba(255, 206, 86, 1)',
	                // 'rgba(75, 192, 192, 1)',
	                // 'rgba(153, 102, 255, 1)',
	                // 'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                }
	            }]
	        }
	    }
	});
	</script>
</div>