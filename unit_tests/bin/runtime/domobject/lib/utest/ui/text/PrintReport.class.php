<?php

class utest_ui_text_PrintReport extends utest_ui_text_PlainTextReport {
	public function __construct($runner, $useTrace) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("utest.ui.text.PrintReport::new");
		$製pos = $GLOBALS['%s']->length;
		if(null === $useTrace) {
			$useTrace = false;
			;
		}
		$this->useTrace = $useTrace;
		parent::__construct($runner,(isset($this->_handler) ? $this->_handler: array($this, "_handler")));
		if(php_Lib::isCli()) {
			$this->newline = "\x0A";
			$this->indent = "  ";
			;
		}
		else {
			$this->newline = "<br>";
			$this->indent = "&nbsp;&nbsp;";
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $useTrace;
	public function _handler($report) {
		$GLOBALS['%s']->push("utest.ui.text.PrintReport::_handler");
		$製pos = $GLOBALS['%s']->length;
		if($this->useTrace) {
			$this->_trace($report->getResults());
			;
		}
		else {
			$this->_print($report->getResults());
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function _trace($s) {
		$GLOBALS['%s']->push("utest.ui.text.PrintReport::_trace");
		$製pos = $GLOBALS['%s']->length;
		$s = str_replace("  ", $this->indent, $s);
		$s = str_replace("\x0A", $this->newline, $s);
		haxe_Log::trace($s, _hx_anonymous(array("fileName" => "PrintReport.hx", "lineNumber" => 66, "className" => "utest.ui.text.PrintReport", "methodName" => "_trace")));
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function _print($s) {
		$GLOBALS['%s']->push("utest.ui.text.PrintReport::_print");
		$製pos = $GLOBALS['%s']->length;
		php_Lib::hprint($s);
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
	function __toString() { return 'utest.ui.text.PrintReport'; }
}
