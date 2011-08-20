<?php

class EReg {
	public function __construct($r, $opt) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("EReg::new");
		$製pos = $GLOBALS['%s']->length;
		$this->pattern = $r;
		$a = _hx_explode("g", $opt);
		$this->hglobal = $a->length > 1;
		if($this->hglobal) {
			$opt = $a->join("");
			;
		}
		$this->options = $opt;
		$this->re = "/" . ((str_replace("/", "\\/", $r) . "/") . $opt);
		$GLOBALS['%s']->pop();
		unset($製pos,$a);
	}}
	public $r;
	public $last;
	public $hglobal;
	public $pattern;
	public $options;
	public $re;
	public $matches;
	public function match($s) {
		$GLOBALS['%s']->push("EReg::match");
		$製pos = $GLOBALS['%s']->length;
		$p = preg_match($this->re, $s, $this->matches, PREG_OFFSET_CAPTURE);
		if($p > 0) {
			$this->last = $s;
			;
		}
		else {
			$this->last = null;
			;
		}
		{
			$裨mp = $p > 0;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$p);
	}
	public function matched($n) {
		$GLOBALS['%s']->push("EReg::matched");
		$製pos = $GLOBALS['%s']->length;
		if($n < 0) {
			throw new HException("EReg::matched");
			;
		}
		if($n >= count($this->matches)) {
			$GLOBALS['%s']->pop();
			return null;
			;
		}
		if($this->matches[$n][1] < 0) {
			$GLOBALS['%s']->pop();
			return null;
			;
		}
		{
			$裨mp = $this->matches[$n][0];
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function matchedLeft() {
		$GLOBALS['%s']->push("EReg::matchedLeft");
		$製pos = $GLOBALS['%s']->length;
		if(count($this->matches) === 0) {
			throw new HException("No string matched");
			;
		}
		{
			$裨mp = _hx_substr($this->last, 0, $this->matches[0][1]);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function matchedRight() {
		$GLOBALS['%s']->push("EReg::matchedRight");
		$製pos = $GLOBALS['%s']->length;
		if(count($this->matches) === 0) {
			throw new HException("No string matched");
			;
		}
		$x = $this->matches[0][1] + strlen($this->matches[0][0]);
		{
			$裨mp = _hx_substr($this->last, $x, null);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$x);
	}
	public function matchedPos() {
		$GLOBALS['%s']->push("EReg::matchedPos");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = _hx_anonymous(array("pos" => $this->matches[0][1], "len" => strlen($this->matches[0][0])));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function split($s) {
		$GLOBALS['%s']->push("EReg::split");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new _hx_array(preg_split($this->re, $s, $this->hglobal ? -1 : 2));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function replace($s, $by) {
		$GLOBALS['%s']->push("EReg::replace");
		$製pos = $GLOBALS['%s']->length;
		$by = str_replace("\\\$", "\\\\\$", $by);
		$by = str_replace("\$\$", "\\\$", $by);
		if(!preg_match('/\\([^?].+?\\)/', $this->re)) $by = preg_replace('/\$(\d+)/', '\\\$\1', $by);
		{
			$裨mp = preg_replace($this->re, $by, $s, EReg_0($this, $by, $s));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function customReplace($s, $f) {
		$GLOBALS['%s']->push("EReg::customReplace");
		$製pos = $GLOBALS['%s']->length;
		$buf = "";
		while(true) {
			if(!$this->match($s)) {
				break;
				;
			}
			$buf .= $this->matchedLeft();
			$buf .= call_user_func_array($f, array($this));
			$s = $this->matchedRight();
			;
		}
		$buf .= $s;
		{
			$GLOBALS['%s']->pop();
			return $buf;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$buf);
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
	function __toString() { return 'EReg'; }
}
;
function EReg_0(&$裨his, &$by, &$s) {
	$GLOBALS['%s']->push('EReg:lambda_0');
	$製pos = $GLOBALS['%s']->length;
if($裨his->hglobal) {
	return -1;
	;
}
else {
	return 1;
	;
}
}