<?php

class org_silex_runtime_nativeClass_NativeClass {
	public function __construct() { if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeClass::new");
		$�spos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($�spos);
	}}
	static function getNativeInstanceByClassName($className) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeClass::getNativeInstanceByClassName");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = new org_silex_runtime_nativeClass_php_NativeInstance($className);
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	static function createInstanceOf($classReference) {
		$GLOBALS['%s']->push("org.silex.runtime.nativeClass.NativeClass::createInstanceOf");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = org_silex_runtime_nativeClass_NativeClass::getNativeInstanceByClassName(Type::getClassName($classReference));
			$GLOBALS['%s']->pop();
			return $�tmp;
			unset($�tmp);
		}
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'org.silex.runtime.nativeClass.NativeClass'; }
}
