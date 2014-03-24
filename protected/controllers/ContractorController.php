<?php
class ContractorController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$criteria = new CDbCriteria;
	
		$pagination = new CPagination(Contractor::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
	
		$contractors = Contractor::model()->findAll($criteria);
	
		$menu = new ComMenu;
		$this->setCaption("Справочники - Контрагенты");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'contractors'=>$contractors, 'pagination'=>$pagination));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id'])){
			$model = Contractor::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование контрагента");
		}
		else{
			$model = new Contractor;
			$this->setCaption("Создание контрагента");
		}
	
		if (Yii::app()->request->getPost('Contractor')) {
			$model->attributes = Yii::app()->request->getPost('Contractor');
			if ($model->save()){
				Yii::app()->session['message'] = "Сохранение прошло успешно";
				Yii::app()->session['msgType'] = 1;
				$this->redirect($this->createUrl('contractor/index'));
			}
		}
	
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionDelete(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		if (isset($_POST['id'])){
			$record = Contractor::model()->find('id = :id', Array(':id' => $_POST['id']));
			if ($record != NULL)
				if ($record->delete())
				$this->setMessage('Удаление завершено', 1);
			else
				$this->setMessage('Ошибка удаления', 2);
			$this->redirect($this->createUrl('contractor/index'));
		}
		else
			$this->redirect($this->createUrl('contractor/index'));
	}
	
	public function actionView(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id']))
			$model = Contractor::model()->find('id = :id', Array(':id' => $_GET['id']));
	
		if ($model == NULL){
			$this->redirect($this->createUrl('contractor/index'));
		}
		
		$this->setCaption("Контрагент - ".$model->name);
		$this->render('view', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
}