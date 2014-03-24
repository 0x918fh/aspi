<?php
class RoomController extends Controller
{
	protected function getOrgList(){
		$record = Organization::model()->findAll();
		$res = Array();
		foreach ($record as $row){
			$res[$row->id] = $row->name;
		}
		return $res;
	}
	
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$criteria = new CDbCriteria;
		$pagination = new CPagination(Room::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
		$criteria->order = 'organization_id';
		
		$rooms = Room::model()->with('organization')->findAll($criteria);
		
		$menu = new ComMenu;
		$this->setCaption("Справочники - Помещения");
		$this->render('index', Array('menu'=>$menu->getMenu('main', $this->getRoute()), 'rooms' => $rooms, 'pagination' => $pagination));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$menu = new ComMenu;
		
		if (isset($_GET['id'])){
			$model = Room::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование помещения");
		}
		else{
			$model = new Room;
			$this->setCaption("Создание помещения");
		}
		
		if (Yii::app()->request->getPost('Room')) {
			$model->attributes = Yii::app()->request->getPost('Room');
			$model->svg = CHtml::encode($model->svg);
			if ($model->save()){
				$this->setMessage("Сохранение прошло успешно", 1);
				$this->redirect($this->createUrl('room/index'));
			}
		}
		
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionDelete(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		if (isset($_POST['id'])){
			$record = Room::model()->find('id = :id', Array(':id' => $_POST['id']));
			if ($record != NULL)
				if ($record->delete())
				$this->setMessage('Удаление завершено', 1);
			else
				$this->setMessage('Ошибка удаления', 2);
			$this->redirect($this->createUrl('room/index'));
		}
		else
			$this->redirect($this->createUrl('room/index'));
	}
	
	public function actionView(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id']))
			$model = Room::model()->find('id = :id', Array(':id' => $_GET['id']));
	
		if ($model == NULL){
			$this->redirect($this->createUrl('room/index'));
		}
		$this->setCaption("Помещение - ".$model->name);
		$this->render('view', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
}