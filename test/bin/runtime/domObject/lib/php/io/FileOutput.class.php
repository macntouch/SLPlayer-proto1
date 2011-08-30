<?php

class php_io_FileOutput extends haxe_io_Output {
	public function __construct($f) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("php.io.FileOutput::new");
		$製pos = $GLOBALS['%s']->length;
		$this->__f = $f;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $__f;
	public function writeByte($c) {
		$GLOBALS['%s']->push("php.io.FileOutput::writeByte");
		$製pos = $GLOBALS['%s']->length;
		$r = fwrite($this->__f, chr($c));
		if($r === false) {
			$裨mp = php_io_FileOutput_0($this, $c, $r);
			$GLOBALS['%s']->pop();
			$裨mp;
			return;
			unset($裨mp);
		}
		{
			$GLOBALS['%s']->pop();
			$r;
			return;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function writeBytes($b, $p, $l) {
		$GLOBALS['%s']->push("php.io.FileOutput::writeBytes");
		$製pos = $GLOBALS['%s']->length;
		$s = $b->readString($p, $l);
		if(feof($this->__f)) {
			$裨mp = php_io_FileOutput_1($this, $b, $l, $p, $s);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$r = fwrite($this->__f, $s, $l);
		if($r === false) {
			$裨mp = php_io_FileOutput_2($this, $b, $l, $p, $r, $s);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		{
			$GLOBALS['%s']->pop();
			return $r;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$s,$r);
	}
	public function flush() {
		$GLOBALS['%s']->push("php.io.FileOutput::flush");
		$製pos = $GLOBALS['%s']->length;
		$r = fflush($this->__f);
		if($r === false) {
			throw new HException(haxe_io_Error::Custom("An error occurred"));
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function close() {
		$GLOBALS['%s']->push("php.io.FileOutput::close");
		$製pos = $GLOBALS['%s']->length;
		parent::close();
		if($this->__f !== null) {
			fclose($this->__f);
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function seek($p, $pos) {
		$GLOBALS['%s']->push("php.io.FileOutput::seek");
		$製pos = $GLOBALS['%s']->length;
		$w = null;
		$裨 = ($pos);
		switch($裨->index) {
		case 0:
		{
			$w = SEEK_SET;
			;
		}break;
		case 1:
		{
			$w = SEEK_CUR;
			;
		}break;
		case 2:
		{
			$w = SEEK_END;
			;
		}break;
		}
		$r = fseek($this->__f, $p, $w);
		if($r === false) {
			throw new HException(haxe_io_Error::Custom("An error occurred"));
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$w,$r);
	}
	public function tell() {
		$GLOBALS['%s']->push("php.io.FileOutput::tell");
		$製pos = $GLOBALS['%s']->length;
		$r = ftell($this->__f);
		if($r === false) {
			$裨mp = php_io_FileOutput_3($this, $r);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		{
			$裨mp = $r;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function eof() {
		$GLOBALS['%s']->push("php.io.FileOutput::eof");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = feof($this->__f);
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
	function __toString() { return 'php.io.FileOutput'; }
}
;
function php_io_FileOutput_0(&$裨his, &$c, &$r) {
	$GLOBALS['%s']->push('php.io.FileOutput:lambda_0');
	$製pos = $GLOBALS['%s']->length;
throw new HException(haxe_io_Error::Custom("An error occurred"));
}
function php_io_FileOutput_1(&$裨his, &$b, &$l, &$p, &$s) {
	$GLOBALS['%s']->push('php.io.FileOutput:lambda_1');
	$製pos = $GLOBALS['%s']->length;
throw new HException(new haxe_io_Eof());
}
function php_io_FileOutput_2(&$裨his, &$b, &$l, &$p, &$r, &$s) {
	$GLOBALS['%s']->push('php.io.FileOutput:lambda_2');
	$製pos = $GLOBALS['%s']->length;
throw new HException(haxe_io_Error::Custom("An error occurred"));
}
function php_io_FileOutput_3(&$裨his, &$r) {
	$GLOBALS['%s']->push('php.io.FileOutput:lambda_3');
	$製pos = $GLOBALS['%s']->length;
throw new HException(haxe_io_Error::Custom("An error occurred"));
}