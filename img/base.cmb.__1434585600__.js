define("util/cookie.js",[],function(e,t){function n(e,t){var n={};if(i(e)&&e.length>0)for(var a,r,o,u=t?c:s,d=e.split(/;\s/g),h=0,f=d.length;f>h;h++){if(o=d[h].match(/([^=]+)=/i),o instanceof Array)try{a=c(o[1]),r=u(d[h].substring(o[1].length+1))}catch(p){}else a=c(d[h]),r="";a&&(n[a]=r)}return n}function i(e){return"string"==typeof e}function a(e){return i(e)&&""!==e}function r(e){if(!a(e))throw new TypeError("Cookie name must be a non-empty string")}function s(e){return e}var o=t,c=decodeURIComponent,u=encodeURIComponent;o.get=function(e,t){r(e),t="function"==typeof t?{converter:t}:t||{};var i=n(document.cookie,!t.raw);return(t.converter||s)(i[e])},o.set=function(e,t,n){r(e),n=n||{};var i=n.expires,s=n.domain,o=n.path;n.raw||(t=u(String(t)));var c=e+"="+t,d=i;return"number"==typeof d&&(d=new Date,d.setDate(d.getDate()+i)),d instanceof Date&&(c+="; expires="+d.toUTCString()),a(s)&&(c+="; domain="+s),a(o)&&(c+="; path="+o),n.secure&&(c+="; secure"),document.cookie=c,c},o.remove=function(e,t){return t=t||{},t.expires=new Date(0),this.set(e,"",t)}});
define("util/storage.js",["config"],function(e,t,r){e("config");var a,n="__STORAGE_AGENT__",i="__LOCAL_STORAGE__";if(window.localStorage){a=function(e){var t={};try{t=JSON.parse(localStorage.getItem(n+"__SAVED_NS__"))||{}}catch(r){}if(!t[e])try{t[e]=1,localStorage.setItem(n+"__SAVED_NS__",JSON.stringify(t))}catch(a){}var o={set:function(t,r){localStorage.setItem(e+t,r);var a={};try{a=JSON.parse(localStorage.getItem(e+"__SAVED_K__"))||{}}catch(n){}a[t]||(a[t]=1,localStorage.setItem(e+"__SAVED_K__",JSON.stringify(a)))},get:function(t){return localStorage.getItem(e+t)},remove:function(t){localStorage.removeItem(e+t);var r={};try{r=JSON.parse(localStorage.getItem(e+"__SAVED_K__"))||{}}catch(a){}r[t]&&(delete r[t],localStorage.setItem(e+"__SAVED_K__",JSON.stringify(r)))},clear:function(){if(e===i)localStorage.clear();else{var t={};try{t=JSON.parse(o.get("__SAVED_K__"))||{}}catch(r){}Object.keys(t).forEach(function(e){o.remove(e)}),localStorage.removeItem(e+"__SAVED_K__")}}};return o};var o=a(i);a.get=o.get,a.set=o.set,a.remove=o.remove,a.clear=o.clear,r.exports=a}else{var s=r.async(),c=document.createElement("IFRAME");c.src="javascript:false",c.style.display="none",c.attachEvent("onload",function(){var e=c.contentWindow.document,t=e.createElement("INPUT");if(t.type="hidden",e.insertBefore(t,e.firstChild),!t.addBehavior)throw new Error("this browser does not support userData");t.addBehavior("#default#userData"),a=function(e){t.load(n);var r={};try{r=JSON.parse(t.getAttribute("__SAVED_NS__"))||{}}catch(o){}r[e]||(r[e]=1,t.setAttribute("__SAVED_NS__",JSON.stringify(r)),t.save(n));var s={set:function(r,a){var n={};t.setAttribute(r,a),t.save(e),t.load(e);try{n=JSON.parse(t.getAttribute("__SAVED_K__"))||{}}catch(i){}n[r]||(n[r]=1,t.setAttribute("__SAVED_K__",JSON.stringify(n)),t.save(e))},get:function(r){return t.load(e),t.getAttribute(r)},remove:function(r){var a={};t.removeAttribute(r),t.save(e);try{a=JSON.parse(t.getAttribute("__SAVED_K__"))||{}}catch(n){}a[r]&&(delete a[r],t.setAttribute("__SAVED_K__",JSON.stringify(a)),t.save(e))},clear:function(){if(e===i){t.load(n);var r={};try{r=JSON.parse(t.getAttribute("__SAVED_NS__"))||{},t.setAttribute("__SAVED_NS__","{}"),t.save(n)}catch(o){}delete r[i],Object.keys(r).forEach(function(e){var t=new a(e);t.clear(),delete r[e]})}var c=JSON.parse(s.get("__SAVED_K__"))||{};Object.keys(c).forEach(function(e){s.remove(e)})}};return s};var o=a(i);a.get=o.get,a.set=o.set,a.remove=o.remove,a.clear=o.clear,r.exports=a,s()}),document.body.appendChild(c),c.src="http://sta.273.com.cn/crossdomain.html"}});
define("util/log_v2.js",["jquery","./uuid_v2","./url","util","./cookie"],function(e,t,a){function r(e){if(r.instance)return r.instance;!e&&(e={});var t=e.eqsch||h(document.body).data("eqsch")||window.__EQSCH__||"",a=e.eqschver||"A";if(t=h.trim(t+""),!t)throw new Error("eqsch is missing");t=t.replace(/&/g,"@"),h.isPlainObject(t)||(t=this._parse(t)),this.eqsch=t,this.eqschver=a,this.eqschid=i(),this.sid=d("sid")||f("sid",i()),r.instance=this}function i(){var e=new Date,t=new Date(e.getFullYear(),e.getMonth(),e.getDate(),0,0,0);return 1e3*(e.getTime()-t.getTime())+g.math.random(1e3,9999)}function n(){var e,t,a,r=window.navigator,i=[0,0,0];if(r.plugins&&(t=r.plugins["Shockwave Flash"]))e=t.description,!e||r.mimeTypes&&r.mimeTypes["application/x-shockwave-flash"]&&!r.mimeTypes["application/x-shockwave-flash"].enabledPlugin||(e=e.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),i[0]=parseInt(e.replace(/^(.*)\..*$/,"$1"),10),i[1]=parseInt(e.replace(/^.*\.(.*)\s.*$/,"$1"),10),i[2]=/[a-zA-Z]/.test(e)?parseInt(e.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0);else if(window.ActiveXObject)try{a=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),a&&(e=a.GetVariable("$version"),e&&(e=e.split(" ")[1].split(","),i[0]=parseInt(e[0],10),i[1]=parseInt(e[1],10),i[2]=parseInt(e[2],10)))}catch(n){}return i.join(".")}function o(){var e=g.ua;window.navigator;var t,a=[];return h.each(e,function(e,t){t&&a.push(e+":"+t)}),t=(window.navigator.language||window.navigator.browserLanguage).toLowerCase(),t&&a.push("lang:"+t),a.join("|")}function s(){var e=window.screen,t=window.java;if(e)return e.width+","+e.height;if(t)try{return e=t.awt.Toolkit.getDefaultToolkit().getScreenSize(),e.width+","+e.height}catch(a){}return""}function c(){var e,t=d(),a=document.referrer,r=p.parse(window.location.href),i=r.params,n=t.ca_source||"",o=t.ca_name||"",s=t.ca_kw||"",c=t.ca_id||"";return a&&!/273.cn/i.test(a)&&(r=p.parse(a),n=i.ca_source||r.host,i.ca_name||i.ca_kw||i.ca_id?(o=i.ca_name||"",s=i.ca_kw||"",c=i.ca_id||""):h.each(y,function(t,i){if(new RegExp(i[0],"i").test(r.host)){if(e=r.params[i[1]]||"")return s=/[\?&]\w+=utf/i.test(a)?e+"|utf8":e,void 0;n=r.host,o="se",c=""}}),f("ca_source",n),f("ca_name",o),f("ca_kw",s),f("ca_id",c)),[n,o,s,c]}function u(){var e,t,a=d("ifid")||"";return document.referrer&&(e=p.parse(window.location.href).params,t=e.ifid||"",t&&t!==a&&(a=t,f("ifid",a))),a}function d(e){var t;try{t=JSON.parse(_.get(w)||"{}")}catch(a){t={}}return e?t[e]:t}function f(e,t){var a;try{a=JSON.parse(_.get(w)||"{}")}catch(r){a={}}return e&&t?(a[e]=t,_.set(w,JSON.stringify(a),{path:"/",domain:v}),t):void 0}var h=e("jquery"),l=e("./uuid_v2"),p=e("./url"),g=e("util"),_=e("./cookie"),m="http://analytics.273.cn",w="eqs_log",v="273.cn",y=[["images.google","q"],["google","q"],["yahoo","p"],["msn","q"],["live","q"],["soso","w"],["360","q"],["so","q"],["bing","q"],["baidu","word"],["baidu","wd"],["sogou","query"]];r.prototype={constructor:r,trackPageView:function(){this._pvTracked||(this.sendTrack(),this._pvTracked=!0)},bindTrackEvent:function(){var e=h(document.body),t=this;e.off("click.log mouseenter.log show.log").on("click.log mouseenter.log show.log","[data-eqselog]",function(e){var a,r,i,n,o,s,c=h(this),u=c.data("eqselog");if("string"==typeof u&&(u=t._parse(u),c.data("eqselog",u)),a=u.etype||[],r=e.type,"mouseenter"===r&&(r="hover"),-1!=a.join().indexOf(r))if(n=this.tagName.toLowerCase(),i=h.extend({},u,{etype:r}),"a"===n&&(s=c.attr("href")||"#","#"!==s&&"javascript:;"!==s&&(i.params.href=s)),"hover"===r)c.data("eqsloged")||(t.sendTrack(i),c.data("eqsloged",!0));else if("click"===r){if(t.sendTrack(i),"a"===n){if(!/^#|(javascript:)\w*/.test(s)&&"_self"===(c.attr("target")||"_self"))return window.setTimeout(function(){window.location.href=s},200),!1}else if("button"===n&&(o=c.parents("form"),"submit"===c.attr("type")&&o.length&&"_self"===(o.attr("target")||"_self")))return window.setTimeout(function(){o.submit()},200),!1}else t.sendTrack(i)}),h(function(){h("[data-eqselog]").each(function(){var e,a=h(this),r=a.data("eqselog")||"";"string"==typeof r&&(r=t._parse(a.data("eqselog")),a.data("eqselog",r)),e=r.etype||[],e.join().indexOf("show")>-1&&a.trigger("show.log")})})},_parse:function(e){var t={};return t.params={},(e=h.trim(e+""))?(e=e.replace(/&/g,"@").split(/[@\s]+/),e.forEach(function(e,a){0===a&&-1===e.indexOf("=")?t.code=e:e.indexOf("=")>-1&&(e=e.split(/[=\s]+/),a=e[0].toLowerCase(),"etype"===a?t.etype=e[1].split(/[|\s]+/):t.params[a]=e[1])}),t):t},_stringify:function(e){var t,a,r,i=[];return h.isPlainObject(e)?((t=e.code)&&i.push(t),(a=e.etype)&&i.push("etype="+a),(r=e.params)&&i.push(h.param(r).replace(/&/g,"@")),i.join("@")):""},sendTrack:function(e){var t,a,r,i,d={},f=this.eqsch;e?h.isPlainObject(e)?(t=e.gif||"e.gif",delete e.gif):t="e.gif":t="p.gif",d.sid=this.sid,d.eqsch=this._stringify(f),d.eqschid=this.eqschid,d.eqschver=this.eqschver,d.url=f.params.url||document.location.href,d.refer=f.params.refer||document.referrer||"-",d.domain=document.location.hostname.split(".")[0],i=c(),d.ca_source=i[0]||"-",d.ca_name=i[1]||"-",d.ca_kw=i[2]||"-",d.ca_id=i[3]||"-",d.ifid=u()||"-","e.gif"===t&&(d.eqselog=h.isPlainObject(e)?this._stringify(e):e),"p.gif"===t&&(d.fv=n(),d.sc=s(),d.ua=o()),d.rand=+new Date,l.get().done(function(e){d.uuid=e||"-",r=m+"/"+t+"?"+h.param(d),setTimeout(function(){a=new Image,a.src=r},50)})},setEqsch:function(e){return e&&"string"==typeof e&&(this.eqsch=e),this},getEqsch:function(){return this.eqsch}},r.initBdTrack=function(){window._hmt||(window._hmt=[]);var e,t;h(function(){e=document.createElement("script"),e.src="http://hm.baidu.com/hm.js?0a62050fb9336c9e69562609d8ecefd0",t=document.getElementsByTagName("script")[0],t.parentNode.insertBefore(e,t)})},r.initGgTrack=function(){var e,t,a=window._gaq||(window._gaq=[]);a.push(["_setAccount","UA-43727317-1"]),a.push(["_setDomainName","273.cn"]),a.push(["_setAllowLinker",!0]),a.push(["_addOrganic","sogou","query"]),a.push(["_addOrganic","baidu","word"]),a.push(["_addOrganic","soso","w"]),a.push(["_addOrganic","youdao","q"]),a.push(["_addOrganic","so","q"]),a.push(["_addOrganic","360","q"]),a.push(["_trackPageview"]),h(function(){e=document.createElement("script"),e.type="text/javascript",e.async=!0,e.src=("https:"==document.location.protocol?"https://":"http://")+"stats.g.doubleclick.net/dc.js",t=document.getElementsByTagName("script")[0],t.parentNode.insertBefore(e,t)})},a.exports=r});
define("util/url.js",[],function(e,t){var r=document,a=r.location;t.parse=function(e){var t=r.createElement("a");if(e=e||"",-1===e.indexOf("://")){var n=a.protocol+"//"+a.host;n+=0===e.indexOf("/")?e:a.pathname.replace(/\/[\w\.]+$/,"/")+e,e=n}return t.href=e,{source:e,protocol:t.protocol.replace(":",""),host:t.hostname,port:t.port,query:t.search,params:function(){for(var t,r={},a=e.replace(/^[^\?]+/,"").replace(/#.*$/,""),n=a.replace(/^\?/,"").split("&"),i=n.length,o=0;i>o;o++)n[o]&&(t=n[o].split("="),r[t[0]]=t[1]||"");return r}(),file:(t.pathname.match(/\/([^\/?#]+)$/i)||[,""])[1],hash:t.hash.replace("#",""),path:t.pathname.replace(/^([^\/])/,"/$1"),relative:(t.href.match(/tps?:\/\/[^\/]+(.+)/)||[,""])[1],segments:t.pathname.replace(/^\//,"").split("/")}},t.stringify=function(e){return e.protocol+"://"+e.host+e.path+e.query+e.hash},t.querystring=function(){function e(e,t){if(0==e[t].length)return e[t]={};var r={};for(var a in e[t])r[a]=e[t][a];return e[t]=r,r}function t(r,a,n,i){var o=r.shift();if(o){var s=a[n]=a[n]||[];"]"==o?Array.isArray(s)?""!=i&&s.push(i):"object"==typeof s?s[Object.keys(s).length]=i:s=a[n]=[a[n],i]:~o.indexOf("]")?(o=o.substr(0,o.length-1),!h.test(o)&&Array.isArray(s)&&(s=e(a,n)),t(r,s,o,i)):(!h.test(o)&&Array.isArray(s)&&(s=e(a,n)),t(r,s,o,i))}else Array.isArray(a[n])?a[n].push(i):a[n]="object"==typeof a[n]?i:"undefined"==typeof a[n]?i:[a[n],i]}function r(e,r,a){if(~r.indexOf("]")){var n=r.split("[");n.length,t(n,e,"base",a)}else{if(!h.test(r)&&Array.isArray(e.base)){var i={};for(var o in e.base)i[o]=e.base[o];e.base=i}c(e.base,r,a)}return e}function a(e){var t={base:{}};return Object.keys(e).forEach(function(a){r(t,a,e[a])}),t.base}function n(e){return String(e).split("&").reduce(function(e,t){var a=t.indexOf("="),n=u(t),i=t.substr(0,n||a),o=t.substr(n||a,t.length),o=o.substr(o.indexOf("=")+1,o.length);return""==i&&(i=t,o=""),r(e,f(i),f(o))},{base:{}}).base}function i(e,t){if(!t)throw new TypeError("stringify expects an object");return t+"="+encodeURIComponent(e)}function o(e,t){var r=[];if(!t)throw new TypeError("stringify expects an object");for(var a=0;a<e.length;a++)r.push(p(e[a],t+"["+a+"]"));return r.join("&")}function s(e,t){for(var r,a=[],n=Object.keys(e),i=0,o=n.length;o>i;++i)r=n[i],a.push(p(e[r],t?t+"["+encodeURIComponent(r)+"]":encodeURIComponent(r)));return a.join("&")}function c(e,t,r){var a=e[t];void 0===a?e[t]=r:Array.isArray(a)?a.push(r):e[t]=[a,r]}function u(e){for(var t,r,a=e.length,n=0;a>n;++n)if(r=e[n],"]"==r&&(t=!1),"["==r&&(t=!0),"="==r&&!t)return n}function f(e){try{return decodeURIComponent(e.replace(/\+/g," "))}catch(t){return e}}var d=Object.prototype.toString,h=/^[0-9]+$/,p=function(e,t){return Array.isArray(e)?o(e,t):"[object Object]"==d.call(e)?s(e,t):"string"==typeof e?i(e,t):t+"="+encodeURIComponent(String(e))};return{parse:function(e){return null==e||""==e?{}:"object"==typeof e?a(e):n(e)},stringify:p}}()});
define("util/uuid_v2.js",["jquery","util"],function(e,t){function r(t){var r=o.Deferred();return e.async(["util/"+t+".js"],function(e){var t=e.get(u);t?r.resolve(t):r.reject()}),r}function n(t,r){e.async(["util/"+r+".js"],function(e){"cookie"===r?e.set(u,t,{expires:d,path:"/",domain:f}):e.set(u,t)})}function a(){function e(e){for(var t="",r=e.length;r>0;)r--,t+=e.substr(r,1);return t}var t,r=+new Date,n=s(1e7,99999999);return t=e(r+""+s(1,9)),t=1*t+n+""+n}var i,o=e("jquery"),s=e("util").math.random,c=t,u="eqs_uuid",f="273.cn",d=365,l="eqs_uuid_switch",h=["cookie","winame","storage","cache","flash_cookie"],p={};c.detect=function(){var t,s,c=o.Deferred(),u=[];return e.async(["util/cookie.js"],function(e){e.get(l)||(u=h.map(function(e){return r(e).done(function(t){p[e]=t}).fail(function(){c.done(function(t){n(t,e)})})}),t=u.length,s=window.setInterval(function(){o.each(u,function(e,r){if("pending"===r.state())return!1;if(e===t-1){for(var n=h.length-1;n>=0&&!i;n--)i=p[h[n]];c.resolve(i||(i=a())),window.clearInterval(s)}})},200),e.set(l,1,{path:"/",domain:f}))}),c},c.get=function(){var e=o.Deferred();return i?e.resolve(i):(h.reduce(function(t,i,o,s){return(t||r(i)).then(function(t){e.resolve(t)},function(){var t=s[o+1];return e.done(function(e){n(e,i)}),t?r(t):(e.resolve(a()),void 0)})},null),e.done(function(e){i=e}),e)}});
define("util/winame.js",[],function(e,t){var r=t,n=function(e){try{var t=e.name||"{}";t=JSON.parse(t)}catch(r){t={}}return t};r.get=function(e,t){t||(t=window);var r=n(t);return r[e]||!1},r.set=function(e,t,r){r||(r=window);var a=n(r);a[e]=t;try{a=JSON.stringify(a),r.name=a}catch(i){return!1}return!0},r.remove=function(e){win||(win=window);var t=n(win);delete t[e];try{t=JSON.stringify(t),win.name=t}catch(r){return!1}return!0},r.clear=function(e){e||(e=window);try{e.name="{}"}catch(t){return!1}return!0}});
define("lib/widget/widget.js",["jquery","lib/event/event.js"],function(e,t){var n=e("jquery");e("lib/event/event.js");var r=t.initWidget=function(e){var t=n(e),r=t.data(),i=n.trim(r.widget)||"",a={};r.$el=t,t.find("[data-role]").each(function(){var e=n(this).data("role");a[e]||(a[e]=[]),a[e].push(this)}),n.each(a,function(e,t){r["$"+e]=n(t)}),n.each(i.split(/[,\s]+/),function(e,t){if(!t)return!0;var n,i=t;-1!==t.indexOf("#")&&(t=t.split("#"),i=t[0],n=t[1]),G.use([i],function(e){n&&(e=e[n]),e(r)})})};t.initWidgets=function(){n("[data-widget]").each(function(){r(this)})},t.define=function(e){e=n.extend({name:"",attrs:{},events:{},init:function(){}},e);var t=/^(\S+)\s*(.*)$/,r=function(t){if(n.extend(this,e,t||{}),0===this.$el.size())throw new Error("el is incorrect")};return r.prototype.delegateEvents=function(e){var r=this,i=this.$el;e=e||this.events||{},n.each(e,function(e,a){var o=e.match(t);if(o){var s=o[1],c=o[2]||void 0,u=function(){return n.isFunction(a)?a.apply(r,[].slice.apply(arguments)):r[a].apply(r,[].slice.apply(arguments))};c?i.on(s,c,u):i.on(s,u)}})},r.prototype.getAttr=function(e){return e?this.attrs[e]||null:this.attrs},function(t){var i=t.$el||(t.$el=n(t.el)),a=e.name,o=i.data(a);return o||(o=new r(t),o.delegateEvents(),o.init(),a&&i.data(a,o[a]||o)),o[a]||o}},t.template=function(e,t){var n=new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+e.replace(/[\r\t\n]/g," ").split("<%").join("	").replace(/((^|%>)[^\t]*)'/g,"$1\r").replace(/\t=(.*?)%>/g,"',$1,'").split("	").join("');").split("%>").join("p.push('").split("\r").join("\\'")+"');}return p.join('');");return t?n(t):n}});
define("lib/event/event.js",[],function(e,t,n){function r(){}var i=/\s+/;r.prototype.on=function(e,t,n){var r,a,o;if(!t)return this;for(r=this.__events||(this.__events={}),e=e.split(i);a=e.shift();)o=r[a]||(r[a]=[]),o.push(t,n);return this},r.prototype.off=function(e,t,n){var r,a,o,s;if(!(r=this.__events))return this;if(!(e||t||n))return delete this.__events,this;for(e=e?e.split(i):Object.keys(r);a=e.shift();)if(o=r[a])if(t||n)for(s=o.length-2;s>=0;s-=2)t&&o[s]!==t||n&&o[s+1]!==n||o.splice(s,2);else delete r[a];return this},r.prototype.trigger=function(e){var t,n,r,a,o,s,c,u=[];if(!(t=this.__events))return this;for(e=e.split(i),o=1,s=arguments.length;s>o;o++)u[o-1]=arguments[o];for(;n=e.shift();){if((r=t.all)&&(r=r.slice()),(a=t[n])&&(a=a.slice()),a)for(o=0,s=a.length;s>o;o+=2)a[o].apply(a[o+1]||this,u);if(r)for(c=[n].concat(u),o=0,s=r.length;s>o;o+=2)r[o].apply(r[o+1]||this,c)}return this},r.prototype.emit=r.prototype.trigger,r.mixTo=function(e){e=e.prototype||e;var t=r.prototype;for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n])},n.exports=r});
define("lib/jquery/plugin/jquery.lazyload.js",["jquery"],function(e,t,n){var r=e("jquery"),i=r(window),o=function(e){var t=r(e.el);if(!t.size())throw new Error("el is incorrect");delete e.el,t.lazyload(e)};r.fn.lazyload=function(e){function t(){var e=0;o.each(function(){var t=r(this);(!a.skip_invisible||t.is(":visible"))&&(r.abovethetop(this,a)||r.leftofbegin(this,a)||r.belowthefold(this,a)||r.rightoffold(this,a)||(t.trigger("appear"),e=0))})}var n,o=this,a={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:window,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return e&&(void 0!==e.failurelimit&&(e.failure_limit=e.failurelimit,delete e.failurelimit),void 0!==e.effectspeed&&(e.effect_speed=e.effectspeed,delete e.effectspeed),r.extend(a,e)),n=void 0===a.container||a.container===window?i:r(a.container),0===a.event.indexOf("scroll")&&n.bind(a.event,function(){return t()}),this.each(function(){var e=this,t=r(e);e.loaded=!1,t.one("appear",function(){if(!this.loaded){if(a.appear){var n=o.length;a.appear.call(e,n,a)}r("<img />").bind("load",function(){t.hide().attr("src",t.data(a.data_attribute))[a.effect](a.effect_speed),e.loaded=!0;var n=r.grep(o,function(e){return!e.loaded});if(o=r(n),a.load){var i=o.length;a.load.call(e,i,a)}}).attr("src",t.data(a.data_attribute))}}),0!==a.event.indexOf("scroll")&&t.bind(a.event,function(){e.loaded||t.trigger("appear")})}),i.bind("resize",function(){t()}),/iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion)&&i.bind("pageshow",function(e){e.originalEvent&&e.originalEvent.persisted&&o.each(function(){r(this).trigger("appear")})}),r(document).ready(function(){t()}),this},r.belowthefold=function(e,t){var n;return n=void 0===t.container||t.container===window?i.height()+i.scrollTop():r(t.container).offset().top+r(t.container).height(),n<=r(e).offset().top-t.threshold},r.rightoffold=function(e,t){var n;return n=void 0===t.container||t.container===window?i.width()+i.scrollLeft():r(t.container).offset().left+r(t.container).width(),n<=r(e).offset().left-t.threshold},r.abovethetop=function(e,t){var n;return n=void 0===t.container||t.container===window?i.scrollTop():r(t.container).offset().top,n>=r(e).offset().top+t.threshold+r(e).height()},r.leftofbegin=function(e,t){var n;return n=void 0===t.container||t.container===window?i.scrollLeft():r(t.container).offset().left,n>=r(e).offset().left+t.threshold+r(e).width()},r.inviewport=function(e,t){return!(r.rightoffold(e,t)||r.leftofbegin(e,t)||r.belowthefold(e,t)||r.abovethetop(e,t))},r.extend(r.expr[":"],{"below-the-fold":function(e){return r.belowthefold(e,{threshold:0})},"above-the-top":function(e){return!r.belowthefold(e,{threshold:0})},"right-of-screen":function(e){return r.rightoffold(e,{threshold:0})},"left-of-screen":function(e){return!r.rightoffold(e,{threshold:0})},"in-viewport":function(e){return r.inviewport(e,{threshold:0})},"above-the-fold":function(e){return!r.belowthefold(e,{threshold:0})},"right-of-fold":function(e){return r.rightoffold(e,{threshold:0})},"left-of-fold":function(e){return!r.rightoffold(e,{threshold:0})}}),n.exports=o});
define("widget/autocomplete/autocomplete_v2.js",["jquery","util","./data_source.js","lib/widget/widget.js","widget/autocomplete/autocomplete.css"],function(e,t,i){var n=e("jquery"),r=e("util").ua,o=e("./data_source.js"),a=e("lib/widget/widget.js");e("widget/autocomplete/autocomplete.css");var s={el:"",classPrefix:"ui-autocomplete",template:'<div class="<%= classPrefix %>" ><ul class="<%= classPrefix %>-items" data-role="items"><% items.forEach (function (item) {%><li class="<%= classPrefix %>-item"><a href="javascript:;" data-role="item" data-value="<%= item.value %>"><%= item.text || item.value %></a></li><% }); %></ul></div>',inFilter:function(e){return n.trim(e)},outFilter:function(e){return e},dataSource:[],delay:200,position:{x:0,y:1},width:0,zIndex:99,max:0,overflow:0,disabled:!1,placeholder:"",selectFirst:!1,selectOnBlur:!1,submitOnEnter:!0,hightLight:!1,params:{},cacheAble:!1,focusAble:!0,onItemSelect:function(e){this.$el.val(e.value||"")}},c=function(e){!e&&(e={});var t,i=n(e.el);if(!i.length)throw new Error("argument[el] is incorrect");t=n.extend({},s,e),e.position&&(t.position=n.extend({},s.position,e.position)),e.width||(t.width=i.outerWidth()),this.$el=i,this.config=t,this._init()};c.prototype={constructor:c,$:function(e){var t=this.$list;return t?t.find(e):n()},_init:function(){var e=this.config;this.model={classPrefix:e.classPrefix,items:[]},this.template=a.template(e.template),this.cache={},this.dataSource=new o({source:e.dataSource,params:e.params}),this.query="",this._createDom()._bindDom()},_createDom:function(){var e=this.config,t=n(this._compile()),i=n(document.body);return t.css({width:e.width,zIndex:e.zIndex}),6==r.ie&&t.prepend('<iframe style="position:absolute;left:0;top:0;width:100%;height:100%;z-index:-1;border:0 none;filter:alpha(opacity=0)"></iframe>'),i.append(t),this.$list=t,this.$items=n(),this.$item=n(),this},_bindDom:function(){var e=this.$el,t=this.$list,i=this,r=this.config,o=r.placeholder,a=r.classPrefix,s=r.focusAble;!n.trim(e.val())&&o&&e.val(o),e.attr("autocomplete","off").on("focus.autocomplete",function(){var t=n.trim(e.val());t===o&&e.val("")}).on("blur.autocomplete",function(){if(i._secondKeydown)i._firstKeydown?(s&&e.trigger("focus.autocomplete"),i.hide()):s&&e.trigger("focus.autocomplete");else{var t=n.trim(e.val());t||e.val(o),r.selectOnBlur&&i.$item.trigger("mousedown"),i.hide()}i._firstKeydown=void 0,i._secondKeydown=void 0}).on("keydown.autocomplete",n.proxy(this._keydownEvent,this)).on("keyup.autocomplete",n.proxy(this._keyupEvent,this)),t.on("mousedown.autocomplete","[data-role=item]",function(e){$item=i.$item,0===$item.length&&($item=n(e.currentTarget),i.$item=$item),i._secondKeydown=void 0,i._firstKeydown=!0,i._selectItem()}).on("mousedown.autocomplete",function(){i._secondKeydown=!0}).on("mouseenter.autocomplete","[data-role=item]",function(e){$item=i.$item,$item.removeClass(a+"-item-hover"),$item=n(e.currentTarget),$item.addClass(a+"-item-hover"),i.$item=$item}),n(window).on("resize.autocomplete",function(){i._position()})},_compile:function(){return this.template(this.model)},_selectItem:function(){var e,t=this.$item,i=this.$items,r=i.index(t),o=this.config,a=this.model.items[r]||t.data();n.isFunction(e=o.onItemSelect)&&e.call(this,a)},_keydownEvent:function(e){switch(e.which){case 13:this._keyEnter(e);break;case 27:this._keyEsc();break;case 37:break;case 38:this._keyUp();break;case 39:break;case 40:this._keyDown();break;default:this.tag=!0}},_keyEsc:function(){this.config.selectOnBlur&&this.$item.trigger("mousedown"),this.hide()},_keyupEvent:function(){var e=this,t=this.config;this.tag&&(this._timeout&&clearTimeout(this._timeout),e.tag=void 0,this._timeout=setTimeout(function(){e._timeout=void 0,e._getData()},t.delay))},_getData:function(){var e=this,t="",i=this.config,n=i.inFilter.call(this,this.$el.val())||"";n?i.cacheAble&&(t=this.cache[n])?e._updateDom(t):n===this.query||this.dataSource.abort().getData(n).done(function(t){e._processData(t,n),e._updateDom(),e.query=""}):e._updateDom(t),this.query=n},_processData:function(e,t){var i=this.config,r=i.max,o=i.hightLight,a=i.classPrefix;if(!n.isArray(e))throw new Error("dataSource must be an Array");e=i.outFilter.call(this,e,t),r>0&&(e=e.slice(0,r)),e=e.map(function(e){return n.isPlainObject(e)||(e={value:e}),o&&!e.text&&(e.text=e.value.replace(new RegExp("("+t+")","g"),'<span class="'+a+'-item-hl">$1</span>')),e}),this.model.items=e},_updateDom:function(e){var t,i,r,o=this.config,a=o.overflow,s="[data-role=items]";if(null==e){if(t=n(this._compile()),i=t.find(s),!i.length)throw new Error("attribute[data-role=items] is missing");e=i.html(),o.cacheAble&&(this.cache[this.query]=e)}this.$(s).html(e),r=this.$("[data-role=item]");var c=r.length,u=r.height();return e?(a>0&&c>a?this.$list.css({overflowY:"scroll",height:u*a}):this.$list.css({overflowY:"visible",height:u*c}),o.selectFirst&&n(r[0]).trigger("mouseenter"),this.show()):this.hide(),this.$items=r,this},_keyEnter:function(e){this.$items.length>0&&this.isVisible()&&(this.$item.trigger("mousedown"),this.hide()),(!n.trim(this.$el.val())||0!==this.$item.length||!this.config.submitOnEnter&&0===this.$item.length)&&e.preventDefault()},_keyUp:function(){this.$items.length&&(this.isVisible()?this._step(-1):this.show())},_keyDown:function(){this.$items.length&&(this.isVisible()?this._step(1):this.show())},_step:function(e){var t=this.$items,i=this.$item,r=t.index(i),o=t.length;1===e?r=++r%o:-1===e&&(r=--r,0>r&&(r+=o)),n(t[r]).trigger("mouseenter")},_position:function(){var e=this.config,t=e.position,i=this.$el,n=this.$list,r=i.offset();n.width()||n.css("width",i.outerWidth()),n.css({left:r.left+t.x,top:r.top+i.outerHeight()+t.y})},hide:function(){return this.$list.css({visibility:"hidden",top:-999,left:-999}),this},show:function(){return this._position(),this.$list.css("visibility","visible"),this},clear:function(){this.$items=n(),this.$item=n()},isVisible:function(){return"visible"===this.$list.css("visibility")?!0:!1}},i.exports=c});
define("widget/autocomplete/data_source.js",["jquery","lib/widget/widget.js"],function(e,t,i){var n=e("jquery"),r=e("lib/widget/widget.js"),o=function(e){!e&&(e={}),this.config=e,this._init()};o.prototype={constructor:o,_init:function(){var e=this.config,t=e.source;if("string"==typeof t)this.type="Url";else if(n.isArray(t))this.type="Array";else{if(!n.isFunction(t))throw new Error("argument[source] is not supported");this.type="Function"}this.source=t,this.params=e.params||{},this.qid=0,this.queue={}},getData:function(e){var t=n.Deferred();return this["_get"+this.type+"Data"](e,t),t},_getUrlData:function(e,t){var i={query:encodeURIComponent(e),timestamp:(new Date).getTime()},o=r.template(this.source,i),a=this,s={},c=this.qid++,u=n.param(n.isPlainObject(this.params)?this.params:this.params()||{});u&&(o+=o.indexOf("?")>-1?"&":"?",o+=u),s.dataType=/^(https?:\/\/)/.test(o)?"jsonp":"json",this.queue[c]=!0,n.ajax(o,s).done(function(e){a.queue[c]&&(t.resolve(e),delete a.queue[c])}).fail(function(){a.queue[c]&&(t.reject(i),delete a.queue[c])})},_getArrayData:function(e,t){t.resolve(this.source)},_getFunctionData:function(e,t){this.source.call(this,e,t)},abort:function(){return this.queue={},this}},i.exports=o});
define("app/v3/js/common/common.js",["jquery","util/cookie.js"],function(e,t){var i=t,n=e("jquery"),r=e("util/cookie.js");i.sinput=function(e){var t=n(e),i=t.val();t.css("color","#aaa"),t.focus(function(){var e=n(this).val();e==i&&(n(this).val(""),n(this).css("color","#333"))}),t.blur(function(){var e=n(this).val();""==e&&(n(this).val(i),n(this).css("color","#aaa"))})},i.focusInput=function(e,t){var i=n(e);null==t&&(t=i.val()),i.val()==t?i.css("color","#aaa"):i.css("color","#333"),i.focus(function(){var e=n(this).val();e==t&&(n(this).val(""),n(this).css("color","#333"))}),i.blur(function(){var e=n(this).val();""==e&&(n(this).val(t),n(this).css("color","#aaa"))})},i.auth=function(){var e=r.get("MEMBER_TYPE"),t=r.get("MEMBER_NAME");return e&&t&&0!=e&&0!=t?{member_type:e,username:t}:!1},i.isUndefined=function(e){return"undefined"==typeof e},i.isNumber=function(e){var t=/^[\d|\.|,]+$/;return t.test(e)},i.setCookie=function(e,t,n,r,o,a){if(i.isUndefined(document.cookie))return!1;n=i.isNumber(n)?parseInt(n):0,0>n&&(t="");var s=new Date;return s.setTime(s.getTime()+1e3*n),document.cookie=e+"="+encodeURIComponent(t)+(n?"; expires="+s.toGMTString():"")+"; path="+(r||"/")+"; domain="+(o||"273.cn")+(a?"; secure":""),!0}});
define("app/v3/js/common/header.js",["jquery","app/v3/js/common/common"],function(e,t){var i=t,n=e("jquery"),r=e("app/v3/js/common/common");i.init=function(){i.userInfo()},i.userInfo=function(){var e=r.auth();if(e){var t=n("#logined");n(".nologin").hide(),t.find("#login-username").html("您好，"+e.username),t.show()}}});
define("app/common/hover.js",["jquery"],function(e,t,i){var n=e("jquery");i.exports=function(e,t){t=t||{};var e=n(e),i=n(t.target);if(e.size()){var r=t.enter&&n.isFunction(t.enter)?t.enter:null,o=t.leave&&n.isFunction(t.leave)?t.leave:null;e.hover(function(t){r&&r.apply(e,[t]),i.show(),e.addClass("on")},function(t){o&&o.apply(e,[t]),i.hide(),e.removeClass("on")})}}});
define("app/ms_v2/js/base.js",["jquery","util/log_v2.js","util/uuid_v2.js","lib/widget/widget.js","app/common/hover.js","widget/autocomplete/autocomplete_v2.js","util/cookie.js","app/ms_v2/tpl/nav_link.tpl"],function(e,t){var n=e("jquery"),r=e("util/log_v2.js"),o=e("util/uuid_v2.js"),a=e("lib/widget/widget.js"),s=e("app/common/hover.js"),c=e("widget/autocomplete/autocomplete_v2.js"),u=e("util/cookie.js"),l=e("app/ms_v2/tpl/nav_link.tpl"),f=t;f.log=null,f.favor=function(t){var i=t.$el;i.on("click",function(){e.async(["app/common/favorite.js"],function(e){e.add()})})},f.nav=function(e){var t=e.$el,i=e.$target;s(t,{target:i}),$navLinks=t.find(".navlinks_dl"),t.hover(function(){0==$navLinks.children().length&&t.find(".navlinks_dl").html(l({}))})},f.scrollTop=function(e){var t=e.$el,i=t.find(".js-uptop"),r=n(window);r.on("scroll",function(){r.scrollTop()>window.screen.availHeight?i.show():i.hide()}),i.click(function(){n("html, body").animate({scrollTop:"0px"},500)}),r.scroll()},f.changeCity=function(e){function t(){var e=s.children().length;e?(a.addClass("city_on"),s.css("display","block")):n.ajax({type:"GET",url:"/ajax.php?module=change_city",data:{province:a.attr("province"),name:a.attr("domainName")},dataType:"JSON",success:function(e){var t="";t=o(e,a.attr("flagCityList")),s.append(t),a.addClass("city_on"),s.css("display","block")}})}function r(){s.css("display","none"),a.removeClass("city_on")}function o(e,t){var n="",r=0!=t.length?t:"/";if(e.city.length){for(n+='<dl class="d1 clearfix" data-273-click-log="/city@etype=click@city=zbcs">',n+="<dt>周边省市</dt>",i=0,count=e.city.length;count>i;i++)n+=e.city[i].name==e.currentName?'<dd><a class="current" data-273-click-log="/city@etype=click@city='+e.city[i].domain+'" title="'+e.city[i].name+'" href="http://'+e.city[i].domain+".273.cn"+r+'">'+e.city[i].name.substring(0,4)+"</a></dd>":'<dd><a data-273-click-log="/city@etype=click@city='+e.city[i].domain+'" title="'+e.city[i].name+'" href="http://'+e.city[i].domain+".273.cn"+r+'">'+e.city[i].name.substring(0,4)+"</a></dd>";n+="</dl>"}if(e.hot.length){for(n+='<dl class="clearfix" data-273-click-log="/city@etype=click@city=rmcs">',n+="<dt>热门省市</dt>",i=0,count=e.hot.length;count>i;i++)n+='<dd><a data-273-click-log="/city@etype=click@city='+e.hot[i].domain+'" title="'+e.hot[i].name+'" href="http://'+e.hot[i].domain+".273.cn"+r+'">'+e.hot[i].name.substring(0,4)+"</a></dd>";n+="</dl>"}return n+='<div class="more"><a data-273-click-log="/city@etype=click@city=more" href="http://www.273.cn'+r+'city.html">更多省市</a></div>'}var a=e.$el,s=a.find(".down"),c=null;a.hover(function(){c=setTimeout(t,200)},function(){clearTimeout(c),r()})},f.autoComplete=function(e){var t=e.type||1,i=e.$el,r=i.find("#keywords");if(1==t){r.focus(function(){n(this).parent().addClass("click_input")}),r.blur(function(){n(this).parent().removeClass("click_input")});var o=372,a="请输入车辆名称 如：别克 或 别克 君威",s='<div class="auto-custom" ><ul class="auto-custom-items" data-role="items"><% items.forEach (function (item) {%><li class="auto-custom-item" data-eqselog="/top@etype=click@search=<%= item.text %>" data-role="item" data-value="<%= item.value %>"><a href="javascript:;"><%= item.text || item.value %></a><span>约<%= item.count %>条车源</span></li><% }); %></ul></div>'}else var o=208,a="输入信息编号、车源关键字",s='<div class="auto-custom" ><ul class="auto-custom-items" data-role="items"><% items.forEach (function (item) {%><li class="auto-custom-item" data-eqselog="/top/shop@etype=click@search=<%= item.text %>" data-role="item" data-value="<%= item.value %>"><a href="javascript:;"><%= item.text || item.value %></a></li><% }); %></ul></div>';i.find("form").submit(function(){if(!r.val()||r.val()==a)return!1;var e="/top@etype=click@search="+r.val();f.log.sendTrack(e)}),new c({el:"#keywords",width:o,placeholder:a,dataSource:"http://data.273.cn/?_mod=AutoCompleteV2&wd=<%=query%>",dataType:"jsonp",template:s,onItemSelect:function(e){window.location.href=e.value},params:function(){var e={domain:n("#search_domain").val()||"www"};return e}}),n(".auto-custom").delegate("li.auto-custom-item","hover",function(){n(this).addClass("on").siblings().removeClass("on")})},f.bdshare=function(e){var t=e.$el,i=document;window.bds_config={bdText:"#273二手车交易网#"+document.title},t.attr("id","bdshare");var n=i.createElement("script"),r=i.createElement("script"),o="http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion="+Math.ceil(new Date/36e5);n.setAttribute("type","text/javascript"),n.setAttribute("id","bdshare_js"),n.setAttribute("data","type=button&amp;uid=688050"),r.setAttribute("type","text/javascript"),r.setAttribute("id","bdshell_js");var a=i.getElementsByTagName("head")[0];a.appendChild(n),a.appendChild(r),r.src=o},f.auth=function(){var e=u.get("MEMBER_TYPE"),t=u.get("MEMBER_NAME");return e&&t&&0!=e&&0!=t?{member_type:e,username:t}:!1};var d=function(){var e=f.auth();if(e){var t=n("#logined");n(".nologin").hide(),t.find("#login-username").html("您好，"+e.username),t.show()}};f.footerJs=function(e){var t=e.$el,i=t.find(".js_link_title"),r=t.find(".js_link_detail");i.each(function(e){var t=n(i[e]),o=n(r[e]);t.click(function(){o.addClass("on"),r.not(o).removeClass("on"),i.not(t).removeClass("on"),t.addClass("on")})})},f.hotVehicle=function(e){var t=e.$el,i=t.find(".letter a"),r=t.find(".last ul");t.find(".last ul li a").attr("target","_blank"),i.each(function(e){var t=n(this),i=n(r[e]);t.hasClass("more")||t.hover(function(){i.show().css("margin-left","-10px"),r.not(i).hide(),t.siblings(".current").removeClass("current"),t.addClass("current")})})},f.showIcon=function(e){var t=e.$el;t.delegate("ul li .price .down","hover",function(e){"mouseenter"==e.type?n(this).find(".down_bg").show():n(this).find(".down_bg").hide()})},f.jsLinks=function(e){var t=e.$el;t.delegate("[data-jslink]","click",function(e){var t=n(this),i=n(e.target),r=i.data("flag");if(!r){var o=t.data("target"),a=t.data("jslink"),s=t.attr("data-eqselog");return s&&(s+="@href="+a,f.log.sendTrack(s)),a&&("_blank"==o?window.open(a):window.location.href=a),!1}})},f.adBanner=function(e){var t=e.$el,i=t.find(".js-close");i.click(function(){t.slideUp()})};var h=function(e){f.log=new r(e||{}),f.log.bindTrackEvent(),r.initBdTrack(),r.initGgTrack(),f.log.trackPageView()};f.init=function(e){d(),n("#daohang li a").attr("target","_blank"),e||(e={}),a.initWidgets(),h(e),setTimeout(function(){o.detect()},1e3)}});