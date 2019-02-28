<?php

//----------------------------------------------------------------------------------//
function pre($data, $title=null, $return=0){
	$r  = '<div class="container">'.PHP_EOL;;
	$r .= '<div class="alert alert-warning alert-dismissible" role="alert">'.PHP_EOL;
	$r .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.PHP_EOL;
	
	if($title){ $r .= '<h2 style="direction:ltr; text-align:left">'.$title.'</h2>'.PHP_EOL; }
	
	$r .= '<pre style="direction:ltr; text-align:left">'.PHP_EOL;
	$r .= print_r($data, 1);
	$r .= '</pre>'.PHP_EOL;
	
	$r .= '</div><!--/alert-->'.PHP_EOL;
	$r .= '</div><!--/contaner-->'.PHP_EOL;
	if($return){return $r;}
	echo $r;	
}
