<?php

class org_silex_runtime_domobject_php_TextDOMObject extends org_silex_runtime_domobject_base_TextDOMObjectBase {
	public function __construct($referenceToNativeDOMObject) { if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.TextDOMObject::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($referenceToNativeDOMObject);
		$GLOBALS['%s']->pop();
		unset($�spos);
	}}
	public function setText($text) {
		$GLOBALS['%s']->push("org.silex.runtime.domobject.php.TextDOMObject::setText");
		$�spos = $GLOBALS['%s']->length;
		parent::setText($text);
		$this->_referenceToNativeDOM->addChild(Xml::createPCData($text));
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'org.silex.runtime.domobject.php.TextDOMObject'; }
}
