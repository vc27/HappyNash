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
		
		// this.homeForm();
		this.showDirectorySubmission();
		this.hiddenNav();
		this.mbpScaleFix();
		
	} // end init : function
	
	
	
	/**
	 * homeForm
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	,homeForm : function() {
		
		if ( jQuery('body').hasClass('page-template-tpl-home-php') ) {
			var formBlock = jQuery('#gravity-form-wrap');
			var postTitle = jQuery('.post-title',formBlock);
			var postContent = jQuery('.post-content',formBlock);
			var listCats = jQuery('.list-cats',formBlock);
			
			
			// post title hidden
			jQuery('textarea',postContent).keyup(function() {
				var val = jQuery(this).val();
				if ( val.length < 100 ) {
					jQuery('input',postTitle).val(val);
				}
			});
			
			
			// post Content
			jQuery('textarea',postContent).attr('placeholder','Tell us about your experiance');
			jQuery('textarea',postContent).focus(function() {
				jQuery('.charleft',postContent).fadeIn(300);
			});
			jQuery('textarea',postContent).blur(function() {
				jQuery('.charleft',postContent).fadeOut(300);
			});
			
			// list cats
			jQuery('.gchoice_2_0',listCats).append('<span class="ic icon-happiness"></span>');
			jQuery('.gchoice_2_1',listCats).append('<span class="ic icon-movement"></span>');
			jQuery('.gchoice_2_2',listCats).append('<span class="ic icon-nourishment"></span>');
			jQuery('.ic',listCats).click(function() {
				var click = jQuery(this);
				check(click);
			});
			jQuery('li label',listCats).click(function() {
				var click = jQuery(this);
				check(click);
			});
			
			var check = function(click) {
				var parent = click.parent();
				listCats.removeClass('gfield_error');
				jQuery('li',listCats).removeClass('selected');
				parent.addClass('selected');
				jQuery('input',parent).prop('checked',true);
			};
			
		}
		
	} // end homeForm : function
	
	
	
	/**
	 * showDirectorySubmission
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	,showDirectorySubmission : function() {
		
		jQuery('#show-directory-submission').click(function() {
			jQuery('#section-directory-submission').fadeToggle(300);
		});
		
	} // end showDirectorySubmission : function
	
	
	
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
		close.click(function(e) {
			e.preventDefault();
			nav.animate({
				right : -nav.width()
			}, speed);
		});
		
	} // end hiddenNav : function
	
	
	
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