<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>
    		
		<!-- Css file -->
			<link rel="stylesheet" href="/css/Profile/edit.css"/>

		<h1>Edit Profile</h1>
	</head>
	
	<body>
		<!-- Nav -->
    		<?php $this->view('nav'); ?>
      		
		<h1 style="margin: 3% 0% 3% 42%"> <?= _("Edit Profile") ?> </h1>
			
		<!-- Form to allow user to edit profile -->
			<div class="everything">
				<div class="col-md-5">
		    		<div class="p-3 py-5">
						<form action='' method='post' enctype="multipart/form-data">
							<div class="form-group">
								<label><?= _("Username") ?> </label>
								<input type="text" class="form-control" name='username' value="<?= $data->username ?>">
							
								<label><?= _("First Name") ?> </label>
								<input type="text" class="form-control" name="first_name" value="<?= $data->first_name ?>">
							
								<label> <?= _("Last Name") ?> </label>
								<input type="text" class="form-control" name="last_name" value="<?= $data->last_name ?>">
							
								<label> <?= _("Postal Code") ?> </label>
								<input type="text" class="form-control" name="postal_code" value="<?= $data->postal_code ?>">
							
								<label> <?= _("City") ?> </label>
								<input type="text" class="form-control" name="city"value="<?= $data->city ?>">
								
								<label> <?= _("Profile Image:") ?> <input type="file" name="image" id="image" />
								</label><img id='image_preview' src='/images/blank.jpg' style="max-width:200px; max-height: 200px" /><br>
								
								<button style='margin-left: 37%; margin-top: 4%;' type="submit" name='action' class="btn btn-success"> <?= _("Save") ?> </button>
							</div>
						</form>
					</div>
				</div>
			</div>		
	</body>
</html>

	<!-- Display Image -->
		<script>
			image.onchange = evt => {
	  		const [file] = image.files
	  		if (file) {
	    		image_preview.src = URL.createObjectURL(file)
	  			}
			}

			file = "<?= $data->image ?>";
			if (file != "") {
			document.getElementById("image_preview").src = "/images/" + file;
			}
		</script>
