<?php

class org_silex_runtime_nativeClass_NativeInstanceBase {
	public function __construct($nativeInstanceClassName) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeInstanceBase::new");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $_refToNativeClassInstance;
	public function callMethod($methodName, $args) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeInstanceBase::callMethod");
		$製pos = $GLOBALS['%s']->length;
		if(Reflect::isFunction(Reflect::field($this->_refToNativeClassInstance, $methodName))) {
			$method = Reflect::field($this->_refToNativeClassInstance, $methodName);
			{
				$裨mp = Reflect::callMethod($this->_refToNativeClassInstance, $method, $args);
				$GLOBALS['%s']->pop();
				return $裨mp;
				unset($裨mp);
			}
			unset($method);
		}
		{
			$GLOBALS['%s']->pop();
			return null;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getField($fieldName) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeInstanceBase::getField");
		$製pos = $GLOBALS['%s']->length;
		if(_hx_has_field($this->_refToNativeClassInstance, $fieldName)) {
			{
				$裨mp = Reflect::field($this->_refToNativeClassInstance, $fieldName);
				$GLOBALS['%s']->pop();
				return $裨mp;
				unset($裨mp);
			}
			;
		}
		else {
			{
				$GLOBALS['%s']->pop();
				return null;
				;
			}
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setField($fieldName, $fieldValue) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeInstanceBase::setField");
		$製pos = $GLOBALS['%s']->length;
		$this->_refToNativeClassInstance->{$fieldName} = $fieldValue;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getReferenceToNativeClassInstance() {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeInstanceBase::getReferenceToNativeClassInstance");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->_refToNativeClassInstance;
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
	function __toString() { return 'org.silex.runtime.nativeClass.NativeInstanceBase'; }
}
