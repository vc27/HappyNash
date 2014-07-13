/**
 * File Name childTheme.js
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 2.0
 * @updated 03.14.14
 **/
// ######################################################################


/**
 * childTheme
 * @version 2.0
 * @updated 03.14.14
 **/
var childTheme = {
	
	
	/**
	 * init
	 * @version 2.0
	 * @updated 03.14.14
	 **/
	init : function() {
		
		this.hiddenNav();
		this.gravityForms();
		this.mbpScaleFix();
		
	} // end init : function
	
	
	
	/**
	 * hiddenNav
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	,hiddenNav : function() {
		
		var open = jQuery('#header .icon-menu');
		var nav = jQuery('#hidden-navigation');
		var close = jQuery('.close a',nav);
		var speed = 200;
		
		nav.css({
			right : -nav.width()
			,display : 'block'
		});
		open.click(function() {
			nav.animate({
				right : 0 
			}, speed);
		});
		nav.mouseleave(function() {
			nav.animate({
				right : -nav.width()
			}, speed);
		});
		close.click(function() {
			nav.animate({
				right : -nav.width()
			}, speed);
		});
		
	} // end hiddenNav : function
	
	
	
	/**
	 * gravityForms
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	,gravityForms : function() {
		
		var fieldText;
		var form = jQuery('.form-wrap');
		jQuery('.gfield_required', form).remove();
		var n = [1];
		
		for ( var i = 0; i < n.length; i++ ) { 
			fieldText = jQuery('#field_1_'+n[i]+' label',form).text();
			jQuery('#input_1_'+n[i],form).attr('placeholder',fieldText);
		}
		
	} // end gravityForms : function
	
	
	
	/**
	 * mbpScaleFix
	 * @version 2.0
	 * @updated 03.14.14
	 **/
	,mbpScaleFix : function() {
		
		if ( typeof MBP !== 'undefined' ) {
			MBP.scaleFix();
		}
		
	} // end mbpScaleFix : function
	
	
	
	// ##################################################
	/**
	 * Setters
	 **/
	// ##################################################
	
	
	
	/**
	 * setParams
	 * 
	 * version 1.0
	 * updated 00.00.13
	 **/
	,setParams : function() {
		
		
		
	}  // end setParams : function
	
	
	
}; // end var childTheme






/**
 * jQuery
 **/
jQuery(document).ready(function() {
	
	childTheme.init();
	
});