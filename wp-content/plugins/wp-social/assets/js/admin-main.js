"use strict";
(function ($) {
	$.fn.tab = function (options) {
		var opts = $.extend({}, $.fn.tab.defaults, options);
		return this.each(function () {
			var obj = $(this);
			$(obj).find('.tabHeader > .tab__list > .tab__list__item').on(opts.trigger_event_type, function () {
				$(obj).find('.tabHeader > .tab__list > .tab__list__item').removeClass('active');
				$(this).addClass('active');
				// $('.tabContent > .tabItem').removeClass('active');
				$(obj).find('.tabContent > .tabItem').eq($(this).index()).addClass('active');
				$(obj).find('.tabContent > .tabItem').hide();
				$(obj).find('.tabContent > .tabItem').eq($(this).index()).show();
			})
		});
	}
	$.fn.tab.defaults = {
		trigger_event_type: 'click', //mouseover | click 默认是click
	};

})(jQuery);



(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {
		$('.post__tab').tab();

		$('[data-type="modal-trigger"]').on('click', function (e) {
			e.preventDefault();
			var target = $(this).attr('data-target');
				target = $('#' + target);
			if(target.length > 0){
				target.addClass('is-open');
				$('.xs-backdrop').addClass('is-open');
			}
		})
		$('[data-modal-dismiss="modal"]').on('click', function (e) {
			e.preventDefault();
			$(this).removeClass('is-open');
			$('.xs-modal-dialog').removeClass('is-open');
			$('.xs-backdrop').removeClass('is-open');
		});

		// hover effect
		$('.wlsu-hover-effect-select').on('change', function(){
			var value = $(this).val();
			
			$('.wslu-single-social-style-item.wslu-style-free .social_radio_button:checked').trigger('change', ['effectChanged', value]);
		});

		// share effect filtering
		$('.wslu-single-social-style-item.wslu-style-free').on('change', '.social_radio_button', function(e, ext, paramVal){
			var currentStyle = $(this).val(),
				displayOptions = $('.wslu-display-type-container li a.active'),
				savedData = $('.wslu-main-content-input').val(),
				layout = null;
				
			(displayOptions.data('id') == 'fixed_display') ? savedData = $('.wslu-fixed-display-input').val() : '';

			var effect = $('.wlsu-hover-effect-select').val();

			// nav Clicked
			if(ext == 'navClicked'){
				$('.wslu-single-social-style-item.wslu-style-free .wslu-global-radio-input').prop('checked', false);
				$('.wlsu-hover-effect-select option').first().prop('selected', true);
				

				var saveDataItem 	= savedData.split(':'),
					savedStyle 			= saveDataItem[0] != undefined ? saveDataItem[0] : '',
					savedEffect 	= saveDataItem[1] != undefined ? saveDataItem[1] : '';


				effect = savedEffect;
				currentStyle = savedStyle;

				// checked correct style
				(savedStyle != '') ? $('.wslu-single-social-style-item.wslu-style-free .wslu-global-radio-input[value="'+ savedStyle +'"]').prop('checked', true) : '';
				// selected correct hover effect
				(savedEffect != '') ? $('.wlsu-hover-effect-select option[value="'+ savedEffect +'"]').prop('selected', true) : '';
			} else if(ext === 'effectChanged'){ // effect change
				effect = (paramVal != undefined && paramVal != '') ? paramVal : effect;
			} else if(ext === 'layoutChanged'){
				layout = paramVal;
				currentStyle = savedData != undefined ? savedData.split(':')[0] : currentStyle;
			}

			// Layout
			layout = (layout == null && savedData && savedData.split(':')[2]) ? savedData.split(':')[2] : layout;
			$('.wslu-share-layout .social_radio_button').prop('checked', false);
			$('.wslu-share-layout .social_radio_button[value="'+ layout +'"]').prop('checked', true);
			(layout === 'vertical') ? $('.wslu-style-img-v').fadeIn().siblings().hide() : $('.wslu-style-img-h').fadeIn().siblings().hide();
			// ./End Layout

			// effect select
			$('.wlsu-hover-effect-select option').each(function(){
				var exclude = $(this).data('exclude');
				$(this).show();
				if(exclude != undefined && exclude.indexOf(currentStyle) != -1){
					$(this).hide().prop('selected', false);
				}
			});

			
			

			currentStyle = ( (effect) ? (currentStyle+':'+effect) : currentStyle+':none-none' );

			currentStyle = ( (layout) ? (currentStyle+':'+layout) : currentStyle );

			
			if(displayOptions.data('id') === 'fixed_display'){
				$('.wslu-fixed-display-input').val(currentStyle);
			} else {
				$('.wslu-main-content-input').val(currentStyle);
			}

			
		});

		/*
			-----------------------------
			Bring Layout option on view
			----------------------------
		*/ 
		function bringIntoView(selector, layout_target, config){
			let layout_btn = document.querySelectorAll(selector);
			layout_btn.forEach( btn =>{
				btn.addEventListener('click', ()=>{
					let target = document.querySelector(layout_target);
					target.scrollIntoView(config);
				})
			})
		}
		//it takes button, layout to bring into view, configureation
		//source : https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollIntoView
		bringIntoView('.wslu-layout-btn', '.wlsu-style-data', {behavior: "smooth", block: "start"})
		 

		// Choose display options
		$('.wslu-display-type-container').on('click', 'a', function(){
			var id = $(this).data('id');

			$(this).addClass('active').parent('li').siblings().find('a').removeClass('active');
			$('#wslu-'+id).fadeIn()
				.siblings().hide();


			$('.wslu-single-social-style-item.wslu-style-free .social_radio_button').first().trigger('change', ['navClicked']);

			$('.wslu-share-styles-form#xs_style_form').attr('action', $('.wslu-share-styles-form#xs_style_form').data('action') + '#'+id);
			
		});

		var targetLink = 'primary_content';
		if(window.location.hash === '#fixed_display'){
			targetLink = 'fixed_display';
		}
		
		$('.wslu-display-type-container li a[data-id="'+ targetLink +'"]').trigger('click');

		// Share layout option
		$('.wslu-share-layout').on('change', '.social_radio_button', function(){
			var value = $(this).val();
			
			$('.wslu-single-social-style-item.wslu-style-free .social_radio_button').first().trigger('change', ['layoutChanged', value]);
		});
		// $('.wslu-share-layout .social_radio_button').first().trigger('change')

	}); // end ready function

})(jQuery);