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
	public function headshot($character = null, $width = 300) {
		if ($character) {
			$this->set($character);
		}
		if (!empty($this->char['Headshot']['name'])) {
			return $this->FileUpload->image($this->char['Headshot']['name'], $width);
		}
		if (isset($this->char['Toon']['name']) && !empty($this->char['Toon']['name'])) {
			return $this->FileUpload->image($this->char['Toon']['name'], $width);
		}
		return null;
	}
}
