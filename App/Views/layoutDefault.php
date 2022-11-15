<html>
	<head>
		<meta charset="utf-8" />
		<title>Miniframework</title>
		<?= $this->load_head() ?>
	</head>

	<body>
    <?= $this->load_sidebar() ?>
    <div class="content">
        <?= $this->load_topbar() ?>
        <div class="container">
            <?= $this->content($view_data) ?>
        </div>
    </div>
</body>

</html>