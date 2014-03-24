<?php
echo $menu;
echo $this->renderMessage();
?>
<div class="row-fluid">
<div class="span12 well">
<div class="form">
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

<?php
$ajaxOpt = array(
        'type'=>'POST',
        'url'=>CController::createUrl('device/ajaxNomenclature'),
        'update'=>'#nomenclature',
        'data'=>array('nGroup'=>'js:$("#Device_nGroup_id").val()'));
?>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'nGroup_id')?>
	<?php echo CHtml::activeDropDownList($model, 'nGroup_id', NomenclatureGroup::model()->getArray(), Array('ajax' => $ajaxOpt))?>
</div>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'nomenclature_id')?>
	<?php echo CHtml::activeDropDownList($model, 'nomenclature_id', Nomenclature::model()->getArray($model->nGroup_id), Array('id' => 'nomenclature'))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'vendor_id')?>
	<?php echo CHtml::activeDropDownList($model, 'vendor_id', Vendor::model()->getArray())?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'accountancy_name')?>
	<?php echo CHtml::activeTextField($model, 'accountancy_name')?>
</div>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'serial_num')?>
	<?php echo CHtml::activeTextField($model, 'serial_num')?>
</div>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'inv_num')?>
	<?php echo CHtml::activeTextField($model, 'inv_num')?>
</div>
<div class="row-fluid">
    <?php
    echo CHtml::activeLabel($model, 'comment');
    $this->widget('ext.editMe.widgets.ExtEditMe', Array(
    		'model' => $model,
    		'attribute' => 'comment',
    		'resizeMode' => 'vertical',
    		'toolbar' => array(
				array(
					'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo',
				),
				array(
					'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'
				),
				'/',
				array(
					'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat',
				),
				array(
					'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl',
				),
				array(
					'Link', 'Unlink', 'Anchor',
				),
				array(
					'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak'
				),
				'/',
				array(
					'Styles', 'Format', 'Font', 'FontSize',
				),
				array(
					'TextColor', 'BGColor',
				),
				array(
					'Maximize'
				),
			)
    ));
    ?>
</div>
<div class="row-fluid submit">
	<?php echo CHtml::submitButton('Сохранить', Array('class' => 'btn'))?>
	<?php echo CHtml::link('Отменить', Array('device/index'), Array('class' => 'btn'))?>
</div>
<?php $this->endWidget(); ?></div>
</div>
</div>