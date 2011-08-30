<?php

class haxe_io_BytesOutput extends haxe_io_Output {
	public function __construct() {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("haxe.io.BytesOutput::new");
		$製pos = $GLOBALS['%s']->length;
		$this->b = new haxe_io_BytesBuffer();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $b;
	public function writeByte($c) {
		$GLOBALS['%s']->push("haxe.io.BytesOutput::writeByte");
		$製pos = $GLOBALS['%s']->length;
		$this->b->b .= chr($c);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function writeBytes($buf, $pos, $len) {
		$GLOBALS['%s']->push("haxe.io.BytesOutput::writeBytes");
		$製pos = $GLOBALS['%s']->length;
		{
			if($pos < 0 || $len < 0 || $pos + $len > $buf->length) {
				throw new HException(haxe_io_Error::$OutsideBounds);
				;
			}
			$this->b->b .= substr($buf->b, $pos, $len);
			;
		}
		{
			$GLOBALS['%s']->pop();
			return $len;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getBytes() {
		$GLOBALS['%s']->push("haxe.io.BytesOutput::getBytes");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->b->getBytes();
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
	function __toString() { return 'haxe.io.BytesOutput'; }
}
