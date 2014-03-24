<?php
class NomenclatureController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$model = NomenclatureGroup::model()->with('nomenclatures')->findAll();
		
		$menu = new ComMenu;
		$this->setCaption("Справочники - Номенклатура");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'model'=>$model));
	}
	
	public function actionEditGr(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$menu = new ComMenu;
		
		if (isset($_GET['id'])){
			$model = NomenclatureGroup::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование группы номенклатур");
		}
		else{
			$model = new NomenclatureGroup;
			$this->setCaption("Создание группы номенклатур");
		}
		
		if (Yii::app()->request->getPost('NomenclatureGroup')) {
			$model->attributes = Yii::app()->request->getPost('NomenclatureGroup');
			if ($model->save()){
				$this->setMessage("Сохранение прошло успешно", 1);
				$this->redirect($this->createUrl('nomenclature/index'));
			}
		}
		
		$this->render('editGr', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function actionEdit(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
	
		$menu = new ComMenu;
	
		if (isset($_GET['id'])){
			$model = Nomenclature::model()->find('id = :id', Array(':id' => $_GET['id']));
			$this->setCaption("Редактирование номенклатуры");
		}
		else{
			$model = new Nomenclature;
			$this->setCaption("Создание номенклатуры");
		}
	
		if (Yii::app()->request->getPost('Nomenclature')) {
			$model->attributes = Yii::app()->request->getPost('Nomenclature');
			if ($model->save()){
				$this->setMessage("Сохранение прошло успешно", 1);
				$this->redirect($this->createUrl('nomenclature/index'));
			}
		}
	
		$this->render('edit', array('model' => $model, 'menu' => $menu->getMenu('main', $this->getRoute())));
	}
	
	public function getGroupList(){
		$res = Array('' => ' ');
		
		$model = NomenclatureGroup::model()->findAll();
		foreach ($model as $row){
			$res[$row->id] = $row->name;
		}
		
		return $res;
	}
	
	public function getNomenclatureList($id){
		return Nomenclature::model()->findAll('group_id = :id', Array(':id' => $id));
	}
}