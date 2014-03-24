<?php
class DeviceController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		if (isset($_POST['org'])){
			$org = $_POST['org'];
			$model = Room::model()->with('devices')->findAll('organization_id = :id', Array(':id' => $org));
			Yii::app()->session['org'] = $org;
		}
		else{
			$org = Yii::app()->session['org'];
			//$org = -1;
			$model = Room::model()->with('devices')->findAll('organization_id = :id', Array(':id' => $org));
		}
		
		$organization = Organization::model()->findAll();
		
		$menu = new ComMenu;
		$this->setCaption("Оборудование");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'organization' => $organization, 'model' => $model, 'org' => $org));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id'])){
			$model = Device::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование оборудования");
		}
		else{
			$model = new Device;
			$this->setCaption("Создание оборудования");
		}
	
		if (Yii::app()->request->getPost('Device')) {
			$model->attributes = Yii::app()->request->getPost('Device');
			if ($model->save()){
				$this->setMessage("Сохранение прошло успешно", 1);
				Yii::import('ext.qrcode.QRCode');
				$code=new QRCode($_SERVER['HTTP_HOST']."/index.php/device/view/".$model->id);
				$code->create(Yii::app()->basePath."/../media/qr/qr_".$model->id.".png");
				$this->redirect($this->createUrl('device/index'));
			}
		}
	
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionView(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$menu = new ComMenu;
		
		if (isset($_GET['id']))
			$model = Device::model()->find('id = :id', Array(':id' => $_GET['id']));
		else
			$model = NULL;
		
		if ($model == NULL){
			$this->redirect($this->createUrl('device/index'));
		}
		$this->setCaption($model->accountancy_name." - ".$model->inv_num);
		$this->render('view', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionMove(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
		
		if (isset($_GET['id'])){
			$model = Device::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Перемещение оборудования");
		}
		else{
			$this->redirect($this->createUrl('device/index'));
		}
	
		if (Yii::app()->request->getPost('Device')) {
			$displacement = new Displacement;
			$displacement->device_id = $model->id;
			$displacement->from_org = $model->org_id;
			$displacement->from_room = $model->room_id;
			$model->org_id = $_POST['Device']['org_id'];
			$model->room_id = $_POST['Device']['room_id'];
			$displacement->to_org = $model->org_id;
			$displacement->to_room = $model->room_id;
			if ($model->save()){
				$this->setMessage("Сохранение прошло успешно", 1);
				$displacement->save();
				$this->redirect($this->createUrl('device/index'));
			}
		}
	
		$this->render('move', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionAjaxRoom(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['organization'])){
				$model = new Device;
				echo CHtml::activeDropDownList($model, 'room_id', Room::model()->getArray($_POST['organization']), Array('id' => 'room'));
				Yii::app()->end();
			}
		}
		$this->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionAjaxNomenclature(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['nGroup'])){
				$model = new Device;
				echo CHtml::activeDropDownList($model, 'nomenclature_id', Nomenclature::model()->getArray($_POST['nGroup']), Array('id' => 'nomenclature'));
				Yii::app()->end();
			}
		}
		$this->redirect(Yii::app()->user->returnUrl);
	}
}