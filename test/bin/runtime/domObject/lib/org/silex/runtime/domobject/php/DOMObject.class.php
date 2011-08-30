<?php

class org_silex_runtime_domobject_php_DOMObject extends org_silex_runtime_domobject_base_DOMObjectBase {
	public function __construct($referenceToNativeDOM) { if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($referenceToNativeDOM);
		$GLOBALS['%s']->pop();
		unset($�spos);
	}}
	public function addChild($domObject) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::addChild");
		$�spos = $GLOBALS['%s']->length;
		parent::addChild($domObject);
		$this->_referenceToNativeDOM->addChild($domObject->getReferenceToNativeDOM());
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getAttribute($propertyName) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getAttribute");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->_referenceToNativeDOM->get($propertyName);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setX($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setX");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getX() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getX");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setY($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setY");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getY() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getY");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setWidth($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setWidth");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getWidth() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setHeight($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setHeight");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getHeight() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setRotation($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setRotation");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getRotation() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getRotation");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setZOrder($value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setZOrder");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function getZOrder() {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getZOrder");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function setStyle($property, $value) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::setStyle");
		$�spos = $GLOBALS['%s']->length;
		$styleHash = new Hash();
		$GLOBALS['%s']->pop();
		unset($�spos,$styleHash);
	}
	public function getStyle($property) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.DOMObject::getStyle");
		$�spos = $GLOBALS['%s']->length;
		$styleHash = new Hash();
		{
			$GLOBALS['%s']->pop();
			return "";
			;
		}
		$GLOBALS['%s']->pop();
		unset($�spos,$styleHash);
	}
	function __toString() { return 'org.silex.runtime.domobject.php.DOMObject'; }
}
