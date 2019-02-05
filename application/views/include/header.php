
  <html>
	<head>
		<title>FOODWAZE</title>
    <!-- for homepage -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into each step individually.">
    <meta name="keywords" content="wizard">


<!--modal-->
    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Nifty Modal Window Effects</title>
		<meta name="description" content="Nifty Modal Window Effects with CSS Transitions and Animations" />
		<meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation, effect, 3d, perspective" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>FoodWaze</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>">
    <link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/lorestyle.css' ); ?>" rel="stylesheet">

    <script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> 
    <script src = "<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.js'); ?>"></script> 
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
        width: 63px;
        height: 63px;
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
      label{
        margin:0;
        padding:0;
      }

</style>
	</head>

<script>
  function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
    (!document.mozFullScreen && !document.webkitIsFullScreen)) {
      if (document.documentElement.requestFullScreen) {  
        document.documentElement.requestFullScreen();  
      } else if (document.documentElement.mozRequestFullScreen) {  
        document.documentElement.mozRequestFullScreen();  
      } else if (document.documentElement.webkitRequestFullScreen) {  
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
      }  
    } else {  
      if (document.cancelFullScreen) {  
        document.cancelFullScreen();  
      } else if (document.mozCancelFullScreen) {  
        document.mozCancelFullScreen();  
      } else if (document.webkitCancelFullScreen) {  
        document.webkitCancelFullScreen();  
      }  
    }  
  }
</script>
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