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
    <?php echo CHtml::activeLabel($model,'username'); ?>
    <?php echo CHtml::activeTextField($model,'username', Array('value' => $model->username)) ?>
</div>

<div class="row-fluid">
    <?php echo CHtml::activeLabel($model,'password'); ?>
    <?php echo CHtml::activePasswordField($model,'password', Array('value' => '')) ?>
</div>

<div class="row-fluid">
    <?php echo CHtml::activeLabel($model,'password2'); ?>
    <?php echo CHtml::activePasswordField($model,'password2', Array('value' => '')) ?>
</div>

<div class="row-fluid">
    <?php echo CHtml::activeLabel($model,'email'); ?>
    <?php echo CHtml::activeTextField($model,'email', Array('value' => $model->email)) ?>
</div>

<?php
$ajaxOpt = array(
        'type'=>'POST',
        'url'=>CController::createUrl('user/ajax'),
        'update'=>'#room',
        'data'=>array('organization'=>'js:$("#User_organization_id").val()'));
?>

<div class="row-fluid">
    <?php echo CHtml::activeLabel($model,'organization_id'); ?>
    <?php echo CHtml::activeDropDownList($model, 'organization_id', $this->getOrganizationList(), Array('ajax' => $ajaxOpt))?>
</div>

<div class="row-fluid">
	<?php echo CHtml::activeLabel($model, 'room_id');?>
	<?php echo CHtml::activeDropDownList($model, 'room_id', $this->getRoomList($model->organization_id), Array('id' => 'room'));?>
</div>

<div class="row-fluid">
	<?php echo CHtml::submitButton('Сохранить', Array('class' => 'btn'))?>
	<?php echo CHtml::link('Отменить', Array('user/index'), Array('class' => 'btn'))?>
</div>
<?php $this->endWidget(); ?></div>

</div>
</div>