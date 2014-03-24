<?php
class UserController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$criteria = new CDbCriteria;
	
		$pagination = new CPagination(User::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
	
		$users = User::model()->with('organization')->findAll($criteria);
	
		$menu = new ComMenu;
		$this->setCaption("Справочники - Пользователи");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'users'=>$users, 'pagination'=>$pagination));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id'])){
			$model = User::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование пользователя");
		}
		else{
			$model = new User;
			$this->setCaption("Создание пользователя");
		}
	
		if (Yii::app()->request->getPost('User')) {
			$model->attributes = Yii::app()->request->getPost('User');
			if ($model->validate()){
				$model->password = CPasswordHelper::hashPassword($model->password);
				$model->password2 = $model->password;
			}
			if ($model->save()){
				Yii::app()->session['message'] = "Сохранение прошло успешно";
				Yii::app()->session['msgType'] = 1;
				$this->redirect($this->createUrl('user/index'));
			}
		}
	
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionDelete(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		if (isset($_POST['id'])){
			$record = User::model()->find('id = :id', Array(':id' => $_POST['id']));
			if ($record != NULL)
				if ($record->delete())
				$this->setMessage('Удаление завершено', 1);
			else
				$this->setMessage('Ошибка удаления', 2);
			$this->redirect($this->createUrl('user/index'));
		}
		else
			$this->redirect($this->createUrl('user/index'));
	}
	
	public function getOrganizationList(){
		$res = Array('' => ' ');
		$record = Organization::model()->findAll();
		foreach($record as $row){
			$res[$row->id] = $row->name;
		}
		return $res;
	}
	
	public function getRoomList($organization){
		$res = Array('' => ' ');
		$record = Room::model()->findAll('organization_id = :org', Array(':org' => $organization));
		foreach($record as $row){
			$res[$row->id] = $row->name;
		}
		
		return $res;
	}
	
	public function actionAjax(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['organization'])){
				$model = new User;
				echo CHtml::activeDropDownList($model, 'room_id', $this->getRoomList($_POST['organization']), Array('id' => 'room'));
				Yii::app()->end();
			}
		}
		$this->redirect(Yii::app()->user->returnUrl);
	}
}