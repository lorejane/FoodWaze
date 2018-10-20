
  <html>
	<head>
		<title>FOODWAZE</title>
			<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
			<link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
      
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

</style>
    <script type="text/javascript">
      function displaynum(n1){
        calcform.txt1.value=calcform.txt1.value+n1;
      }

    </script>
	</head>
<body>
<?php include('nav.php'); ?>	
<main class="main-container">