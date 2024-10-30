jQuery(document).ready(function($){

    /*switch to how to tab*/
    $('.edld-howto').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        $(this).closest('.edld-use-content-wrap').find('.tab-link.edld-current').removeClass('edld-current').siblings('.tab-link').addClass('edld-current');
        $(this).closest('.edld-use-content-wrap').find('.edld-tab-content.edld-current').removeClass('edld-current').siblings('.edld-tab-content').addClass('edld-current');
    });

    /*Typography*/
    function edldChangeFont(element,value){
        /*Getting Selection value*/
        var font_data = value;
        if (font_data != null) {
            var SplitChars = '=';
            /*Spliting the string*/
            if (font_data.indexOf(SplitChars) >= 0) {
                var splited_font = font_data.split(SplitChars);
                var font_family  = splited_font[0];
                var font_subset  = splited_font[1];
                var font_variant  = splited_font[2];

                /*Requesting google to load font*/
                WebFont.load({
                    google: {
                        families: [font_family]
                    },
                    timeout: 2000,
                });  

                /*Implementing changes to preview text*/
                var previewText = font_family+' '+font_subset+' '+font_variant;
                //console.log('value: '+value);
                //console.log('element: '+element.attr('class'));
                element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').html(previewText).css({
                    'font-family': font_family+','+font_subset,
                    'padding':'50px',
                    'background-color':'#fff',
                    'font-size':'32px'
                });

                /*Handling italic fonts*/
                if ( font_variant.indexOf('italic') > -1 ) {
                    element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').css({
                        'font-style':'italic'
                    });
                } else{
                    //console.log('none italic');
                    element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').css({
                        'font-style':''
                    });
                }

                /*Handling regular fonts*/
                if ( font_variant.indexOf('regular') > -1 ) {
                    element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').css({
                        'font-weight':''
                    });
                } else{
                    //console.log('none regular');
                    element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').css({
                        'font-weight':font_variant
                    });
                }

                /*Text Transform on load*/
                element.closest('.edld-postbox-fields').siblings('.edld-typography-preview').css({
                    'text-transform': element.closest('.edld-postbox-fields').siblings('.edld-text-transform').val()
                });
            }
        }
    }
    /*Font change*/
    $('.edld-typography-selected').on('change',function() {
        element = $(this);
        value = $(this).val();
        edldChangeFont(element,value);
    });
    /*Font on load*/
    edldChangeFont($('.edld-typography-selected'),$('.edld-typography-selected').val());

	/* How to use Social pop-up close*/
    $('.edld-header-close').on('click',function(){
        $(this).parent('.edld-head-social-link').remove();
    });
    
	/*Tab js*/
	$('.edldl-postbox-wrapper').on('click', 'ul.nav-tab-wrapper li', function () {
		var tab_id = $(this).attr('data-tab');

		$('ul.nav-tab-wrapper li').removeClass('nav-tab-active');
		$('.edldl-tab-content').removeClass('edldl-current');

		$(this).addClass('nav-tab-active');
		$("#" + tab_id).addClass('edldl-current');
	});

	/* Backend Settings Tabs Configuration*/
	$('ul.edld-tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.edld-tabs li').removeClass('edld-current');
		$('.edld-tab-content').removeClass('edld-current');

		$(this).addClass('edld-current');
		$("#"+tab_id).addClass('edld-current');
	});

	/*Color Picker*/
	$('.edld-color-picker').wpColorPicker();

	/*Content Selection*/
	$('.edld-link-designer-button').on('click',function(){

		if($('#wp-content-wrap').hasClass('tmce-active')){
			var content = tinymce.activeEditor.selection.getContent({format: 'text'});
		}
		if($('#wp-content-wrap').hasClass('html-active')){
			var content = $('#content').selection();
		}
		$('.edld_label_text').val(content);	
	});
	
	/*Settings for Popup fields*/
	$(document).on('click','#edld_add_link',function(e){
		e.preventDefault();
		edld_concat();
	});

	function edld_concat() {
        var edld_shortcode_id = $('.edld_shortcode_id').val();
		var edld_label_text = $('.edld_label_text').val();
		var edld_label_template = $("input[name='edld_label_template']:checked").val();
		var edld_insert_target = $("input[name='edld_link_target']:checked").val();
		var edld_downloaded = $("input[name='edld_link_download']:checked").val();
        var edld_no_follow = $("input[name='edld_no_follow']:checked").val();
		
		var edld_link_color =  $('#edld_link_color').val();
		var edld_link_active_color =  $('#edld_link_active_color').val();
		var edld_link_hover_color =  $('#edld_link_hover_color').val();
		var edld_link_background_color =  $('#edld_link_background_color').val();
		var edld_active_background_color =  $('#edld_active_background_color').val();
		var edld_hover_background_color =  $('#edld_hover_background_color').val();

        var font_data = $('option:selected','.edld-typography-selected').val();
        //console.log(font_data);
        var font_family  = '';
        var font_subset  = '';
        var font_variant  = '';
        
        if (font_data != null) {
            var SplitChars = '=';

            /*Spliting the string*/
            if (font_data.indexOf(SplitChars) >= 0) {
                var splited_font = font_data.split(SplitChars);
                font_family  = splited_font[0];
                font_subset  = splited_font[1];
                font_variant  = splited_font[2];
            }
        }

        var edld_font_size = $('.edld_font_size').val();
        var edld_text_transform = $("input[name='edld_text_transform']:checked").val();
        var edld_text_align = $("input[name='edld_text_align']:checked").val();
        var edld_display = $("input[name='edld_display']:checked").val();

		var edld_label_link = $("input.edld_label_link").val();
		if (edld_label_link == "") {
			$("div.edld-error").show();
			$("input.edld_label_link").focus();
			return false;
		}
		var generated_shortcode=' [link_designer id="'+edld_shortcode_id+'" text="'+edld_label_text+'" template="'+edld_label_template+'" url="'+edld_label_link+'" target="'+edld_insert_target+'" download="'+edld_downloaded+'" no_follow="'+edld_no_follow+'" link_color="'+edld_link_color+'" link_active_color="'+edld_link_active_color+'" link_hover_color="'+edld_link_hover_color+'" link_background_color="'+edld_link_background_color+'" active_background_color="'+edld_active_background_color+'" hover_background_color="'+edld_hover_background_color+'" font_family="'+font_family+'" font_subset="'+font_subset+'" font_weight="'+font_variant+'" font_size="'+edld_font_size+'" text_transform="'+edld_text_transform+'" display="'+edld_display+'" text_align="'+edld_text_align+'"] ';

		window.send_to_editor(generated_shortcode);

		return false;

	}

    /**
    * Fetch posts 
    *
    * @since 1.0.0
    */
    $('.edld-link-designer-button').on('click', function () {
    	var $selector = $(this);
    	var post_type = $('.edld-searchsubmit').val();
    	if (post_type != '') {
    		$.ajax({
    			type: 'post',
    			url: edld_js_object.edld_ajaxurl,
    			data: {
    				action: 'edld_posts_search',
    				_wpnonce: edld_js_object.edld_ajax_nonce,
    			},
    			success: function (res) {
    				$(document).find('.edld-search-result-wrapper').html(res);
    			}
    		});
    	} else {
    		/*$('#eg-post-type-trigger').parent().append('<div class="eg-error">' + notices.post_type_error + '</div>');*/
    	}
    });


    /*Search AJAX*/
    $('.edld-searchsubmit').on('click',function(){
    	var search_keyword = $('.edld_label_search').val();
    	$('.edld-spinner').addClass("is-active");
    	$.post(edld_js_object.edld_ajaxurl, {
    		action: 'edld_posts_search',
    		search_keyword: search_keyword,
    		edld_nonce: edld_js_object.edld_ajax_nonce
    	}, function(data) {
    		var original_result = $('.edld-search-result-wrapper').html();
    		$('.edld-spinner').removeClass("is-active");
    		switch(data){
    			case 'keyword_empty':
    			//console.log('keyword_empty');
    			$('.edld-search-result-wrapper').html(original_result);
    			$('.edld-search-error').html('No search term specified. Showing recent items.');
    			break;
    			case 'no_post':
    			//console.log('no_post');
    			$('.edld-search-result-wrapper').html(original_result);
    			$('.edld-search-error').html('No results found.');
    			break;
    			default:
    			//console.log('default');
    			$('.edld-search-result-wrapper').html(data);
    		}

    	});
    });

    /*Adding Link URl on Post title click*/
    $(document).on('click','.edld-post-title',function(){
    	var link_url = $(this).attr('data-permalink');
    	$('.edld_label_link').val(link_url);
    });

/**
 * Pagination 
 *
 * @since 1.0.0
 */
 $(document).on('click', '.edld-pagination-wrap .page-numbers', function (e) {
 	//console.log('reached');
 	e.preventDefault();
 	var page_link = $(this).attr('href');
 	var page_link_array = page_link.split('=');
 	var page_number = page_link_array[1];
 	var $selector = $(this);
 	$.ajax({
 		type: 'post',
 		url: edld_js_object.edld_ajaxurl,
 		data: {
 			page_number: page_number,
 			action: 'edld_posts_search',
 			_wpnonce: edld_js_object.edld_ajax_nonce,
 		},
 		beforeSend: function () {
 			$('.edld-pagination-spinner').addClass("is-active");
 		},
 		success: function (res) {	
 			$('.edld-pagination-spinner').removeClass("is-active");
 			$(document).find('.edld-search-result-wrapper').html(res);
 		}
 	}); 	
 });
});
