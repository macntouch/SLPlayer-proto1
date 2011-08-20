<?php

class haxe_io_Bytes {
	public function __construct($length, $b) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("haxe.io.Bytes::new");
		$製pos = $GLOBALS['%s']->length;
		$this->length = $length;
		$this->b = $b;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $length;
	public $b;
	public function get($pos) {
		$GLOBALS['%s']->push("haxe.io.Bytes::get");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = ord($this->b[$pos]);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function set($pos, $v) {
		$GLOBALS['%s']->push("haxe.io.Bytes::set");
		$製pos = $GLOBALS['%s']->length;
		$this->b[$pos] = chr($v);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function blit($pos, $src, $srcpos, $len) {
		$GLOBALS['%s']->push("haxe.io.Bytes::blit");
		$製pos = $GLOBALS['%s']->length;
		if($pos < 0 || $srcpos < 0 || $len < 0 || $pos + $len > $this->length || $srcpos + $len > $src->length) {
			throw new HException(haxe_io_Error::$OutsideBounds);
			;
		}
		$this->b = substr($this->b, 0, $pos) . substr($src->b, $srcpos, $len) . substr($this->b, $pos+$len);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function sub($pos, $len) {
		$GLOBALS['%s']->push("haxe.io.Bytes::sub");
		$製pos = $GLOBALS['%s']->length;
		if($pos < 0 || $len < 0 || $pos + $len > $this->length) {
			throw new HException(haxe_io_Error::$OutsideBounds);
			;
		}
		{
			$裨mp = new haxe_io_Bytes($len, substr($this->b, $pos, $len));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function compare($other) {
		$GLOBALS['%s']->push("haxe.io.Bytes::compare");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->b < $other->b ? -1 : ($this->b == $other->b ? 0 : 1);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function readString($pos, $len) {
		$GLOBALS['%s']->push("haxe.io.Bytes::readString");
		$製pos = $GLOBALS['%s']->length;
		if($pos < 0 || $len < 0 || $pos + $len > $this->length) {
			throw new HException(haxe_io_Error::$OutsideBounds);
			;
		}
		{
			$裨mp = substr($this->b, $pos, $len);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function toString() {
		$GLOBALS['%s']->push("haxe.io.Bytes::toString");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->b;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getData() {
		$GLOBALS['%s']->push("haxe.io.Bytes::getData");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->b;
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
	static function alloc($length) {
		$GLOBALS['%s']->push("haxe.io.Bytes::alloc");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new haxe_io_Bytes($length, str_repeat(chr(0), $length));
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	static function ofString($s) {
		$GLOBALS['%s']->push("haxe.io.Bytes::ofString");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new haxe_io_Bytes(strlen($s), $s);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	static function ofData($b) {
		$GLOBALS['%s']->push("haxe.io.Bytes::ofData");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new haxe_io_Bytes(strlen($b), $b);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	function __toString() { return $this->toString(); }
}
