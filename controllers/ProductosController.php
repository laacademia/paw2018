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
		return $this->render('test',$params);	//llama a la view test	
	}
}
?>