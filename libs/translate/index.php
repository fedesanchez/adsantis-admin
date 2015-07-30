<?php

require 'vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('es', 'en');

echo $tr->translate('Te aconsejamos hacerte 2 veces por semana baños de crema, notaras tus cabellos mucho màs sanos y brillantes');

?>
