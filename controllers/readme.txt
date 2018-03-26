Controlador:
1)	El nombre del archivo del controlador debe seguir el siguiente formato: $namecontroller+'Controller'   (formato camel case)

2)	En la carpeta views se debe crear una carpeta con el mismo nombre que el controlador que sera donde ira a buscar las
	vistas a renderizar.

3) En la carpeta models se debe crear el modelo con el mismo nombre que el controlador.

4)	El controlador tiene "actions" para ejecutar. Estas devuelven la vista que se va a renderizar.
	La sintaxis del metodo debe seguir el siguiente formato 'action'+$nombreAction (formato camel case).
	Cuando se llama al controlador se especifica cual es la accion que se quiere ejecutar.

/*--------------------------------------------------------------------------------------------*/
Ejemplo controlador "country"

1) CountryController.php

2) /views/country

3) /models/Country.php

4) 	//accion Index
	function actionIndex(){
	
	}

	//accion listar
	function actionListar(){

	}

/*--------------------------------------------------------------------------------------------*/