<?php

class utest_Notifier {
	public function __construct() {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("utest.Notifier::new");
		$製pos = $GLOBALS['%s']->length;
		$this->handlers = new _hx_array(array());
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $handlers;
	public function add($h) {
		$GLOBALS['%s']->push("utest.Notifier::add");
		$製pos = $GLOBALS['%s']->length;
		$this->handlers->push($h);
		{
			$GLOBALS['%s']->pop();
			return $h;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function remove($h) {
		$GLOBALS['%s']->push("utest.Notifier::remove");
		$製pos = $GLOBALS['%s']->length;
		{
			$_g1 = 0; $_g = $this->handlers->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(Reflect::compareMethods($this->handlers[$i], $h)) {
					$裨mp = _hx_array_get($this->handlers->splice($i, 1), 0);
					$GLOBALS['%s']->pop();
					return $裨mp;
					unset($裨mp);
				}
				unset($i);
			}
			unset($_g1,$_g);
		}
		{
			$GLOBALS['%s']->pop();
			return null;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function clear() {
		$GLOBALS['%s']->push("utest.Notifier::clear");
		$製pos = $GLOBALS['%s']->length;
		$this->handlers = new _hx_array(array());
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function dispatch() {
		$GLOBALS['%s']->push("utest.Notifier::dispatch");
		$製pos = $GLOBALS['%s']->length;
		try {
			$list = $this->handlers->copy();
			{
				$_g = 0;
				while($_g < $list->length) {
					$l = $list[$_g];
					++$_g;
					call_user_func_array($l, array());
					unset($l);
				}
				unset($_g);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
				;
			}
			unset($list);
		}catch(Exception $蜜) {
		$_ex_ = ($蜜 instanceof HException) ? $蜜->e : $蜜;
		;
		if(($exc = $_ex_) instanceof utest__Dispatcher_EventException){
			$GLOBALS['%e'] = new _hx_array(array());
			while($GLOBALS['%s']->length >= $製pos) $GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
			$GLOBALS['%s']->push($GLOBALS['%e'][0]);
			{
				$GLOBALS['%s']->pop();
				return false;
				;
			}
			;
		} else throw $蜜; }
		$GLOBALS['%s']->pop();
		unset($製pos,$exc);
	}
	public function has() {
		$GLOBALS['%s']->push("utest.Notifier::has");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->handlers->length > 0;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
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
	static function stop() {
		$GLOBALS['%s']->push("utest.Notifier::stop");
		$製pos = $GLOBALS['%s']->length;
		throw new HException(utest__Dispatcher_EventException::$StopPropagation);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	function __toString() { return 'utest.Notifier'; }
}
