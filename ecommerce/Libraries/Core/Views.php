<?php 
	
	class Views{

		function getView($controller,$view,$data=""){
			
			$controller = get_class($controller);

			if($controller == "Home"){
				$view = "Views/".$view.".php";
			}else{
				$view = "Views/".$controller."/".$view.".php"; //Para cada controlador y vista se crea una carpeta, exp home
			}
			require_once ($view);
		}
	}

 ?>