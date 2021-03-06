<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<div class="navbar">
<div class="navbar-inner">
	<?php echo CHtml::link('<i class="fa fa-plus btn add pull-right"></i>', Array('contractor/edit'));?>
</div>
</div>
<?php 
echo "<table class=\"table table-hover table-condensed table-bordered\">";
echo "<thead>";
echo "<tr>";
echo "<th>Название</th>";
echo "<th class=\"th-action\">Действие</th>";
echo "</tr>";
echo "</thead>";
foreach ($contractors as $row){
	echo "<tr>";
	echo "<td>".CHtml::link($row->name, Array('contractor/view', 'id' => $row->id))."</td>";
	echo "<td>".CHtml::link('<i class="fa fa-edit inTable edit"></i> ', Array('contractor/edit', 'id'=>$row->id), Array('class' => 'pull-left'));
	echo CHtml::beginForm(Array('contractor/delete'), 'post',  Array('name' => 'frmDelete'.$row->id));
	echo CHtml::hiddenField('id', $row->id);
	echo CHtml::link(' <i class= "fa fa-times remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить контрагента?")){ self.document.forms.frmDelete'.$row->id.'.submit()}', 'class' => 'pull-left'));
	echo CHtml::endForm();
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

$this->widget('CLinkPager', array('pages'=>$pagination));
?>
</div>
</div>

