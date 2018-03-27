<?php 

namespace controllers;

use core;
/**
* 
*/
class ProductosController extends  \core\Controller
{	
	function actionInicio($params){		
		return $this->render('inicio',$params);	//llama a la view inicio
	}

	function actionEjemplolayout($param){
		return $this->render('test',$params);	//llama a la view inicio	
	}

	function actionTest($params){
		$params['title'] = 'Este es mi titulo';
		return $this->render('test',$params);	//llama a la view test	
	}
}
?>