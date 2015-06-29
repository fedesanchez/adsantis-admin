<?php
	$this->assign('title','Anna De Sanctis | Estadisticas');
	$this->assign('nav','estadisticas');

	$this->display('_Header.tpl.php');
?>


<div class="container">

	<div id="embed-api-auth-container"></div>
	<div id="chart-container"></div>
	<div id="view-selector-container"></div>	

	<iframe src='./iframe' width='100%' height='450px'></iframe>	
		
</div> <!-- /container -->


<?php
	$this->display('_Footer.tpl.php');
?>
