<?php
echo $menu;
echo $this->renderMessage();

echo "<div class=\"row-fluid\">";
echo "<div class=\"span12 well\">";
?>

<div class="navbar">
	<div class="navbar-inner">
		<?php echo CHtml::link('<i class="fa fa-plus add btn"></i>', Array('user/edit'), Array('class' => 'pull-right'));?>
	</div>
</div>

<?php 
echo "<table class=\"table table-hover table-condensed table-bordered\">";
echo "<thead><tr>";
echo "<th>Логин</th>";
echo "<th>Организация</th>";
echo "<th class=\"th-action\">Действие</th>";
echo "</tr></thead>";
foreach ($users as $row){
	echo "<tr>";
	echo "<td>".$row->username."</td>";
	if ($row->organization <> NULL)
		echo "<td>".$row->organization->name."</td>";
	else
		echo "<td> -- </td>";
	echo "<td>".CHtml::link('<i class="fa fa-edit inTable edit"></i> ', Array('user/edit', 'id'=>$row->id), Array('class' => 'pull-left'));

	echo CHtml::beginForm(Array('user/delete'), 'post',  Array('name' => 'frmDelete'.$row->id));
	echo CHtml::hiddenField('id', $row->id);
	if ($row->id <> 1)
		echo CHtml::link(' <i class= "fa fa-times remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить пользователя?")){ self.document.forms.frmDelete'.$row->id.'.submit()}', 'class' => 'pull-left'));
	echo CHtml::endForm();
	echo "</td>";

	echo "</tr>";
}
echo "</table>";

$this->widget('CLinkPager', array('pages'=>$pagination));

echo "</div></div>";