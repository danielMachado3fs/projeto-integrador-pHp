<html>
	<head>
		<meta charset="utf-8" />
		<title>Rastrear - controle de frotas</title>
		<?= $this->load_head() ?>
	</head>

	<body>
    <?= $this->load_sidebar() ?>
    <div class="content">
        <?= $this->load_topbar() ?>
        <div class="container">
            <?= $this->content($viewData) ?>
        </div>
    </div>
    <?= $this->load_footer() ?>
</body>

</html>