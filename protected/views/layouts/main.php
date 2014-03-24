<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo Yii::app()->name; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/res/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/res/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/res/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/res/css/base.css">
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
	<script src="<?php echo Yii::app()->baseUrl;?>/res/js/bootstrap.js"></script>
	<script src="<?php echo Yii::app()->baseUrl;?>/res/js/base.js"></script>
</head>
<body>
<div class="container-fluid">
<?php
	if (!Yii::app()->user->isGuest){
		echo "<h1 class=\"top-logo\"><i class=\"fa fa-barcode\"></i> АСПИ".$this->getCaption()."</h1>";
	} 
	
	echo $content;
?>
</div>
</body>
</html>
