<?php

class Language {

	
	private $lang_default;
	private $lang_ini;

	public function __construct(){

		global $config;

		//Detect default language
		$this->lang_default = $config['default_lang'];

		//if the user sets a language
		if(!empty($_SESSION['lang']) && file_exists('Lang/'.$_SESSION['lang'].'.ini')){
			$this->lang_default = $_SESSION['lang'];
		}

		//load ini file, transform into array
		$this->lang_ini = parse_ini_file('Lang/'.$this->lang_default.'.ini');
	}

	public function getDictionary($word, $return = false){
		$text = $word;

		if(isset($this->lang_ini[$word])){
			$text = $this->lang_ini[$word];
		}
		if($return){
			return $text;
		} else {
			echo $text;
		}
	}
}