<?php

class PostController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$criteria = new CDbCriteria;
		
		$pagination = new CPagination(Post::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
		
		$posts = Post::model()->findAll($criteria);		
		
		$menu = new ComMenu;
		$this->setCaption("Статьи");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'posts'=>$posts, 'pagination'=>$pagination));
	}
	
	public function actionView(){
		if (!isset($_GET['post']))
			$this->redirect($this->createUrl('site/index'));
		
		$nPost = (int)$_GET['post'];
		if ($nPost < 1)
			$this->redirect($this->createUrl('site/index'));
		
		if (Yii::app()->user->id == 1)
			$record = Post::model()->find('id=:id', array(':id' => $nPost));
		else
			$record = Post::model()->find('id=:id AND status=:status', array(':id' => $nPost, ':status' => 1));
		
		if ($record == null)
			echo "record not found";
		else 
			print_r($record);
	}
}
