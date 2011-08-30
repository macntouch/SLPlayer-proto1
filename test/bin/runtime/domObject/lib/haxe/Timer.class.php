<?php

class haxe_Timer {
	public function __construct(){}
	static function measure($f, $pos) {
		$GLOBALS['%s']->push("haxe.Timer::measure");
		$�spos = $GLOBALS['%s']->length;
		$t0 = haxe_Timer::stamp();
		$r = call_user_func_array($f, array());
		haxe_Log::trace((haxe_Timer::stamp() - $t0) . "s", $pos);
		{
			$GLOBALS['%s']->pop();
			return $r;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos,$t0,$r);
	}
	static function stamp() {
		$GLOBALS['%s']->push("haxe.Timer::stamp");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = php_Sys::time();
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'haxe.Timer'; }
}
