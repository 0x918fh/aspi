<?php
	echo $menu;
	echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
	<span class="brand"><?php echo $model->accountancy_name;?></span>
</div>
</div>
<?php $form = $this->beginWidget('CActiveForm'); ?>
 
<?php echo $form->errorSummary($model); ?>

<?php
$ajaxOpt = array(
        'type'=>'POST',
        'url'=>CController::createUrl('device/ajaxRoom'),
        'update'=>'#room',
        'data'=>array('organization'=>'js:$("#Device_org_id").val()'));
?>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'org_id')?>
	<?php echo CHtml::activeDropDownList($model, 'org_id', Organization::model()->getArray(NULL), Array('ajax' => $ajaxOpt))?>
</div>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'room_id')?>
	<?php echo CHtml::activeDropDownList($model, 'room_id', Room::model()->getArray($model->org_id), Array('id' => 'room'))?>
</div>
<div class="row-fluid submit">
	<?php echo CHtml::submitButton('Сохранить', Array('class' => 'btn'))?>
	<?php echo CHtml::link('Отменить', Array('device/index'), Array('class' => 'btn'))?>
</div>
<?php $this->endWidget(); ?>
</div>
</div>