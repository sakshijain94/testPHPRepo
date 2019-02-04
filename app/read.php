<?php

	function get_status($params) {
		

	    if(!empty($params)) {
	      echo "JSON Request params: ";
	      echo json_encode($params);

	      return "success";
	    }		
	    else
	    	return "failure";
	}
?>