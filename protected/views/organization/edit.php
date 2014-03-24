<?php
if ($model == null)
	$this->redirect($this->createUrl('organization/index'));

echo $menu;
echo $this->renderMessage();
?>
<div class="row-fluid">
<div class="span12 well">
<div class="form">
<?php $form = $this->beginWidget('CActiveForm'); ?>
 
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <?php echo CHtml::activeLabel($model,'name'); ?>
    <?php echo CHtml::activeTextField($model,'name', Array('value' => $model->name)) ?></div>
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
	<?php echo CHtml::submitButton('Сохранить', Array('class'=>'btn'))?>
	<?php echo CHtml::link('Отменить', Array('organization/index'), Array('class'=>'btn'))?>
</div>
<?php $this->endWidget(); ?></div>
</div>
</div>
