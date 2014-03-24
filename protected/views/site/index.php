<?php
echo $menu;
echo $this->renderMessage();
?>

<div class="row-fluid">
<div class="span12 well">
<?php
foreach($posts as $post){
	echo "<div><h3><a href='?r=post/view&post=".$post->id."'>".$post->title."</a></h3></div>";
	echo "<div>".$post->intro."</div>";
	echo "<hr>";
}

$this->widget('CLinkPager', array('pages'=>$pagination)); 
?>
</div>
</div>