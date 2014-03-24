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
	<?php echo CHtml::activeLabel($model, 'name');?>
	<?php echo CHtml::activeTextField($model, 'name', Array('value' => $model->name))?>
</div>
 
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'fio');?>
	<?php echo CHtml::activeTextField($model, 'fio', Array('value' => $model->fio))?>
</div>
 
<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'tel');?>
	<?php echo CHtml::activeTextField($model, 'tel', Array('value' => $model->tel))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'email');?>
	<?php echo CHtml::activeTextField($model, 'email', Array('value' => $model->email))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'url');?>
	<?php echo CHtml::activeTextField($model, 'url', Array('value' => $model->url))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'address');?>
	<?php echo CHtml::activeTextArea($model, 'address', Array('value' => $model->address))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'inn');?>
	<?php echo CHtml::activeTextField($model, 'inn', Array('value' => $model->inn))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'bik');?>
	<?php echo CHtml::activeTextField($model, 'bik', Array('value' => $model->bik))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'ogrn');?>
	<?php echo CHtml::activeTextField($model, 'ogrn', Array('value' => $model->ogrn))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'pa');?>
	<?php echo CHtml::activeTextField($model, 'pa', Array('value' => $model->pa))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'ca');?>
	<?php echo CHtml::activeTextField($model, 'ca', Array('value' => $model->ca))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'bank');?>
	<?php echo CHtml::activeTextField($model, 'bank', Array('value' => $model->bank))?>
</div>

<div class="row-fluid submit">
	<?php echo CHtml::submitButton('Сохранить', Array('class'=>'btn'))?>
	<?php echo CHtml::link('Отменить', Array('contractor/index'), Array('class'=>'btn'))?>
</div>
<?php $this->endWidget(); ?></div>
</div>
</div>