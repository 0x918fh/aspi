<script src="<?php echo Yii::app()->baseUrl;?>/res/js/svg.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/res/js/room.js"></script>
<?php
	echo $menu;
	echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
	<span class="brand"><?php echo $model->organization->name." - ".$model->name;?></span>
	<?php
	echo CHtml::link('<i class="fa fa-reply btn pull-right"></i>', Array('room/index'));
	echo "<i class=\"divider-vertical pull-right\"></i>";
	echo CHtml::beginForm(Array('room/delete'), 'post',  Array('name' => 'frmDelete'.$model->id, 'class'=>'navbar-form pull-right'));
	echo CHtml::hiddenField('id', $model->id);
	echo CHtml::link('<i class="fa fa-edit btn edit"></i>', Array('room/edit', 'id'=>$model->id));
	echo CHtml::link('<i class= "fa fa-times btn remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить помещение?")){ self.document.forms.frmDelete'.$model->id.'.submit()}'));
	echo CHtml::endForm();
	?>
</div>
</div>
	<?php echo "<div>".$model->comment."</div>";?>
	<hr>
	
	<div class="inventory caption-hide" onClick="showHideHead($(this))">
	<h4>Опись</h4>
	<table class="table table-hover table-condensed table-bordered" onClick="stopEvent()">
	<thead>
	<tr>
		<th><i class="fa fa-save btn pull-right"></i></th>
	</tr>
	</thead>
	<?php
	$inventory = Device::model()->findAll('room_id = :id', Array(':id'=>$model->id));
	foreach ($inventory as $row){
		echo "<tr>";
		echo "<td>".$row->accountancy_name."</td>";
		echo "</tr>";
	} 
	?>
	</table>
	</div>
	
	<hr>
	
	<div id="svg">
		<?php echo CHtml::decode($model->svg)?>
	</div>
</div>
</div>