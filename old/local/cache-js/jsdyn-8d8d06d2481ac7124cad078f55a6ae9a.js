/* #PRODUIRE{fond=socialtags.js} le 2016-10-23 19:48:03 */
// socialtags.js

// 'ajouter un bookmark' ne marche que sous IE
// les tuyaux trouves pour FF
//	window.sidebar.addPanel(t,u,'');
//	cf https://bugzilla.mozilla.org/show_bug.cgi?id=214530
// ou Opera sont creves
;var socialtags_addfavorite = function(u,t){
	if(document.all)window.external.AddFavorite(u,t);
};

(function($) {
	var socialtags_init = function() {
		var selector = $('#socialtags');
		if (!selector.length) return;
		var socialtags = [
{ a: 'delicious', n: 'Del.icio.us', i: 'plugins/auto/socialtags/images/delicious.png', u: 'http://delicious.com/save?url=%u&title=%t&notes=%d', u_site: 'http://www.mestaoui.com'},
{ a: 'facebook', n: 'Facebook', i: 'plugins/auto/socialtags/images/facebook.png', u: 'http://www.facebook.com/sharer/sharer.php?u=%u&t=%t', u_site: 'http://www.mestaoui.com'},
{ a: 'google', n: 'Google bookmarks', i: 'plugins/auto/socialtags/images/google.png', u: 'http://www.google.com/bookmarks/mark?op=edit&bkmk=%u&title=%t', u_site: 'http://www.mestaoui.com'},
{ a: 'netvibes', n: 'Netvibes', i: 'plugins/auto/socialtags/images/netvibes.png', u: 'http://www.netvibes.com/subscribe.php?url=%u', u_site: 'http://www.mestaoui.com'},
{ a: 'twitter', n: 'Twitter', i: 'plugins/auto/socialtags/images/twitter.png', u: 'http://twitter.com/share?text=%t&url=%u', u_site: 'http://www.mestaoui.com'}
];
		var title = $('title').text() ||'';
		var description = ($('meta[name=description]').attr('content') || '').substr(0,250);
		var cano = $('link[rel=canonical]')[0];
		var url = cano ? cano.href : document.location.href;
		var ul = $('<ul><\/ul>');
		var esc = function(x){return encodeURIComponent(x).replace(/\s/g,' ');};
		var ref = document.referrer.match(/^.*\/\/([^\/]+)\//);
		

		if (ref && ref[1].match(/\.facebook\./))
			$.cookie('social_facebook', 1, { path: '/', expires: 30 }); // 30 jours

		$.each(socialtags, function(){ if (this.u) {
			if (this.a == 'bookmark' && !document.all) return;

			

			$('<a rel="nofollow"><img class="socialtags-hovers" src="'+ this.i +'"\/><\/a>')
			.attr('href',
				this.u
				.replace(/%u/g, esc(url))
				.replace(/%t/g, esc(title))
				.replace(/%d/g, esc(description))
				.replace(/%u_site/g, esc(this.u_site))
			)
			.attr('title', this.n)
			.wrap('<li><\/li>')
			.parent().appendTo(ul);
		}});

		selector.after(ul.wrap('<div class="socialtags"><\/div>').parent());

		

		};
	$(function(){
		$(socialtags_init);
	});
})(jQuery);
