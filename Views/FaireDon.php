<?php

	$titre="Faire un don";
	ob_start();


  echo'

<div id = "merci"> <p>Merci de votre attention pour notre musee !</p> </div>

<form id ="Don" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8MWZE35G3LVVG">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le r�flexe s�curit� pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
';


  $contenu=ob_get_clean();
  require("Views/layout.php");

?>
