(function(g){var window=this;var kDa=function(a,b,c){a.o.has(b);a.o.add(b);g.zf(c,function(){g.oxa(a,b)})},i5=function(a,b,c){var d=b.Ha();
g.T(a.element,"ytp-suggestion-set",!!d.videoId);var e=b.getPlaylistId();c=b.kd(c?c:"mqdefault.jpg");var f=b instanceof g.GP&&b.lengthSeconds?g.NV(b.lengthSeconds):null,k=!!e;e=k&&"RD"==(new g.tR(e.substr(0,2),e.substr(2))).type;var l=b instanceof g.GP?b.Fa:null;d={title:b.title,author:b.author,author_and_views:d.shortViewCount?b.author+" \u2022 "+d.shortViewCount:b.author,aria_label:b.Ol||g.DV("$TITLE \u3092\u518d\u751f",{TITLE:b.title}),duration:f,url:b.Dm(),is_live:l,is_list:k,is_mix:e,background:c?
"background-image: url("+c+")":""};b instanceof g.vR&&(d.playlist_length=b.getLength());a.update(d)},j5=function(a,b){g.qQ.call(this,{I:"div",
ca:["html5-endscreen","ytp-player-content",b||"base-endscreen"]});this.player=a;this.created=!1},k5=function(a){g.W.call(this,{I:"div",
ca:["ytp-upnext","ytp-player-content"],U:{"aria-label":"{{aria_label}}"},P:[{I:"div",M:"ytp-cued-thumbnail-overlay-image",U:{style:"{{background}}"}},{I:"span",M:"ytp-upnext-top",P:[{I:"span",M:"ytp-upnext-header",ba:"\u6b21\u306e\u52d5\u753b"},{I:"span",M:"ytp-upnext-title",ba:"{{title}}"},{I:"span",M:"ytp-upnext-author",ba:"{{author}}"}]},{I:"a",M:"ytp-upnext-autoplay-icon",U:{role:"button",href:"{{url}}","aria-label":"\u6b21\u306e\u52d5\u753b\u3092\u518d\u751f"},P:[{I:"svg",U:{height:"100%",version:"1.1",
viewBox:"0 0 72 72",width:"100%"},P:[{I:"circle",M:"ytp-svg-autoplay-circle",U:{cx:"36",cy:"36",fill:"#fff","fill-opacity":"0.3",r:"31.5"}},{I:"circle",M:"ytp-svg-autoplay-ring",U:{cx:"-36",cy:"36","fill-opacity":"0",r:"33.5",stroke:"#FFFFFF","stroke-dasharray":"211","stroke-dashoffset":"-211","stroke-width":"4",transform:"rotate(-90)"}},{I:"path",M:"ytp-svg-fill",U:{d:"M 24,48 41,36 24,24 V 48 z M 44,24 v 24 h 4 V 24 h -4 z"}}]}]},{I:"span",M:"ytp-upnext-bottom",P:[{I:"span",M:"ytp-upnext-cancel"},
{I:"span",M:"ytp-upnext-paused",ba:"\u81ea\u52d5\u518d\u751f\u306f\u4e00\u6642\u505c\u6b62\u3055\u308c\u3066\u3044\u307e\u3059"}]}]});this.F=null;var b=this.o["ytp-upnext-cancel"];this.F=new g.W({I:"button",ca:["ytp-upnext-cancel-button","ytp-button"],U:{tabindex:"0","aria-label":"\u81ea\u52d5\u518d\u751f\u3092\u30ad\u30e3\u30f3\u30bb\u30eb\u3059\u308b"},ba:"\u30ad\u30e3\u30f3\u30bb\u30eb"});g.K(this,this.F);this.F.X("click",this.LQ,this);this.F.ya(b);this.B=a;this.L=this.o["ytp-svg-autoplay-ring"];
this.H=this.G=this.C=this.D=null;this.J=new g.U(this.Qo,5E3,this);g.K(this,this.J);this.K=0;this.O(this.o["ytp-upnext-autoplay-icon"],"click",this.PS);this.qE();this.O(a,"autonavvisibility",this.qE);this.O(a,"mdxnowautoplaying",this.fS);this.O(a,"mdxautoplaycanceled",this.gS);this.O(a,"mdxautoplayupnext",this.VG);3==this.B.getPresentingPlayerType()&&(a=(a=g.SU(g.NU(this.B)))?a.XK():null)&&this.VG(a)},l5=function(a,b){if(!a.C){g.bF("a11y-announce","\u6b21\u306e\u52d5\u753b "+a.D.title);
a.K=g.mH();a.C=new g.U((0,g.A)(a.wt,a,b),25);a.wt(b);var c=b||g.Y(a.B).experiments.A("autoplay_time")||1E4;a.B.Ca("onAutonavCoundownStarted",c)}g.or(a.element,"ytp-upnext-autoplay-paused")},n5=function(a){m5(a);
a.K=g.mH();a.wt();g.S(a.element,"ytp-upnext-autoplay-paused")},m5=function(a){a.C&&(a.C.dispose(),a.C=null)},o5=function(a,b){b=void 0===b?!1:b;
if(g.Y(a.B).experiments.o("autonav_notifications")&&b&&window.Notification&&document.hasFocus){var c=Notification.permission;"default"==c?Notification.requestPermission():"granted"!=c||document.hasFocus()||(c=a.D.Ha(),a.Qo(),a.G=new Notification("\u6b21\u306e\u52d5\u753b",{body:c.title,icon:c.kd()}),a.H=a.O(a.G,"click",a.GS),a.J.start())}m5(a);a.B.nextVideo(!1,b)},lDa=function(a){j5.call(this,a,"subscribecard-endscreen");
var b=a.getVideoData();this.B=new g.W({I:"div",M:"ytp-subscribe-card",P:[{I:"img",M:"ytp-author-image",U:{src:b.Qk}},{I:"div",M:"ytp-subscribe-card-right",P:[{I:"div",M:"ytp-author-name",ba:b.author},{I:"div",M:"html5-subscribe-button-container"}]}]});g.K(this,this.B);this.B.ya(this.element);this.C=new g.x_("\u767b\u9332",null,"\u767b\u9332\u89e3\u9664",null,!0,!1,b.sl,b.subscribed,"trailer-endscreen",null,null,a);g.K(this,this.C);this.C.ya(this.B.o["html5-subscribe-button-container"]);this.hide()},
p5=function(a){var b=g.Y(a),c=g.HL||g.Ef?{style:"will-change: opacity"}:void 0,d=b.o,e=["ytp-videowall-still"];
b.B&&e.push("ytp-videowall-show-text");g.W.call(this,{I:"a",ca:e,U:{href:"{{url}}",target:d?b.G:"","aria-label":"{{aria_label}}","data-is-live":"{{is_live}}","data-is-list":"{{is_list}}","data-is-mix":"{{is_mix}}"},P:[{I:"div",M:"ytp-videowall-still-image",U:{style:"{{background}}"}},{I:"span",M:"ytp-videowall-still-info",P:[{I:"span",M:"ytp-videowall-still-info-bg",P:[{I:"span",M:"ytp-videowall-still-info-content",U:c,P:[{I:"span",M:"ytp-videowall-still-info-title",ba:"{{title}}"},{I:"span",M:"ytp-videowall-still-info-author",
ba:"{{author_and_views}}"},{I:"span",M:"ytp-videowall-still-info-live",ba:"\u30e9\u30a4\u30d6"},{I:"span",M:"ytp-videowall-still-info-duration",ba:"{{duration}}"}]}]}]},{I:"span",ca:["ytp-videowall-still-listlabel-regular","ytp-videowall-still-listlabel"],P:[{I:"span",M:"ytp-videowall-still-listlabel-icon"},"\u518d\u751f\u30ea\u30b9\u30c8",{I:"span",M:"ytp-videowall-still-listlabel-length",P:[" (",{I:"span",ba:"{{playlist_length}}"},")"]}]},{I:"span",ca:["ytp-videowall-still-listlabel-mix","ytp-videowall-still-listlabel"],
P:[{I:"span",M:"ytp-videowall-still-listlabel-mix-icon"},"\u30df\u30c3\u30af\u30b9\u30ea\u30b9\u30c8",{I:"span",M:"ytp-videowall-still-listlabel-length",ba:" (50+)"}]}]});this.F=d;this.B=a;this.C=null;this.D=new g.UG(this);g.K(this,this.D);this.X("click",this.H);this.X("keypress",this.J);this.D.O(a,"videodatachange",this.G);g.Y(a).ka&&kDa(a.app.na,this.element,this);this.G()},q5=function(a){j5.call(this,a,"videowall-endscreen");
this.K=a;this.G=0;this.C=[];this.H=this.D=this.F=null;this.J=this.Z=!1;this.T=null;this.Y=new g.UG(this);g.K(this,this.Y);this.L=new g.U(g.La(g.S,this.element,"ytp-show-tiles"),0);g.K(this,this.L);var b=new g.W({I:"button",ca:["ytp-button","ytp-endscreen-previous"],U:{"aria-label":"\u524d\u3078"},P:[g.GV()]});g.K(this,b);b.ya(this.element);b.X("click",this.zO,this);this.N=new g.lQ({I:"div",M:"ytp-endscreen-content"});g.K(this,this.N);this.N.ya(this.element);b=new g.W({I:"button",ca:["ytp-button",
"ytp-endscreen-next"],U:{"aria-label":"\u6b21\u3078"},P:[g.HV()]});g.K(this,b);b.ya(this.element);b.X("click",this.yO,this);this.B=new k5(a);g.K(this,this.B);g.eV(this.player,this.B.element,4);this.hide()},r5=function(a){return g.gV(a.player)&&a.cA()&&!a.H},mDa=function(a,b){return(0,g.I)(b.suggestions,function(b){b=g.ZV(g.Y(a.K),b);
g.K(a,b);return b})},s5=function(a){var b=a.eg();
b!=a.Z&&(a.Z=b,a.player.V("autonavvisibility"))},t5=function(a){g.nV.call(this,a);
this.o=null;this.A=new g.UG(this);g.K(this,this.A);this.B=g.Y(a);nDa(a)?this.o=new q5(this.player):this.B.Qa?this.o=new lDa(this.player):this.o=new j5(this.player);g.K(this,this.o);g.eV(this.player,this.o.element,4);this.LF();this.A.O(a,"videodatachange",this.LF,this);this.A.O(a,g.sR("endscreen"),this.NN,this);this.A.O(a,"crx_endscreen",this.ON,this)},nDa=function(a){a=g.Y(a);
return a.Oa&&!a.Qa};
g.r(j5,g.qQ);j5.prototype.create=function(){this.created=!0};
j5.prototype.destroy=function(){this.created=!1};
j5.prototype.cA=function(){return!1};
j5.prototype.eg=function(){return!1};g.r(k5,g.W);g.h=k5.prototype;g.h.Qo=function(){this.G&&(this.J.stop(),this.Ma(this.H),this.H=null,this.G.close(),this.G=null)};
g.h.qE=function(){g.pQ(this,this.B.eg())};
g.h.GS=function(){window.focus();this.Qo()};
g.h.hide=function(){g.W.prototype.hide.call(this)};
g.h.wt=function(a){a=a||g.Y(this.B).experiments.A("autoplay_time")||1E4;var b=Math.min(g.mH()-this.K,a);a=Math.min(b/a,1);this.L.setAttribute("stroke-dashoffset",-211*(a+1));1<=a&&3!=this.B.getPresentingPlayerType()?o5(this,!0):this.C&&this.C.start()};
g.h.PS=function(a){!g.se(this.F.element,g.HG(a))&&g.aW(a,this.B)&&o5(this)};
g.h.LQ=function(){g.PU(this.B,!0)};
g.h.fS=function(a){this.B.getPresentingPlayerType();this.show();l5(this,a)};
g.h.VG=function(a){this.B.getPresentingPlayerType();this.D&&this.D.Ha().videoId==a.Ha().videoId||(this.D=a,i5(this,a,"hqdefault.jpg"))};
g.h.gS=function(){this.B.getPresentingPlayerType();m5(this);this.hide()};
g.h.W=function(){m5(this);this.Qo();g.W.prototype.W.call(this)};g.r(lDa,j5);g.r(p5,g.W);p5.prototype.Xk=function(){g.iV(this.B,this.element);var a=this.C.Ha().videoId,b=this.C.getPlaylistId();g.L0(this.B.app,a,this.C.Nd,b,void 0,void 0,void 0)};
p5.prototype.H=function(a){g.aW(a,this.B,this.F,this.C.Nd||void 0)&&this.Xk()};
p5.prototype.J=function(a){switch(a.keyCode){case 13:case 32:g.NG(a)||(this.Xk(),g.MG(a))}};
p5.prototype.G=function(){var a=this.B.getVideoData(),b=g.Y(this.B);this.F=a.Nc?!1:b.o};g.r(q5,j5);g.h=q5.prototype;g.h.create=function(){j5.prototype.create.call(this);var a=this.player.getVideoData();a&&(this.F=mDa(this,a),this.D=a);this.ah();this.Y.O(this.player,"appresize",this.ah);this.Y.O(this.player,"onVideoAreaChange",this.ah);this.Y.O(this.player,"videodatachange",this.AO);this.Y.O(this.player,"autonavchange",this.lw);this.Y.O(this.player,"autonavcancel",this.xO);a=this.D.autonavState;a!=this.T&&this.lw(a);this.Y.O(this.element,"transitionend",this.nU)};
g.h.destroy=function(){g.WG(this.Y);g.Bf(this.C);this.C=[];this.F=null;j5.prototype.destroy.call(this);g.or(this.element,"ytp-show-tiles");this.L.stop();this.T=this.D.autonavState};
g.h.cA=function(){return 1!=this.D.autonavState};
g.h.show=function(){j5.prototype.show.call(this);g.or(this.element,"ytp-show-tiles");g.Y(this.player).B?g.dv(this.L):this.L.start();(this.J||this.H&&this.H!=this.D.clientPlaybackNonce)&&g.PU(this.player,!1);r5(this)?(s5(this),2==this.D.autonavState?g.Y(this.player).experiments.o("fast_autonav_in_background")&&3==this.player.getVisibilityState()?o5(this.B,!0):l5(this.B):3==this.D.autonavState&&n5(this.B)):(g.PU(this.player,!0),s5(this))};
g.h.hide=function(){j5.prototype.hide.call(this);n5(this.B);s5(this)};
g.h.nU=function(a){g.HG(a)==this.element&&this.ah()};
g.h.ah=function(){if(this.F&&this.F.length){g.S(this.element,"ytp-endscreen-paginate");var a=g.YU(this.K,!0),b=g.BQ(this.K);b&&(b=b.dd()?48:32,a.width-=2*b);var c=a.width/a.height,d=96/54,e=b=2,f=Math.max(a.width/96,2),k=Math.max(a.height/54,2),l=this.F.length,m=Math.pow(2,2);var n=l*m+(Math.pow(2,2)-m);n+=Math.pow(2,2)-m;for(n-=m;0<n&&(b<f||e<k);){var p=b/2,t=e/2,x=b<=f-2&&n>=t*m,y=e<=k-2&&n>=p*m;if((p+1)/t*d/c>c/(p/(t+1)*d)&&y)n-=p*m,e+=2;else if(x)n-=t*m,b+=2;else if(y)n-=p*m,e+=2;else break}d=
!1;n>=3*m&&6>=l*m-n&&(4<=e||4<=b)&&(d=!0);m=96*b;n=54*e;c=m/n<c?a.height/n:a.width/m;c=Math.min(c,2);m*=c;n*=c;m*=g.Fd(a.width/m||1,1,1.21);n*=g.Fd(a.height/n||1,1,1.21);m=Math.floor(Math.min(a.width,m));n=Math.floor(Math.min(a.height,n));a=this.N.element;g.ai(a,m,n);g.Jh(a,{marginLeft:m/-2+"px",marginTop:n/-2+"px"});c=this.B;f=this.F[0];c.D=f;i5(c,f,"hqdefault.jpg");g.T(this.element,"ytp-endscreen-takeover",r5(this));s5(this);m+=4;n+=4;for(f=c=0;f<b;f++)for(k=0;k<e;k++)if(p=c,t=0,d&&f>=b-2&&k>=e-
2?t=1:0==k%2&&0==f%2&&(2>k&&2>f?0==k&&0==f&&(t=2):t=2),p=g.Gd(p+this.G,l),0!=t){x=this.C[c];x||(x=new p5(this.player),this.C[c]=x,a.appendChild(x.element));y=Math.floor(n*k/e);var E=Math.floor(m*f/b),G=Math.floor(n*(k+t)/e)-y-4,N=Math.floor(m*(f+t)/b)-E-4;g.Qh(x.element,E,y);g.ai(x.element,N,G);g.Jh(x.element,"transitionDelay",(k+f)/20+"s");g.T(x.element,"ytp-videowall-still-mini",1==t);g.T(x.element,"ytp-videowall-still-large",2<t);t=x;p=this.F[p];t.C!=p&&(t.C=p,i5(t,p,g.mr(t.element,"ytp-videowall-still-large")?
"hqdefault.jpg":"mqdefault.jpg"),x=(p=p.Nd)&&p.itct)&&(p=t.B,g.Y(p).ka&&(t=t.element,p.app.na.o.has(t),x&&(t.visualElement=g.LH(x))));c++}g.T(this.element,"ytp-endscreen-paginate",c<l);for(b=this.C.length-1;b>=c;b--)e=this.C[b],g.me(e.element),g.Af(e);this.C.length=c}};
g.h.AO=function(){var a=this.player.getVideoData();this.D!=a&&(this.G=0,this.F=mDa(this,a),this.D=a,this.ah())};
g.h.yO=function(){this.G+=this.C.length;this.ah()};
g.h.zO=function(){this.G-=this.C.length;this.ah()};
g.h.aN=function(){return!!this.B.C};
g.h.lw=function(a){1==a?(this.J=!1,this.H=this.D.clientPlaybackNonce,m5(this.B),this.A&&this.ah()):(this.J=!0,this.A&&r5(this)&&(2==a?l5(this.B):3==a&&n5(this.B)))};
g.h.xO=function(a){if(a){for(a=0;a<this.C.length;a++)g.jV(this.K,this.C[a].element,!0);this.lw(1)}else this.H=null,this.J=!1;this.ah()};
g.h.eg=function(){return this.A&&r5(this)};g.r(t5,g.nV);g.h=t5.prototype;g.h.Pn=function(){var a=this.player.getVideoData(),b=!!(a&&a.suggestions&&a.suggestions.length);b=!nDa(this.player)||b;a=a.Qd;var c=g.u0(this.player.app);return b&&!a&&!c};
g.h.eg=function(){return this.o.eg()};
g.h.VM=function(){return this.eg()?this.o.aN():!1};
g.h.W=function(){g.cV(this.player,"endscreen");g.nV.prototype.W.call(this)};
g.h.load=function(){g.nV.prototype.load.call(this);this.o.show()};
g.h.unload=function(){g.nV.prototype.unload.call(this);this.o.hide();this.o.destroy()};
g.h.NN=function(a){this.Pn()&&(this.o.created||this.o.create(),"load"==a.getId()&&this.load())};
g.h.ON=function(a){"load"==a.getId()&&this.loaded&&this.unload()};
g.h.LF=function(){g.cV(this.player,"endscreen");var a=Math.max(1E3*(this.player.getVideoData().lengthSeconds-10),0);a=new g.qR(a,0x8000000000000,{id:"preload",namespace:"endscreen"});g.K(this,a);var b=new g.qR(0x8000000000000,0x8000000000000,{id:"load",priority:6,namespace:"endscreen"});g.K(this,b);g.$U(this.player,[a,b])};g.VZ.endscreen=t5;})(_yt_player);