<script src="<?php echo Yii::app()->baseUrl;?>/res/js/svg.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/res/js/room.js"></script>
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
    <?php echo CHtml::activeTextField($model,'name', Array('value' => $model->name)) ?>
</div>
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'organization_id')?>
	<?php echo CHtml::activeDropDownList($model, 'organization_id', $this->getOrgList())?>
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
<div class="row-fluid">
	<?php echo CHtml::activeHiddenField($model, 'svg', Array('id'=>'roomEdit'))?>
</div>
<div class="row-fluid submit">
	<?php echo CHtml::submitButton('Сохранить', Array('class'=>'btn'))?>
	<?php echo CHtml::link('Отменить', Array('room/index'), Array('class'=>'btn'))?>
</div>
<?php $this->endWidget(); ?></div>

<hr>
	<div class="navbar">
	<div class="navbar-inner">
		<a href="#createWall" role="button" class="btn pull-right" data-toggle="modal"><i class="fa fa-file"></i></a>
	</div>
	</div>
	<div id="svg">
		<?php
			if ($model->svg == "")
				echo "<svg id=\"svg_draw\" xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"40px\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" preserveAspectRatio=\"none\"></svg>";
			else 
				echo CHtml::decode($model->svg);
		?>
	</div>
</div>
</div>

<div class="modal hide fade" id="createWall">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Создание плана помещения</h3>
  </div>
  <div class="modal-body">
    <form action=# name="wall">
   	<textarea name="coord"></textarea>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
    <button class="btn btn-primary" onClick="createWall(document.forms.wall.coord.value)">Создать</button>
  </div>
</div>
