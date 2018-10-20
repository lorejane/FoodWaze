<html>
	<head>
		<title>FOODWAZE</title>
			<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
			<link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
	</head>
<body>
<?php
	if($this->session->has_userdata('logged_in')){
		include('nav.php');
	}
?>

<main class="main-container">