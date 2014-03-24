<?php 
echo $menu;
echo $this->renderMessage();
?>
<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
	<span class="brand"><?php echo $model->name;?></span>
	<?php
	echo CHtml::link('<i class="fa fa-reply btn pull-right"></i>', Array('organization/index'));
	echo "<i class=\"divider-vertical pull-right\"></i>";
	echo CHtml::beginForm(Array('organization/delete'), 'post',  Array('name' => 'frmDelete'.$model->id, 'class'=>'navbar-form pull-right'));
	echo CHtml::hiddenField('id', $model->id);
	echo CHtml::link('<i class="fa fa-edit btn edit"></i>', Array('organization/edit', 'id'=>$model->id));
	echo CHtml::link('<i class= "fa fa-times btn remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить организацию\nи все связанные с ней помещения?")){ self.document.forms.frmDelete'.$model->id.'.submit()}'));
	echo CHtml::endForm();
	?>
</div>
</div>
	<?php echo $model->comment?>
</div>
</div>