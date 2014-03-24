<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="form">
<?php $form = $this->beginWidget('CActiveForm'); ?>
 
<?php echo $form->errorSummary($model); ?>
<div class="row">
    <?php echo CHtml::activeLabel($model,'name'); ?>
    <?php echo CHtml::activeTextField($model,'name', Array('value' => $model->name)) ?>
</div>

<div class="row submit">
	<?php echo CHtml::submitButton('Сохранить')?>
	<?php echo CHtml::link('Отменить', Array('nomenclature/index'))?>
</div>
<?php $this->endWidget(); ?></div>