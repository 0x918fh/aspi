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
	echo CHtml::link('<i class="fa fa-reply btn pull-right"></i>', Array('contractor/index'));
	echo "<i class=\"divider-vertical pull-right\"></i>";
	echo CHtml::beginForm(Array('contractor/delete'), 'post',  Array('name' => 'frmDelete'.$model->id, 'class'=>'navbar-form pull-right'));
	echo CHtml::hiddenField('id', $model->id);
	echo CHtml::link('<i class="fa fa-edit btn edit"></i>', Array('contractor/edit', 'id'=>$model->id));
	echo CHtml::link('<i class= "fa fa-times btn remove"></i>', '#', Array('onClick' => 'if(confirm("Вы действительно хотите удалить контрагента?")){ self.document.forms.frmDelete'.$model->id.'.submit()}'));
	echo CHtml::endForm();
	?>
</div>
</div>
<?php 
	echo "<table>";
	echo "<tr>";
		echo "<td>Контактное лицо:</td>";
		echo "<td>".$model->fio."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Телефон:</td>";
		echo "<td>".$model->tel."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>E-mail:</td>";
		echo "<td>".$model->email."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Сайт:</td>";
		echo "<td>".CHtml::link($model->url, $model->url)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Адрес:</td>";
		echo "<td>".$model->address."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>ИНН:</td>";
		echo "<td>".$model->inn."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>БИК:</td>";
		echo "<td>".$model->bik."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>ОГРН:</td>";
		echo "<td>".$model->ogrn."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Лицевой счет:</td>";
		echo "<td>".$model->pa."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Расчетный счет:</td>";
		echo "<td>".$model->ca."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>Банк:</td>";
		echo "<td>".$model->bank."</td>";
	echo "</tr>";
	echo "</table>";
?>
</div>
</div>