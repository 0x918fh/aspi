<?php
class ComMenu extends CComponent{	
	protected function addChild($menu, $pId, $record, $route){
		$chMenu = "";
		foreach($record as $row){
			if ($row->parent == $pId){
				if ($row->link == $route)
					$chMenu .= "<li class=\"active\">".CHtml::link($row->title, Array($row->link,));
				else
					$chMenu .= "<li>".CHtml::link($row->title, Array($row->link,));
				$chMenu .= $this->addChild($menu, $row->id, $record, $route);
				$chMenu .= "</li>";
			}
		}
		if ($chMenu == "")
			return "";
		else
			return "<ul class=\"dropdown-menu\" role=\"menu\">".$chMenu."</ul>";
	}
	
	public function isParent($record, $id){
		foreach($record as $row){
			if ($row->parent == $id)
				return true;
			return false;
		}
	}
	
	public function getMenu($name, $route){
		$record = MenuLookup::model()->find('name=:name', array(':name' => $name));
		if ($record == null)
			return "";
		
		$criteria = new CDbCriteria();
		if (Yii::app()->user->id == 1){
			$criteria->condition = 'menu_id = '.$record->id;
		}
		else{
			$criteria->condition = 'menu_id = '.$record->id.' AND admin <> 1';
		}
		$criteria->order = 'weight';

		$record = Menu::model()->findAll($criteria);
		if ($record == null)
			return "";
		
		$menu = "<div class=\"navbar\"><div class=\"navbar-inner\"><a class=\"brand\" href=\"/\"><i class=\"fa fa-barcode\"></i> АСПИ</a>";
		//$menu .= "<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">";
		//$menu .= "<span class=\"icon-bar\"></span>";
		//$menu .= "<span class=\"icon-bar\"></span>";
		//$menu .= "<span class=\"icon-bar\"></span>";
		//$menu .= "</a>";
		//$menu .="<div class=\"nav-collapse\">";
		$menu .= "<ul class=\"nav\">";
		
		foreach($record as $row){
			if ($row->parent == 0){
				if ($row->link == $route)
					if ($this->isParent($record, $row->id))
						$menu .= "<li class=\"active\">".CHtml::link($row->title."<b class=\"caret\"></b>", '#', Array('class' => 'dropdown-toggle', 'data-toggle'=>'dropdown'));
					else
						$menu .= "<li class=\"active\">".CHtml::link($row->title, Array($row->link,));
				else
					if ($this->isParent($record, $row->id))
						$menu .= "<li class=\"dropdown\">".CHtml::link($row->title."<b class=\"caret\"></b>", '#', Array('class' => 'dropdown-toggle', 'data-toggle'=>'dropdown'));
					else
						$menu .= "<li class=\"dropdown\">".CHtml::link($row->title, Array($row->link,));
				$menu .= $this->addChild($menu, $row->id, $record, $route);
				$menu .= "</li>";
			}
		};
		
		$menu .= "</ul></div></div>";
		
		return $menu;
	}
}