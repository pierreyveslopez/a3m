!function(window,document,undefined){function is(e,t){return typeof e===t}function testRunner(){var e,t,n,r,o,i,a;for(var d in tests)if(tests.hasOwnProperty(d)){if(e=[],t=tests[d],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(r=is(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)i=e[o],a=i.split("."),1===a.length?Modernizr[a[0]]=r:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=r),classes.push((r?"":"no-")+a.join("-"))}}function setClasses(e){var t=docElement.className,n=Modernizr._config.classPrefix||"";if(isSVG&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),isSVG?docElement.className.baseVal=t:docElement.className=t)}function addTest(e,t){if("object"==typeof e)for(var n in e)hasOwnProp(e,n)&&addTest(n,e[n]);else{e=e.toLowerCase();var r=e.split("."),o=Modernizr[r[0]];if(2==r.length&&(o=o[r[1]]),"undefined"!=typeof o)return Modernizr;t="function"==typeof t?t():t,1==r.length?Modernizr[r[0]]=t:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=t),setClasses([(t&&0!=t?"":"no-")+r.join("-")]),Modernizr._trigger(e,t)}return Modernizr}function contains(e,t){return!!~(""+e).indexOf(t)}function createElement(){return"function"!=typeof document.createElement?document.createElement(arguments[0]):isSVG?document.createElementNS.call(document,"http://www.w3.org/2000/svg",arguments[0]):document.createElement.apply(document,arguments)}function getBody(){var e=document.body;return e||(e=createElement(isSVG?"svg":"body"),e.fake=!0),e}function injectElementWithStyles(e,t,n,r){var o,i,a,d,s="modernizr",l=createElement("div"),c=getBody();if(parseInt(n,10))for(;n--;)a=createElement("div"),a.id=r?r[n]:s+(n+1),l.appendChild(a);return o=createElement("style"),o.type="text/css",o.id="s"+s,(c.fake?c:l).appendChild(o),c.appendChild(l),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(document.createTextNode(e)),l.id=s,c.fake&&(c.style.background="",c.style.overflow="hidden",d=docElement.style.overflow,docElement.style.overflow="hidden",docElement.appendChild(c)),i=t(l,e),c.fake?(c.parentNode.removeChild(c),docElement.style.overflow=d,docElement.offsetHeight):l.parentNode.removeChild(l),!!i}function domToCSS(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function nativeTestProps(e,t){var n=e.length;if("CSS"in window&&"supports"in window.CSS){for(;n--;)if(window.CSS.supports(domToCSS(e[n]),t))return!0;return!1}if("CSSSupportsRule"in window){for(var r=[];n--;)r.push("("+domToCSS(e[n])+":"+t+")");return r=r.join(" or "),injectElementWithStyles("@supports ("+r+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return undefined}function cssToDOM(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function testProps(e,t,n,r){function o(){a&&(delete mStyle.style,delete mStyle.modElem)}if(r=is(r,"undefined")?!1:r,!is(n,"undefined")){var i=nativeTestProps(e,n);if(!is(i,"undefined"))return i}for(var a,d,s,l,c,u=["modernizr","tspan"];!mStyle.style;)a=!0,mStyle.modElem=createElement(u.shift()),mStyle.style=mStyle.modElem.style;for(s=e.length,d=0;s>d;d++)if(l=e[d],c=mStyle.style[l],contains(l,"-")&&(l=cssToDOM(l)),mStyle.style[l]!==undefined){if(r||is(n,"undefined"))return o(),"pfx"==t?l:!0;try{mStyle.style[l]=n}catch(p){}if(mStyle.style[l]!=c)return o(),"pfx"==t?l:!0}return o(),!1}function fnBind(e,t){return function(){return e.apply(t,arguments)}}function testDOMProps(e,t,n){var r;for(var o in e)if(e[o]in t)return n===!1?e[o]:(r=t[e[o]],is(r,"function")?fnBind(r,n||t):r);return!1}function testPropsAll(e,t,n,r,o){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+cssomPrefixes.join(i+" ")+i).split(" ");return is(t,"string")||is(t,"undefined")?testProps(a,t,r,o):(a=(e+" "+domPrefixes.join(i+" ")+i).split(" "),testDOMProps(a,t,n))}function testAllProps(e,t,n){return testPropsAll(e,undefined,undefined,t,n)}var tests=[],ModernizrProto={_version:"3.2.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){tests.push({name:e,fn:t,options:n})},addAsyncTest:function(e){tests.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=ModernizrProto,Modernizr=new Modernizr;var classes=[],hasOwnProp;!function(){var e={}.hasOwnProperty;hasOwnProp=is(e,"undefined")||is(e.call,"undefined")?function(e,t){return t in e&&is(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}();var docElement=document.documentElement,isSVG="svg"===docElement.nodeName.toLowerCase();ModernizrProto._l={},ModernizrProto.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},ModernizrProto._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,r;for(e=0;e<n.length;e++)(r=n[e])(t)},0),delete this._l[e]}},Modernizr._q.push(function(){ModernizrProto.addTest=addTest});var html5;isSVG||!function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=T.elements;return"string"==typeof e?e.split(" "):e}function o(e,t){var n=T.elements;"string"!=typeof n&&(n=n.join(" ")),"string"!=typeof e&&(e=e.join(" ")),T.elements=n+" "+e,l(t)}function i(e){var t=z[e[w]];return t||(t={},M++,e[w]=M,z[M]=t),t}function a(e,n,r){if(n||(n=t),h)return n.createElement(e);r||(r=i(n));var o;return o=r.cache[e]?r.cache[e].cloneNode():g.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!o.canHaveChildren||b.test(e)||o.tagUrn?o:r.frag.appendChild(o)}function d(e,n){if(e||(e=t),h)return e.createDocumentFragment();n=n||i(e);for(var o=n.frag.cloneNode(),a=0,d=r(),s=d.length;s>a;a++)o.createElement(d[a]);return o}function s(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return T.shivMethods?a(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-:]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(T,t.frag)}function l(e){e||(e=t);var r=i(e);return!T.shivCSS||v||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),h||s(e,r),e}function c(e){for(var t,n=e.getElementsByTagName("*"),o=n.length,i=RegExp("^(?:"+r().join("|")+")$","i"),a=[];o--;)t=n[o],i.test(t.nodeName)&&a.push(t.applyElement(u(t)));return a}function u(e){for(var t,n=e.attributes,r=n.length,o=e.ownerDocument.createElement(x+":"+e.nodeName);r--;)t=n[r],t.specified&&o.setAttribute(t.nodeName,t.nodeValue);return o.style.cssText=e.style.cssText,o}function p(e){for(var t,n=e.split("{"),o=n.length,i=RegExp("(^|[\\s,>+~])("+r().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),a="$1"+x+"\\:$2";o--;)t=n[o]=n[o].split("}"),t[t.length-1]=t[t.length-1].replace(i,a),n[o]=t.join("}");return n.join("{")}function f(e){for(var t=e.length;t--;)e[t].removeNode()}function m(e){function t(){clearTimeout(a._removeSheetTimer),r&&r.removeNode(!0),r=null}var r,o,a=i(e),d=e.namespaces,s=e.parentWindow;return!S||e.printShived?e:("undefined"==typeof d[x]&&d.add(x),s.attachEvent("onbeforeprint",function(){t();for(var i,a,d,s=e.styleSheets,l=[],u=s.length,f=Array(u);u--;)f[u]=s[u];for(;d=f.pop();)if(!d.disabled&&E.test(d.media)){try{i=d.imports,a=i.length}catch(m){a=0}for(u=0;a>u;u++)f.push(i[u]);try{l.push(d.cssText)}catch(m){}}l=p(l.reverse().join("")),o=c(e),r=n(e,l)}),s.attachEvent("onafterprint",function(){f(o),clearTimeout(a._removeSheetTimer),a._removeSheetTimer=setTimeout(t,500)}),e.printShived=!0,e)}var v,h,y="3.7.3",A=e.html5||{},b=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,g=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,w="_html5shiv",M=0,z={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",v="hidden"in e,h=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){v=!0,h=!0}}();var T={elements:A.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",version:y,shivCSS:A.shivCSS!==!1,supportsUnknownElements:h,shivMethods:A.shivMethods!==!1,type:"default",shivDocument:l,createElement:a,createDocumentFragment:d,addElements:o};e.html5=T,l(t);var E=/^$|\b(?:all|print)\b/,x="html5shiv",S=!h&&function(){var n=t.documentElement;return!("undefined"==typeof t.namespaces||"undefined"==typeof t.parentWindow||"undefined"==typeof n.applyElement||"undefined"==typeof n.removeNode||"undefined"==typeof e.attachEvent)}();T.type+=" print",T.shivPrint=m,m(t),"object"==typeof module&&module.exports&&(module.exports=T)}("undefined"!=typeof window?window:this,document);var modElem={elem:createElement("modernizr")};Modernizr._q.push(function(){delete modElem.elem});var mStyle={style:modElem.elem.style};Modernizr._q.unshift(function(){delete mStyle.style});var testProp=ModernizrProto.testProp=function(e,t,n){return testProps([e],undefined,t,n)};Modernizr.addTest("audio",function(){var e=createElement("audio"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType("audio/mpeg;").replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("canvas",function(){var e=createElement("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("canvastext",function(){return Modernizr.canvas===!1?!1:"function"==typeof createElement("canvas").getContext("2d").fillText}),Modernizr.addTest("customevent","CustomEvent"in window&&"function"==typeof window.CustomEvent),Modernizr.addTest("eventlistener","addEventListener"in window),Modernizr.addAsyncTest(function(){var e,t,n=function(e){e.fake&&e.parentNode&&e.parentNode.removeChild(e)},r=function(e,t){var n=!!e;if(n&&(n=new Boolean(n),n.blocked="blocked"===e),addTest("flash",function(){return n}),t&&s.contains(t)){for(;t.parentNode!==s;)t=t.parentNode;s.removeChild(t)}};try{t="ActiveXObject"in window&&"Pan"in new window.ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(o){}if(e=!("plugins"in navigator&&"Shockwave Flash"in navigator.plugins||t),e||isSVG)r(!1);else{var i,a,d=createElement("embed"),s=getBody();if(d.type="application/x-shockwave-flash",s.appendChild(d),docElement.appendChild(s),!("Pan"in d||t))return r("blocked",d),void n(s);i=function(){return docElement.contains(s)?(docElement.contains(d)?(a=d.style.cssText,""!==a?r("blocked",d):r(!0,d)):r("blocked"),void n(s)):(s=document.body||s,d=createElement("embed"),d.type="application/x-shockwave-flash",s.appendChild(d),setTimeout(i,1e3))},setTimeout(i,10)}}),Modernizr.addTest("contains",is(String.prototype.contains,"function")),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("history",function(){var e=navigator.userAgent;return-1===e.indexOf("Android 2.")&&-1===e.indexOf("Android 4.0")||-1===e.indexOf("Mobile Safari")||-1!==e.indexOf("Chrome")||-1!==e.indexOf("Windows Phone")?window.history&&"pushState"in window.history:!1});var omPrefixes="Moz O ms Webkit",cssomPrefixes=ModernizrProto._config.usePrefixes?omPrefixes.split(" "):[];ModernizrProto._cssomPrefixes=cssomPrefixes;var domPrefixes=ModernizrProto._config.usePrefixes?omPrefixes.toLowerCase().split(" "):[];ModernizrProto._domPrefixes=domPrefixes,ModernizrProto.testAllProps=testPropsAll;var atRule=function(e){var t,n=prefixes.length,r=window.CSSRule;if("undefined"==typeof r)return undefined;if(!e)return!1;if(e=e.replace(/^@/,""),t=e.replace(/-/g,"_").toUpperCase()+"_RULE",t in r)return"@"+e;for(var o=0;n>o;o++){var i=prefixes[o],a=i.toUpperCase()+"_"+t;if(a in r)return"@-"+i.toLowerCase()+"-"+e}return!1};ModernizrProto.atRule=atRule;var prefixed=ModernizrProto.prefixed=function(e,t,n){return 0===e.indexOf("@")?atRule(e):(-1!=e.indexOf("-")&&(e=cssToDOM(e)),t?testPropsAll(e,t,n):testPropsAll(e,"pfx"))},indexeddb=prefixed("indexedDB",window);Modernizr.addTest("indexeddb",!!indexeddb),indexeddb&&Modernizr.addTest("indexeddb.deletedatabase","deleteDatabase"in indexeddb);var inputElem=createElement("input"),inputattrs="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),attrs={};Modernizr.input=function(e){for(var t=0,n=e.length;n>t;t++)attrs[e[t]]=!!(e[t]in inputElem);return attrs.list&&(attrs.list=!(!createElement("datalist")||!window.HTMLDataListElement)),attrs}(inputattrs),Modernizr.addTest("placeholder","placeholder"in createElement("input")&&"placeholder"in createElement("textarea"));var hasEvent=function(e){function t(t,r){var o;return t?(r&&"string"!=typeof r||(r=createElement(r||"div")),t="on"+t,o=t in r,!o&&n&&(r.setAttribute||(r=createElement("div")),r.setAttribute(t,""),o="function"==typeof r[t],r[t]!==e&&(r[t]=e),r.removeAttribute(t)),o):!1}var n=!("onblur"in document.documentElement);return t}();ModernizrProto.hasEvent=hasEvent,Modernizr.addTest("inputsearchevent",hasEvent("search"));var inputtypes="search tel url email datetime date month week time datetime-local number range color".split(" "),inputs={};Modernizr.inputtypes=function(e){for(var t,n,r,o=e.length,i=":)",a=0;o>a;a++)inputElem.setAttribute("type",t=e[a]),r="text"!==inputElem.type&&"style"in inputElem,r&&(inputElem.value=i,inputElem.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(t)&&inputElem.style.WebkitAppearance!==undefined?(docElement.appendChild(inputElem),n=document.defaultView,r=n.getComputedStyle&&"textfield"!==n.getComputedStyle(inputElem,null).WebkitAppearance&&0!==inputElem.offsetHeight,docElement.removeChild(inputElem)):/^(search|tel)$/.test(t)||(r=/^(url|email|number)$/.test(t)?inputElem.checkValidity&&inputElem.checkValidity()===!1:inputElem.value!=i)),inputs[e[a]]=!!r;return inputs}(inputtypes),Modernizr.addTest("time","valueAsDate"in createElement("time")),Modernizr.addTest("performance",!!prefixed("performance",window)),Modernizr.addTest("queryselector","querySelector"in document&&"querySelectorAll"in document),Modernizr.addTest("webanimations","animate"in createElement("div")),Modernizr.addTest("svg",!!document.createElementNS&&!!document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),Modernizr.addTest("pointerevents",function(){var e=!1,t=domPrefixes.length;for(e=Modernizr.hasEvent("pointerdown");t--&&!e;)hasEvent(domPrefixes[t]+"pointerdown")&&(e=!0);return e}),Modernizr.addTest("dataview","undefined"!=typeof DataView&&"getFloat64"in DataView.prototype),Modernizr.addTest("video",function(){var e=createElement("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("vml",function(){var e,t=createElement("div"),n=!1;return isSVG||(t.innerHTML='<v:shape id="vml_flag1" adj="1" />',e=t.firstChild,e.style.behavior="url(#default#VML)",n=e?"object"==typeof e.adj:!0),n}),Modernizr.addTest("webintents",!!prefixed("startActivity",navigator)),Modernizr.addTest("webgl",function(){var e=createElement("canvas"),t="probablySupportsContext"in e?"probablySupportsContext":"supportsContext";return t in e?e[t]("webgl")||e[t]("experimental-webgl"):"WebGLRenderingContext"in window}),Modernizr.addTest("cors","XMLHttpRequest"in window&&"withCredentials"in new XMLHttpRequest),Modernizr.addTest("json","JSON"in window&&"parse"in JSON&&"stringify"in JSON);var newSyntax="CSS"in window&&"supports"in window.CSS,oldSyntax="supportsCSS"in window;Modernizr.addTest("supports",newSyntax||oldSyntax);var canvas=createElement("canvas");Modernizr.addTest("todataurljpeg",function(){return!!Modernizr.canvas&&0===canvas.toDataURL("image/jpeg").indexOf("data:image/jpeg")}),Modernizr.addTest("todataurlpng",function(){return!!Modernizr.canvas&&0===canvas.toDataURL("image/png").indexOf("data:image/png")}),Modernizr.addTest("todataurlwebp",function(){var e=!1;try{e=!!Modernizr.canvas&&0===canvas.toDataURL("image/webp").indexOf("data:image/webp")}catch(t){}return e}),Modernizr.addTest("canvaswinding",function(){if(Modernizr.canvas===!1)return!1;var e=createElement("canvas").getContext("2d");return e.rect(0,0,10,10),e.rect(2,2,6,6),e.isPointInPath(5,5,"evenodd")===!1}),ModernizrProto.testAllProps=testAllProps,Modernizr.addTest("bgrepeatround",testAllProps("backgroundRepeat","round")),Modernizr.addTest("bgrepeatspace",testAllProps("backgroundRepeat","space")),Modernizr.addTest("displayrunin",testAllProps("display","run-in"),{aliases:["display-runin"]}),Modernizr.addTest("flexbox",testAllProps("flexBasis","1px",!0)),Modernizr.addTest("flexwrap",testAllProps("flexWrap","wrap",!0));var prefixes=ModernizrProto._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];ModernizrProto._prefixes=prefixes,Modernizr.addAsyncTest(function(){function e(){function n(){try{var e=createElement("div"),t=createElement("span"),n=e.style,r=0,o=0,i=!1,a=document.body.firstElementChild||document.body.firstChild;return e.appendChild(t),t.innerHTML="Bacon ipsum dolor sit amet jerky velit in culpa hamburger et. Laborum dolor proident, enim dolore duis commodo et strip steak. Salami anim et, veniam consectetur dolore qui tenderloin jowl velit sirloin. Et ad culpa, fatback cillum jowl ball tip ham hock nulla short ribs pariatur aute. Pig pancetta ham bresaola, ut boudin nostrud commodo flank esse cow tongue culpa. Pork belly bresaola enim pig, ea consectetur nisi. Fugiat officia turkey, ea cow jowl pariatur ullamco proident do laborum velit sausage. Magna biltong sint tri-tip commodo sed bacon, esse proident aliquip. Ullamco ham sint fugiat, velit in enim sed mollit nulla cow ut adipisicing nostrud consectetur. Proident dolore beef ribs, laborum nostrud meatball ea laboris rump cupidatat labore culpa. Shankle minim beef, velit sint cupidatat fugiat tenderloin pig et ball tip. Ut cow fatback salami, bacon ball tip et in shank strip steak bresaola. In ut pork belly sed mollit tri-tip magna culpa veniam, short ribs qui in andouille ham consequat. Dolore bacon t-bone, velit short ribs enim strip steak nulla. Voluptate labore ut, biltong swine irure jerky. Cupidatat excepteur aliquip salami dolore. Ball tip strip steak in pork dolor. Ad in esse biltong. Dolore tenderloin exercitation ad pork loin t-bone, dolore in chicken ball tip qui pig. Ut culpa tongue, sint ribeye dolore ex shank voluptate hamburger. Jowl et tempor, boudin pork chop labore ham hock drumstick consectetur tri-tip elit swine meatball chicken ground round. Proident shankle mollit dolore. Shoulder ut duis t-bone quis reprehenderit. Meatloaf dolore minim strip steak, laboris ea aute bacon beef ribs elit shank in veniam drumstick qui. Ex laboris meatball cow tongue pork belly. Ea ball tip reprehenderit pig, sed fatback boudin dolore flank aliquip laboris eu quis. Beef ribs duis beef, cow corned beef adipisicing commodo nisi deserunt exercitation. Cillum dolor t-bone spare ribs, ham hock est sirloin. Brisket irure meatloaf in, boudin pork belly sirloin ball tip. Sirloin sint irure nisi nostrud aliqua. Nostrud nulla aute, enim officia culpa ham hock. Aliqua reprehenderit dolore sunt nostrud sausage, ea boudin pork loin ut t-bone ham tempor. Tri-tip et pancetta drumstick laborum. Ham hock magna do nostrud in proident. Ex ground round fatback, venison non ribeye in.",document.body.insertBefore(e,a),n.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;",r=t.offsetHeight,o=t.offsetWidth,n.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;"+prefixes.join("hyphens:auto; "),i=t.offsetHeight!=r||t.offsetWidth!=o,document.body.removeChild(e),e.removeChild(t),i}catch(d){return!1}}function r(e,t){try{var n=createElement("div"),r=createElement("span"),o=n.style,i=0,a=!1,d=!1,s=!1,l=document.body.firstElementChild||document.body.firstChild;return o.cssText="position:absolute;top:0;left:0;overflow:visible;width:1.25em;",n.appendChild(r),document.body.insertBefore(n,l),r.innerHTML="mm",i=r.offsetHeight,r.innerHTML="m"+e+"m",d=r.offsetHeight>i,t?(r.innerHTML="m<br />m",i=r.offsetWidth,r.innerHTML="m"+e+"m",s=r.offsetWidth>i):s=!0,d===!0&&s===!0&&(a=!0),document.body.removeChild(n),n.removeChild(r),a}catch(c){return!1}}function o(e){try{var t,n=createElement("input"),r=createElement("div"),o="lebowski",i=!1,a=document.body.firstElementChild||document.body.firstChild;r.innerHTML=o+e+o,document.body.insertBefore(r,a),document.body.insertBefore(n,r),n.setSelectionRange?(n.focus(),n.setSelectionRange(0,0)):n.createTextRange&&(t=n.createTextRange(),t.collapse(!0),t.moveEnd("character",0),t.moveStart("character",0),t.select());try{window.find?i=window.find(o+o):(t=window.self.document.body.createTextRange(),i=t.findText(o+o))}catch(d){i=!1}return document.body.removeChild(r),document.body.removeChild(n),i}catch(d){return!1}}return document.body||document.getElementsByTagName("body")[0]?(addTest("csshyphens",function(){if(!testAllProps("hyphens","auto",!0))return!1;try{return n()}catch(e){return!1}}),addTest("softhyphens",function(){try{return r("&#173;",!0)&&r("&#8203;",!1)}catch(e){return!1}}),void addTest("softhyphensfind",function(){try{return o("&#173;")&&o("&#8203;")}catch(e){return!1}})):void setTimeout(e,t)}var t=300;setTimeout(e,t)}),Modernizr.addTest("opacity",function(){var e=createElement("a").style;return e.cssText=prefixes.join("opacity:.55;"),/^0.55$/.test(e.opacity)}),Modernizr.addTest("cssanimations",testAllProps("animationName","a",!0)),Modernizr.addTest("csstransitions",testAllProps("transition","all",!0)),Modernizr.addTest("createelementattrs",function(){try{return"test"==createElement('<input name="test" />').getAttribute("name")}catch(e){return!1}},{aliases:["createelement-attrs"]}),Modernizr.addTest("dataset",function(){var e=createElement("div");return e.setAttribute("data-a-b","c"),!(!e.dataset||"c"!==e.dataset.aB)}),Modernizr.addTest("progressbar",createElement("progress").max!==undefined),Modernizr.addTest("meter",createElement("meter").max!==undefined),Modernizr.addTest("texttrackapi","function"==typeof createElement("video").addTextTrack),Modernizr.addTest("track","kind"in createElement("track")),Modernizr.addTest("es5array",function(){return!!(Array.prototype&&Array.prototype.every&&Array.prototype.filter&&Array.prototype.forEach&&Array.prototype.indexOf&&Array.prototype.lastIndexOf&&Array.prototype.map&&Array.prototype.some&&Array.prototype.reduce&&Array.prototype.reduceRight&&Array.isArray)}),Modernizr.addTest("es5date",function(){var e="2013-04-12T06:06:37.307Z",t=!1;try{t=!!Date.parse(e)}catch(n){}return!!(Date.now&&Date.prototype&&Date.prototype.toISOString&&Date.prototype.toJSON&&t)}),Modernizr.addTest("es5function",function(){return!(!Function.prototype||!Function.prototype.bind)}),Modernizr.addTest("es5object",function(){return!!(Object.keys&&Object.create&&Object.getPrototypeOf&&Object.getOwnPropertyNames&&Object.isSealed&&Object.isFrozen&&Object.isExtensible&&Object.getOwnPropertyDescriptor&&Object.defineProperty&&Object.defineProperties&&Object.seal&&Object.freeze&&Object.preventExtensions)}),Modernizr.addTest("strictmode",function(){"use strict";return!this}()),Modernizr.addTest("es5string",function(){return!(!String.prototype||!String.prototype.trim)}),Modernizr.addTest("es5syntax",function(){var value,obj,stringAccess,getter,setter,reservedWords,zeroWidthChars;try{return stringAccess=eval('"foobar"[3] === "b"'),getter=eval("({ get x(){ return 1 } }).x === 1"),eval("({ set x(v){ value = v; } }).x = 1"),setter=1===value,eval("obj = ({ if: 1 })"),reservedWords=1===obj["if"],zeroWidthChars=eval("_‌‍ = true"),stringAccess&&getter&&setter&&reservedWords&&zeroWidthChars}catch(ignore){return!1}}),Modernizr.addTest("es5undefined",function(){var e,t;try{t=window.undefined,window.undefined=12345,e="undefined"==typeof window.undefined,window.undefined=t}catch(n){return!1}return e}),Modernizr.addTest("es5",function(){return!!(Modernizr.es5array&&Modernizr.es5date&&Modernizr.es5function&&Modernizr.es5object&&Modernizr.strictmode&&Modernizr.es5string&&Modernizr.json&&Modernizr.es5syntax&&Modernizr.es5undefined)}),Modernizr.addTest("devicemotion","DeviceMotionEvent"in window),Modernizr.addTest("deviceorientation","DeviceOrientationEvent"in window);var testStyles=ModernizrProto.testStyles=injectElementWithStyles;Modernizr.addTest("oninput",function(){var e,t=createElement("input");if(t.setAttribute("oninput","return"),hasEvent("oninput",docElement)||"function"==typeof t.oninput)return!0;try{var n=document.createEvent("KeyboardEvent");e=!1;var r=function(t){e=!0,t.preventDefault(),t.stopPropagation()};n.initKeyEvent("keypress",!0,!0,window,!1,!1,!1,!1,0,"e".charCodeAt(0)),docElement.appendChild(t),t.addEventListener("input",r,!1),t.focus(),t.dispatchEvent(n),t.removeEventListener("input",r,!1),docElement.removeChild(t)}catch(o){e=!1}return e}),Modernizr.addTest("formvalidation",function(){var e=createElement("form");if(!("checkValidity"in e&&"addEventListener"in e))return!1;if("reportValidity"in e)return!0;var t,n=!1;return Modernizr.formvalidationapi=!0,e.addEventListener("submit",function(e){(!window.opera||window.operamini)&&e.preventDefault(),e.stopPropagation()},!1),e.innerHTML='<input name="modTest" required><button></button>',testStyles("#modernizr form{position:absolute;top:-99999em}",function(r){r.appendChild(e),t=e.getElementsByTagName("input")[0],t.addEventListener("invalid",function(e){n=!0,e.preventDefault(),e.stopPropagation()},!1),Modernizr.formvalidationmessage=!!t.validationMessage,e.getElementsByTagName("button")[0].click()}),n}),Modernizr.addTest("srcset","srcset"in createElement("img")),Modernizr.addAsyncTest(function(){var e=new Image;e.onerror=function(){addTest("webplossless",!1,{aliases:["webp-lossless"]})},e.onload=function(){addTest("webplossless",1==e.width,{aliases:["webp-lossless"]})},e.src="data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA="}),Modernizr.addAsyncTest(function(){function e(e,t,n){function r(t){var r=t&&"load"===t.type?1==o.width:!1,i="webp"===e;addTest(e,i?new Boolean(r):r),n&&n(t)}var o=new Image;o.onerror=r,o.onload=r,o.src=t}var t=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],n=t.shift();e(n.name,n.uri,function(n){if(n&&"load"===n.type)for(var r=0;r<t.length;r++)e(t[r].name,t[r].uri)})}),Modernizr.addTest("beacon","sendBeacon"in navigator),Modernizr.addTest("fetch","fetch"in window),Modernizr.addAsyncTest(function(){function e(){var e=new Image;e.onerror=function(){addTest("datauri",!0),Modernizr.datauri=new Boolean(!0),Modernizr.datauri.over32kb=!1},e.onload=function(){addTest("datauri",!0),Modernizr.datauri=new Boolean(!0),Modernizr.datauri.over32kb=1==e.width&&1==e.height};for(var t="R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";t.length<33e3;)t="\r\n"+t;e.src="data:image/gif;base64,"+t}-1!==navigator.userAgent.indexOf("MSIE 7.")&&setTimeout(function(){addTest("datauri",!1)},10);var t=new Image;t.onerror=function(){addTest("datauri",!1)},t.onload=function(){1==t.width&&1==t.height?e():addTest("datauri",!1)},t.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}),Modernizr.addTest("urlparser",function(){var e;try{return e=new URL("http://modernizr.com/"),"http://modernizr.com/"===e.href}catch(t){return!1}}),Modernizr.addAsyncTest(function(){if(Modernizr.webglextensions=new Boolean(!1),Modernizr.webgl){var e,t,n;try{e=createElement("canvas"),t=e.getContext("webgl")||e.getContext("experimental-webgl"),n=t.getSupportedExtensions()}catch(r){return}t!==undefined&&(Modernizr.webglextensions=new Boolean(!0));for(var o=-1,i=n.length;++o<i;)Modernizr.webglextensions[n[o]]=!0;e=undefined}}),Modernizr.addTest("peerconnection",!!prefixed("RTCPeerConnection",window)),Modernizr.addTest("getusermedia",!!prefixed("getUserMedia",navigator)),Modernizr.addTest("websockets","WebSocket"in window&&2===window.WebSocket.CLOSING),Modernizr.addTest("atob-btoa","atob"in window&&"btoa"in window),Modernizr.addTest("matchmedia",!!prefixed("matchMedia",window)),Modernizr.addTest("blobconstructor",function(){try{return!!new Blob}catch(e){return!1}},{aliases:["blob-constructor"]}),Modernizr.addTest("typedarrays","ArrayBuffer"in window);var url=prefixed("URL",window,!1);url=url&&window[url],Modernizr.addTest("bloburls",url&&"revokeObjectURL"in url&&"createObjectURL"in url),Modernizr.addTest("webworkers","Worker"in window),Modernizr.addAsyncTest(function(){function e(){addTest("transferables",!1),t()}function t(){d&&URL.revokeObjectURL(d),s&&s.terminate(),o&&clearTimeout(o)}var n=!!(Modernizr.blobconstructor&&Modernizr.bloburls&&Modernizr.webworkers&&Modernizr.typedarrays);if(!n)return addTest("transferables",!1);try{var r,o,i='var hello = "world"',a=new Blob([i],{type:"text/javascript"}),d=URL.createObjectURL(a),s=new Worker(d);s.onerror=e,o=setTimeout(e,200),r=new ArrayBuffer(1),s.postMessage(r,[r]),addTest("transferables",0===r.byteLength),t()}catch(l){e()}}),testRunner(),delete ModernizrProto.addTest,delete ModernizrProto.addAsyncTest;for(var i=0;i<Modernizr._q.length;i++)Modernizr._q[i]();window.Modernizr=Modernizr}(window,document);