<?php
App::uses('AppHelper', 'View/Helper');
class FriendHelper extends AppHelper {
	
	public $helpers = array(
		'Icing.FileUpload'
	);

	public function set($character) {
		$this->char = $character;
	}
	
	/**
  * Return the key of the current Character
  */
  function get($key = null){
  	if (isset($this->char['Character'][$key]) && !empty($this->char['Character'][$key])) {
  		return $this->char['Character'][$key];
  	}
  	if (isset($this->char[$key]) && !empty($this->char[$key])) {
  		return $this->char[$key];
  	}
  	return null;
  }
	
  /**
  * Get the headshot of a character
  * @param character option
  * @return null or image of headshot
  */
	public function headshot($character = null, $options = array()) {
		if ($character) {
			$this->set($character);
		}
		if (is_int($options)) {
			$options = array('width' => $options);
		}
		$options = array_merge(array(
			'width' => '300' 
			),(array) $options);
		if (!empty($this->char['Headshot']['name'])) {
			return $this->FileUpload->image($this->char['Headshot']['name'], $options);
		}
		if (isset($this->char['Toon']['name']) && !empty($this->char['Toon']['name'])) {
			return $this->FileUpload->image($this->char['Toon']['name'], $options);
		}
		return null;
	}
	
	public function hasService($character = null, $service_id = 0) {
		if ($character) {
			$this->set($character);
		}
		foreach ($this->char['CharactersService'] as $service) {
			if ($service['service_id'] == $service_id) {
				return $service;
			}
		}
		return false;
	}
	
	public function servicePrice($service = null) {
		if (!$service) {
			return null;
		}
		if (isset($service['CharactersService']['base_price_dollars_overwrite']) && !empty($service['CharactersService']['base_price_dollars_overwrite'])) {
			return $service['CharactersService']['base_price_dollars_overwrite'];
		}
		if (!empty($service['base_price_dollars'])) {
			return $service['base_price_dollars'];
		}
		return null;
	}
}
