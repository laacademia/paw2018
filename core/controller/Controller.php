<?php  

namespace core;
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_VIEW);
/**
* 
*/
class Controller
{
	private $_view;
	private $_layout;
	private $_context;
	public 	$useLayout = true;

	function runAction($action,$params=null){
		$method_name = $this->findAction($action);
		if(isset($params))
			return $this->$method_name($params);
		else
			return $this->$method_name();
	}

	private function findAction($action){
		$name_action = PREFIX_ACTION . $action;
		if(method_exists($this, $name_action)){
			return $name_action;
		}else{
			die("La accion solicitada no existe");
		}
	}

	function render($view, $params){
		$content = $this->getView()->render($view, $params, $this);		//se trae el contenido de la vista
        return $this->renderContent($content);							//dibuja la vista con el layout si se especifico
	}

	public function renderContent($content)
    {
        //$layoutFile = $this->findLayoutFile($this->getView());
        if($this->useLayout){
        	$layoutFile = $this->getLayout();	        
			return $this->getView()->renderFile($layoutFile, ['content' => $content], $this);	               	        
        }else{
        	return $content;
        }
    	
    }

    function setView($view){
		$this->_view = $view;
	}

	function getView(){
		if(isset($this->_view))
			return $this->_view;
		else
			return new View();
	}

	function get_context(){
		$context = $this->get_name();
		$context = strtolower($context);
		return $context;
	}
	function get_name(){
		$path = explode('\\', get_class($this));										//saco el namespace
		$classname = array_pop($path);				
		$context = substr($classname, 0,strlen($classname)-strlen(SUFIX_CONTROLLER));  //saco el prefijo del controlador
		return $context;
	}

	function getLayout()
	{
		$path_layout = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR . DIRECTORY_VIEW_LAYOUTS . DIRECTORY_SEPARATOR;
		if(isset($this->_layout)){
			$layout_filename = $this->_layout;
		}			
		else{
			$layout_filename = DEFAULT_LAYOUT_FILE;
		}
		return $path_layout . $layout_filename;
	}

	function setLayout($layout_filename){
		$this->_layout = $layout_filename;
	}	

}

?>