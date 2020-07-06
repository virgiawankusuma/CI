<div class="container-fluid mt-3">
	<div id="myfirstchart" style="height: 250px;"></div>
</div>
<script type="text/javascript">
	new Morris.Bar({
	// ID of the element in which to draw the chart.
	element: 'myfirstchart',
	// Chart data records -- each entry in this array corresponds to a point on
	// the chart.
		data: [
		<?php 
		if(count($morrisjs) > 0){
			foreach ($morrisjs as $m) {
				echo "{ provinsi: '$m->provinsi', value: $m->jumlah}, ";
			}
		}
		?>
		// { year: '2008', value: 20 },
		// { year: '2009', value: 10 },
		// { year: '2010', value: 5 },
		// { year: '2011', value: 5 },
		// { year: '2012', value: 20 }
		],
		// The name of the data record attribute that contains x-values.
		xkey: 'provinsi',
		// A list of names of data record attributes that contain y-values.
		ykeys: ['value'],
		// Labels for the ykeys -- will be displayed when you hover over the
		// chart.
		labels: ['Value']
	});
</script>