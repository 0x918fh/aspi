<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
	<?php echo CHtml::link('<i class="fa fa-plus add btn pull-right"></i>', Array('room/edit'));?>
</div>
</div>
<?php 
echo "<table class=\"table table-hover table-condensed table-bordered\">";
echo "<thead>";
echo "<tr>";
echo "<th>Помещение</th>";
echo "<th>Организация</th>";
echo "<th class=\"th-action\">Действие</th>";
echo "</tr>";
echo "</thead>";
foreach ($rooms as $row){
	echo "<tr>";
	echo "<td>".CHtml::link($row->name, Array('room/view', 'id'=>$row->id))."</td>";
	echo "<td>".$row->organization->name."</td>";
	
	echo "<td>".CHtml::link('<i class="fa fa-edit inTable edit"></i> ', Array('room/edit', 'id'=>$row->id), Array('class' => 'pull-left'));
	echo CHtml::beginForm(Array('room/delete'), 'post',  Array('name' => 'frmDelete'.$row->id));
	echo CHtml::hiddenField('id', $row->id);
	echo CHtml::link(' <i class= "fa fa-times remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить помещение")){ self.document.forms.frmDelete'.$row->id.'.submit()}', 'class' => 'pull-left'));
	echo CHtml::endForm();
	echo "</td>";
	
	echo "</tr>";
}
echo "</table>";

$this->widget('CLinkPager', array('pages'=>$pagination));
?>
</div>
</div>
