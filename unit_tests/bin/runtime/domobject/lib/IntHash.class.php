<?php

class IntHash implements IteratorAggregate{
	public function __construct() {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("IntHash::new");
		$製pos = $GLOBALS['%s']->length;
		$this->h = array();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $h;
	public function set($key, $value) {
		$GLOBALS['%s']->push("IntHash::set");
		$製pos = $GLOBALS['%s']->length;
		$this->h[$key] = $value;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function get($key) {
		$GLOBALS['%s']->push("IntHash::get");
		$製pos = $GLOBALS['%s']->length;
		if(array_key_exists($key, $this->h)) {
			$裨mp = $this->h[$key];
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		else {
			$GLOBALS['%s']->pop();
			return null;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function exists($key) {
		$GLOBALS['%s']->push("IntHash::exists");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = array_key_exists($key, $this->h);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function remove($key) {
		$GLOBALS['%s']->push("IntHash::remove");
		$製pos = $GLOBALS['%s']->length;
		if(array_key_exists($key, $this->h)) {
			unset($this->h[$key]);
			{
				$GLOBALS['%s']->pop();
				return true;
				;
			}
			;
		}
		else {
			$GLOBALS['%s']->pop();
			return false;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function keys() {
		$GLOBALS['%s']->push("IntHash::keys");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new _hx_array_iterator(array_keys($this->h));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function iterator() {
		$GLOBALS['%s']->push("IntHash::iterator");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new _hx_array_iterator(array_values($this->h));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function toString() {
		$GLOBALS['%s']->push("IntHash::toString");
		$製pos = $GLOBALS['%s']->length;
		$s = "{";
		$it = $this->keys();
		$蜴t = $it;
		while($蜴t->hasNext()) {
		$i = $蜴t->next();
		{
			$s .= $i;
			$s .= " => ";
			$s .= Std::string($this->get($i));
			if($it->hasNext()) {
				$s .= ", ";
				;
			}
			;
		}
		}
		{
			$裨mp = $s . "}";
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$s,$it);
	}
	public function getIterator() {
		$GLOBALS['%s']->push("IntHash::getIterator");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->iterator();
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
	function __toString() { return $this->toString(); }
}
