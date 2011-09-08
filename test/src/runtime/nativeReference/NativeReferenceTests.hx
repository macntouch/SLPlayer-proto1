/*This file is part of Silex - see http://projects.silexlabs.org/?/silex

Silex is © 2010-2011 Silex Labs and is released under the GPL License:

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License (GPL) as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. 

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

To read the license please visit http://www.gnu.org/copyleft/gpl.html
*/
package runtime.nativeReference;


import haxe.Log;
import org.cocktail.nativeReference.NativeReference;
import utest.Assert;
import utest.Runner;
import utest.ui.Report;
import org.cocktail.nativeReference.NativeReferenceManager;
import org.cocktail.nativeReference.NativeReferenceData;


/**
 * Test the cross-platform native reference manager 
 *@author Yannick DOMINGUEZ
 */
class NativeReferenceTests 
{
	public static function main()
	{
		var runner = new Runner();
		runner.addCase(new NativeReferenceTests());
		Report.create(runner);
		runner.run();
	}
	
	public function new() 
	{
		
	}
	
	public function testNativeReference()
	{
		var domRoot:NativeReference = NativeReferenceManager.getRoot();
		
		#if flash9
		Assert.is(domRoot, flash.display.Stage);
		#elseif js
		Assert.same(domRoot.nodeName, "BODY");
		#end
		
		var nativeGraphicReference:NativeReference = NativeReferenceManager.createNativeReference(graphic);
		
		#if flash9
		Assert.is(nativeGraphicReference, flash.display.Sprite);
		#elseif js
		Assert.same(nativeGraphicReference.nodeName, "CANVAS");
		#end
	}
}