<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
<?php
echo CHtml::link('<i class="fa fa-desktop btn pull-right"></i>', Array('nomenclature/edit'));
echo CHtml::link('<i class="fa fa-folder-open btn pull-right"></i>', Array('nomenclature/editGr')); 
?>
</div>
</div>
<?php 
echo "<table class=\"table table-condensed table-bordered\">";
echo "<thead>";
echo "<tr><th>Группа</th></tr>";
echo "</thead>";
foreach($model as $row){
	echo "<tr class=\"room-head\">";
	$cnt = count($row->nomenclatures);
	if ($cnt > 0)
		echo "<td class=\"caption-hide\" onClick=\"showHideHead($(this));\">".CHtml::link($row->name, Array('nomenclature/editGr', 'id'=>$row->id), Array('onClick' => 'stopEvent()'))." (".count($row->nomenclatures).")";
	else
		echo "<td class=\"caption-hide\">".$row->name;
	echo "<table class=\"table table-hover table-condensed table-bordered\" onClick=\"stopEvent()\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Номенклатура</th>";
	echo "<th>Действия</th>";
	echo "</tr>";
	echo "</thead>";
	foreach ($row->nomenclatures as $nomenclatures){
		echo "<tr>";
		echo "<td>".CHtml::link($nomenclatures->name, Array('nomenclature/edit', 'id'=>$nomenclatures->id))."</td>";
		echo "<td>".CHtml::link('<i class="fa fa-edit inTable edit"></i> ', Array('device/edit', 'id'=>$nomenclatures->id), Array('class' => 'pull-left'));
		echo CHtml::beginForm(Array('nomenclature/delete'), 'post',  Array('name' => 'frmDelete'.$nomenclatures->id));
		echo CHtml::hiddenField('id', $nomenclatures->id);
		echo CHtml::link(' <i class= "fa fa-times remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить номенклатуру?")){ self.document.forms.frmDelete'.$nomenclatures->id.'.submit()}', 'class' => 'pull-left'));
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