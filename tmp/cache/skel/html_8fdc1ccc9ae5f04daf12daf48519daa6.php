<?php

/*
 * Squelette : ../plugins/auto/palette/javascript/palette2.js.html
 * Date :      Sat, 20 Nov 2010 20:10:42 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/palette/javascript/palette2.js.html
// Temps de compilation total: 0.150 ms
//

function html_8fdc1ccc9ae5f04daf12daf48519daa6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'{(function($){
	$(document).ready(
		function() {
  		init_palette();
  		onAjaxLoad(init_palette);
    }
	);

	function init_palette() {
	  $("input.palette").each(
  		function(i, palette){
  		  $(palette).css("background-color", $(palette).attr("value"));
  		  palette.id = palid(palette);
  			$(this).focus(function(){
  				$(".colorpicker").empty().remove();
  				$(palette)
  			  	.after(\'<div class="colorpicker"><div class="colorpicker_close" title="' .
_T('palette:fermer') .
'">&nbsp;×&nbsp;</div><div class="colorpicker_bar">' .
_T('palette:palette') .
'</div><div id="colorpicker"></div></div>\');
  				$.farbtastic(\'#colorpicker\', palette);
  				$(".colorpicker_close")
  			  	.hover(function() {$(this).addClass("hover");}, function(){ $(this).removeClass("hover");})
  			  	.click(function() {$(".colorpicker").empty().remove();});
  		  });
  			$(this).blur(function(){
  				$(".colorpicker").empty().remove();
  			});
  		}
	  );
	};

	function palid(element) {
	  if (!$(element).attr("id")){
  		/* pas de id : on en cree un aleatoire, avec un numéro élevé pour pas trop risquer de collision */  
  		var newid = parseInt(10000 + 10000*Math.random());
  		return newid;
	  }
	  return $(element).attr("id");
	};
})(jQuery)};
');

	return analyse_resultat_skel('html_8fdc1ccc9ae5f04daf12daf48519daa6', $Cache, $page, '../plugins/auto/palette/javascript/palette2.js.html');
}
?>