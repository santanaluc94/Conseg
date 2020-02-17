<?php    
    
    function getDataAtual()
	{
		date_default_timezone_set('America/Sao_Paulo');
		return date("Y-m-d h:m:s");
	}