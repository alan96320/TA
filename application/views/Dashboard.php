<div class="main-panel">
    <div class="content-wrapper">
      	<div class="row">
        	<div class="col-md-3 grid-margin stretch-card">
              	<div class="card">
                	<div class="card-body">
                  		<p class="card-title text-md-center  text-xl-left">Total</p>
                  		<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    		<h3 class="mb-0 mb-md-2 mb-xl-0 text-primary order-md-1 order-xl-0" id="total"></h3>
                    		<i class="ti-layers-alt	 icon-md text-primary mb-0 mb-md-3 mb-xl-0"></i>
                  		</div>  
                  		<p class="mb-0 mt-2 text-primary" id="persenTotal"><span class="text-primary ml-1"><small>Periode Tahun <?=date('Y')?></small></span></p>
                	</div>
              	</div>
        	</div>
            <div class="col-md-3 grid-margin stretch-card">
              	<div class="card">
            		<div class="card-body">
              			<p class="card-title text-md-center  text-xl-left">Pending</p>
              			<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                			<h3 class="mb-0 mb-md-2 mb-xl-0 text-warning order-md-1 order-xl-0" id="pending"></h3>
                			<i class="ti-reload icon-md text-warning mb-0 mb-md-3 mb-xl-0"></i>
              			</div>  
              			<p class="mb-0 text-warning mt-2" id="persenPending"></p>
            		</div>
              	</div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              	<div class="card">
               		<div class="card-body">
                  		<p class="card-title text-md-center text-xl-left">Approve</p>
                  		<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    		<h3 class="mb-0 mb-md-2 mb-xl-0 text-success order-md-1 order-xl-0" id="approve"></h3>
                    		<i class="ti-stats-up icon-md text-success mb-0 mb-md-3 mb-xl-0"></i>
                  		</div>  
                  		<p class="mb-0 mt-2 text-success" id="persenApprove"></p>
                	</div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              	<div class="card">
                	<div class="card-body">
                  		<p class="card-title text-md-center text-xl-left">Reject</p>
                  		<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    		<h3 class="mb-0 mb-md-2 mb-xl-0 text-danger order-md-1 order-xl-0" id="reject"></h3>
                    		<i class="ti-stats-down icon-md text-danger mb-0 mb-md-3 mb-xl-0"></i>
                  		</div>  
                  		<p class="mb-0 mt-2 text-danger" id="persenReject"></p>
                	</div>
              </div>
            </div>
      	</div>
      	<div class="row">
    		<div class="col-lg-6 grid-margin stretch-card">
      			<div class="card">
        			<div class="card-body">
          				<h4 class="card-title" id="barTitle"></h4>
          				<canvas id="bar"></canvas>
        			</div>
      			</div>
    		</div>
    		<div class="col-lg-6 grid-margin stretch-card">
      			<div class="card">
        			<div class="card-body">
          				<h4 class="card-title" id="dounatTitle"></h4>
          				<canvas id="dounat"></canvas>
        			</div>
      			</div>
    		</div>
  		</div>
		<footer class="footer">
  			<div class="d-sm-flex justify-content-center justify-content-sm-between">
    			<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="http://cepalansuhendar.000webhostapp.com/" target="_blank">Cep Alan Suhendar</a>. All rights reserved.</span>
  			</div>
		</footer>
	</div>
</div>

<script>
	var date = new Date();
	var bar = document.getElementById('bar').getContext('2d');
	var dounat = document.getElementById('dounat').getContext('2d');
	var optionBar = {
        scales: {
	    	yAxes: [{
	        	ticks: {
	         		beginAtZero: true
	        	}
	      	}],
	    },
	    legend: {
	      	display: false
	    },
	    elements: {
	      	point: {
	        	radius: 0
	      	}
	    },
	    responsive: true,
	};
	var optionDounat = {
		responsive: true,
	    animation: {
	    	animateScale: true,
	    	animateRotate: true
	    }
	};
	var backgroundbar = [
        'rgba(54, 162, 235, 0.2)',
        'rgba(254, 166, 35, 0.3)',
        'rgba(140, 208, 63, 0.3)',
        'rgba(255, 71, 71, 0.3)',

        'rgba(153, 102, 255, 0.2)',///
        'rgba(255, 159, 64, 0.3)',
        'rgba(113, 192, 22, 0.3)',
        'rgba(75, 192, 192, 0.3)',
    ];
	var borderbar = [
        'rgba(54, 162, 235, 1)',
        'rgba(254, 166, 35, 1)',
        'rgba(113, 192, 22, 1)',
        'rgba(255, 71, 71, 1)',

        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(200, 245, 146, 1)',
        'rgba(75, 192, 192, 1)',
    ];
    var backgrounddounat = [
        'rgba(254, 166, 35, 0.3)',
        'rgba(140, 208, 63, 0.3)',
        'rgba(255, 71, 71, 0.3)',

        'rgba(255, 159, 64, 0.3)',
        'rgba(113, 192, 22, 0.3)',
        'rgba(75, 192, 192, 0.3)',
    ];
	var borderdounat = [
        'rgba(254, 166, 35, 1)',
        'rgba(113, 192, 22, 1)',
        'rgba(255, 71, 71, 1)',

        'rgba(255, 159, 64, 1)',
        'rgba(200, 245, 146, 1)',
        'rgba(75, 192, 192, 1)',
    ];
	$.ajax({
		type     : 'ajax',
        url      : 'getDataBar',
        async    : true,
        dataType : 'json',
        contentType: 'application/json; charset=utf-8',
        success  : function(dt){
        	// dungsi untuk grafik dounat atau bar
        	var dataBar = [dt['semua'][0].total,dt['pending'][0].total,dt['approve'][0].total,dt['reject'][0].total];
        	var labelBar = ['TOTAL', 'PENDING', 'APPROVE', 'REJECT'];
        	var dataDounat = [dt['pending'][0].total,dt['approve'][0].total,dt['reject'][0].total];
        	var labelDounat = ['PENDING', 'APPROVE', 'REJECT'];
        	var myBarChart = new Chart(bar, {
			    type: 'bar',
			    data: {
			        labels: labelBar,
			        datasets: [{
			            label: 'Periode '+date.getFullYear()+' Jumlah',
			            data: dataBar,
			            backgroundColor: backgroundbar,
			            borderColor: borderbar,
			            borderWidth: 1,
			            fill: false
			        }]
			    },
				options: optionBar,
			});
			var myDoughnutChart = new Chart(dounat, {
			    type: 'doughnut',
			    data: {
			    	datasets: [{
				     	data: dataDounat,
			            backgroundColor: backgrounddounat,
			            borderColor: borderdounat,
				    }],
				    labels: labelDounat,
			    },
			    options: optionDounat
			});
			var luser = dt['luser'];
			var lcompany = dt['lcompany'];
			var SM = dt['semua'][0].total;
			var PN = dt['pending'][0].total;
			var AP = dt['approve'][0].total;
			var RJ = dt['reject'][0].total
			var NT = '<span ml-1"><small>Periode Tahun '+date.getFullYear()+'</small></span>';
			$('#total').html(SM);
			$('#approve').html(AP);
			$('#pending').html(PN);
			$('#reject').html(RJ);
			$('#persenPending').html(SM*PN/100+' % '+NT);
			$('#persenApprove').html(SM*AP/100+' % '+NT);
			$('#persenReject').html(SM*RJ/100+' % '+NT);
			if (lcompany != 3) {
				$('#barTitle').html('bar pengajuan');
				$('#dounatTitle').html('dounat pengajuan');	
			}else{
				if (luser == 1 || luser == 5 || luser == 6 || luser == 7) {
					$('#barTitle').html('bar pengesahan');
					$('#dounatTitle').html('dounat pengesahan');	
				}else{
					if (luser == 3 || luser == 4) {
						$('#barTitle').html('bar pengecekan');
						$('#dounatTitle').html('dounat pengecekan');
					}
				}
			}


				
        }
	});
		
</script>