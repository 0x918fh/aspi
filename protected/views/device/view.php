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
	<?php echo Chtml::image(Yii::app()->baseUrl."/media/qr/qr_".$model->id.".png", "", Array('class' => 'pull-right img-polaroid qr'))?>
<table>
	<tr>
		<td>Имя по бухгалтерии:</td>
		<td><?php echo $model->accountancy_name?></td>
	</tr>
	<tr>
		<td>Серийный номер:</td>
		<td><?php echo $model->serial_num?></td>
	</tr>
	<tr>
		<td>Инвентарный номер:</td>
		<td><?php echo $model->inv_num?></td>
	</tr>
	<tr>
		<td>Помещение:</td>
		<td><?php echo $model->room->name?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
</div>
</div>