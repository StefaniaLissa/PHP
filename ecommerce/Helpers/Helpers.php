<?php 

	//Retorla la url del proyecto
	function base_url(){
		return BASE_URL;
	}

    function media(){
        return BASE_URL."/Assets";
    }
    
    function headerAdmin($data=""){
        $view_header = "Views/Template/header_admin.php";
        require_once ($view_header);
    }

    function footerAdmin($data=""){
        $view_footer = "Views/Template/footer_admin.php";
        require_once ($view_footer);        
    }

	//Muestra información formateada
	function dep($data){
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    
    //Formato para valores monetarios
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }
    

 ?>