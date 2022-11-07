<html>
<head>
	<title>Edit your Porduct</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
<h1>Product Information</h1>

<h1>New Product Information</h1>
<form action='' method='post' enctype="multipart/form-data">

	<label>Name:<input type="text" name="name" value="<?= $data->name ?>" /></label><br>

	<input type="submit" name="action" value="Modify pet" />

</form>

<!-- <script>
profile_pic.onchange = evt => {
  const [file] = profile_pic.files
  if (file) {
    profile_pic_preview.src = URL.createObjectURL(file)
  }
}

file = "<?= $data['animal']->profile_pic ?>";
if (file != "") {
	document.getElementById("profile_pic_preview").src = "/images/" + file;
}

</script> -->

<a href="/Product/indexAdmin/<?= $data['profile']->profile_id ?>">Cancel</a>

</body>
</html>