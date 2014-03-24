<?php
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	protected function beforeAction($action) {
    	if (Yii::app()->user->isGuest && $this->id.'/'.$action->id !== 'site/login') {
      	Yii::app()->user->loginRequired();
    	}
    	return true;
  	}
  	
  	protected function setMessage($text, $type){
  		Yii::app()->session['message'] = $text;
  		Yii::app()->session['msgType'] = $type;
  	}
  	
  	protected function renderMessage(){
  		/*
  		 * msgType:
  		 * 	1 - success
  		 * 	2 - error
  		 */
  		if (Yii::app()->session['message'] == NULL)
  			return "";
  		
  		switch (Yii::app()->session['msgType']){
  			case 1:
  				$res = "<hr><strong>Success: </strong>".Yii::app()->session['message']."<hr>";
  				break;
  			case 2:
  				$res = "<hr><strong>Error: </strong>".Yii::app()->session['message']."<hr>";
  				break;
  			default:
  				$res = "<hr><strong>Unknown: </strong>".Yii::app()->session['message']."<hr>";
  		}
  		
  		Yii::app()->session['message'] = NULL;
  		
  		return $res;
  	}
  	
  	public function setCaption($caption){
  		if ($caption == "")
  			Yii::app()->session['caption'] = "";
  		else
  			Yii::app()->session['caption'] = " <span class=\"caption\">\"".$caption."\"</span>";
  	}
  	
  	public function getCaption(){
  		if (isset(Yii::app()->session['caption']))
  			return Yii::app()->session['caption'];
  		else 
  			return "";
  	}
}
