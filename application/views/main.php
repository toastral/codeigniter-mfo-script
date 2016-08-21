<?include_once($this->config->item('views_root').'/head.php');?>
</head>
<body>

<div class="container">
	<?include_once($this->config->item('views_root').'/top.php');?>
	<div class="row">
		<div class="col-md-10 text-left">
			<?include_once($this->config->item('views_root').'/'.$content.'.php');?>
		</div>
		<div class="col-md-2 text-left">
		</div>
	</div>
	<?include_once($this->config->item('views_root').'/footer.php');?>
</div>

</body>
</html>
