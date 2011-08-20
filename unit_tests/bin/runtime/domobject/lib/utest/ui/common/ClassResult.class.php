<?php

class utest_ui_common_ClassResult {
	public function __construct($className, $setupName, $teardownName) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("utest.ui.common.ClassResult::new");
		$製pos = $GLOBALS['%s']->length;
		$this->fixtures = new Hash();
		$this->className = $className;
		$this->setupName = $setupName;
		$this->hasSetup = $setupName !== null;
		$this->teardownName = $teardownName;
		$this->hasTeardown = $teardownName !== null;
		$this->methods = 0;
		$this->stats = new utest_ui_common_ResultStats();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $fixtures;
	public $className;
	public $setupName;
	public $teardownName;
	public $hasSetup;
	public $hasTeardown;
	public $methods;
	public $stats;
	public function add($result) {
		$GLOBALS['%s']->push("utest.ui.common.ClassResult::add");
		$製pos = $GLOBALS['%s']->length;
		if($this->fixtures->exists($result->methodName)) {
			throw new HException("invalid duplicated fixture result");
			;
		}
		$this->stats->wire($result->stats);
		$this->methods++;
		$this->fixtures->set($result->methodName, $result);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function get($method) {
		$GLOBALS['%s']->push("utest.ui.common.ClassResult::get");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->fixtures->get($method);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function exists($method) {
		$GLOBALS['%s']->push("utest.ui.common.ClassResult::exists");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->fixtures->exists($method);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function methodNames($errorsHavePriority) {
		$GLOBALS['%s']->push("utest.ui.common.ClassResult::methodNames");
		$製pos = $GLOBALS['%s']->length;
		if($errorsHavePriority === null) {
			$errorsHavePriority = true;
			;
		}
		$names = new _hx_array(array());
		if(null == $this->fixtures) throw new HException('null iterable');
		$蜴t = $this->fixtures->keys();
		while($蜴t->hasNext()) {
		$name = $蜴t->next();
		$names->push($name);
		}
		if($errorsHavePriority) {
			$me = $this;
			$names->sort(array(new _hx_lambda(array(&$errorsHavePriority, &$me, &$names), "utest_ui_common_ClassResult_0"), 'execute'));
			unset($me);
		}
		else {
			$names->sort(array(new _hx_lambda(array(&$errorsHavePriority, &$names), "utest_ui_common_ClassResult_1"), 'execute'));
			;
		}
		{
			$GLOBALS['%s']->pop();
			return $names;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$names);
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return 'utest.ui.common.ClassResult'; }
}
;
function utest_ui_common_ClassResult_0(&$errorsHavePriority, &$me, &$names, $a, $b) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_0');
	$製pos = $GLOBALS['%s']->length;
{
	$GLOBALS['%s']->push("utest.ui.common.ClassResult::methodNames@54");
	$製pos2 = $GLOBALS['%s']->length;
	$as = $me->get($a)->stats;
	$bs = $me->get($b)->stats;
	if($as->hasErrors) {
		{
			$裨mp = utest_ui_common_ClassResult_2($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		;
	}
	else {
		if($bs->hasErrors) {
			{
				$GLOBALS['%s']->pop();
				return 1;
				;
			}
			;
		}
		else {
			if($as->hasFailures) {
				{
					$裨mp = utest_ui_common_ClassResult_3($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names);
					$GLOBALS['%s']->pop();
					return $裨mp;
					unset($裨mp);
				}
				;
			}
			else {
				if($bs->hasFailures) {
					{
						$GLOBALS['%s']->pop();
						return 1;
						;
					}
					;
				}
				else {
					if($as->hasWarnings) {
						{
							$裨mp = utest_ui_common_ClassResult_4($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names);
							$GLOBALS['%s']->pop();
							return $裨mp;
							unset($裨mp);
						}
						;
					}
					else {
						if($bs->hasWarnings) {
							{
								$GLOBALS['%s']->pop();
								return 1;
								;
							}
							;
						}
						else {
							{
								$裨mp = Reflect::compare($a, $b);
								$GLOBALS['%s']->pop();
								return $裨mp;
								unset($裨mp);
							}
							;
						}
						;
					}
					;
				}
				;
			}
			;
		}
		;
	}
	$GLOBALS['%s']->pop();
	unset($製pos2,$bs,$as);
}
}
function utest_ui_common_ClassResult_1(&$errorsHavePriority, &$names, $a, $b) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_1');
	$製pos = $GLOBALS['%s']->length;
{
	$GLOBALS['%s']->push("utest.ui.common.ClassResult::methodNames@74");
	$製pos2 = $GLOBALS['%s']->length;
	{
		$裨mp = Reflect::compare($a, $b);
		$GLOBALS['%s']->pop();
		return $裨mp;
		unset($裨mp);
	}
	$GLOBALS['%s']->pop();
	unset($製pos2);
}
}
function utest_ui_common_ClassResult_2(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_2');
	$製pos = $GLOBALS['%s']->length;
if(!$bs->hasErrors) {
	return -1;
	;
}
else {
	return (utest_ui_common_ClassResult_5($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names));
	;
}
}
function utest_ui_common_ClassResult_3(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_3');
	$製pos = $GLOBALS['%s']->length;
if(!$bs->hasFailures) {
	return -1;
	;
}
else {
	return (utest_ui_common_ClassResult_6($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names));
	;
}
}
function utest_ui_common_ClassResult_4(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_4');
	$製pos = $GLOBALS['%s']->length;
if(!$bs->hasWarnings) {
	return -1;
	;
}
else {
	return (utest_ui_common_ClassResult_7($裨his, $a, $as, $b, $bs, $errorsHavePriority, $me, $names));
	;
}
}
function utest_ui_common_ClassResult_5(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_5');
	$製pos = $GLOBALS['%s']->length;
if($as->errors === $bs->errors) {
	return Reflect::compare($a, $b);
	;
}
else {
	return Reflect::compare($as->errors, $bs->errors);
	;
}
}
function utest_ui_common_ClassResult_6(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_6');
	$製pos = $GLOBALS['%s']->length;
if($as->failures === $bs->failures) {
	return Reflect::compare($a, $b);
	;
}
else {
	return Reflect::compare($as->failures, $bs->failures);
	;
}
}
function utest_ui_common_ClassResult_7(&$裨his, &$a, &$as, &$b, &$bs, &$errorsHavePriority, &$me, &$names) {
	$GLOBALS['%s']->push('utest.ui.common.ClassResult:lambda_7');
	$製pos = $GLOBALS['%s']->length;
if($as->warnings === $bs->warnings) {
	return Reflect::compare($a, $b);
	;
}
else {
	return Reflect::compare($as->warnings, $bs->warnings);
	;
}
}