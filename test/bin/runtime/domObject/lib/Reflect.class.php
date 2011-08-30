<?php

class Reflect {
	public function __construct(){}
	static function hasField($o, $field) {
		$GLOBALS['%s']->push("Reflect::hasField");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = _hx_has_field($o, $field);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function field($o, $field) {
		$GLOBALS['%s']->push("Reflect::field");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = _hx_field($o, $field);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function setField($o, $field, $value) {
		$GLOBALS['%s']->push("Reflect::setField");
		$�spos = $GLOBALS['%s']->length;
		$o->{$field} = $value;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function callMethod($o, $func, $args) {
		$GLOBALS['%s']->push("Reflect::callMethod");
		$�spos = $GLOBALS['%s']->length;
		if(is_string($o) && !is_array($func)) {
			if($args->length === 0) {
				$�tmp = call_user_func(Reflect::field($o, $func));
				$GLOBALS['%s']->pop();
				return $�tmp;
				unset($�tmp);
			}
			else {
				if($args->length === 1) {
					$�tmp = call_user_func(Reflect::field($o, $func), $args[0]);
					$GLOBALS['%s']->pop();
					return $�tmp;
					unset($�tmp);
				}
				else {
					$�tmp = call_user_func(Reflect::field($o, $func), $args[0], $args[1]);
					$GLOBALS['%s']->pop();
					return $�tmp;
					unset($�tmp);
				}
				;
			}
			;
		}
		{
			$�tmp = call_user_func_array(Reflect_0($args, $func, $o), (Reflect_1($args, $func, $o)));
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function fields($o) {
		$GLOBALS['%s']->push("Reflect::fields");
		$�spos = $GLOBALS['%s']->length;
		if($o === null) {
			$�tmp = new _hx_array(array());
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		{
			$�tmp = Reflect_2($o);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function isFunction($f) {
		$GLOBALS['%s']->push("Reflect::isFunction");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = (is_array($f) && is_callable($f)) || _hx_is_lambda($f) || (is_array($f) && _hx_has_field($f[0], $f[1]) && $f[1] !== "length");
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function compare($a, $b) {
		$GLOBALS['%s']->push("Reflect::compare");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = Reflect_3($a, $b);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function compareMethods($f1, $f2) {
		$GLOBALS['%s']->push("Reflect::compareMethods");
		$�spos = $GLOBALS['%s']->length;
		if(is_array($f1) && is_array($f1)) {
			$�tmp = $f1[0] === $f2[0] && $f1[1] == $f2[1];
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		if(is_string($f1) && is_string($f2)) {
			$�tmp = _hx_equal($f1, $f2);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		{
			$GLOBALS['%s']->pop();
			return false;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function isObject($v) {
		$GLOBALS['%s']->push("Reflect::isObject");
		$�spos = $GLOBALS['%s']->length;
		if($v === null) {
			$GLOBALS['%s']->pop();
			return false;
			;
		}
		if(is_object($v)) {
			$�tmp = $v instanceof _hx_anonymous || Type::getClass($v) !== null;
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		if(is_string($v) && !_hx_is_lambda($v)) {
			$GLOBALS['%s']->pop();
			return true;
			;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function deleteField($o, $f) {
		$GLOBALS['%s']->push("Reflect::deleteField");
		$�spos = $GLOBALS['%s']->length;
		if(!_hx_has_field($o, $f)) {
			$GLOBALS['%s']->pop();
			return false;
			;
		}
		if(isset($o->�dynamics[$f])) unset($o->�dynamics[$f]); else unset($o->$f);
		{
			$GLOBALS['%s']->pop();
			return true;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function copy($o) {
		$GLOBALS['%s']->push("Reflect::copy");
		$�spos = $GLOBALS['%s']->length;
		if(is_string($o)) {
			$GLOBALS['%s']->pop();
			return $o;
			;
		}
		$o2 = _hx_anonymous(array());
		{
			$_g = 0; $_g1 = Reflect::fields($o);
			while($_g < $_g1->length) {
				$f = $_g1[$_g];
				++$_g;
				$o2->{$f} = Reflect::field($o, $f);
				unset($f);
			}
			unset($_g1,$_g);
		}
		{
			$GLOBALS['%s']->pop();
			return $o2;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos,$o2);
	}
	static function makeVarArgs($f) {
		$GLOBALS['%s']->push("Reflect::makeVarArgs");
		$�spos = $GLOBALS['%s']->length;
		return array(new _hx_lambda(array(&$f), '_hx_make_var_args'), 'execute');
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'Reflect'; }
}
;
function Reflect_0(&$args, &$func, &$o) {
	$GLOBALS['%s']->push('Reflect:lambda_0');
	$�spos = $GLOBALS['%s']->length;
if(is_callable($func)) {
	return $func;
	;
}
else {
	return array($o, $func);
	;
}
}
function Reflect_1(&$args, &$func, &$o) {
	$GLOBALS['%s']->push('Reflect:lambda_1');
	$�spos = $GLOBALS['%s']->length;
if(null === $args) {
	return array();
	;
}
else {
	return $args->�a;
	;
}
}
function Reflect_2(&$o) {
	$GLOBALS['%s']->push('Reflect:lambda_2');
	$�spos = $GLOBALS['%s']->length;
if($o instanceof _hx_array) {
	return new _hx_array(array('concat','copy','insert','iterator','length','join','pop','push','remove','reverse','shift','slice','sort','splice','toString','unshift'));
	;
}
else {
	return (Reflect_4($o));
	;
}
}
function Reflect_3(&$a, &$b) {
	$GLOBALS['%s']->push('Reflect:lambda_3');
	$�spos = $GLOBALS['%s']->length;
if($a === $b) {
	return 0;
	;
}
else {
	return (Reflect_5($a, $b));
	;
}
}
function Reflect_4(&$o) {
	$GLOBALS['%s']->push('Reflect:lambda_4');
	$�spos = $GLOBALS['%s']->length;
if(is_string($o)) {
	return new _hx_array(array('charAt','charCodeAt','indexOf','lastIndexOf','length','split','substr','toLowerCase','toString','toUpperCase'));
	;
}
else {
	return new _hx_array(_hx_get_object_vars($o));
	;
}
}
function Reflect_5(&$a, &$b) {
	$GLOBALS['%s']->push('Reflect:lambda_5');
	$�spos = $GLOBALS['%s']->length;
if(($a) > ($b)) {
	return 1;
	;
}
else {
	return -1;
	;
}
}