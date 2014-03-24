<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">

<div class="navbar">
<div class="navbar-inner">
<?php
echo "<form action=# method=POST name=orgSel class=\"navbar-form pull-left\">";
echo "<select name=org>";
echo "<option value=\"-1\"> </option>";
foreach($organization as $row){
	if ($row->id == $org)
		echo "<option value=".$row->id." selected=\"selected\">".$row->name."</option>";
	else
		echo "<option value=".$row->id.">".$row->name."</option>";
}
echo "</select>";
echo " ".CHtml::submitButton('Выбрать', Array('onClick' => 'if (self.document.forms.orgSel.org.value < 0) return false', 'class' => 'btn'));
echo "</form>";

echo CHtml::link('<i class="fa fa-plus"></i>', Array('device/edit'), Array('class' => 'pull-right btn'));
?>
</div>
</div>

<?php 
echo "<table class=\"table table-condensed table-bordered\">";
echo "<thead>";
echo "<tr><th>Помещение</th></tr>";
echo "</thead>";
foreach($model as $row){
	echo "<tr class=\"room-head\">";
	$cnt = count($row->devices);
	if ($cnt > 0)
		echo "<td class=\"caption-hide\" onClick=\"showHideHead($(this));\">".$row->name." (".count($row->devices).")";
	else
		echo "<td class=\"caption-hide\">".$row->name;
	echo "<table class=\"table table-hover table-condensed table-bordered\" onClick=\"stopEvent()\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Имя по бухгалтерии</th>";
	echo "<th>Серийный номер</th>";
	echo "<th>Инвентарный номер</th>";
	echo "<th>Действия</th>";
	echo "</tr>";
	echo "</thead>";
	foreach ($row->devices as $device){
		echo "<tr>";
		echo "<td>".CHtml::link($device->accountancy_name, Array('device/view', 'id'=>$device->id))."</td>";
		echo "<td>".$device->serial_num."</td>";
		echo "<td>".$device->inv_num."</td>";
		echo "<td>".CHtml::link('<i class="fa fa-edit inTable edit"></i> ', Array('device/edit', 'id'=>$device->id), Array('class' => 'pull-left'));
		echo CHtml::link('<i class="fa fa-exchange inTable move"></i> ', Array('device/move', 'id'=>$device->id), Array('class'=>'pull-left'));
		echo CHtml::beginForm(Array('device/delete'), 'post',  Array('name' => 'frmDelete'.$device->id));
		echo CHtml::hiddenField('id', $device->id);
		echo CHtml::link(' <i class= "fa fa-times remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить устройство?")){ self.document.forms.frmDelete'.$device->id.'.submit()}', 'class' => 'pull-left'));
		echo CHtml::endForm();
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
?>

</div>
</div>