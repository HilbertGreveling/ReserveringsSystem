<?php
/*
Esape the string against Injections.
*/
function escape($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

