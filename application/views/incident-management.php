<?php
require_once('dash-header.php');
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		<?php require_once('dash-top.php'); ?>

		<?php require_once('dash-sidebar.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?php 
					echo $pageName;
					?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo VIWS; ?>dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?php echo $pageName;?></li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="box p-3">
							<div class="row">
								<div class="col-lg-3 col-md-3">
									<button class="btn btn-primary" data-toggle="modal" data-target="#maininci"><i class="fa fa-plus"></i> Creat Main Incident</button>
								</div>
								<div class="col-lg-3 col-md-3">
									<button class="btn btn-primary" data-toggle="modal" data-target="#subinci"><i class="fa fa-plus"></i> Creat Sub Incident</button>
								</div>
								<div class="col-lg-3 col-md-3">
									<a href="download-incident.php" class="btn btn-secondary"><i class="fa fa-download"></i> Download Report</a>
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="clearfix"></div>
									
									<a href="incident-report.php" class="btn btn-success float-right">Go to Incident <i class="fa fa-angle-double-right"></i></a>
									
								</div>

							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 mt-4">
									<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
								</div>
								<div class="col-lg-8 col-md-8 mt-5">
									<canvas id="myCharts" style="width:100%;max-width:600px"></canvas>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</section>
		</div>



<div class="modal" id="maininci">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=maininci&p=<?php echo $pageName;?>">
        	<div class="form-group">
        		<label>Create Main Incident</label>
        		<input type="text" name="maininci" class="form-control" required>
        	</div>
        	
      	</div>
		<div class="modal-footer">
      	<div class="form-group">
        		<input type="submit" name="savemain" class="btn btn-dark" value="Create">
        	</div>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="subinci">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=subinci&p=<?php echo $pageName;?>">
        	<div class="form-group">
        		<label>Create Sub Incident</label>
        		<input type="text" name="subinci" class="form-control" required>
        	</div>
        	
      	</div>
		<div class="modal-footer">
      	<div class="form-group">
        		<input type="submit" name="savesub" class="btn btn-dark" value="Create">
        	</div>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
var xValues = ["Total Incident", "Pending", "Complete"];
var yValues = [55, 49, 44];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797"
  
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Incident Report Summary"
    }
  }
});

const xValuesd = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myCharts", {
  type: "line",
  data: {
    labels: xValuesd,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}

  }
});
</script>
<?php
require_once('dash-footer.php');
?>