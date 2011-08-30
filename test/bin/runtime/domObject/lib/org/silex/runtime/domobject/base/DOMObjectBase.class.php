<?php

class org_silex_runtime_domobject_base_DOMObjectBase {
	public function __construct($referenceToNativeDOMObject) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::new");
		$製pos = $GLOBALS['%s']->length;
		$this->_referenceToNativeDOM = $referenceToNativeDOMObject;
		$this->_children = new _hx_array(array());
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $onPress;
	public $onDoubleClick;
	public $onRelease;
	public $onRollOver;
	public $onRollOut;
	public $onMouseMove;
	public $onMouseWheel;
	public $onFocusIn;
	public $onFocusOut;
	public $_referenceToNativeDOM;
	public $_parent;
	public $_children;
	public function addChild($domObject) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::addChild");
		$製pos = $GLOBALS['%s']->length;
		$domObject->setParent($this);
		$this->_children->push($domObject);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function removeChild($domObject) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::removeChild");
		$製pos = $GLOBALS['%s']->length;
		$domObject->setParent(null);
		$this->_children->remove($domObject);
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getParent() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getParent");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->_parent;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setParent($domObject) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setParent");
		$製pos = $GLOBALS['%s']->length;
		$this->_parent = $domObject;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getChildren() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getChildren");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->_children;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getReferenceToNativeDOM() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getReferenceToNativeDOM");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->_referenceToNativeDOM;
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setAttribute($propertyName, $propertyValue) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setAttribute");
		$製pos = $GLOBALS['%s']->length;
		$this->_referenceToNativeDOM->{$propertyName} = $propertyValue;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getAttribute($propertyName) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getAttribute");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = Reflect::field($this->_referenceToNativeDOM, $propertyName);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function unsetNativeListeners() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::unsetNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativePress($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativePress");
		$製pos = $GLOBALS['%s']->length;
		if($this->onPress !== null) {
			$this->onPress();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativeDoubleClick($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativeDoubleClick");
		$製pos = $GLOBALS['%s']->length;
		if($this->onDoubleClick !== null) {
			$this->onDoubleClick();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativeRelease($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativeRelease");
		$製pos = $GLOBALS['%s']->length;
		if($this->onRelease !== null) {
			$this->onRelease();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativeRollOver($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativeRollOver");
		$製pos = $GLOBALS['%s']->length;
		if($this->onRollOver !== null) {
			$this->onRollOver();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativeRollOut($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativeRollOut");
		$製pos = $GLOBALS['%s']->length;
		if($this->onRollOut !== null) {
			$this->onRollOut();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function onNativeMouseMove($event) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::onNativeMouseMove");
		$製pos = $GLOBALS['%s']->length;
		if($this->onMouseMove !== null) {
			$this->onMouseMove();
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setX($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setX");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getX() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getX");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setY($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setY");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getY() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getY");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setWidth($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setWidth");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getWidth() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getWidth");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setHeight($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setHeight");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getHeight() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getHeight");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setRotation($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setRotation");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getRotation() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getRotation");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function setZOrder($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::setZOrder");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function getZOrder() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.base.DOMObjectBase::getZOrder");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
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
	static $rootDOMObject;
	function __toString() { return 'org.silex.runtime.domobject.base.DOMObjectBase'; }
}
