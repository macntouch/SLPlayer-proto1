<?php

class org_silex_runtime_ressource_php_LibraryLoader extends org_silex_runtime_ressource_RessourceLoader {
	public function __construct() { if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.LibraryLoader::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
		unset($�spos);
	}}
	public function doLoad($relativeUrl) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.LibraryLoader::doLoad");
		$�spos = $GLOBALS['%s']->length;
		require_once($relativeUrl);
		$this->onLoadComplete(null);
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	public function onLoadComplete($data) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.LibraryLoader::onLoadComplete");
		$�spos = $GLOBALS['%s']->length;
		$this->_onLoadCompleteCallback(null);
		$GLOBALS['%s']->pop();
		unset($�spos);
	}
	function __toString() { return 'org.silex.runtime.ressource.php.LibraryLoader'; }
}
