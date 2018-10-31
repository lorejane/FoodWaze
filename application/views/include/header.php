
  <html>
	<head>
		<title>FOODWAZE</title>
    <!-- for homepage -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into each step individually.">
    <meta name="keywords" content="wizard">

    <title>FoodWaze</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="../assets/css/core.min.css" rel="stylesheet">
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">

    <!-- end for homepage -->




      <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
			<link href="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>">
      <link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
      
      <script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
      <style>
        .menu{
          border: 2px solid rgba(0, 0, 0, .2);
        }
        .glyphicon {
          font-size: 100px;
        }
        .order {
          float: left;
          width: 65px;
          height: 60px;
          margin: 5px;
          border: 1px solid rgba(0, 0, 0, .2);
        }
        #color_box {
          width: 30px;
          height: 30px;
          margin: 2px;
          border: 1px solid rgba(0, 0, 0, .2);
        }
        .click {
          float: left;
          width: 135px;
          height: 120px;
          margin: 3px;
          border: 1px solid rgba(0, 0, 0, .2);
        }
        .value {
          float: left;
          width: 25px;
          height: 25px;
          margin: 5px;
          border: 1px solid rgba(0, 0, 0, .2);
        }
        .keypad {
          float: left;
          width: 60px;
          height: 60px;
          margin: 5px;
          border: 1px solid rgba(0, 0, 0, .2);
        }
        .keypad_op {
          float: left;
          width: 50px;
          height: 50px;
          margin: 5px;
          border: 1px solid rgba(0, 0, 0, .2);
        }

</style>
    <script type="text/javascript">
      

    </script>
	</head>
<body>
<?php     
  if($this->session->has_userdata('logged_in')){
    if($this->session->has_userdata('is_admin')){
      include('menu_admin.php');
    }else if($this->session->has_userdata('is_manager')){
      include('menu_manager.php');
    }else if($this->session->has_userdata('is_cashier')){
      include('menu_cashier.php');
    }
  }
?>
<main class="main-container">