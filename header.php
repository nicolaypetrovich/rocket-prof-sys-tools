<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title></title>
	<link rel="shortcut icon" type="img/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>
	<?php wp_head();?>
	<script>
		var ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
</head>
<body>
<?php $front_page = get_option( 'page_on_front' ); ?>
    <div class="body body-page2" id="body">
