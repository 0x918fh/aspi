<?php
echo $menu;
echo $this->renderMessage();
	
echo "<table>";
foreach ($posts as $row){
	echo "<tr>";
	echo "<td>".$row->title."</td>";
	echo "<td><a href='?r=post/view&post=".$row->id."'>Открыть</a>";
	echo "</tr>";
}
echo "</table>";

$this->widget('CLinkPager', array('pages'=>$pagination));