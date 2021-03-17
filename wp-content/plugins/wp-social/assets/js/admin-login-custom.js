"use strict";
// show hide js global function
function xs_show_hide(getID){
	var idData = document.getElementById('xs_data_tr__'+getID);
	idData.classList.toggle('active_tr');
}


function xs_show_hide_role(getIdData){
	var idData = document.getElementById('xs_data_tr__role');
	
	if(getIdData == 1){
		idData.classList.add('active_tr');
	}else{
		idData.classList.remove('active_tr');
	}
}
//copy function
function copy_callback(fordata){
	var copyText = document.getElementById(fordata+'_callback');
	copyText.select();
	document.execCommand("copy");
}

function xs_counter_open(evt){
	let targetId = evt.getAttribute("xs-target-id");
	if(!targetId){
		return false;
	}
	
	let targetData = document.getElementById(targetId);
	
	let back = document.querySelector('.xs-backdrop');
	if(targetData){
		targetData.classList.toggle('is-open');
		back.classList.toggle('is-open');
	}
}

function social_counter_enable(evt) {
	
	var key = evt.getAttribute('data-key');
	var val = evt.checked ? 1 : '';
	var txt = evt.checked ? 'Settings' : 'Getting Started';
	var btn = jQuery(evt).closest('div.xs-block-footer').find('div.right-content a');

	var values = {
		'val': val,
		'social': key
	};

	jQuery.ajax({
		data: values,
		type: 'post',
		url: window.rest_api_conf.root + 'wp_social/v1/counter/enable/' + key,
		beforeSend: function (xhr) {
			xhr.setRequestHeader('X-WP-Nonce', window.rest_api_conf.nonce);
			btn.text('Waiting...');
		},
		success: function (result) {
			if(!result.success) {

				jQuery(evt).closest('div').append('<span style="color:red">Unexpected error, please reload the page and retry</span>');
			} else {
				btn.text(txt);
			}
		},
		error: function (data) {
			btn.text('Error!!!');
		}
	});
}

function social_share_enable(evt) {
	
	var key = evt.getAttribute('data-key');
	var val = evt.checked ? 1 : '';
	var txt = evt.checked ? 'Settings' : 'Getting Started';
	var btn = jQuery(evt).closest('div.xs-block-footer').find('div.right-content a');

	var values = {
		'val': val,
		'social': key
	};

	jQuery.ajax({
		data: values,
		type: 'post',
		url: window.rest_api_conf.root + 'wp_social/v1/share/enable/' + (key.replace('-', '')),
		beforeSend: function (xhr) {
			xhr.setRequestHeader('X-WP-Nonce', window.rest_api_conf.nonce);
			btn.text('Waiting...');
		},
		success: function (result) {
			if(!result.success) {
				jQuery(evt).closest('div').append('<span style="color:red">Unexpected error, please reload the page and retry</span>');
			} else {
				btn.text(txt);
			}
		},
		error: function (data) {
			btn.text('Error!!!');
		}
	});
}

function enable_provider_login(evt) {
	
	var key = evt.getAttribute('data-key');
	var val = evt.checked ? 1 : '';
	var txt = evt.checked ? 'Settings' : 'Getting Started';
	var btn = jQuery(evt).closest('div.xs-block-footer').find('div.right-content a');

	var values = {
		'val': val,
		'social': key
	};

	console.log(values, btn); 

	jQuery.ajax({
		data: values,
		type: 'post',
		url: window.rest_api_conf.root + 'wp_social/v1/login/enable/' + key,
		beforeSend: function (xhr) {
			xhr.setRequestHeader('X-WP-Nonce', window.rest_api_conf.nonce);
			btn.text('Waiting...');
		},
		success: function (result) {
			if(!result.success) {
				jQuery(evt).closest('div').append('<span style="color:red">Unexpected error, please reload the page and retry</span>');
			} else {
				btn.text(txt);
			}
		},
		error: function (data) {
			btn.text('Error!!!');
		}
	});
}

//


jQuery(document).ready(function ($) {
	function nx_hash_access_tab_setActive() {
		setTimeout(function () {
			var hash = window.location.hash.substr(1);
			if (hash) {
				//jQuery('.xs-donate-metabox-tabs li').removeClass('active');
				alert(hash);
			}
		}, 15);
	}
	//nx_hash_access_tab_setActive(); // On Page Load
});



