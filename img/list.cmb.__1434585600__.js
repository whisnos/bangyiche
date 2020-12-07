define("widget/position/position.js",["jquery","util"],function(t,i){function e(t){t=o(t)[0]||{},t.nodeType&&(t={el:t});var i={el:o(t.el)[0]||document,x:t.x||0,y:t.y||0},e=o(i.el);return i.size=function(){return{x:e.outerWidth(),y:e.outerHeight()}},i.offset=function(){return e.offset()||{top:0,left:0}},i}function n(t,i){var e=t[i];if(e+="",e=e.replace(/px/gi,""),/\D/.test(e)&&(e=e.replace(/(?:left|top)/gi,"0%").replace(/center/gi,"50%").replace(/(?:right|bottom)/gi,"100%")),e.indexOf("%")>-1&&(e=e.replace(/(\d+(?:\.\d+)?)%/gi,function(e,n){return t.size()[i]*(n/100)})),/[+\-*\/]/.test(e))try{e=new Function("return "+e)()}catch(n){throw new Error("invalid "+i+" value: "+e)}t[i]=s(e)}function s(t){return parseFloat(t,10)||0}var o=t("jquery"),l=t("util").ua,a=i,d=6==l.ie?!0:!1;a.pin=function(t,i){var s=o.Deferred(),l=!!t.fixed;if(t=e(t),i=e(i),$pinEl=o(t.el),$baseEl=o(i.el),$pinEl[0]===$baseEl[0])throw new Error("pinEl adn baseEl must be different");n(t,"x"),n(t,"y"),n(i,"x"),n(i,"y");var a=i.offset(),c=$pinEl.offsetParent(),r=c.offset(),u=o(document.body),h=o("html"),f=o(window),g=f.scrollTop(),p=f.scrollLeft();if(l||c[0]!==document.body||(r.top=0,r.left=0),l){var b=a.left+i.x-t.x,m=a.top+i.y-t.y;d?(b-=p,m-=g,"fixed"!==h.css("backgroundAttachment")&&"fixed"!==u.css("backgroundAttachment")&&h.css({zoom:1,backgroundImage:"url(about:blank)",backgroundAttachment:"fixed"}),$pinEl.css("position","absolute"),$pinEl[0].style.setExpression("top","(document).documentElement.scrollTop+"+m),$pinEl[0].style.setExpression("left","(document).documentElement.scrollLeft+"+b)):($baseEl[0]!=window&&$baseEl[0]!=document&&(b-=p,m-=g),$pinEl.css({position:"fixed",left:b,top:m}))}else $pinEl.css({position:"absolute",left:a.left+i.x-t.x-r.left,top:a.top+i.y-t.y-r.top});return s.resolve(),s}});
define("app/common/key_contorl.js",["jquery"],function(t,i,e){var n=t("jquery"),o={left:37,up:38,right:39,bottom:40},s={namespace:"keyContorl"};e.exports=function(t){function i(){var t=n("input, textarea");t.off(f).on(f,e).off(h).on(h,l)}function e(){p.off(u,g)}function l(){p.on(u,g)}function a(i){var i=i||event;i.keyCode==r&&n.proxy(t.callback,t.context)()}function c(i){var i=i||event;i.keyCode==r&&t.callback()}if(!t)throw new Error("options不存在");if(t&&!t.key)throw new Error("key不存在");if(t&&!(t.key in o))throw new Error("key:"+t.key+"未配置");if(t&&!t.callback)throw new Error("callback不存在");var d=n.extend({},s,t),r=o[d.key],u="keyup."+d.namespace+"."+d.key,f="focus."+d.namespace+"."+d.key,h="blur."+d.namespace+"."+d.key,g=t.context?a:c,p=n(document);return p.off(u).on(u,g),i(),{cancel:e,start:l}}});
define("app/ms_v2/js/common/more_list.js",["jquery","lib/widget/widget.js"],function(t,i,e){var n=t("jquery"),o=t("lib/widget/widget.js"),s={simple:"simple",fuzzy:"fuzzy"},l="http://data.273.cn/",a='<% for (var i = 0; i !== data.length; ++i) { %><li><a href="<%= data[i].uri %>"><%= data[i].brand_name %></a></li><% } %>',r=function(t){if(!t)throw new Error("配置信息不存在");this.config=n.extend({},r.defaults,t),this.init()},c=r.prototype={};n.extend(c,{init:function(){var t=this.config;if(t&&!t.$el)throw new Error("init():$el不存在");if(t&&!t.type)throw new Error("init():type不存在");var i=this.$el=this.config.$el;if(this.$more=i.find("#js_more"),this.$list=i.find(".ls_collapse"),this.$moreText=this.$more.find("span"),this.$moreList=i.find(".js_more_list"),this.$firstMore=this.$moreList.first(),"fuzzy"===this.config.type){var e=this.$letter=this.$el.find(".letterlayer");this.$letterBtn=e.find("a"),this.$letterMore=this.$moreList.filter(":gt(0)"),this.$fuzzyMore=this.$moreList.last(),this.$fuzzyInput=e.find("#js_fuzzy_input")}switch(t.type){case s.fuzzy:this._letterToggle(),this.fuzzySearch();case s.simple:this._bindMore()}},_clearInput:function(){this.$fuzzyInput.val("")},_letterToggle:function(){var t=this;this.$letterBtn.on("click",function(){var i=n(this).index();n.proxy(t._toggleEvent(i),t)})},_toggleEvent:function(t){-1===t?this.$letterBtn.removeClass("on"):(this.$letterBtn.eq(t).addClass("on").siblings().removeClass("on"),0!==t&&this.$fuzzyInput.val("").blur()),this.$moreList.hide().eq(t).show()},fuzzySearch:function(){var t=this,i=null,e=this.$fuzzyInput;d(e),e.on("keyup",function(){clearTimeout(i);var e=n(this).val();if(e){var o={kw:e};i=setTimeout(function(){n.extend(o,t.config.request);var i=t._ajaxFuzzy(o);i.done(function(t){this._showFuzzy(t)})},400)}else t._toggleEvent(0)})},_ajaxFuzzy:function(t){return n.ajax({url:l+"?_mod=fuzzySearch&_act=fuzzysearch",data:t,dataType:"jsonp",context:this})},_showFuzzy:function(t){this._toggleEvent(-1);var i="";t&&(i=o.template(a,{data:t})),this.$fuzzyMore.html(i)},_bindMore:function(){var t=this.$el,i=this.$more;i.on("click",n.proxy(function(){var i=t.hasClass("filter_box")?"open":"close";this._btnEvent(i)},this))},_btnEvent:function(t){"open"===t?this._open():"close"===t&&this._close()},_open:function(){this.$moreText.text("收起"),this.$el.removeClass("filter_box").addClass("more_box"),this.$list.hide(),this.$firstMore.show(),"fuzzy"===this.config.type&&this.$letter.show()},_close:function(){this.$moreText.text("更多"),this.$el.removeClass("more_box").addClass("filter_box"),this.$list.show(),this.$firstMore.hide(),"fuzzy"===this.config.type&&(this.$letter.hide(),this.$letterBtn.removeClass("on").eq(0).addClass("on"),this.$moreList.hide(),this.$fuzzyInput.val("").blur())}});var d=function(t){var i=t.val();t.css("color","#989898"),t.focus(function(){var t=n(this).val();t==i&&(n(this).val(""),n(this).css("color","#333"))}),t.blur(function(){var t=n(this).val();""==t&&(n(this).val(i),n(this).css("color","#989898"))})};r.defaults={type:s.simple},e.exports=r});
define("app/ms_v2/js/list.js",["jquery","app/ms_v2/js/base.js","lib/jquery/plugin/jquery.lazyload.js","app/common/key_contorl.js","app/ms_v2/js/common/more_list.js","widget/position/position.js","app/ms_v2/js/common/list_filters.js","util/cookie.js","app/ms_v2/tpl/list_history_post.tpl"],function(t,i){var e=t("jquery"),o=t("app/ms_v2/js/base.js"),n=t("lib/jquery/plugin/jquery.lazyload.js"),s=t("app/common/key_contorl.js"),a=t("app/ms_v2/js/common/more_list.js"),l=t("widget/position/position.js"),r=t("app/ms_v2/js/common/list_filters.js"),c=t("util/cookie.js"),d=i;e.extend(d,o),d.pageTurn=function(t){var i=t.$el;s({key:"left",context:this,callback:function(){var t=i.find("#js_prev").attr("href");t&&(window.location.href=t)}}),s({key:"right",context:this,callback:function(){var t=i.find("#js_next").attr("href");t&&(window.location.href=t)}})},d.moreBrand=function(t){var i=t.$el;new a({$el:i,type:"fuzzy",request:d.request})},d.areaMore=function(t){var i=t.$el,o=i.find("#areaLinkMore");o.click(function(){i.toggleClass("more_box"),i.hasClass("more_box")?(o.html("收起<i></i>"),i.removeClass("filter_box")):(o.html("更多<i></i>"),i.addClass("filter_box")),e(".area_more_hide").toggle()})},d.moreSeries=function(t){var i=t.$el;new a({$el:i,type:"simple"})};var u={price:1,age:2};d.customInput=function(t){function i(){e(document).on("click.custom"+r,function(t){return e.contains(n[0],t.target)||(n.removeClass("input"),e(this).off("click.custom"+r)),!1})}function o(){e(document).off("click.custom")}var n=t.$el,s=n.find("input"),a=n.find("button"),l=n.data("type"),r=u[l];if(!l in u)throw new Error("customInput():类型不存在");s.on("keypress",function(t){return t.charCode&&(t.charCode<48||t.charCode>57)?!1:void 0}).on("focus",function(){o(),i(),n.addClass("input")}),a.on("click",function(){var t=s.eq(0).val(),i=s.eq(1).val();if(!e.isNumeric(t)&&!e.isNumeric(i))return!1;var o={cu_type:r,min:t,max:i};e.extend(o,d.request),e.ajax({url:"/ajax.php?module=custom_param_url",data:o,dataType:"text",success:function(t){window.location.href=t}})})},d.hover=function(t){var i=t.$el,e=i.find(".pop_layer");i.hover(function(){e.show()},function(){e.hide()})},d.slideBar=function(t){function i(){e(this).scrollTop()>=a?o(s.offset().left):n()}function o(t){l.pin({el:s,fixed:!0,x:0,y:"top"},{x:t,y:"top"}),$box.show()}function n(){s.attr("style",""),$box.hide()}var s=t.$el;$box=s.next();var a=s.offset().top;e(window).on("scroll",i).on("resize",function(){n(),i()})},d.postHover=function(t){var i=t.$el,o=t.type;1==o?i.find("li .car_list_box").mouseenter(function(){e(this).addClass("on")}).mouseleave(function(){e(this).removeClass("on")}):i.find("li").mouseenter(function(){e(this).addClass("on")}).mouseleave(function(){e(this).removeClass("on")})},d.start=function(t){d.request=JSON.parse(t.request),0!=e(".js_scroll").length&&n({el:".js_scroll",effect:"fadeIn",data_attribute:"url",skip_invisible:!1,load:function(){e(this).parents(".lazy_load").removeClass("lazy_load")}}),o.init(t)},d.listFilter=function(t){var i=t.$el;new r({$el:i,data:i.data()})},d.hideWarranty=function(t){var i=t.$el,o={expires:2,domain:".273.cn",path:"/"};i.on("click",function(){e(this).hide(),c.set("WARRANTY_IS_READ",!0,o)})},d.subscribe=function(i){var e=i.$el;e.one("click",function(){t.async(["app/ms_v2/js/common/subscribe.js"],function(t){new t({$el:e})})})},d.historyPost=function(i){var o=i.$el,n=t("app/ms_v2/tpl/list_history_post.tpl"),s=e(window);s.on("scroll",function(){s.scrollTop()+s.height()>=e("#recent_view").offset().top&&a()});var a=function(){!o.data("forbidden")&&c.get("c273_sale_history_ids")&&(o.data("forbidden",1),e.ajax({url:"/ajax.php?module=getHistoryPost",type:"GET",dataType:"jsonp"}).success(function(t){if(0==t.code){var i=JSON.parse(t.data),e=n({data:i});o.find(".car_list").html(e),o.show()}}))}}});
define("widget/dialog/dialog.js",["jquery","lib/widget/widget.js","widget/mask/mask.js","util"],function(t,i,e){var n=t("jquery"),o=t("lib/widget/widget.js"),s=t("widget/mask/mask.js"),a=t("util"),l=a.ua,r=function(t){var i=0;return t||(t=""),function(e){return(e||t)+"_"+i++}},c=r("cid"),d=r("dialog"),u=function(t){if(!this instanceof u)return new u(t);var i=this;this.config=n.extend({},u.defaults,t),this.skin().done(function(){i._init().$dialog.data("ui-dialog",i),i.defer&&i.defer.resolveWith(i)})},h=u.prototype={};h.constructor=u,n.extend(h,{_init:function(){var t=this.config,i=this.id=t.id||d(),e=this._format();return this._createDom(e).content(t.content)._bindDom()._reset(),e.visible&&this.show(),u.instances[i]=this,this},_createDom:function(t){var i,e=this.config,o=n(window),a=n(document),r=n(document.body),c=n(u.template(t)).hide();return e.maskAble&&(i=new s({zIndex:t.zIndex-1,visible:e.visible,opacity:e.opacity,scrollAble:e.scrollAble}),this.mask=i),r.prepend(c),e.maskAble||6!=l.ie||($iframe=c.find(".ui-dialog-iframe"),$iframe.css({width:c.width(),height:c.height()}),this.$iframe=$iframe),this.$win=o,this.$doc=a,this.$body=r,this.$dialog=c,this},_bindDom:function(){this.$doc;var t=this.$dialog,i=this,e=this.config,o=i.callbacks;return t.on("click",".ui-dialog-close",function(t){var n=e.close||e.cancel;return n&&n.call(i,t)===!1||i.hide(),!1}).on("click",".ui-dialog-button",function(t){var e,s=n(this),a=s.data("cid");a&&(e=o[a])&&e.call(i,t)===!1||i.hide()}),e.drapAble,e.resizeAble,this},_position:function(){var t=this.config.fixAble,i=6==l.ie,e=this.$win,o=this.$doc,s=this.$body,a=n("html"),r=this.$dialog,c=e.width(),d=e.height(),u=r.width(),h=parseInt(r.css("border-left-width")),f=parseInt(r.css("border-right-width")),p=r.height(),g=o.scrollLeft(),m=o.scrollTop(),b=Math.max(parseInt((c-u-h-f)/2),0),v=parseInt(382*Math.max(d-p,0)/1e3),y=i?"absolute":t?"fixed":"absolute";return t?i?(r[0].style.setExpression("top","(document).documentElement.scrollTop+"+v),r[0].style.setExpression("left","(document).documentElement.scrollLeft+"+b),"fixed"!==a.css("backgroundAttachment")&&"fixed"!==s.css("backgroundAttachment")&&a.css({zoom:1,backgroundImage:"url(about:blank)",backgroundAttachment:"fixed"}),s.css("width",s.width())):r.css({top:v,left:b}):r.css({top:v+m,left:b+g}),r.css("position",y),this},_format:function(){var t=n.extend(!0,{},this.config),i=t.buttons,e=o.template('<a href="javascript:;" class="ui-dialog-button <%=focus%>" data-cid="<%=cid%>"><%=text%></a>');t.content=this.content(u.defaults.content,!0),t.cancel&&i.unshift({text:t.cancelText,callback:t.cancel}),t.ok&&i.unshift({text:t.okText,callback:t.ok,focus:!0}),"auto"!==t.width&&(t.width=t.width+"px"),"auto"!==t.height&&(t.height=t.height+"px"),t.zIndex=u.zIndex,u.zIndex+=2;var s=this.callbacks={},a=function(){};return t.buttons=n.map(i,function(t){var i=c();return t.focus=t.focus?"ui-dialog-focus":"",t.cid=i,s[i]=t.callback||a,e(t)}).join(""),t.isIE6=6==l.ie,t},_reset:function(){return this._position(),this},skin:function(i){return i||(i=this.config.skin),t.async(["./skins/"+i+".css"])},get:function(t){var i=null;return t&&(i=u.instances[t])?i:null},title:function(t){var i=this.$title?this.$title:this.$title=this.$dialog.find(".ui-dialog-title");return i.html(t||""),this._reset(),this},content:function(t,i){var e;try{e=n(t)}catch(o){e=n()}return e.size()>0&&(t=e),i?t.length?n("<div>").append(t.clone().show()).html():t:(e=this.$content?this.$content:this.$content=this.$dialog.find(".ui-dialog-content"),e.html("").append(t||""),this._reset(),this)},open:function(i,e){var o=this,s=this.config,a=this.$dialog,l=a.find(".ui-dialog-content"),r=a.find(".ui-dialog-loading"),c=n('<iframe frameborder="0">');return t.async(["lib/rpc/rpc.js"],function(t){var n;c.on("load",function(){"auto"===s.width&&n.call("size").done(function(t){o.size(t.width)}),"auto"===s.height&&n.call("size").done(function(t){o.size(null,t.height)}),l.css({padding:"0",height:"100%"}),r.hide(),c.show()}).hide(),c.attr("src",i),l.append(c),n=new t({remote:c[0].contentWindow}),n.register({close:function(){o.close()},refresh:function(){window.location.reload()},resize:function(t,i){o.size(t,i)},setTitle:function(t){o.title(t)},setContent:function(t){o.content(t)}}),o.rpc=n,e&&e.call(o)}),this},load:function(){},show:function(){var t=this.config,i=this.mask,e=this.$dialog;if(!e||t.maskAble&&!i)new u(n.extend({},this.config,{id:this.id,visible:!0}));else if(e.show(),i&&i.update({zIndex:n(".ui-dialog").css("zIndex")-1}).show(),this.config.focusAble){var o=e.find(".ui-dialog-focus").last()[0];o&&o.focus()}return this},hide:function(){var t=this,i=this.mask,e=this.rpc,o=this.$dialog;return window.setTimeout(function(){o&&(o.remove(),t.$dialog=null),i&&(i.update({zIndex:n(".ui-dialog").css("zIndex")-1}).hide(),t.mask=null),e&&e.destory()},200),this},close:function(){var t=this.$dialog,i=t.find(".ui-dialog-close");return i.trigger("click"),this},size:function(t,i){var e=this.$dialog,n=this.$iframe,o=this.$main?this.$main:this.$main=e.find(".ui-dialog-main"),s={};return t&&(s.width=t),i&&(s.height=i),o.css(s),n&&n.css({width:e.width(),height:e.height()}),this._reset(),this},ready:function(t){var i=this.defer?this.defer:this.defer=n.Deferred();return i.done(t),this},register:function(t,i){return this.rpc&&this.rpc.register(t,i),this}}),u.version="1.0",u.instances={},u.defaults={title:"标题",content:'<div class="ui-dialog-loading"></div>',ok:null,id:null,cancel:null,close:null,okText:"确定",cancelText:"取消",buttons:[],width:"auto",height:"auto",padding:"20px 25px",skin:"blue",fixAble:!0,drapAble:!1,resizeAble:!1,closeAble:!0,maskAble:!0,opacity:.6,scrollAble:!0,focusAble:!0,escAble:!1,visible:!0},u.zIndex=1990;var f='<div class="ui-dialog" style="z-index:<%=zIndex%>;"><%if (!maskAble && isIE6) {%><iframe class="ui-dialog-iframe" style="position:absolute;left:0;top:0;width:100%;height:100%;z-index:-1;border:0 none;filter:alpha(opacity=0)"></iframe><%}%><table cellspacing="0"><tbody><tr><td class="ui-dialog-tl"></td><td class="ui-dialog-tc"></td><td class="ui-dialog-tr"></td></tr><tr><td class="ui-dialog-cl"></td><td class="ui-dialog-cc"><table cellspacing="0"><tbody><tr><td class="ui-dialog-header"><div class="ui-dialog-bar <%if (drapAble) {%> ui-dialog-drap <%}%>"><div class="ui-dialog-title"><%=title%></div><a class="ui-dialog-close" href="javascript:;" <%if (!closeAble) {%> style="display:none;" <%}%>>×</a></div></td></tr><tr><td class="ui-dialog-main" style="width:<%=width%>;height:<%=height%>;"><div class="ui-dialog-content" style="padding:<%=padding%>"><%=content%></div></td></tr><tr><td class="ui-dialog-footer"><div class="ui-dialog-buttons"><%=buttons%></div></td></tr></tbody></table></td><td class="ui-dialog-cr"></td></tr><tr><td class="ui-dialog-bl"></td><td class="ui-dialog-bc"></td><td class="ui-dialog-br <%if (resizeAble) {%> ui-dialog-resize <%}%>"></td></tr></tbody></table></div>';u.template=o.template(f),u.alert=function(){},u.confirm=function(){},u.notice=function(){};var p;n(window).on("resize",function(){p&&window.clearTimeout(p),p=window.setTimeout(function(){n(".ui-dialog").each(function(){var t=n(this),i=t.data("ui-dialog");i&&i._position()})},50)}),n(document).on("keyup",function(t){var i,e=n(n(".ui-dialog")[0]);27==t.keyCode&&e.size()>0&&e.is(":visible")&&(i=e.data("ui-dialog"))&&i.config.escAble&&e.find(".ui-dialog-close").click()}),e.exports=u});
define("widget/mask/mask.js",["jquery","util"],function(t,i,e){var n=t("jquery"),s=t("util"),o=s.ua,l={backgroundColor:"#000",opacity:.6,zIndex:1990,visible:!0,scrollAble:!0},a=0,r=function(t){return t||(t=""),t+"_"+a++},c=function(t){t=n.extend({},l,t||{},{position:"fixed",top:0,left:0,width:"100%",height:"100%"}),this.config=t,this._init()};n.extend(c.prototype={},{constructor:c,_init:function(){var t=this.id=r("mask"),i=this.config;this._createDom()._bindDom().update(),i.visible&&this.show(),c.instances[t]=this},_createDom:function(){if(c.$mask)return this;var t=n("<div>"),i=n(document.body);return t.addClass("ui-mask").hide(),6==o.ie&&(i.css({height:"100%",margin:0}),t.html('<iframe style="position:absolute;left:0;top:0;width:100%;height:100%;z-index:-1;border:0 none;filter:alpha(opacity=0)"></iframe>')),i.prepend(t),c.$mask=t,this},_bindDom:function(){return this},update:function(t){var i=n.extend(this.config,t||{}),e=c.$mask;return t=n.extend({},i),6==o.ie&&(t.filter="alpha(opacity="+100*t.opacity+")",t.position="absolute",e[0].style.setExpression("top","(document).documentElement.scrollTop"),e[0].style.setExpression("left","(document).documentElement.scrollLeft"),e[0].style.setExpression("width","(document).documentElement.clientWidth"),e[0].style.setExpression("height","(document).documentElement.clientHeight"),delete t.opacity,delete t.top,delete t.left,delete t.width,delete t.height),delete t.visible,delete t.scrollAble,e.css(t),this},show:function(){return this.disableScroll(!this.config.scrollAble),c.$mask.show(),this},hide:function(){return 1===Object.keys(c.instances).length&&(c.$mask.hide(),this.disableScroll(!1)),delete c.instances[this.id],this},disableScroll:function(t){var i=n(document.body);return void 0===t&&(t=!0),t?i.css("overflow","hidden"):i.css("overflow","visible"),this}}),c.instances={},c.defaults=l,c.$mask=null,e.exports=c});
define("app/ms_v2/js/common/list_filters.js",["jquery","widget/dialog/dialog.js","lib/widget/widget.js","util/storage.js","util/cookie.js","app/ms_v2/js/base.js"],function(t,i,e){var s=t("jquery"),n=t("widget/dialog/dialog.js"),o=t("lib/widget/widget.js"),a=t("util/storage.js"),l=t("util/cookie.js"),r=t("app/ms_v2/js/base.js"),c="list_features",d="/list@etype=click@filters_btn=submit",u="/list@etype=click@filters_btn=saved",h="/list@etype=click@filters_btn=delete",f='<a href="javascript:;" class="js_save_filter a1"><%if (!isSaved) {%><i class="i-save"></i>保存筛选条件</a> <%}%> <%if (!isSaved && savedCount > 0) {%>|<%}%> <%if (savedCount > 0) {%><a href="javascript:;" data-eqselog="/list@etype=click@filters_btn=saved" class="js_saved_filters a2">已保存(<%=savedCount%>)</a><%}%>',p='<div class="arrow"></div><div class="down js_fr_panel"><ul><%for (var i = 0; i < filters.length; i++) {%><%var filter=filters[i];%><li data-eqselog="/list@etype=click@filters_btn=delete" <%if (i + 1 == filters.length) {%> class="last" <%}%> ><div class="li_c clearfix" data-jslink="<%=filter.url%>" title="<%=filter.caption%>"><i class="i-s" data-parent="1"></i><em class="font" data-parent="1"><%=filter.caption%></em><a href="javascript:;" data-parent="-1" data-pos="<%=i%>" class="js_filter_del close"></a></div></li><%}%></ul></div>',g='<div class="tips js_filter_tip"><div class="tips_inner"><a class="js_filter_tip_close" href="javascript:;"></a></div></div>',m='<div class="pop_save_con"><div class="pop_box_content clearfix"><div class="success_tips clearfix"><div class="icon"></div><p><strong>已保存的筛选条件已达到上限(最多只能保存5个)，继续保存将会删除最早保存的条件，确定保存吗？</strong></p></div><dl class="clearfix"><dt>　</dt><dd><button class="button1 js_f_confirm">确定保存</button><button class="button2 js_f_cancel">取消</button></dd></dl></div></div>',v="filters",b=5,_="温馨提醒",w="http://"+window.location.host+window.location.pathname;ListFilters=function(t){if(!t)throw new Error("配置信息为空");if(!t.$el)throw new Error("$el为空");this.$el=t.$el,this.config=s.extend({data:t.$el.data()},ListFilters.defaults,t),this._init()},ListFilters.defaults={};var y=ListFilters.prototype={};s.extend(y,{filters:[],warnDialog:null,$savedPanel:null,$opsBar:null,$el:null,isPanelInited:!1,curFilter:{},_init:function(){this.config,this._initData(),this._initDom()},_initData:function(){var t=a.get(v),i=[];if(t)try{var i=JSON.parse(t)||[]}catch(e){}this.filters=i||[],this.curFilter={url:w,caption:this.config.data.caption,key:this.config.data.filterKey||this.config.data.caption}},_initDom:function(){this.$opsBar=this.$el.find(".js_filter_ops"),this.$savedPanel=this.$el.find(".js_filter_panel");var t=this;this._createBarDom(),this.$el.delegate(".js_save_filter","click",function(){r.log.sendTrack(d),t.saveFilter(this.curFilter,function(){t._createBarDom(),t.isPanelInited&&t._updatePanel()})}),this.$el.delegate(".js_saved_filters","click",function(){return r.log.sendTrack(u),t.isPanelInited||t._initPanel(),t.showPanel(),!1}),this.$el.delegate("div.li_c","mouseover",function(t){var i=s(t.target),e=i.data("parent")||0;return 0>e?!1:(-1!=e&&(i=i.parent("div")),i.addClass("li_c_on"),!1)}).delegate("div.li_c","mouseout",function(t){var i=s(t.target),e=i.data("parent")||0;return 0>e?!1:(1==e&&(i=i.parent("div")),i.removeClass("li_c_on"),!1)}).delegate("div.li_c","click",function(t){var i=s(t.target),e=i.data("parent")||0;if(0>e)return!1;1==e&&(i=i.parent("div"));var n=i.data("jslink")||"";n&&(window.location.href=n)});var i=l.get(c)||0;0==(1&i)&&this.showFeaturesTip(i)},_createBarDom:function(){var t=o.template(f,{isSaved:this.isSaved(),savedCount:this.filters.length});this.$opsBar.html(t)},_initPanel:function(){this.isPanelInited=!0,this._updatePanel();var t=this;this.$el.delegate(".js_filter_del","click",function(i){r.log.sendTrack(h);var e=s(i.target),n=e.data("pos");return n>=0&&b>n&&(t.deleteFilter(n),t._updatePanel(),t._createBarDom()),!1})},showPanel:function(){this.$savedPanel.css("display","block");var t=this,i=s("html,body");i.on("click",function(e){s.contains(t.$savedPanel[0],e.target)||(t.$savedPanel.css("display","none"),i.off("click"))})},_updatePanel:function(){if(this.filters.length>0){var t=o.template(p,{filters:this.filters});this.$savedPanel.html(t)}else this.$savedPanel.html("").css("display","none")},_saveToStorage:function(){var t=this.filters||[],i=JSON.stringify(t);a.set(v,i)},showFeaturesTip:function(t){var i=s(g);i.find(".js_filter_tip_close").click(function(){return l.set(c,1|t,{expires:365,domain:"273.cn",path:"/"}),i.remove(),!1}),this.$el.append(i)},saveFilter:function(t,i){this.filters.length>=b?this._showWarnBox(t,i):(this._saveFilter(t),i&&i())},_saveFilter:function(t){if(t=t||this.curFilter,t.url){if(this.isSaved(t))return!1;if(this.filters.length>=b){var i=this.filters.length-b+1;this.deleteFilter(b-1,i)}this.filters.unshift(t),this._saveToStorage()}return!0},_showWarnBox:function(t,i){var e=s(o.template(m,{})),a=e.find(".js_f_confirm"),l=e.find(".js_f_cancel"),r=this;a.on("click",function(){r._saveFilter(t),i&&i(),r.warnDialog.close()}),l.on("click",function(){r.warnDialog.close()}),this.warnDialog=new n({title:_,padding:"0px",escAble:!0,skin:"gray",content:e})},deleteFilter:function(t,i){if(i=i||1,t>=0&&b>t&&t<this.filters.length){var e=this.filters.splice(t,i);return this._saveToStorage(),e}return!1},isSaved:function(t){t=t||this.curFilter;for(var i=this.filters.length,e=0;i>e;e++)if(t.key==this.filters[e].key)return!0;return!1}}),e.exports=ListFilters});