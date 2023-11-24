<!DOCTYPE html>
<html>
<head>
	<title>Strategy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="jumbotron border border-info border-2">
					<h2>Header Password hasing</h2>
					<br>
					<br>
					<form method="post" action="<?php echo base_url('Home/hasing'); ?>">
						<div class="mb-2 p-2">
							<input type="text" class="form-control form-control-md" name="sname" id="sname" required="true">
						</div>
						<div class="mb-2 p-2">
							<input type="text" class="form-control form-control-md" name="sname1" id="sname1" required="true">
						</div>
						<div class="mb-2 p-2">
							<input type="submit" class="btn btn-lg btn-info" name="submit" id="submit">
						</div>
					</form>
					
				</div>
			</div>
			<div class="col-3"></div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>