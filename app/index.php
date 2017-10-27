<!DOCTYPE html>
<html>
<head>
	<title>Colorthing</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="/app/styles.css">
	<script src="https://use.fontawesome.com/0ae43396ca.js"></script>
</head>
<body class="container">

	<h1 class="text-center mt-5">ColorThing</h1>

	<!-- New color form -->
	<h4 class="mt-4">New Color</h4>
	<?php include('./components/color.php'); ?>
	
	<!-- New palette form -->
	<h4 class="mt-4">New Palette</h4>
	<?php include('./components/palette.php'); ?>

	<div class="row">
		<div class="col">
			<!-- Palettes list with colors listed below -->
			<h4 class="text-center mt-5">Palettes</h4>

			<ul>
				<?php foreach (getPalettes() as $palette) { ?>

				<li class="mb-2">
					<div class="row">
						<div class="col-1 mr-2">
							<form method="get" action="">
								<input name="removePalette" value="<?=$palette['id']?>" type="hidden">
								<button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
							</form>
						</div>
						<div class="col-6">
							<?=$palette['palette_name']?>
						</div>
					</div>						
				</li>

				<?php } ?>
			</ul>
		</div>
		<div class="col">
			<!-- Color list -->
			<h4 class="text-center mt-5">Colors</h4>

			<ul>
				<?php foreach (getColors() as $color) { ?>
	
					<li class="mb-2">
						<div class="row">
							<div class="col-1 mr-3">
								<form method="get" action="">
									<input name="removeColor" value="<?=$color['id']?>" type="hidden">
									<button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</form>
							</div>
							<div class="col-6 text-center" id="color-box" style="background-color: #<?=$color['hex']?>;">
								<?=$color['hex']?>
							</div>
							<div class="col-4">
								<?=$color['name']?>
							</div>
						</div>		
					</li>

				<?php } ?>
			</ul>
		</div>
	</div>


</body>
</html>