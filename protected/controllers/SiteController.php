<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'status=1';
		
		$pagination = new CPagination(Post::model()->count($criteria));
		$pagination->pageSize = 5;
		$pagination->applyLimit($criteria);
		
		$posts = Post::model()->findAll($criteria);		
		
		$this->setCaption("");
		$menu = new ComMenu;
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'posts'=>$posts, 'pagination'=>$pagination));
	}
	
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect($this->createUrl('site/index'));
	}
	
	public function actionLogin(){
		$loginForm  = new LoginForm;
		
		if (isset($_POST['LoginForm'])){
			$loginForm->attributes = $_POST['LoginForm'];
			if ($loginForm->validate()){
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$this->setCaption("");
		$this->render('login', array('loginForm'=>$loginForm));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
