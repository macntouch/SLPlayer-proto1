/*
This file is part of Silex - see http://projects.silexlabs.org/?/silex

Silex is © 2010-2011 Silex Labs and is released under the GPL License:

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License (GPL) as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. 

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

To read the license please visit http://www.gnu.org/copyleft/gpl.html
*/
package cocktail.domObject.base;

import cocktail.geom.Matrix;
import cocktail.domObject.DOMObjectData;
import cocktail.geom.GeomData;
import cocktail.keyboard.Keyboard;
import cocktail.keyboard.KeyboardData;
import cocktail.mouse.Mouse;
import cocktail.mouse.MouseData;
import cocktail.nativeReference.NativeReference;

/**
 * This is a base class for runtime specific DOMObject. A DOMObject is an abstraction of the visual base element of a runtime.
 * For instance in JS, a DOMObject is an HTML element, like a <div> or <img> element. In Flash AS3, a domObject is a Sprite.
 * A Domobject can contain other DOMObjects. This class abstracts manipulating DOM elements, each runtime is implemented in an
 * inheriting class
 * @author Yannick DOMINGUEZ
 */
class DOMObjectBase 
{
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// Event callbacks, cross-platform callbacks for runtime specific events
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * The callback called when there is a mouse wheel event over the DOMObject
	 * TO DO
	 */
	public var onMouseWheel:Void->Void;
	
	/**
	 * The callback called when the DOMObject gains focus
	 * TO DO
	 */
	public var onFocusIn:Void->Void;
	
	/**
	 * The callback called when the DOMObject loses focus
	 * TO DO
	 */
	public var onFocusOut:Void->Void;
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// Mouse attributes and callback
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * An instance of the cross-platform mouse class, used to listen
	 * to native mouse events
	 */
	private var _mouse:Mouse;
	
	/**
	 * The callback called on mouse down through the mouse instance
	 */
	public var onMouseDown(getOnMouseDown, setOnMouseDown):MouseEventData->Void;
	
	/**
	 * The callback called on mouse up through the mouse instance
	 */
	public var onMouseUp(getOnMouseUp, setOnMouseUp):MouseEventData->Void;
	
	/**
	 * The callback called when the mouse over this dom object
	 */
	public var onMouseOver(getOnMouseOver, setOnMouseOver):MouseEventData->Void;
	
	/**
	 * The callback called on mouse out of this dom object
	 */
	public var onMouseOut(getOnMouseOut, setOnMouseOut):MouseEventData->Void;
	
	/**
	 * The callback called when the mouse move over this dom object
	 */
	public var onMouseMove(getOnMouseMove, setOnMouseMove):MouseEventData->Void;
	
	/**
	 * The callback called when this dom object is double-clicked
	 */
	public var onMouseDoubleClick(getOnMouseDoubleClick, setOnMouseDoubleClick):MouseEventData->Void;
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// Keyboard attributes and callback
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * An instance of the cross-platform keyboard class, used to listen
	 * to key dow and up event
	 */
	private var _keyboard:Keyboard;
	
	/**
	 * The callback called on key down through the keyboard instance
	 */
	public var onKeyDown(getOnKeyDown, setOnKeyDown):Key->Void;
	
	/**
	 * The callback called on key up through the keyboard instance
	 */
	public var onKeyUp(getOnKeyUp, setOnKeyUp):Key->Void;
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// Private attributes
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * A reference to the native DOM object. Varies for each
	 * runtime : in JS it is an HTML element, in Flash a Sprite,
	 * in PHP a resource
	 */
	private var _nativeReference:NativeReference;
	public var nativeReference(getNativeReference, setNativeReference):NativeReference;
	
	/**
	 * a reference to the parent of this DOMObject
	 */ 
	private var _parent:DOMObjectBase;
	public var parent(getParent, setParent):DOMObjectBase;
	
	/**
	 *  a reference to each of the DOMObject childs, stored by
	 *  z-index
	 */
	private var _children:Array<DOMObjectBase>;
	public var children(getChildren, never):Array<DOMObjectBase>;
	
	/**
	 * a reference to this domObject transformation matrix
	 */
	private var _matrix:Matrix;
	public var matrix(getMatrix, setMatrix):Matrix;
	
	/////////////////////////////////
	// COORDS Attributes
	// Stores the coords of the DOM Object
	// as they are set. This abstraction is used
	// to prevent runtime inconsistencies happening
	// when retrieving coords from a native dom object
	////////////////////////////////
	
	/**
	 * Stores the x position of this dom object
	 */
	private var _x:Int;
	public var x(getX, setX):Int;
	
	/**
	 * Stores the y position of this dom object
	 */
	private var _y:Int;
	public var y(getY, setY):Int;
	
	/**
	 * Stores the width position of this dom object
	 */
	private var _width:Int;
	public var width(getWidth, setWidth):Int;
	
	/**
	 * Stores the height position of this dom object
	 */
	private var _height:Int;
	public var height(getHeight, setHeight):Int;
	
	/////////////////////////////////
	// VISIBILITY/OPACITY attributes
	////////////////////////////////
	
	/**
	 * The opacity of the DOM Object, from 0 to 1
	 */
	public var alpha(getAlpha, setAlpha):Float;
	
	/**
	 * Wheter the DOMObject is visible
	 */
	public var isVisible(getIsVisible, setIsVisible):Bool;
	
	/////////////////////////////////
	// Z-ORDER attribute
	/////////////////////////////////
	
	/**
	 * The z-order / z-index of this DOM Object, relative to
	 * its parent (the first child of a DOMObject always has
	 * a 0 z-order)
	 */
	public var zOrder(getZOrder, setZOrder):Int;
	
	/////////////////////////////////
	// CONSTRUTOR & INIT
	/////////////////////////////////
	
	/**
	 * class constructor. Set the native reference to the native DOMObject
	 * and initialise it
	 */
	public function new(nativeReference:Dynamic = null) 
	{
		//store and init the dom object properties
		//with the native reference if it isn't null
		if (nativeReference != null)
		{
			this._nativeReference = nativeReference;
			init();
		}
		
		_children = new Array<DOMObjectBase>();
		
		//initialise the transformation matrix of this dom object
		_matrix = new Matrix();
		
		//initialise the keyboard listener of this dom object 
		_keyboard = new Keyboard();
		
		//initialise the mouse listeners on this dom object by 
		//listening to the current native reference
		_mouse = new Mouse(this._nativeReference);
		
	}
	
	/**
	 * Set the domObject properties which can be retrieved
	 * from the referenceToNativeDom. Called each time
	 * the native dom object is set
	 */
	private function init():Void
	{
		//abstract
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// DOM
	// Public method to manipulate the DOM
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Set the current DOMObject as the parent of the added domObject, and 
	 * store it in the children array. Overriden by each runtime, to add the
	 * child to native DOM.
	 * @param	domObject the DOMObject to attach to this DOMObject
	 */
	public function addChild(domObject:DOMObjectBase):Void
	{
		domObject.setParent(this);
		_children.push(domObject);
	}
	
	/**
	 * Reset the parent of the remove child object as it no longer is attached
	 * to the DOM, remove it also from the children array. Overrident by each
	 * runtime to remove also from the native DOM
	 * @param	domObject the DOMObject to remove from this DOMObject
	 */
	public function removeChild(domObject:DOMObjectBase):Void
	{
		domObject.setParent(null);
		_children.remove(domObject);
	}
	
	/**
	 * Returns the DOMObject parent of this DOMObject
	 */
	public function getParent():DOMObjectBase
	{
		return this._parent;
	}
	
	/**
	 * set the parent of this DOMObject
	 */
	public function setParent(domObject:DOMObjectBase):DOMObjectBase
	{
		this._parent = domObject;
		return this._parent;
	}
	
	
	/**
	 * returns the children of this DOMObject
	 * @return an array of DOMObject
	 */
	public function getChildren():Array<DOMObjectBase>
	{
		return _children;
	}
	
	/**
	 * set the reference to this DOMObject native DOM element
	 * @return a DisplayObject in AS, an HTML element in JS, a resource in PHP
	 */
	public function setNativeReference(value:NativeReference):NativeReference
	{
		this._nativeReference = value;
		init();
		return value;
	}
	
	/**
	 * Returns the reference to this DOMObject native DOM element
	 * @return a DisplayObject in AS, an HTML element in JS, a resource in PHP
	 */
	public function getNativeReference():NativeReference
	{
		return this._nativeReference;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// VISIBILITY/OPACITY
	// Public and private methods to manage the visibility and opacity of the dom object
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Show or hide the native DOM Object. Implemented
	 * by runtime specific sub class
	 * @param	value true if the DOM object must be visible
	 */
	public function setIsVisible(value:Bool):Bool
	{
		return value;
	}
	
	/**
	 * Return wether the DOM object is visible. Implemented
	 * by runtime specific sub class
	 */
	public function getIsVisible():Bool
	{
		return false;
	}
	
	/**
	 * Set the opacity of the DOM object
	 * @param	value from 0 (transparent) to 1 (opaque)
	 */
	public function setAlpha(value:Float):Float
	{
		return value;
	}
	
	/**
	 * return the opacity of the DOM Object, 
	 * from 0 to 1
	 */ 
	public function getAlpha():Float
	{
		return 0;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// TRANSFORMATIONS
	// Public and private methods to transform the dom object and manipulate it's matrix
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Set the transformation matrix of this domObject. Used
	 * by the inheriting runtime specific class to update
	 * their native matrix transformations
	 */
	public function setMatrix(matrix:Matrix):Matrix
	{
		this._matrix = matrix;
		return this._matrix;
	}
	
	/**
	 * Return this domObject matrix
	 */
	public function getMatrix():Matrix
	{
		return this._matrix;
	}
	
	/**
	 * Reset the matrix to an identity matrix (no transformations)
	 */
	public function resetTransformations():Void
	{
		_matrix.identity();
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the transformation origin as a Point, from a
	 * TransformationOriginValue
	 */
	private function getTransformationOriginPoint(transformationOrigin:TransformationOriginValue):Point
	{
		//set the returned point
		var transformationOriginPoint:Point = { x:0.0, y:0.0 };
		
		//switch the origin point value
		switch (transformationOrigin)
		{
			//if it is given as point (in pixels), set it
			//on the transformationOriginPoint that will be returned
			case point(point):
				transformationOriginPoint = point;
			
			//else if it is given as constants, deduce the point coordinate
			//from the constant value
			case constant(transformationOriginX, transformationOriginY):
			
			//for x point coordinate	
			switch transformationOriginX
			{
				case left : 
					transformationOriginPoint.x = 0;
				
				case center :
					transformationOriginPoint.x = getWidth() / 2;
					
				case right :
					transformationOriginPoint.x = getWidth();
			}
			
			//for y point coordinate	
			switch transformationOriginY
			{
				case top : 
					transformationOriginPoint.y = 0;
				
				case middle :
					transformationOriginPoint.y = getHeight() / 2;
					
				case bottom :
					transformationOriginPoint.y = getHeight();
			}
		}
		
		return transformationOriginPoint;
	}
	
	/////////////////
	// TRANSLATION
	/////////////////
	
	/**
	 * Translate the domObject along the x and y axis, using x and y as offset
	 * @param	x the x offset
	 * @param	y the y offset
	 */
	public function translate(x:Float, y:Float):Void
	{
		//use the matrix API
		_matrix.translate(x, y);
		
		//refresh the matrix to refresh the domObject display
		setMatrix(this._matrix);
	}
	
	/**
	 * Set the absolut x translation instead of adding it to 
	 * the current x translation
	 * @param	translationX the target x translation
	 */
	public function setTranslationX(translationX:Float):Void
	{
		_matrix.setTranslationX(translationX);
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the current x translation
	 * @return
	 */
	public function getTranslationX():Float
	{
		return this._matrix.getTranslationX();
	}
	
	/**
	 * Set the absolut y translation instead of adding it to 
	 * the current y translation
	 * @param	translationX the target y translation
	 */
	public function setTranslationY(translationY:Float):Void
	{
		_matrix.setTranslationY(translationY);
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the current y translation
	 * @return
	 */
	public function getTranslationY():Float
	{
		return this._matrix.getTranslationY();
	}
	
	/////////////////
	// ROTATION
	/////////////////
	
	/**
	 * Rotate the domObject with the given angle using the transformationOrigin as pivot point
	 * @param	angle the rotation angle, in degree
	 * @param	transformationOrigin the pivot point, represented as an enum value or as a point
	 */
	public function rotate(angle:Int, transformationOrigin:TransformationOriginValue = null):Void
	{
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		//use the matrix API, retrieve the pivot point
		_matrix.rotate(angle, getTransformationOriginPoint(transformationOrigin));
		//refresh the matrix to refresh the domObject display
		setMatrix(this._matrix);
	}
	
	/**
	 * Set the rotation to an absolute angle instead of adding a rotation to the existing 
	 * rotation
	 * @param	angle the target angle
	 * @param	transformationOrigin the rotation center
	 */
	public function setRotation(angle:Int, transformationOrigin:TransformationOriginValue = null):Void 
	{
		
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		_matrix.setRotation(angle, getTransformationOriginPoint(transformationOrigin));
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the current rotation angle in deg
	 * @return an Int from 0 to 360
	 */
	public function getRotation():Int { 
		return _matrix.getRotation();
	}
	
	/////////////////
	// SCALING
	/////////////////
	
	/**
	 * Scale the domObject with the scaleX and scaleY factor, using the transformationOrigin as scaling
	 * center
	 * @param	scaleX the horizontal scale factor
	 * @param	scaleY the vertical scale factor
	 * @param	transformationOrigin the scale center, represented as an enum value or as a point
	 */
	public function scale(scaleX:Float, scaleY:Float, transformationOrigin:TransformationOriginValue = null):Void
	{
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		//use the matrix API, retrieve the scale center
		_matrix.scale(scaleX, scaleY, getTransformationOriginPoint(transformationOrigin));
		
		//refresh the matrix to refresh the domObject display
		setMatrix(this._matrix);
	}
	
	/**
	 * set the absolut x scale of the domObject instead of adding it to the current scale
	 * @param	scaleX the target x scale
	 * @param	transformationOrigin the scale center
	 */
	public function setScaleX(scaleX:Float, transformationOrigin:TransformationOriginValue = null):Void
	{
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		_matrix.setScaleX(scaleX, getTransformationOriginPoint(transformationOrigin));
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the current x scale
	 * @return a float, 1 corresponds to no x scale
	 */
	public function getScaleX():Float { 
		return _matrix.getScaleX();
	}
	
	/**
	 * set the absolut y scale of the domObject instead of adding it to the current scale
	 * @param	scaleX the target y scale
	 * @param	transformationOrigin the scale center
	 */
	public function setScaleY(scaleY:Float, transformationOrigin:TransformationOriginValue = null):Void
	{
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		_matrix.setScaleY(scaleY, getTransformationOriginPoint(transformationOrigin));
		setMatrix(this._matrix);
	}
	
	/**
	 * Return the current y scale
	 * @return a float, 1 corresponds to no y scale
	 */
	public function getScaleY():Float { 
		return _matrix.getScaleY();
	}
	
	/////////////////
	// SKEWING
	/////////////////
	
	/**
	 * skew the domObject with the skewX and skewY factor, using the transformationOrigin as skewing
	 * center
	 * @param	skewX the horizontal skew factor
	 * @param	skewY the vertical skew factor
	 * @param	transformationOrigin the skew center, represented as an enum value or as a point
	 */
	public function skew(skewX:Float, skewY:Float, transformationOrigin:TransformationOriginValue = null):Void
	{
		//default transformation center is top left
		if (transformationOrigin == null)
		{
			transformationOrigin = constant(left, top);
		}
		
		//use the matrix API, retrieve the skew center
		_matrix.skew(skewX, skewY, getTransformationOriginPoint(transformationOrigin));
		
		//refresh the matrix to refresh the domObject display
		setMatrix(this._matrix);
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// MOUSE SETTER/GETTER
	// Proxies setting/getting properties from the mouse listener instance
	//////////////////////////////////////////////////////////////////////////////////////////
	
	public function setOnMouseDown(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseDown = value;
		return value;
	}
	
	public function getOnMouseDown():MouseEventData->Void
	{
		return _mouse.onMouseDown;
	}
	
	public function setOnMouseUp(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseUp = value;
		return value;
	}
	
	public function getOnMouseUp():MouseEventData->Void
	{
		return _mouse.onMouseUp;
	}
	
	public function setOnMouseOver(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseOver = value;
		return value;
	}
	
	public function getOnMouseOver():MouseEventData->Void
	{
		return _mouse.onMouseOver;
	}
	
	public function setOnMouseOut(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseOut = value;
		return value;
	}
	
	public function getOnMouseOut():MouseEventData->Void
	{
		return _mouse.onMouseOut;
	}
	
	public function setOnMouseMove(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseMove = value;
		return value;
	}
	
	public function getOnMouseMove():MouseEventData->Void
	{
		return _mouse.onMouseMove;
	}
	
	public function setOnMouseDoubleClick(value:MouseEventData->Void):MouseEventData->Void
	{
		_mouse.onMouseDoubleClick = value;
		return value;
	}
	
	public function getOnMouseDoubleClick():MouseEventData->Void
	{
		return _mouse.onMouseDoubleClick;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// KEYBOARD SETTER/GETTER
	// Proxies setting/getting properties from the keyboard listener instance
	//////////////////////////////////////////////////////////////////////////////////////////
	
	public function setOnKeyDown(value:Key->Void):Key->Void
	{
		_keyboard.onKeyDown = value;
		return value;
	}
	
	public function getOnKeyDown():Key->Void
	{
		return _keyboard.onKeyDown;
	}
	
	public function setOnKeyUp(value:Key->Void):Key->Void
	{
		_keyboard.onKeyUp = value;
		return value;
	}
	
	public function getOnKeyUp():Key->Void
	{
		return _keyboard.onKeyUp;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// DOM SETTER/GETTER
	// Generic Setters/Getters to manipulate any attribute of the DOMObject
	//////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Set a field value on the native DOM object
	 * @param	propertyName the name of the field
	 * @param	propertyValue the new value of the field
	 */
	public function setAttribute(propertyName:String, propertyValue:Dynamic):Void
	{
		Reflect.setField(this._nativeReference, propertyName, propertyValue);
	}
	
	/**
	 * Return the value of a field of the native object
	 * @param	propertyName the name of the field value to return
	 * @return might be any type
	 */
	public function getAttribute(propertyName:String):Dynamic
	{
		return Reflect.field(this._nativeReference, propertyName);
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// POSITIONING SETTERS/GETTERS
	// Setters/Getters to manipulate a native DOMObject positioning in the publication
	//////////////////////////////////////////////////////////////////////////////////////////
	
	public function setX(value:Int):Int 
	{
		this._x = value;
		return this._x;
	}
	
	public function getX():Int 
	{ 
		return this._x; 
	}
	
	public function setY(value:Int):Int
	{
		this._y = value;
		return this._y;
	}
	
	public function getY():Int 
	{ 
		return this._y; 
	}
	
	public function setWidth(value:Int):Int
	{
		this._width = value;
		return this._width;
	}
	
	public function getWidth():Int 
	{ 
		return this._width; 
	}
	
	public function setHeight(value:Int):Int
	{
		this._height = value;
		return this._height;
	}
	
	public function getHeight():Int 
	{ 
		return this._height;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	// Z-INDEX SETTER/GETTER
	// Setter/Getter to manipulate a native DOMObject z order in the publication
	//////////////////////////////////////////////////////////////////////////////////////////
	
	public function setZOrder(value:Int):Int 
	{
		return value;
	}
	
	public function getZOrder():Int 
	{
		return 0;
	}
}