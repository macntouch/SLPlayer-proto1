<?php

class Std {
	public function __construct(){}
	static function is($v, $t) {
		$GLOBALS['%s']->push("Std::is");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = _hx_instanceof($v, $t);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function string($s) {
		$GLOBALS['%s']->push("Std::string");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = _hx_string_rec($s, "");
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function int($x) {
		$GLOBALS['%s']->push("Std::int");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = intval($x);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function parseInt($x) {
		$GLOBALS['%s']->push("Std::parseInt");
		$�spos = $GLOBALS['%s']->length;
		if(!is_numeric($x)) {
			$matches = null;
			preg_match("/\\d+/", $x, $matches);
			{
				$�tmp = Std_0($matches, $x);
				$GLOBALS['%s']->pop();
				return $�tmp;
				unset($�tmp);
			}
			unset($matches);
		}
		else {
			$�tmp = Std_1($x);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function parseFloat($x) {
		$GLOBALS['%s']->push("Std::parseFloat");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = is_numeric($x) ? floatval($x) : acos(1.01);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function random($x) {
		$GLOBALS['%s']->push("Std::random");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = rand(0, $x - 1);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'Std'; }
}
;
function Std_0(&$matches, &$x) {
	$GLOBALS['%s']->push('Std:lambda_0');
	$�spos = $GLOBALS['%s']->length;
if(count($matches) === 0) {
	return null;
	;
}
else {
	return intval($matches[0]);
	;
}
}
function Std_1(&$x) {
	$GLOBALS['%s']->push('Std:lambda_1');
	$�spos = $GLOBALS['%s']->length;
if(strtolower(_hx_substr($x, 0, 2)) === "0x") {
	return intval(substr($x, 2), 16);
	;
}
else {
	return intval($x);
	;
}
}