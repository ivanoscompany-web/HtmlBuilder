<?php 
	
	namespace App\Мanager\Plugins\Templating;
	
	class HtmlBuilder{
		
		public $element;
		public $content = null;
		
		public function __construct($path){
			$fullPath = dirname(__DIR__, 4) . '/templates/' . $path . '.html';
			$fileData = file_get_contents($fullPath);
			$this->element = htmlentities($fileData);
			return $this;
		}
		
		public function add($array = array()){		
			$search  = array();
			$replace = array();
			foreach($array as $key => $value){
				array_push($search, '/\b'.$key.'\b/u');
				array_push($replace, $value);
			}
			$this->content .= preg_replace($search, $replace, $this->element);
			return $this;
		}
		
		public function render(bool $decode = false){
			if($decode){
				$result = html_entity_decode($this->content);
			}
			else{
				$result = $this->content;
			}
			return $result;
		}
		
	}			
