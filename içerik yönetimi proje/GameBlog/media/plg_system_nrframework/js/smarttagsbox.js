jQuery(function(s){var i=s(".st");function t(){s(input_selector).each(function(t){var e=s(this);if(1==e.next(".st_trigger").length)return!0;e.parent().addClass("has-smarttags"),e.parent().append('<span title="'+Joomla.JText._("NR_SMARTTAGS_SHOW")+'" class="icon-tags st_trigger" data-id="'+t+'"></span>'),input_type=e.prop("nodeName").toLowerCase(),e.parent().addClass("is_"+input_type)})}function o(t){t=void 0===t?0:t;$el_tabs.find(".st_tab_content").hide().eq(t).show(),$el_nav.find("a").removeClass("active").eq(t).addClass("active")}function r(){s(".has-smarttags").removeClass("active"),s("body").removeClass("smarttags-active"),i.hide()}$el_box=i.find(".box"),$el_nav=i.find(".st_nav"),$el_tabs=i.find(".st_tabs"),$el_search=i.find(".st_input_search"),$active_element=null,input_selector=Joomla.getOptions("SmartTagsBox").selector,t(),i.on("update",function(){t()}),$el_search.on("keyup",function(){!function(a){$el_tabs.find(".st_search").remove(),0==a.length&&o();a=s.trim(a.toLowerCase());var n=[];$el_tabs.find(".st_tab_content:not(.st_nosearch) > .st_item").each(function(){var t=s(this);if(-1<s.trim(t.text().toLowerCase()).indexOf(a)){var e=t.clone().wrap("<p>").parent().html();n.push(e)}}),$el_tabs.append('<div class="st_tab_content st_search st_nosearch"></div>'),$el_tab_search=$el_tabs.find(".st_search"),0==n.length?$el_tab_search.html(Joomla.JText._("NR_SMARTTAGS_NOTFOUND")):$el_tab_search.html(n.join(""));o($el_tab_search.index())}(s(this).val())}),s(document).on("click","span.st_trigger",function(){return function(t){if(i.is(":visible"))return r();$active_element=t,function(){var t=Joomla.getOptions("SmartTagsBox").tags;tags=s.extend({},t),s(document).trigger("smartTagsBoxBeforeRender",[tags,$active_element]);var e="";s.each(tags,function(t){e+='<a href="#">'+t+"</a>"}),i.find(".st_container .st_nav").html(e);var a="";s.each(tags,function(t,e){a+='<div class="st_tab_content" data-key="'+t+'">',s.each(e,function(t,e){if(!e)return!0;a+='<a class="st_item" data-key="'+t+'">'+e+" <small>"+t+"</small>"}),a+="</div>"}),i.find(".st_container .st_tabs").html(a)}();var e=t.parent();container_height=e.outerHeight(),e.addClass("active"),s("body").addClass("smarttags-active");var a=s(window).height()-(e.offset().top+e.height()),n="bottom"==(310<a?"bottom":"top")?e.offset().top+container_height:e.offset().top-310;i.find(".st_box").css({top:n+"px",left:e.offset().left+"px"}).end().show(),o()}(s(this)),!1}),s(document).on("click",".st_nav a",function(){return o(s(this).index()),!1}),s(document).on("click",".st_tabs a",function(){return function(t){var e=$active_element.parent().find(input_selector);if($active_element.parent().find(".mce-tinymce, .tox-tinymce").length){return tinymce.get(e.attr("id")).execCommand("mceInsertContent",!1," "+t)}var a=s.trim(e.val()+" "+t);e.val(a).trigger("change")}(s(this).data("key")),!1}),s(document).on("click",".st_overlay",function(){return r(),!1})});

