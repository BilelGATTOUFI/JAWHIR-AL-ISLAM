<?php

/*
 * Squelette : ../tmp/couteau-suisse/2b72d2d24ee702424f58fb92623a1426.html
 * Date :      Mon, 08 Aug 2016 09:52:16 GMT
 * Compile :   Tue, 09 Aug 2016 15:44:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../tmp/couteau-suisse/2b72d2d24ee702424f58fb92623a1426.html
// Temps de compilation total: 0.478 ms
//

function html_ae736b2eb795c235effad5fa9318242c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'div.cs_sommaire {
	display:block;
	float:right;
	margin-left:1em;
	margin-right:0.4em;
	overflow:auto;
	z-index:100;
	max-height:350px;
	text-align:left;
}

a.sommaire_ancre {
	background:transparent url(' .
interdire_scripts(url_absolue(eval('return '.'_DIR_IMG_PACK'.';'))) .
'spip_out.gif) no-repeat scroll left center;
	padding-left:10px;
	text-decoration:none;
}

div.cs_sommaire a:after {
	display:none;
}

div.cs_sommaire_avec_fond {
	background: transparent url(' .
interdire_scripts(url_absolue(find_in_path('img/sommaire/coin.gif'))) .
') no-repeat scroll left top;
	border-right: 1px solid rgb(153, 153, 153);
	border-bottom: 1px solid rgb(153, 153, 153);
	padding-bottom:0.1em;
}

div.cs_sommaire_sans_fond {
	border: thin solid gray;
	background-color: white;
}

div.cs_sommaire_inner {
	margin: 3pt;
}

div.cs_sommaire_titre_avec_fond, div.cs_sommaire_titre_sans_fond {
	border-bottom: 1px dotted silver;
	line-height: 1;
	position: inherit;
	font-weight: bold;
	text-align: center;
}

div.cs_sommaire_titre_avec_fond {
	margin-left: 15px;
}

div.cs_sommaire ul{
	margin: 0.3em 0.5em 0.1em 0.7em;
	padding: 0pt;
	font-size: 84%;
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
}

div.cs_sommaire ul li{
	margin: 0pt;
	padding: 0pt;
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
}

div.cs_sommaire_titre_avec_fond, div.cs_sommaire_titre_sans_fond {
	background:transparent url(' .
interdire_scripts(url_absolue(eval('return '.'_DIR_IMG_PACK'.';'))) .
'deplierbas.gif) no-repeat scroll right center;
	cursor:pointer;
	padding: 0.3em 18px;
}

div.cs_sommaire_replie {
	background:transparent url(' .
interdire_scripts(url_absolue(eval('return '.'_DIR_IMG_PACK'.';'))) .
'deplierhaut_rtl.gif) no-repeat scroll right center;
	border:none;
}

.cs_sommaire_invisible{ display:none; }
');

	return analyse_resultat_skel('html_ae736b2eb795c235effad5fa9318242c', $Cache, $page, '../tmp/couteau-suisse/2b72d2d24ee702424f58fb92623a1426.html');
}
?>