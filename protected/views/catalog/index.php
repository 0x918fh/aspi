<?php
echo $menu;
echo $this->renderMessage();

echo "<h3>Сетка справочников</h3>";
echo "<div>".CHtml::link('Организации', Array('organization/index',))."</div>";
echo "<div>".CHtml::link('Контрагенты', Array('contractor/index',))."</div>";
echo "<div>".CHtml::link('Помещения', Array('room/index',))."</div>";
echo "<div>".CHtml::link('Пользователи', Array('user/index',))."</div>";
echo "<div>".CHtml::link('Номенклатура', Array('nomenclature/index',))."</div>";