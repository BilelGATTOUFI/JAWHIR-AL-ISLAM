var cs_prive=window.location.pathname.match(/\/ecrire\/$/)!=null;
jQuery.fn.cs_todo=function(){return this.not('.cs_done').addClass('cs_done');};
var sommaire_sel = 'div.cs_sommaire_titre_avec_fond, div.cs_sommaire_titre_sans_fond';

// compatibilite Ajax : ajouter "this" a "jQuery" pour mieux localiser les actions 
// et tagger avec cs_done pour eviter de binder plrs fois le meme bloc
function cs_sommaire_init() {
	jQuery(sommaire_sel, this)
		.cs_todo()
		.click( function(){
			jQuery(this).toggleClass('cs_sommaire_replie')
				.next().toggleClass('cs_sommaire_invisible')
			// annulation du clic
			return false;
		});
}

// Sauve l'etat du 1er sommaire de la page dans un cookie si on quitte la page, et le remet quand on revient
// pour SPIP < 2.0, il faut le plugin jquery.cookie.js
function cs_sommaire_cookie() {
	if(typeof jQuery.cookie!='function') return;
	var replie = jQuery.cookie('cs_sommaire');
	jQuery.cookie('cs_sommaire', null);
	if (Number(replie))
		jQuery(sommaire_sel).eq(0).addClass('cs_sommaire_replie')
			.next().toggleClass('cs_sommaire_invisible');
	jQuery(window).bind('unload', function() {
		jQuery.cookie('cs_sommaire',
			Number(jQuery(sommaire_sel).eq(0).is('.cs_sommaire_replie'))
		);
	});
}

function lancerlien(a,b){ x='ma'+'ilto'+':'+a+'@'+b; return x; }
function soft_scroller_init() { if(typeof jQuery.localScroll=="function") jQuery.localScroll({hash: true}); }
var cs_init = function() {
	cs_sommaire_init.apply(this);
	jQuery('span.spancrypt', this).attr('class','cryptOK').html('&#6'+'4;');
	jQuery("a["+cs_sel_jQuery+"title*='..']", this).each(function () {
		this.title = this.title.replace(/\.\..t\.\./,'[@]');
	});
	soft_scroller_init.apply(this);
}
if(typeof onAjaxLoad=='function') onAjaxLoad(cs_init);
if(window.jQuery) {
var cs_sel_jQuery=typeof jQuery(document).selector=='undefined'?'@':'';
var cs_CookiePlugin="../prive/javascript/jquery.cookie.js";
jQuery(document).ready(function(){
	if(jQuery("div.cs_sommaire").length) {
		// s'il y a un sommaire, on cache la navigation haute sur les pages
		jQuery("div.decoupe_haut").css("display", "none");
		// utilisation des cookies pour conserver l'etat du sommaire si on quitte la page
		if(cs_CookiePlugin) jQuery.getScript(cs_CookiePlugin, cs_sommaire_cookie);
	}
	cs_init.apply(document);
});
}