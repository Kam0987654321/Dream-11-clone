
<html lang="en"><head>  
    <title>Contest details</title>


          <style>


@media screen and (min-width: 400px) {
  .appBgImage_fd065 {
    display: none;
   
   }

   .headerFixed_38df7 {
    position: fixed;
    top: 0;
    max-width: 100%!important;
    width: 100%;
}

   .appContainer_6475d {
    max-width: 960px!important;
    height: 100%;
}

  .appToolbar_1ea26 {
    max-width: 100%!important;
    left: 0;
    top: 0;
    width: 100%;
    position: fixed;
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.3);
    z-index: 2;
  }

  .matchListContainer_ca5d2 {
    display: flex;
    flex-direction: column;
    max-width: 36%!important;
    -webkit-overflow-scrolling: touch;
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
    padding:5px!important;
    margin-left:5px;
    }

    .bottom-nav {
      max-width:100%!important;
      bottom: 0;
      position: fixed;
      width: 100%;
      background-color: #fff;
      box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.5);
    }


}

@media screen and (min-width: 1200px) {
  .appBgImage_fd065 {
    display: block;
  }

    .headerFixed_38df7 {
    position: fixed;
    top: 0;
    max-width: 550px!important;
    width: 100%;
	}

  .appToolbar_1ea26 {
    max-width: 545px!important;
    left: 0;
    top: 0;
    width: 100%;
    position: fixed;
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.3);
    z-index: 2
  }

  .matchListContainer_ca5d2 {
    display: flex;
    flex-direction: column;
    max-width: 550px!important;
    -webkit-overflow-scrolling: touch;
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    overflow-x: hidden
  }
  .bottom-nav {
    max-width:40.23%!important;
    bottom: 0;
    position: fixed;
    width: 100%;
    background-color: #fff;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.5);
    }

    .appContainer_6475d {
    max-width: 550px!important;
    height: 100%;
	}
}
</style>
   
<script type="text/javascript">
window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o||e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e,n){function r(t){try{c.console&&console.log(t)}catch(e){}}var o,i=t("ee"),a=t(20),c={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(c.console=!0,o.indexOf("dev")!==-1&&(c.dev=!0),o.indexOf("nr_dev")!==-1&&(c.nrDev=!0))}catch(s){}c.nrDev&&i.on("internal-error",function(t){r(t.stack)}),c.dev&&i.on("fn-err",function(t,e,n){r(n.stack)}),c.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(c,function(t,e){return t}).join(", ")))},{}],2:[function(t,e,n){function r(t,e,n,r,c){try{h?h-=1:o(c||new UncaughtException(t,e,n),!0)}catch(f){try{i("ierr",[f,s.now(),!0])}catch(d){}}return"function"==typeof u&&u.apply(this,a(arguments))}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function o(t,e){var n=e?null:s.now();i("err",[t,n])}var i=t("handle"),a=t(21),c=t("ee"),s=t("loader"),f=t("gos"),u=window.onerror,d=!1,p="nr@seenError",h=0;s.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(l){"stack"in l&&(t(13),t(12),"addEventListener"in window&&t(6),s.xhrWrappable&&t(14),d=!0)}c.on("fn-start",function(t,e,n){d&&(h+=1)}),c.on("fn-err",function(t,e,n){d&&!n[p]&&(f(n,p,function(){return!0}),this.thrown=!0,o(n))}),c.on("fn-end",function(){d&&!this.thrown&&h>0&&(h-=1)}),c.on("internal-error",function(t){i("ierr",[t,s.now(),!0])})},{}],3:[function(t,e,n){t("loader").features.ins=!0},{}],4:[function(t,e,n){function r(){M++,S=y.hash,this[u]=b.now()}function o(){M--,y.hash!==S&&i(0,!0);var t=b.now();this[l]=~~this[l]+t-this[u],this[d]=t}function i(t,e){E.emit("newURL",[""+y,e])}function a(t,e){t.on(e,function(){this[e]=b.now()})}var c="-start",s="-end",f="-body",u="fn"+c,d="fn"+s,p="cb"+c,h="cb"+s,l="jsTime",m="fetch",v="addEventListener",w=window,y=w.location,b=t("loader");if(w[v]&&b.xhrWrappable){var g=t(10),x=t(11),E=t(8),P=t(6),O=t(13),R=t(7),T=t(14),L=t(9),j=t("ee"),N=j.get("tracer");t(15),b.features.spa=!0;var S,M=0;j.on(u,r),j.on(p,r),j.on(d,o),j.on(h,o),j.buffer([u,d,"xhr-done","xhr-resolved"]),P.buffer([u]),O.buffer(["setTimeout"+s,"clearTimeout"+c,u]),T.buffer([u,"new-xhr","send-xhr"+c]),R.buffer([m+c,m+"-done",m+f+c,m+f+s]),E.buffer(["newURL"]),g.buffer([u]),x.buffer(["propagate",p,h,"executor-err","resolve"+c]),N.buffer([u,"no-"+u]),L.buffer(["new-jsonp","cb-start","jsonp-error","jsonp-end"]),a(T,"send-xhr"+c),a(j,"xhr-resolved"),a(j,"xhr-done"),a(R,m+c),a(R,m+"-done"),a(L,"new-jsonp"),a(L,"jsonp-end"),a(L,"cb-start"),E.on("pushState-end",i),E.on("replaceState-end",i),w[v]("hashchange",i,!0),w[v]("load",i,!0),w[v]("popstate",function(){i(0,M>1)},!0)}},{}],5:[function(t,e,n){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(13),c=t(12),s="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",p="resource",h="-start",l="-end",m="fn"+h,v="fn"+l,w="bstTimer",y="pushState",b=t("loader");b.features.stn=!0,t(8);var g=NREUM.o.EV;o.on(m,function(t,e){var n=t[0];n instanceof g&&(this.bstStart=b.now())}),o.on(v,function(t,e){var n=t[0];n instanceof g&&i("bst",[n,e,this.bstStart,b.now()])}),a.on(m,function(t,e,n){this.bstStart=b.now(),this.bstType=n}),a.on(v,function(t,e){i(w,[e,this.bstStart,b.now(),this.bstType])}),c.on(m,function(){this.bstStart=b.now()}),c.on(v,function(t,e){i(w,[e,this.bstStart,b.now(),"requestAnimationFrame"])}),o.on(y+h,function(t){this.time=b.now(),this.startPath=location.pathname+location.hash}),o.on(y+l,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+s]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(p)]),window.performance["c"+s]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(p)]),window.performance["webkitC"+s]()},!1)),document[f]("scroll",r,{passive:!0}),document[f]("keypress",r,!1),document[f]("click",r,!1)}},{}],6:[function(t,e,n){function r(t){for(var e=t;e&&!e.hasOwnProperty(u);)e=Object.getPrototypeOf(e);e&&o(e)}function o(t){c.inPlace(t,[u,d],"-",i)}function i(t,e){return t[1]}var a=t("ee").get("events"),c=t(23)(a,!0),s=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";e.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,e){var n=t[1],r=s(n,"nr@wrapped",function(){function t(){if("function"==typeof n.handleEvent)return n.handleEvent.apply(n,arguments)}var e={object:t,"function":n}[typeof n];return e?c(e,"fn-",null,e.name||"anonymous"):n});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],7:[function(t,e,n){function r(t,e,n){var r=t[e];"function"==typeof r&&(t[e]=function(){var t=r.apply(this,arguments);return o.emit(n+"start",arguments,t),t.then(function(e){return o.emit(n+"end",[null,e],t),e},function(e){throw o.emit(n+"end",[e],t),e})})}var o=t("ee").get("fetch"),i=t(20);e.exports=o;var a=window,c="fetch-",s=c+"body-",f=["arrayBuffer","blob","json","text","formData"],u=a.Request,d=a.Response,p=a.fetch,h="prototype";u&&d&&p&&(i(f,function(t,e){r(u[h],e,s),r(d[h],e,s)}),r(a,"fetch",c),o.on(c+"end",function(t,e){var n=this;e?e.clone().arrayBuffer().then(function(t){n.rxSize=t.byteLength,o.emit(c+"done",[null,e],n)}):o.emit(c+"done",[t],n)}))},{}],8:[function(t,e,n){var r=t("ee").get("history"),o=t(23)(r);e.exports=r,o.inPlace(window.history,["pushState","replaceState"],"-")},{}],9:[function(t,e,n){function r(t){function e(){s.emit("jsonp-end",[],p),t.removeEventListener("load",e,!1),t.removeEventListener("error",n,!1)}function n(){s.emit("jsonp-error",[],p),s.emit("jsonp-end",[],p),t.removeEventListener("load",e,!1),t.removeEventListener("error",n,!1)}var r=t&&"string"==typeof t.nodeName&&"script"===t.nodeName.toLowerCase();if(r){var o="function"==typeof t.addEventListener;if(o){var a=i(t.src);if(a){var u=c(a),d="function"==typeof u.parent[u.key];if(d){var p={};f.inPlace(u.parent,[u.key],"cb-",p),t.addEventListener("load",e,!1),t.addEventListener("error",n,!1),s.emit("new-jsonp",[t.src],p)}}}}}function o(){return"addEventListener"in window}function i(t){var e=t.match(u);return e?e[1]:null}function a(t,e){var n=t.match(p),r=n[1],o=n[3];return o?a(o,e[r]):e[r]}function c(t){var e=t.match(d);return e&&e.length>=3?{key:e[2],parent:a(e[1],window)}:{key:t,parent:window}}var s=t("ee").get("jsonp"),f=t(23)(s);if(e.exports=s,o()){var u=/[?&](?:callback|cb)=([^&#]+)/,d=/(.*)\.([^.]+)/,p=/^(\w+)(\.|$)(.*)$/,h=["appendChild","insertBefore","replaceChild"];f.inPlace(HTMLElement.prototype,h,"dom-"),f.inPlace(HTMLHeadElement.prototype,h,"dom-"),f.inPlace(HTMLBodyElement.prototype,h,"dom-"),s.on("dom-start",function(t){r(t[0])})}},{}],10:[function(t,e,n){var r=t("ee").get("mutation"),o=t(23)(r),i=NREUM.o.MO;e.exports=r,i&&(window.MutationObserver=function(t){return this instanceof i?new i(o(t,"fn-")):i.apply(this,arguments)},MutationObserver.prototype=i.prototype)},{}],11:[function(t,e,n){function r(t){var e=a.context(),n=c(t,"executor-",e),r=new f(n);return a.context(r).getCtx=function(){return e},a.emit("new-promise",[r,e],e),r}function o(t,e){return e}var i=t(23),a=t("ee").get("promise"),c=i(a),s=t(20),f=NREUM.o.PR;e.exports=a,f&&(window.Promise=r,["all","race"].forEach(function(t){var e=f[t];f[t]=function(n){function r(t){return function(){a.emit("propagate",[null,!o],i),o=o||!t}}var o=!1;s(n,function(e,n){Promise.resolve(n).then(r("all"===t),r(!1))});var i=e.apply(f,arguments),c=f.resolve(i);return c}}),["resolve","reject"].forEach(function(t){var e=f[t];f[t]=function(t){var n=e.apply(f,arguments);return t!==n&&a.emit("propagate",[t,!0],n),n}}),f.prototype["catch"]=function(t){return this.then(null,t)},f.prototype=Object.create(f.prototype,{constructor:{value:r}}),s(Object.getOwnPropertyNames(f),function(t,e){try{r[e]=f[e]}catch(n){}}),a.on("executor-start",function(t){t[0]=c(t[0],"resolve-",this),t[1]=c(t[1],"resolve-",this)}),a.on("executor-err",function(t,e,n){t[1](n)}),c.inPlace(f.prototype,["then"],"then-",o),a.on("then-start",function(t,e){this.promise=e,t[0]=c(t[0],"cb-",this),t[1]=c(t[1],"cb-",this)}),a.on("then-end",function(t,e,n){this.nextPromise=n;var r=this.promise;a.emit("propagate",[r,!0],n)}),a.on("cb-end",function(t,e,n){a.emit("propagate",[n,!0],this.nextPromise)}),a.on("propagate",function(t,e,n){this.getCtx&&!e||(this.getCtx=function(){if(t instanceof Promise)var e=a.context(t);return e&&e.getCtx?e.getCtx():this})}),r.toString=function(){return""+f})},{}],12:[function(t,e,n){var r=t("ee").get("raf"),o=t(23)(r),i="equestAnimationFrame";e.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],13:[function(t,e,n){function r(t,e,n){t[0]=a(t[0],"fn-",null,n)}function o(t,e,n){this.method=n,this.timerDuration=isNaN(t[1])?0:+t[1],t[0]=a(t[0],"fn-",this,n)}var i=t("ee").get("timer"),a=t(23)(i),c="setTimeout",s="setInterval",f="clearTimeout",u="-start",d="-";e.exports=i,a.inPlace(window,[c,"setImmediate"],c+d),a.inPlace(window,[s],s+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(s+u,r),i.on(c+u,o)},{}],14:[function(t,e,n){function r(t,e){d.inPlace(e,["onreadystatechange"],"fn-",c)}function o(){var t=this,e=u.context(t);t.readyState>3&&!e.resolved&&(e.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,y,"fn-",c)}function i(t){b.push(t),l&&(x?x.then(a):v?v(a):(E=-E,P.data=E))}function a(){for(var t=0;t<b.length;t++)r([],b[t]);b.length&&(b=[])}function c(t,e){return e}function s(t,e){for(var n in t)e[n]=t[n];return e}t(6);var f=t("ee"),u=f.get("xhr"),d=t(23)(u),p=NREUM.o,h=p.XHR,l=p.MO,m=p.PR,v=p.SI,w="readystatechange",y=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],b=[];e.exports=u;var g=window.XMLHttpRequest=function(t){var e=new h(t);try{u.emit("new-xhr",[e],e),e.addEventListener(w,o,!1)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}return e};if(s(h,g),g.prototype=h.prototype,d.inPlace(g.prototype,["open","send"],"-xhr-",c),u.on("send-xhr-start",function(t,e){r(t,e),i(e)}),u.on("open-xhr-start",r),l){var x=m&&m.resolve();if(!v&&!m){var E=1,P=document.createTextNode(E);new l(a).observe(P,{characterData:!0})}}else f.on("fn-end",function(t){t[0]&&t[0].type===w||a()})},{}],15:[function(t,e,n){function r(t){var e=this.params,n=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!e.aborted){if(n.duration=a.now()-this.startTime,4===t.readyState){e.status=t.status;var i=o(t,this.lastSize);if(i&&(n.rxSize=i),this.sameOrigin){var s=t.getResponseHeader("X-NewRelic-App-Data");s&&(e.cat=s.split(", ").pop())}}else e.status=0;n.cbTime=this.cbTime,f.emit("xhr-done",[t],t),c("xhr",[e,n,this.startTime])}}}function o(t,e){var n=t.responseType;if("json"===n&&null!==e)return e;var r="arraybuffer"===n||"blob"===n||"json"===n?t.response:t.responseText;return l(r)}function i(t,e){var n=s(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}var a=t("loader");if(a.xhrWrappable){var c=t("handle"),s=t(16),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,p=t("id"),h=t(19),l=t(18),m=window.XMLHttpRequest;a.features.xhr=!0,t(14),f.on("new-xhr",function(t){var e=this;e.totalCbs=0,e.called=0,e.cbTime=0,e.end=r,e.ended=!1,e.xhrGuids={},e.lastSize=null,h&&(h>34||h<10)||window.opera||t.addEventListener("progress",function(t){e.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,e){var n=this.metrics,r=t[0],o=this;if(n&&r){var i=l(r);i&&(n.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof e.onload))&&o.end(e)}catch(n){try{f.emit("internal-error",[n])}catch(r){}}};for(var c=0;c<d;c++)e.addEventListener(u[c],this.listener,!1)}),f.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),f.on("xhr-load-added",function(t,e){var n=""+p(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,e){var n=""+p(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],e)}),f.on("removeEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],e)}),f.on("fn-start",function(t,e,n){e instanceof m&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),f.on("fn-end",function(t,e){this.xhrCbStart&&f.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,e],e)})}},{}],16:[function(t,e,n){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!e.protocol||":"===e.protocol||e.protocol===n.protocol,a=e.hostname===document.domain&&e.port===n.port;return r.sameOrigin=i&&(!e.hostname||a),r}},{}],17:[function(t,e,n){function r(){}function o(t,e,n){return function(){return i(t,[f.now()].concat(c(arguments)),e?null:this,n),e?void 0:this}}var i=t("handle"),a=t(20),c=t(21),s=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],p="api-",h=p+"ixn-";a(d,function(t,e){u[e]=o(p+e,!0,"api")}),u.addPageAction=o(p+"addPageAction",!0),u.setCurrentRouteName=o(p+"routeName",!0),e.exports=newrelic,u.interaction=function(){return(new r).get()};var l=r.prototype={createTracer:function(t,e){var n={},r=this,o="function"==typeof e;return i(h+"tracer",[f.now(),t,n],r),function(){if(s.emit((o?"":"no-")+"fn-start",[f.now(),r,o],n),o)try{return e.apply(this,arguments)}catch(t){throw s.emit("fn-err",[arguments,this,t],n),t}finally{s.emit("fn-end",[f.now()],n)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){l[e]=o(h+e)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now()])}},{}],18:[function(t,e,n){e.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(e){return}}}},{}],19:[function(t,e,n){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),e.exports=r},{}],20:[function(t,e,n){function r(t,e){var n=[],r="",i=0;for(r in t)o.call(t,r)&&(n[i]=e(r,t[r]),i+=1);return n}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],21:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(o<0?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=r},{}],22:[function(t,e,n){e.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],23:[function(t,e,n){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(21),a="nr@original",c=Object.prototype.hasOwnProperty,s=!1;e.exports=function(t,e){function n(t,e,n,o){function nrWrapper(){var r,a,c,s;try{a=this,r=i(arguments),c="function"==typeof n?n(r,a):n||{}}catch(f){p([f,"",[r,a,o],c])}u(e+"start",[r,a,o],c);try{return s=t.apply(a,r)}catch(d){throw u(e+"err",[r,a,d],c),d}finally{u(e+"end",[r,a,s],c)}}return r(t)?t:(e||(e=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,e,o,i){o||(o="");var a,c,s,f="-"===o.charAt(0);for(s=0;s<e.length;s++)c=e[s],a=t[c],r(a)||(t[c]=n(a,f?c+o:o,i,c))}function u(n,r,o){if(!s||e){var i=s;s=!0;try{t.emit(n,r,o,e)}catch(a){p([a,n,r,o])}s=i}}function d(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){p([r])}for(var o in t)c.call(t,o)&&(e[o]=t[o]);return e}function p(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=o),n.inPlace=f,n.flag=a,n}},{}],ee:[function(t,e,n){function r(){}function o(t){function e(t){return t&&t instanceof r?t:t?s(t,c,i):i()}function n(n,r,o,i){if(!p.aborted||i){t&&t(n,r,o);for(var a=e(o),c=l(n),s=c.length,f=0;f<s;f++)c[f].apply(a,r);var d=u[y[n]];return d&&d.push([b,n,r,a]),a}}function h(t,e){w[t]=l(t).concat(e)}function l(t){return w[t]||[]}function m(t){return d[t]=d[t]||o(n)}function v(t,e){f(t,function(t,n){e=e||"feature",y[n]=e,e in u||(u[e]=[])})}var w={},y={},b={on:h,emit:n,get:m,listeners:l,context:e,buffer:v,abort:a,aborted:!1};return b}function i(){return new r}function a(){(u.api||u.feature)&&(p.aborted=!0,u=p.backlog={})}var c="nr@context",s=t("gos"),f=t(20),u={},d={},p=e.exports=o();p.backlog=u},{}],gos:[function(t,e,n){function r(t,e,n){if(o.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[e]=r,r}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){o.buffer([t],r),o.emit(t,e,n)}var o=t("ee").get("handle");e.exports=r,r.ee=o},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!x++){var t=g.info=NREUM.info,e=p.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return u.abort();f(y,function(e,n){t[e]||(t[e]=n)}),s("mark",["onload",a()+g.offset],null,"api");var n=p.createElement("script");n.src="https://"+t.agent,e.parentNode.insertBefore(n,e)}}function o(){"complete"===p.readyState&&i()}function i(){s("mark",["domContent",a()+g.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(c=Math.max((new Date).getTime(),c))-g.offset}var c=(new Date).getTime(),s=t("handle"),f=t(20),u=t("ee"),d=window,p=d.document,h="addEventListener",l="attachEvent",m=d.XMLHttpRequest,v=m&&m.prototype;NREUM.o={ST:setTimeout,SI:d.setImmediate,CT:clearTimeout,XHR:m,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var w=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-spa-1071.min.js"},b=m&&v&&v[h]&&!/CriOS/.test(navigator.userAgent),g=e.exports={offset:c,now:a,origin:w,features:{},xhrWrappable:b};t(17),p[h]?(p[h]("DOMContentLoaded",i,!1),d[h]("load",r,!1)):(p[l]("onreadystatechange",o),d[l]("onload",r)),s("mark",["firstbyte",c],null,"api");var x=0,E=t(22)},{}]},{},["loader",2,15,5,3,4]);
;NREUM.info={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",licenseKey:"afb70be764",applicationID:"62631963",sa:1}
</script>

  
  <script>(function(d, s, id) {
    var url = "https://connect.facebook.net/en_US/sdk.js#version=v2.8&appId=161319903648&cookie=true&xfbml=true";
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = url;
    js.async = true;
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <script async="" src="./leader_files/satan.js.download"></script>

  <style>:root{COMMENT:// DEPRECATED: Use jssVariables instead;--color:#323232;--primary-bg-color:#c51d23;--primary-fg-color:#FFF;--primary-selected-bg-color:#ab1a1f;--secondary-fg-color:#888;--button-height:48px;--icon-color:var(--color);--primary-btn-color:#3759a5;--secondary-btn-color:#3759a5;--box-shadow-light:0px 1px 4px 0px rgba(0, 0, 0, 0.2);--box-shadow-dark:0 1px 2px 0 rgba(0, 0, 0, 0.3);--large-button-height:50px;--icon-size:24px;--font-x-small:10px;--font-small:12px;--font-medium:14px;--font-large:24px;--currency-font-color:inherit}</style>
  <style id="app-style">.appContainer_6475d{max-width:550px;height:100%}.appBgImage_fd065{background-image:url("<?php echo base_url('web_assets/public/imgs/desktop-pwa_2.jpg'); ?>");position:fixed;left:550px;right:0;background-size:cover;top:0;bottom:0}.loaderContainer_d2930{display:flex;height:100%;align-items:center}.blockLoader_580b6{margin:12px auto}.loaderCircular_00f73{animation:loader-rotate 2s linear infinite}.loaderPath_00e5f{animation:loader-stroke 1.5s ease-in-out infinite;stroke-dasharray:1, 162;stroke-dashoffset:0;stroke-linecap:round;stroke-width:6}.black_7fbc4{stroke:rgba(0, 0, 0, 0.5)}.fadeIn_73e97{animation:fade-in .25s linear}.appHeaderSpacing_cdb56{height:48px}.appToolbar_1ea26{max-width:550px;left:0;top:0;width:100%;position:fixed;box-shadow:0px 1px 4px 0px rgba(0, 0, 0, 0.3);z-index:2}.header_fc30e{height:48px;display:flex;text-align:center;width:100%;justify-content:space-between;align-items:center}.appHeaderFlex_cd299{display:flex;flex:1 0 0;align-items:center}.appHeaderLeft_a1d14{justify-content:flex-start}.appHeaderCenter_23398{justify-content:center}.appHeaderRight_30396{justify-content:flex-end;width:48px}.card_690e1{background-color:#fff;margin:8px;box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.3);border-radius:2px;overflow:hidden}.padded_9ac77{padding:16px;margin:12px;box-shadow:0 2px 4px 0 rgba(0, 0, 0, 0.2)}.socialLoginWrapper_bc85e{display:flex;justify-content:space-around;padding:12px 0}.socialLoginElement_2f902{display:flex;padding:16px;width:146px;justify-content:space-around;box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.2);border-radius:2px}.fbText_cab49{color:#4460a0}.googleText_0b4dd{color:#7b7a7a}.orText_95fdb{display:flex;justify-content:center;padding:12px 0;color:#9b9b9b}.container_b3c1e{margin:16px 8px}.formField_4712e{margin-top:8px}.disable_aa8d4{pointer-events:none}.buttonWrapper_4878c{margin:12px 0}.fullWidthGreenButton_5063b{background:#25ba38;border:0;cursor:pointer;margin:0;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:#FFF;font-weight:500;font-size:14px;height:30px;padding:0 8px;width:100%;border-radius:4px}.registerCTA_b569e{display:flex;justify-content:center;font-size:12px;color:#7b7a7a}.registerLink_cf5d8{color:#3759a5;margin:0 4px;text-decoration:none}.dialog_fe4fb{max-width:550px;z-index:7}.loadingDialog_7ce16{display:flex;align-items:center}.loader_fdaf1{margin-right:12px}.iconButton_fe158{background:none;border:0;cursor:pointer;margin:0;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:inherit;font-weight:500;font-size:14px;height:48px;padding:0 8px;width:48px}.materialIcon_10a4f{font-family:Material Icons;font-weight:normal;font-style:normal;display:inline-block;line-height:1;text-transform:none;letter-spacing:normal;word-wrap:normal;white-space:nowrap;direction:ltr}.infoWrapper_a0313{display:flex;justify-content:space-between;padding:12px;flex-direction:column;align-items:center;font-size:14px}.otpWrapper_62b3f{display:flex;color:#7b7a7a}.resendBtn_50f8a{color:#3759a5;margin:0 4px}.timer_998f4{color:#e10000;width:60px;text-align:center}.home_fed50{height:100%}.homeToolbar_7b795{display:flex;align-items:center;justify-content:space-between}.headerElement_af700{display:flex;flex:1}.left_a1d14{justify-content:flex-start}.logo_32840{height:48px;padding:8px}.right_c98d9{justify-content:flex-end}.tab_4e2e6{background-color:#c51d23;color:#fff;display:flex;flex-wrap:nowrap;overflow-x:auto;width:100%;max-width:550px;margin:auto;padding:0 8px}.tabItemSelected_765ac{border-bottom:solid 2px #fff !important;opacity:1 !important}.tabItem_66759{align-items:center;border-bottom:solid 2px #c51d23;display:flex;flex:1 0 auto;height:48px;min-width:80px;justify-content:center;cursor:pointer;transition:all ease-in 300ms;opacity:0.6}.siteTab_56f2f{display:flex;justify-content:center;align-items:center}.siteTabText_ce5fe{text-transform:uppercase}.homeListContainer_55b59{padding-top:96px;height:100%}.carouselContainer_cbc2d{position:relative}.carousel_db1fc{overflow:hidden}.carouselContent_4b30b{transition:all 300ms 0ms}.carouselContentStopAnimation_1677b{transition:none;will-change:transform}.homeList_029e0{display:flex}.matchListContainer_ca5d2{display:flex;flex-direction:column;max-width:550px;-webkit-overflow-scrolling:touch;width:100%;height:100%;overflow-y:scroll;overflow-x:hidden}.feedBannerShell_6873c{display:flex;align-items:center;justify-content:center;background-color:#f4f4f4;background-clip:content-box;padding:12px}.feedBannerDesktop_fee7d{height:240px}.headerContainer_b77fa{padding-left:8px;width:100%}.header_e8b8b{width:100%;display:flex;justify-content:space-between;align-items:center;height:40px}.matchCardDetail_c54ac{display:flex;justify-content:space-around;align-items:center;height:100px;width:100%}.matchCardInfo_9f857{display:flex;flex-direction:column;align-items:center;height:65px;justify-content:space-between}.empty_c9042{height:10px}.homeListContainerPadding_1b8cf{padding-bottom:55px}.matchCard_868db{text-decoration:none;color:inherit}.gradient_28499{background:linear-gradient(132deg, white 49%, #f4f4f4 49%)}.bigFlag_78f81{max-width:68px;max-height:68px}.tourNameLabel_d619f{color:#9b9b9b;font-size:10px;width:150px;text-align:center}.timer_defb2{color:#c61c23;font-family:monospace}.filterContainer_17b8d{display:flex;font-size:10px}.wrapper_cb3ad{max-width:550px;z-index:4;height:55px}.feedbannerContainer_c08f0{display:flex;flex-direction:row;padding:8px}.feedBanner_52d71{-webkit-overflow-scrolling:touch;overflow-x:hidden;padding:12px}.feedBannerImage_01eb7{height:100%;width:100%;border-radius:8px}.carouselNavigatorButton_46966{width:36px;height:36px;border-radius:50%;display:flex;justify-content:center;align-items:center;position:absolute;top:50%;transform:translateY(-50%);background-color:rgba(255, 255, 255, 0.5);margin:0 4%;cursor:pointer}.carouselNavigatorButtonNext_b9b75{right:0}.carouselNavigationIndicatorContainer_b9ae4{display:flex;justify-content:center}.carouselNavigationIndicator_5b004{width:12px;height:2px;margin:2px}.carouselNavigationIndicatorActive_21990{background-color:rgb(123, 122, 122)}.carouselNavigationIndicatorInactive_43a73{background-color:rgba(123, 122, 122, 0.3)}.contestHome_789e2{padding-top:100px;padding-bottom:50px;background-color:#efeff4;min-height:100%}
.headerContainer_199c8{background: linear-gradient(63deg, #00255c 42%,#00bcac 72%) !important;
    color: #FFF;
    z-index: 2;}
.headerFixed_38df7{position:fixed;top:0;max-width:550px;width:100%}.headerRow_c14ad{display:flex;justify-content:space-between;height:50px}.headerLeft_36c4e{display:flex;flex:1 0 0;justify-content:flex-start;align-items:center}.headerCenter_4d6f0{display:flex;flex:1 0 0;justify-content:center;align-items:center}.headerTitle_fd62d{text-transform:uppercase;white-space:nowrap}.headerRight_ba2d2{display:flex;flex:1 0 0;justify-content:flex-end;align-items:center}
.infobar_0dc07{height:50px;padding:8px}
.infobarContent_628aa{background-color:#FFF;height:100%;color:#323232;border-radius:2px;display:flex;justify-content:center;align-items:center;padding:8px}.contestsHeader_16599{padding:12px;border-bottom:1px solid #dcdcdc}.playWithFriendsWrapper_3442c{display:flex;justify-content:space-between}.contestCountInfo_cc447{padding-top:16px;color:#969696}.segmentHeaderContainer_54896{position:sticky;top:100px;display:flex;background-color:#efeff4;z-index:1;align-items:center;justify-content:space-between;padding:0 12px}.row_404ce{align-items:center;display:flex;height:60px;text-decoration:none;color:#7b7a7a}.segmentHeaderShell_a64fc{display:flex;height:100%;flex-direction:column;justify-content:space-evenly}.headerTitle_ba6eb{color:#333232;font-weight:bold;font-size:16px}.headerText_d7966{font-size:12px;margin-top:2px}.contestCardWrapper_c83dd{border-radius:4px;display:block;margin:0 12px 16px 12px;box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 4px 6px 0 rgba(0, 0, 0, 0.05);background-color:#fff;text-decoration:none}.contestSpecMoneyInfo_20124{width:100%;display:flex;flex-direction:column;padding:12px}.contestSpecRow_01429{display:flex;justify-content:space-between;align-items:center;padding-bottom:8px}.contestCardLabel_7ca40{font-size:12px;color:#969696}.prizePool_565d2{font-size:20px;font-weight:500;color:#282828}.contestProgressBarContainer_0efc1{padding:0 12px}.contestProgressBar_eba45{height:8px;display:flex;justify-content:flex-end;transform:skew(-20deg);background-image:linear-gradient(to right, #ffc81e, #e10000)}.contestProgressInner_ead13{background-color:#f2f2f2;height:8px}.idleProgressBar_3ec17{width:100%}.spotsContainer_9c427{padding:8px 12px 0 12px}.spotLefts_8d583{font-size:12px;font-weight:500}.totalSpots_b62ba{color:#969696;font-size:12px;font-weight:500}.contestSpec_a3ebb{background-color:#f8f8f8;border-top:1px solid #f4f4f4;padding:12px;font-size:12px;height:32px;display:flex;border-radius:0 0 4px 4px;align-items:center}.iconLabelGroup_f55e1{display:inline-flex;width:50%}.container_607ce{background-color:#3759a5;bottom:0;position:fixed;width:100%;max-width:550px;z-index:3;animation:contest-footer-animate-in 300ms cubic-bezier(0, 0, 0, 1)}.infobarContentRow_7ae93{display:flex;width:100%;font-size:12px}.infobarContentLeft_04a34{flex:1 0 0}.infobarContentCenter_5f791{flex:1 0 0;text-align:center}.timer_1aa54{font-family:monospace;display:flex;justify-content:center;align-items:center;color:#c51d23}.timeRemaining_96d65{margin-left:4px}.infobarContentRight_ac9bd{flex:1 0 0;text-align:right}.raisedWhiteButtonNew_08689{background:none;border:0;cursor:pointer;margin:0;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:inherit;font-weight:500;font-size:12px;height:32px;padding:0 8px;width:156px;border-radius:4px;background-color:#fff;box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 4px 6px 0 rgba(0, 0, 0, 0.05)}.iconLabel_fe3d5{display:flex;align-item:center;justify-content:space-between;font-size:12px;width:100%}.iconContent_3cbfd{padding-left:4px}.flatGreenButton_fb7a7{background:none;border:0;cursor:pointer;margin:0;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:#fff;font-weight:500;font-size:12px;height:28px;padding:0 8px;width:76px;border-radius:4px;background-color:#00b137}.contestFilling_14509{color:#ffa01e}.iconLabelWrapper_43690{display:flex;justify-content:space-between;color:#969696}.squareWithTwoRoundCorner_1291a{width:20px;height:20px;padding:2px;font-size:12px;color:#969696;border:1px solid #969696;border-radius:2px 0 2px 0;display:flex;justify-content:center}.moreLink_570df{color:#00a0ff;justify-content:space-between;align-items:center;text-decoration:none;height:35px}.flexRow_029e0{display:flex}.allContestsButtonSegment_d9602{padding:10px 0;display:flex;flex-direction:column;align-items:center}.allContestsButtonSegmentHeader_a44f9{margin-bottom:16px;line-height:1.5}.innerContainer_b8f9b{padding:8px}.leaderboard_c97e9{padding-top:100px}.headerShadow_22469{box-shadow:0px 1px 4px 0px rgba(0, 0, 0, 0.3)}.wrapper_de051{max-width:550px;z-index:8}.message_d58fc{color:#fff;padding:36px 8px 0px 8px;text-align:center}.error_a70e4{background-color:#f68323}.joinedContest_e8f66{padding-top:112px;min-height:100%;background-color:#efeff4}.sharingBox_d2571{padding:8px 16px;display:flex;justify-content:space-between;color:#969696;background-color:#f8f8f8;font-size:14px;font-weight:normal;align-items:center;border-bottom:1px solid #f4f4f4}.noContestJoined_1d9ed{margin:16px 0}.myContest_fed50{height:100%}.toolbar_866b4{left:0;top:0;width:100%;position:fixed;z-index:2;max-width:550px;height:148px}.toolbarTitle_f2b24{text-transform:capitalize;text-align:center;height:48px;display:flex}.tabContainer_08a63{margin:8px;padding-top:96px}.tab_68e0b{display:flex;width:100%;justify-content:space-around;border-radius:8px;background-color:#fff;height:36px;align-items:center;box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.16);border:solid 1px #d5d5d5;overflow:hidden}.tabItem_eca4e{flex:1;display:flex;align-items:center;justify-content:center;height:100%;border-right:0.5px solid #d5d5d5}.tabColor_b4298{background-color:#3b5998;color:#fff}.noBorder_1ee9d{border-right:none}.carousel_17343{padding-bottom:55px;padding-top:148px;height:100%}.list_029e0{display:flex}.matchListContainer_3ec17{width:100%}.matchCardDetail_044df{display:flex;justify-content:space-around;align-items:center;height:100px;width:100%;border-bottom:1px solid #e8e8e8}.linkContainer_8f11c{display:flex;justify-content:space-between;padding:8px;height:40px;align-items:center;background-color:#fff}.linkLeft_ea968{color:#3b5998}.linkRight_388a3{color:#9b9b9b}.matchContainer_9d8d1{display:flex;flex-direction:column;max-width:550px;-webkit-overflow-scrolling:touch;width:100%;height:100%;overflow:scroll}.noContestInfo_95860{display:flex;align-items:center;justify-content:center;margin-top:8px}.card_868db{text-decoration:none;color:inherit}.flagMainContainer_4d902{min-width:68px;min-height:68px}.bigFlag_178ea{width:68px;max-height:68px}.completedLabel_59f0d{color:#2eb13e}.flagContainer_d8120{display:flex;align-items:center;justify-content:space-around;margin:4px}.rndCompleted_13aac{color:#1bae62}.entryFeeInfo_7de8d{font-size:14px;color:#969696}.contestFull_b7027{color:#f50000}.whiteBorderedButton_6b901{background:none;border:1px solid #FFF;cursor:pointer;margin:0 8px;text-decoration:none;text-align:center;font-family:inherit;display:flex;justify-content:center;align-items:center;color:#FFF;font-weight:500;font-size:12px;height:32px;padding:0 8px;outline:none;text-transform:uppercase;border-radius:20px}.currentUserRow_2fe09{background-color:#e5f1ff}.teamRowSelected_ae508{background-color:#fff7ec}.desktopTeamPreviewContainer_61fb1{position:fixed;left:550px;width:550px;height:100%;top:0;max-width:550px}.content_60710{background-repeat:no-repeat;background-size:cover;background-position:center;min-height:100%;display:flex;flex-direction:column;height:100%}.toolbar_650b2{width:100%;background-color:transparent;flex:0;position:fixed;height:48px;z-index:2;max-width:550px}.toolbarElementMain_7948b{flex:1;display:flex}.toolbarElementLeft_19260{justify-content:flex-start;color:#fff;padding:8px}.toolbarElementRight_c98d9{justify-content:flex-end}.toolbarElementIcon_3d48d{color:#fff}.playerArea_eac11{position:relative;height:100%;overflow:scroll}.previewFooter_23016{position:fixed;bottom:0;right:0;height:56px;background:#323232;max-width:550px}.previewFooterDesktop_4721a{left:550px}.leaderboardPreviewFooter_3ec17{width:100%}.footerElement_4be2d{display:flex;justify-content:flex-start;width:100%}.footerPointsContainer_9f0ad{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:space-around;padding:8px}.footerElementValue_bfa59{font-size:16px;color:#fff}.footerElementKey_415ad{font-size:8px;color:#ADADAD;text-transform:uppercase;text-align:center}.white_bec4c{stroke:#fff}.spaceAround_64779{justify-content:space-around}.tall_56497{position:absolute;top:0;left:0;min-height:100%;width:100%;display:flex;flex-direction:column;justify-content:space-evenly;padding:24px 0 60px 0}.teamPreviewRowWrapper_0c54c{width:100%;padding-top:8px}.rowTitle_b91f3{margin-bottom:4px;text-align:center;color:#fff;text-transform:uppercase;font-size:var(--font-small);opacity:0.52}.rowContent_8aa5f{display:flex;justify-content:space-evenly;align-items:center;padding:8px 0;height:85px}.fieldPlayerMain_32975{display:flex;flex-direction:column;align-items:center}.playerImageProfile_0cc1f{height:38px;width:38px;border-radius:10px 0;position:relative}.imageProfileContainer_6e52e{display:flex;flex-direction:column;overflow:hidden;height:100%;width:100%}.fieldPlayerTitle_4ac32{width:65px;overflow:hidden;text-overflow:ellipsis;color:#fff;text-align:center;font-size:var(--font-small);white-space:nowrap;box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.25);border-radius:2px;padding:0 4px}.playerPoints_d4e06{white-space:nowrap;color:#fff;text-align:center;padding:2px;font-size:var(--font-small)}</style>
  
  <link rel="preload" as="style" href="<?php echo base_url('web_assets/css/montserrat-400,500,600-v2.css'); ?> ">
  <link rel="preload" as="font" href="<?php echo base_url('web_assets/css/MaterialIcons-Regular.woff2'); ?> ">
  <link rel="preload" as="script" href="<?php echo base_url('web_assets/js/  chunktemp.js'); ?>">
  <link rel="preload" as="script" href="<?php echo base_url('web_assets/javascript/chunktemp.js');?> ">
  <link rel="stylesheet" href="<?php echo base_url('web_assets/css/chunktemp.css'); ?> ">
  <link href="<?php echo base_url('web_assets/css/montserrat-400,500,600-v2.css'); ?> " rel="stylesheet">
  <script type="text/javascript" charset="utf8" async="" src="./leader_files/platform.js.download" gapi_processed="true"></script><script charset="utf-8" src="./leader_files/10-2807bc49dc1fe0c14037-chunktemp.js.download"></script><style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_dialog_advanced{border-radius:8px;padding:10px}.fb_dialog_content{background:#fff;color:#373737}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{left:5px;right:auto;top:5px}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{height:100%;left:0;margin:0;overflow:visible;position:absolute;top:-10000px;transform:none;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{background:none;height:auto;min-height:initial;min-width:initial;width:auto}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{clear:both;color:#fff;display:block;font-size:18px;padding-top:20px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .4);bottom:0;left:0;min-height:100%;position:absolute;right:0;top:0;width:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_mobile .fb_dialog_iframe{position:sticky;top:0}.fb_dialog_content .dialog_header{background:linear-gradient(from(#738aba), to(#2c4987));border-bottom:1px solid;border-color:#1d3c78;box-shadow:white 0 1px 1px -1px inset;color:#fff;font:bold 14px Helvetica, sans-serif;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:linear-gradient(from(#4267B2), to(#2a4887));background-clip:padding-box;border:1px solid #29487d;border-radius:3px;display:inline-block;line-height:18px;margin-top:3px;max-width:85px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{background:none;border:none;color:#fff;font:bold 12px Helvetica, sans-serif;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #4a4a4a;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f5f6f7;border:1px solid #4a4a4a;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-position:50% 50%;background-repeat:no-repeat;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}</style><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" charset="utf8" async="" src="./leader_files/abtest-bundle.js.download"></script><script type="text/javascript" src="./leader_files/a" rel="nofollow" async=""></script><script type="text/javascript" src="./leader_files/a(1)" rel="nofollow" async=""></script><script type="text/javascript" src="./leader_files/a(2)" rel="nofollow" async=""></script><script type="text/javascript" src="./leader_files/a(3)" rel="nofollow" async=""></script><script charset="utf-8" src="./leader_files/18-d796c636623f53f329e4-chunktemp.js.download"></script><style type="text/css" id="qual_style-mzj"></style><style type="text/css" id="qual_style-meu"></style><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" src="./leader_files/a(4)" rel="nofollow" async=""></script><script charset="utf-8" src="./leader_files/12-73370aa57dbd742e2340-chunktemp.js.download"></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" src="./leader_files/a(5)" rel="nofollow" async=""></script><script type="text/javascript" src="./leader_files/a(6)" rel="nofollow" async=""></script><script type="text/javascript" src="./leader_files/a(7)" rel="nofollow" async=""></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" src="./leader_files/a(8)" rel="nofollow" async=""></script><script charset="utf-8" src="./leader_files/0-54e9e8efa031d24c9636-chunktemp.js.download"></script><script charset="utf-8" src="./leader_files/1-9762da8c30255aacc832-chunktemp.js.download"></script><script charset="utf-8" src="./leader_files/20-37f107844db624cded63-chunktemp.js.download"></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" src="./leader_files/a(9)" rel="nofollow" async=""></script><script charset="utf-8" src="./leader_files/23-72ba053f9782310b4439-chunktemp.js.download"></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script charset="utf-8" src="./leader_files/24-33258cc99bac52b66b43-chunktemp.js.download"></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script charset="utf-8" src="./leader_files/28-4c3f80aa57efecf414f6-chunktemp.js.download"></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><script type="text/javascript" src="./leader_files/a(10)" rel="nofollow" async=""></script><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"><meta http-equiv="google-site-verification" content="h6JUgqX9dMFO0C4E5VqUOBK7lb6vuDQOyebWaxUzBEc"></head>


<body cz-shortcut-listen="true" class="">
  <div>
    <div class="app-container appContainer_6475d">
  <div class="appBgImage_fd065">
  </div>
  <div class="lazy-container-leaderboard">
  	<div class="lazy-leaderboard">
  		<div class="leaderboard-view leaderboard_c97e9">
  			<div class="match-header">
  				<div class="headerContainer_199c8 headerFixed_38df7 headerShadow_22469">
  					<div class="row-1 headerRow_c14ad">
  						<div class="headerLeft_36c4e">
  							<button class="btn btn--icon">
  								<a style="color: #fff; text-decoration: none;" href="<?php echo base_url('website/contest?match='.$contest['match_id'].''); ?>">
  								<div class="align-center">
  									<i class="material-icons">arrow_back</i>
  								</div></a>
  							</button>
  							</div>
  							<div class="headerCenter_4d6f0">
  								<div class="headerTitle_fd62d">CONTEST DETAILS</div>
  							</div>
  							<div class="headerRight_ba2d2">
  								
  							</div>
  						</div>
  						<div class="info-bar infobar_0dc07">
  							<div class="infobarContent_628aa">
  								<div class="infobarContentRow_7ae93">
  									<div class="js--match-header-title infobarContentLeft_04a34"><?php echo $match['title'] ?></div>
  									
  								</div>
  							</div>
  						</div>
  									</div>
  								</div>
  								<div>
  									</div>
  									<div>
  										 <div>
        	<div class="contest-card__row-item--selected">
        		<div class="contest-card__row">
        			<div class="contest-card__winning-amount"><span>
        			<span class="d11-icon">Rs</span><span class="currency-amount"><?php echo $contest['prize_pool']; ?> </span></span></div>
        <div class="contest-card__team-winner-column"><div class="contest-card__progressbar-wrapper"><div><?php echo $contest['join_team']; ?> /<?php echo $contest['total_team']; ?> Teams</div><div class="contest-card__progressbar"><div class="contest-card__progressbar--complete" style="width: 25%;"></div></div></div>
        <div class="contest-card__team-winner-column__bottom-section"><span><!-- 88% Winners --></span></div></div>
        <div class="contest-card__join-btn js-contest-card__join-btn"><div><button class="btn btn--flat btn--thin btn--small btn--green">
          <div class="align-center"><span><span class="d11-icon">Rs</span><span class="currency-amount"> <?php echo $contest['entry'];?></span></span></div></button></div></div></div>
          <div><div><div class="contest-card__wining-breakup"><div class="contest-card__wining-breakup__title">Prize Pool Breakup</div><div class="contest-card__winner-card">
            <?php foreach($winning_info as $winning){?>
            	
              <div class="contest-card__winner-row">
              <div class="contest-card__winner-row__section--title">
                <span>
                <span class="d11-icon">Rs</span>
            <span class="currency-amount"><?php echo $winning['price'] ?></span></span>
          </div>
          <div class="contest-card__winner-row__first"><div class="contest-card__winner-row__section contest-card__rank"># <?php echo $winning['rank'] ?> Rank</div></div>
          </div>

            <?php } ?>
</div></div>


              <div class="contest-card__tnc"><div class="contest-card__tnc-row"><div class="contest-card__tnc--icon contest-card__win-conf">C</div><div>
                <?php echo $contest['contest_note1'];?>
              </div></div>


              <div class="contest-card__tnc-row"><div class="contest-card__tnc--icon contest-card__multi-entry">M</div><div> <?php echo $contest['contest_note2'];?></div></div></div></div></div></div></div>
				<!-- <div class="contest-card__row-item--selected cash-contest-card__joined">
					<div class="contest-card__row">
				<div class="contest-card__winning-amount">PRACTICE</div>
				<div class="contest-card__team-winner-column">
					<div class="contest-card__progressbar-wrapper">
					<div>100/100 Teams</div>
					<div class="contest-card__progressbar">
						<div class="contest-card__progressbar--complete" style="width: 100%;">
						</div>
					</div>
				</div>
				<div class="contest-card__team-winner-column__bottom-section">
					<span>100% Winners</span><i class="material-icons">keyboard_arrow_up</i>
				</div>
			</div>
			<div class="contest-card__join-btn js-contest-card__join-btn"><button class="btn btn--flat btn--thin btn--small btn--raised">
				<div class="align-center">INVITE</div>
			</button>
		</div>
	</div>
	<div>
		<div class="contest-card__content--open">Improve your skill in this practice contest</div>
		<div class="contest-card__tnc"></div>
	</div>
</div> -->
  						</div>
  							<div>
  								<div class="leaderboard">
  									<div>Leaderboard</div>
  								<div class="leaderboard__icon js--pdf-download-btn">
  									
  								</div>
  							</div>
  							<div class="leaderboard__header">
  								<div>TEAM</div>
  								<div>RANK</div>
  							</div>
  							<div>
  								<div>

<?php if(count($leaderboards) >0) { foreach($leaderboards as $leaderboard){ ?>
                  <div><div onclick="team_view(<?php echo $leaderboard['teamid'];?>,'<?php echo $match['match_status'] ?>',<?php echo $leaderboard['user_id'] ?>);" class="leaderboard__players-container js--leaderboard__players-container"><div class="leaderboard__players"><img class="leaderboard__players__image" src="<?php echo base_url('uploads/leaderboard/'.$leaderboard['image']); ?> ">
                <div class="leaderboard__players__user-information"><div><?php echo $leaderboard['name']; ?> (T1) <?php echo $leaderboard['points']; ?> </div></div><div class="leaderboard__players__rank-container"><div class="leaderboard__players__rank"><div><?php if($leaderboard['rank'] !="-"){echo $leaderboard['rank'];} else {echo "-"; } ?> </div><div></div></div></div></div></div></div>
                 <?php } } else {?>
                  <div><div class="leaderboard__players-container js--leaderboard__players-container"><div class="leaderboard__players">
                <div class="leaderboard__players__user-information"><div>No User join this contest </div></div><div class="leaderboard__players__rank-container"><div class="leaderboard__players__rank"><div></div><div></div></div></div></div></div></div>
                  <?php } ?>
  									









  														<div>
  																

  														</div></div></div>

  														<div id="team_preview">
  															
  														</div>

  														<div class="contest-joiner"></div></div></div></div></div></div>
    
    
    
<noscript>
  <style>
    #app {
      display: none;
    }
    .noscript-header {
      height: 98px;
      background-color: #c51d23;
      display: flex;
      justify-content: center;
    }
    .logo {
      height: 48px;
      padding: 8px;
    }
    .noscript-message {
      color: #888;
      text-align: center;
      height: 400px;
      width: 80%;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .noscript-container {
      max-width: 550px;
      height: 100%;
    }
    .app-bg {
      background-image: url("<?php echo base_url('web_assets/public/imgs/desktop-pwa_2.jpg'); ?>");
      position: fixed;
      left: 550px;
      right: 0;
      background-size: cover;
      top: 0;
      bottom: 0;
    }
  </style>
</noscript>

</body></html>


<script type="text/javascript">
  function team_view(id,matchStatus,user)
  {
  	
  	var session_user = "<?php echo $this->session->userdata('user_id'); ?>";
  	
  	if(matchStatus =="Fixture" && user != session_user)
  	{
  		alert('Please Wait till match start');
  	}
  	else
  	{
  		var id = id;
	    $.ajax({
	            type : 'post',       
	            url: SITE_URL+'website/team_preview',
	            data : { id : id},
	            success : function(data) {
	                   $('#team_preview').html(data);
	              }
	        });
	}	

  	
  }
</script>