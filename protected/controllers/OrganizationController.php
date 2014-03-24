<?php
class OrganizationController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$criteria = new CDbCriteria;
		
		$pagination = new CPagination(Organization::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
		
		$orgs = Organization::model()->findAll($criteria);		
		
		$menu = new ComMenu;
		$this->setCaption("Справочники - Организации");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'orgs'=>$orgs, 'pagination'=>$pagination));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$menu = new ComMenu;
		
		if (isset($_GET['id'])){
			$model = Organization::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование организации");
		}
		else{
			$model = new Organization;
			$this->setCaption("Создание организации");
		}
		
		if (Yii::app()->request->getPost('Organization')) {
			$model->attributes = Yii::app()->request->getPost('Organization');
			if ($model->save()){
				Yii::app()->session['message'] = "Сохранение прошло успешно";
				Yii::app()->session['msgType'] = 1;
				$this->redirect($this->createUrl('organization/index'));
			}
		}
		
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionDelete(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		if (isset($_POST['id'])){
			$record = Organization::model()->find('id = :id', Array(':id' => $_POST['id']));
			if ($record != NULL)
				if ($record->delete())
					$this->setMessage('Удаление завершено', 1);
				else
					$this->setMessage('Ошибка удаления', 2);
			$this->redirect($this->createUrl('organization/index'));
		}
		else
			$this->redirect($this->createUrl('organization/index'));
	}
	
	public function actionView(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$menu = new ComMenu;
		
		if (isset($_GET['id']))
			$model = Organization::model()->find('id = :id', Array(':id' => $_GET['id']));
		
		if ($model == NULL){
			$this->redirect($this->createUrl('organization/index'));
		}
		$this->setCaption("Организация - ".$model->name);
		$this->render('view', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
}