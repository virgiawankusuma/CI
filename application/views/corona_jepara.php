	<div class="container-fluid mt-5 mb-5">
		<div id="container" class="mb-5"></div>
		<div class="text-center">
			<button class="btn btn-success" data-toggle="modal" data-target="#modalupload">Import Excel</button>
			<button class="btn btn-outline-success">Export Excel</button>
		</div>
	</div>

<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('statistik/unggah') ;?>" enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" name="file" class="form-control-file">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
		</form>
    </div>
  </div>
</div>
<script type="text/javascript">

	Highcharts.chart('container', {

	  title: {
	    text: 'DATA TERKINI COVID-19 JEPARA JUMAT, 26 JUNI 2020, 18.00 WIB',
	    y: 10
	  },

	  chart: {
	  	type: 'column'
	  },
	  tooltip: {
	    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	      '<td style="padding:0"><b>{point.y:1f} Jiwa</b></td></tr>',
	    footerFormat: '</table>',
	    shared: true,
	    useHTML: true
	  },

	  yAxis: {
	    title: {
	      text: 'Jumlah'
	    }
	  },

	  xAxis: {
	    categories: [

	    <?php 
	    	foreach ($coronas as $corona => $c) {
	    		echo strtoupper("'$c->kecamatan', ");
	    	}
	    ?>

	    ]
	  },

	  legend: {
	    align: 'center',
	    verticalAlign: 'top',
	    floating: true,
	    x: 0,
	    y: 20
	  },

	  plotOptions: {
	    series: {
	      label: {
	        connectorAllowed: false
	      },
	    }
	  },

	  series: [{
	    name: 'Pelaku Perjalanan',
	    data: [
	    <?php 
	    	foreach ($coronas as $corona => $c) {
	    		echo $c->pp.', ';
	    	}
	    ?>
	    ]
	  }, {
	    name: 'Positif',
	    data: [
	    <?php 
	    	foreach ($coronas as $corona => $c) {
	    		echo $c->positif.', ';
	    	}
	    ?>
	    ]
	  }, {
	    name: 'ODP',
	    data: [
	    <?php 
	    	foreach ($coronas as $corona => $c) {
	    		echo $c->odp.', ';
	    	}
	    ?>
	    ]
	  }, {
	    name: 'PDP',
	    data: [
	    <?php 
	    	foreach ($coronas as $corona => $c) {
	    		echo $c->pdp.', ';
	    	}
	    ?>
	    ]
	  }],

	  responsive: {
	    rules: [{
	      condition: {
	        maxWidth: 500
	      },
	      chartOptions: {
	        legend: {
	          layout: 'horizontal',
	          align: 'center',
	          verticalAlign: 'bottom'
	        }
	      }
	    }]
	  }
	});
</script>