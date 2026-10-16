<?php

/*
 * Squelette : plugins/auto/socialtags/socialtags.js.html
 * Date :      Mon, 10 Nov 2014 19:35:48 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:16 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/socialtags/socialtags.js.html
// Temps de compilation total: 0.802 ms
//

function html_9e8bd124f68188340d48ab41dfd802e7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Content-Type: text/javascript' . '"); ?'.'>' .
'// socialtags.js

// \'ajouter un bookmark\' ne marche que sous IE
// les tuyaux trouves pour FF
//	window.sidebar.addPanel(t,u,\'\');
//	cf https://bugzilla.mozilla.org/show_bug.cgi?id=214530
// ou Opera sont creves
;var socialtags_addfavorite = function(u,t){
	if(document.all)window.external.AddFavorite(u,t);
};

(function($) {
	var socialtags_init = function() {
		var selector = $(\'' .
interdire_scripts(((($a = lire_config('socialtags/jsselector',null,false)) OR (!is_array($a) AND strlen($a))) ? $a : '#contenu')) .
'\');
		if (!selector.length) return;
		var socialtags = ' .
interdire_scripts(socialtags_json(lire_config('socialtags/tags',null,false))) .
';
		var title = $(\'title\').text() ||\'\';
		var description = ($(\'meta[name=description]\').attr(\'content\') || \'\').substr(0,250);
		var cano = $(\'link[rel=canonical]\')[0];
		var url = cano ? cano.href : document.location.href;
		var ul = $(\'<ul><\\/ul>\');
		var esc = function(x){return encodeURIComponent(x).replace(/\\s/g,\' \');};
		var ref = document.referrer.match(/^.*\\/\\/([^\\/]+)\\//);
		

		if (ref && ref[1].match(/\\.facebook\\./))
			$.cookie(\'social_facebook\', 1, { path: \'/\', expires: 30 }); // 30 jours

		$.each(socialtags, function(){ if (this.u) {
			if (this.a == \'bookmark\' && !document.all) return;

			' .
interdire_scripts((lire_config('socialtags/ifreferer',null,false) ? '
			if ($.cookie(\'social_\'+this.a)!=1) return;':'')) .
'

			$(\'<a rel="nofollow"><img class="socialtags-hovers" src="\'+ this.i +\'"\\/><\\/a>\')
			.attr(\'href\',
				this.u
				.replace(/%u/g, esc(url))
				.replace(/%t/g, esc(title))
				.replace(/%d/g, esc(description))
				.replace(/%u_site/g, esc(this.u_site))
			)
			.attr(\'title\', this.n)
			.wrap(\'<li><\\/li>\')
			.parent().appendTo(ul);
		}});

		selector.after(ul.wrap(\'<div class="socialtags"><\\/div>\').parent());

		' .
interdire_scripts((lire_config('socialtags/plusone',null,false) ? (($t2 = strval(interdire_scripts(@$Pile[0]['googleplus1'])))!=='' ?
			('$(\'<li>' . $t2 . '</li>\').appendTo(ul);') :
			''):'')) .
'

		' .
interdire_scripts(lire_config('socialtags/badgejs',null,false)) .
'};
	$(function(){
		$(socialtags_init);
	});
})(jQuery);
');

	return analyse_resultat_skel('html_9e8bd124f68188340d48ab41dfd802e7', $Cache, $page, 'plugins/auto/socialtags/socialtags.js.html');
}
?>