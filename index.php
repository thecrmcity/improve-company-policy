<?php

if(!defined("BASEURL"))
{
	define("BASEURL", "http://localhost/security/");
	?>
	<script type="text/javascript">window.location.href="<?php echo BASEURL;?>application/views/index.php"</script>
	<?php
	
}
else
{
	?>
	<script type="text/javascript">window.location.href="<?php echo BASEURL;?>application/views/index.php"</script>
	<?php
	
}
