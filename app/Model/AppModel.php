<?php
App::uses('Model', 'Model');
class AppModel extends Model {
	public $actsAs = array('Containable');
	
	/**
	* overload the find method to create a 'last' type that will return the last created item.
	* this is really handy for testing purposes.
	*/
	public function find($type = null, $options = array()){
		if($type == 'last'){
			return parent::find('first', array('order' => "{$this->alias}.created DESC"));
		}
		
		return parent::find($type, $options);
	}
}
