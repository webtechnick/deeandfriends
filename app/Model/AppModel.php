<?php
App::uses('Model', 'Model');
class AppModel extends Model {
	public $actsAs = array('Containable','Icing.Emailable');
	
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
	
	public function email($to, $from, $template, $subject, $viewVars = array(), $attachments = array(), $config = 'default', $helpers = array()){
		$config = 'mailjet';
		$helpers = array('Html','Number','Time');
		return $this->sendEmail($to, $from, $template, $subject, $viewVars, $attachments, $config, $helpers);
	}
	
}
