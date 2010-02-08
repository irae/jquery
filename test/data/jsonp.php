<?php
error_reporting(0);
$callback = $_REQUEST['callback'];
$json = $_REQUEST['json'];
$verifyScriptTag = $_REQUEST['verifyScriptTag'];
if($verifyScriptTag) {
	?>
	window.isScriptTag = false;
	(function(){
		var i,script,scripts = document.getElementsByTagName('script');
		for ( i=0 ; i < scripts.length ; i++ ) { script = scripts[i];
		    if( (''+script.src).indexOf('verifyScriptTag') != -1 ) {
		        window.isScriptTag = true;
		    }
		}
	})();
	<?php	
	echo $callback . '({ "whatever": "data" })';
} else if($json) {
	echo $callback . '([ {"name": "John", "age": 21}, {"name": "Peter", "age": 25 } ])';
} else {
	echo $callback . '({ "data": {"lang": "en", "length": 25} })';
}
?>
