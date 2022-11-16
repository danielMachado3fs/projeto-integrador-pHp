<html>

<head>
	<meta charset="utf-8" />
	<title>Miniframework</title>
	<?= $this->load_head() ?>
</head>

<body>
	
	<div class="content">
		
		<div class="container">
			<?= $this->content($view_data) ?>
		</div>
	</div>
</body>

</html>