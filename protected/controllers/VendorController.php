<?php
class VendorController extends Controller
{
	public function actionIndex(){
		if (Yii::app()->user->id <> 1)
			$this->redirect($this->createUrl('site/index'));
		
		$criteria = new CDbCriteria;
		
		$pagination = new CPagination(Vendor::model()->count($criteria));
		$pagination->pageSize = 15;
		$pagination->applyLimit($criteria);
		
		$model = Vendor::model()->findAll($criteria);
		
		$menu = new ComMenu;
		$this->setCaption("Справочники - Производители");
		$this->render('index', array('menu'=>$menu->getMenu('main', $this->getRoute()), 'model' => $model, 'pagination'=>$pagination));
	}
}