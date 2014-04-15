<?php
App::uses('AppHelper', 'View/Helper');
class FriendsHelper extends AppHelper {

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
	public function headshot($character = null) {
		if ($character) {
			$this->set($character);
		}
		if (!empty($this->char['Headshot']['name'])) {
			return $this->FileUpload->image($this->char['Headshot']['name'], 300);
		}
		return null;
	}
}
