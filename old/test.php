<?php
$format = trim(preg_replace('/[0-9]/', "#", "6269876543"));
echo $format;

$formats = array('###-###-####', '(###) ###-####', '(###)###-####', '##########', '###.###.####', '(###) ###.####', '(###)###.####');
        $format = trim(preg_replace("[0-9]", "#", '626987653'));
        if( (in_array($format, $formats)) ? true : false) {
        	echo 'ok';
        }
