<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if( is_front_page() ){ echo get_bloginfo('name')  . ' » ' . get_bloginfo('description'); } else { echo wp_title(); }; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="img/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>
	<?php wp_head();?>
	<script>
		var ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
</head>
<body>
    <div class="body body-page2" id="body">
