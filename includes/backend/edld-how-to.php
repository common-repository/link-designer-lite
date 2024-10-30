<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<div class="edld-setting-page-wrapper">
	<div class="edld-setting-page-wrapper-contain">
		<h3>Configuration</h3>
		<p>It is fairly simple to configure, the link designer lite plugin. To begin please follow these steps:</p>
		<ul>
	      <li>Open up any <strong>Post / Page</strong>. </li>
	      <li>Look for the <strong>Link Designer</strong> button beside the <strong>Add Media</strong> button.</li>
	      <li>Clicking on the click designer opens up a <strong>Link Designer</strong> shortcode generator modal.</li>
	      <li>You will find options divided into three different tabs
	        <ul>
	          <li><strong>Content:</strong> You can assign the link text and its address here
	            <ul>
	              <li><strong>Link Text: </strong> Content text for the link text. For example: Click me, Read more, Download, Donate. You can also highlight a text in the editor and click on the <strong>Link Designer</strong> button. The highlighted text will be taken as the <strong>Link Text</strong>.</li>
	              <li><strong>Link URL: </strong> URL address for the link. Supports <strong>javascript:void(0);</strong> as well</li>
	              <li><strong>Search: </strong>You can search for existing posts in WordPress to assign a link address</li>
	              <li><strong>Search List: </strong> Shows list of recently, created posts and also shows you the search results</li>   
	            </ul>
	          </li>
	          <li><strong>Design: </strong> You can select options on how the link will look in the frontend
	            <ul>
	              <li><strong>Templates: </strong> Choose from 12 pre-available ready to go templates</li>
	              <li><strong>Color: </strong> Choose Text color (Normal/ Hover/ Active) and Background / Border color here</li>
	              <li><strong>Typography: </strong> Select from selected font family, set a font size and its transform and alignment</li>
	            </ul>
	          </li>
	          <li><strong>Other: </strong> These include extra settings such as
	            <ul>
	              <li><strong>Link Target: </strong> Whether to open link in the same page or a New Tab</li>
	              <li><strong>Download Link: </strong> attach a file download path in the Link URL and use the button as a download button</li>
	              <li><strong>Enable rel="nofollow": </strong> added a nofollow rel attribute to link</li>
	            </ul>
	          </li>         
	        </ul>
	      </li>
	      <li>And that's it when you are happy with the settings, click on <strong>Add Link</strong> button and a Link designer Shortcode will be added to your editor.</li>
	    </ul>
		<h3>Understanding Shortcode</h3>
		<p>Here is a basic structure to the shortcode</p>
		<p>
			<code>[link_designer id="edld-23TpRJQH" text="Click Me" template="edld_label_template_1" url="https://www.google.com/" target="_blank" download="false" no_follow="false" link_color="#51bbb1" link_active_color="#fff" link_hover_color="#fff" link_background_color="#51bbb1" active_background_color="#51bbb1" hover_background_color="#fda62a" font_family="Montserrat" font_subset="latin-ext" font_weight="regular" font_size="24" text_transform="uppercase" display="block" text_align="center"] 
			</code>
		</p>
		<h4 class="edld-sub-header">Shortcode Attributes</h4>
		<p>Here are list of shortcode attributes with there possible values and description.</p>
		<div class="edld-grid">
			<div class="edld-grid-cell edld-grid-header">Attribute</div>
			<div class="edld-grid-cell edld-grid-header">Values</div>
			<div class="edld-grid-cell edld-grid-header">Description</div>
			<div class="edld-grid-cell">id</div>
			<div class="edld-grid-cell">edld-23TpRJQH</div>
			<div class="edld-grid-cell">Unique id provided to each shortcode</div>
			<div class="edld-grid-cell">text</div>
			<div class="edld-grid-cell">Click Me</div>
			<div class="edld-grid-cell">Link/Button Text</div>
			<div class="edld-grid-cell">template</div>
			<div class="edld-grid-cell">edld_label_template_1 edld_label_template_2 edld_label_template_3 edld_label_template_4 edld_label_template_5 edld_label_template_6 edld_label_template_7 edld_label_template_8 edld_label_template_9 edld_label_template_10 edld_label_template_11 edld_label_template_12</div>
			<div class="edld-grid-cell">Template id ranging from 1 to 12</div>
			<div class="edld-grid-cell">url</div>
			<div class="edld-grid-cell">https://www.google.com/</div>
			<div class="edld-grid-cell">URL for the link/button</div>
			<div class="edld-grid-cell">target</div>
			<div class="edld-grid-cell">_blank | _self</div>
			<div class="edld-grid-cell">Whether to open the link in a new tab or the same tab</div>
			<div class="edld-grid-cell">download</div>
			<div class="edld-grid-cell">false | true</div>
			<div class="edld-grid-cell">Use as a download button</div>
			<div class="edld-grid-cell">no_follow</div>
			<div class="edld-grid-cell">false | true</div>
			<div class="edld-grid-cell">Add nofollow rel attribute to link</div>
			<div class="edld-grid-cell">link_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Line color</div>
			<div class="edld-grid-cell">link_active_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Link color when clicked</div>
			<div class="edld-grid-cell">link_hover_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Link color on mouse hover</div>
			<div class="edld-grid-cell">link_background_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Button background color</div>
			<div class="edld-grid-cell">active_background_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Button background color on mouse click</div>
			<div class="edld-grid-cell">hover_background_color</div>
			<div class="edld-grid-cell">Hex color value</div>
			<div class="edld-grid-cell">Button background color on mouse hover</div>
			<div class="edld-grid-cell">font_family</div>
			<div class="edld-grid-cell">Montserrat</div>
			<div class="edld-grid-cell">Text Font Family</div>
			<div class="edld-grid-cell">font_subset</div>
			<div class="edld-grid-cell">latin-ext</div>
			<div class="edld-grid-cell">Text Font Family Subset</div>
			<div class="edld-grid-cell">font_weight</div>
			<div class="edld-grid-cell">regular</div>
			<div class="edld-grid-cell">Text Font weight</div>
			<div class="edld-grid-cell">font_size</div>
			<div class="edld-grid-cell">24</div>
			<div class="edld-grid-cell">Text Font size</div>
			<div class="edld-grid-cell">text_transform</div>
			<div class="edld-grid-cell">uppercase | lowercase | capitalize | none</div>
			<div class="edld-grid-cell">Link/ Buttom text transform</div>
			<div class="edld-grid-cell">display</div>
			<div class="edld-grid-cell">block | inline-block</div>
			<div class="edld-grid-cell">Whether to show button in the same line or a different line</div>
			<div class="edld-grid-cell">text_align</div>
			<div class="edld-grid-cell">left | center | right</div>
			<div class="edld-grid-cell">Button alignment when shown in a different line</div>

		</div>


		<blockquote>Please visit <a href="https://8degreethemes.com/documentation/link-designer-lite/" target="_blank">https://8degreethemes.com/documentation/link-designer-lite/</a> for more detail documentation.</blockquote>
	</div>
</div>
