<?php

class utest_ui_common_FixtureResult {
	public function __construct($methodName) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("utest.ui.common.FixtureResult::new");
		$製pos = $GLOBALS['%s']->length;
		$this->methodName = $methodName;
		$this->hlist = new HList();
		$this->hasTestError = false;
		$this->hasSetupError = false;
		$this->hasTeardownError = false;
		$this->hasTimeoutError = false;
		$this->hasAsyncError = false;
		$this->stats = new utest_ui_common_ResultStats();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $methodName;
	public $hasTestError;
	public $hasSetupError;
	public $hasTeardownError;
	public $hasTimeoutError;
	public $hasAsyncError;
	public $stats;
	public $hlist;
	public function iterator() {
		$GLOBALS['%s']->push("utest.ui.common.FixtureResult::iterator");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->hlist->iterator();
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function add($assertation) {
		$GLOBALS['%s']->push("utest.ui.common.FixtureResult::add");
		$製pos = $GLOBALS['%s']->length;
		$this->hlist->add($assertation);
		$裨 = ($assertation);
		switch($裨->index) {
		case 0:
		{
			$this->stats->addSuccesses(1);
			;
		}break;
		case 1:
		{
			$this->stats->addFailures(1);
			;
		}break;
		case 2:
		{
			$this->stats->addErrors(1);
			;
		}break;
		case 3:
		{
			$this->stats->addErrors(1);
			$this->hasSetupError = true;
			;
		}break;
		case 4:
		{
			$this->stats->addErrors(1);
			$this->hasTeardownError = true;
			;
		}break;
		case 5:
		{
			$this->stats->addErrors(1);
			$this->hasTimeoutError = true;
			;
		}break;
		case 6:
		{
			$this->stats->addErrors(1);
			$this->hasAsyncError = true;
			;
		}break;
		case 7:
		{
			$this->stats->addWarnings(1);
			;
		}break;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
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
	function __toString() { return 'utest.ui.common.FixtureResult'; }
}
