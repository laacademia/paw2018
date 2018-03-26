<?php 

namespace core;

require($_SERVER['PATH_BASE'] . '/core/controller/Controller.php');
require($_SERVER['PATH_BASE'] . '/core/helpers/Inflector.php');
include($_SERVER['PATH_BASE'] . '/conf/constants.php');


use controllers;
/**
* 
*/
class Application
{

	private $url_params;
	private $context;

	function run(){
		$this->parseParams();
		if(!isset($this->url_params['c']))	//si no se paso el controlador
			$this->url_user_error();
		if(!isset($this->url_params['a']))	//si no se paso la accion
			$this->url_user_error();
		$name_controller = $this->url_params['c'];
		$action = $this->url_params['a'];
		$params = $this->url_params['params'];
		$params = 'asd2';	
		$controller = $this->findController($name_controller);		
		echo $controller->runAction($action,$params);
	}

	private function parseParams(){
		$this->url_params['c'] = $_GET['c'];
		$this->url_params['a'] = $_GET['a'];
		if(isset($_GET['params']))
			$this->url_params['params'] = $_GET['params'];
		else
			$this->url_params['params'] = null;
	}

	private function findController($controller){
		return $this->getInstanceController($controller);	//devuelve la cadena con formato CamelCase				

	}

	private function getInstanceController($controller){
		$controller_class_name = Inflector::studly($controller) . SUFIX_CONTROLLER;
		$controller_file = $controller_class_name . '.php';	//devuelve la cadena con formato CamelCase
		$controller_path = $_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  DIRECTORY_CONTROLLER . DIRECTORY_SEPARATOR . $controller_file;
		if(file_exists($controller_path)){			
			require_once($controller_path);			
			$controller_class_name = "controllers\\$controller_class_name";
			return new $controller_class_name;
		}						
		else			
			die("Error. No existe el controlador 404 not found");			
	}

	private function url_user_error(){		
		die("Error 404.");
	}
}

?>