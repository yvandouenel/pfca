<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	$node = node_load(arg(1));
	?>
	<title><?php print $node->title; ?></title>

<style>
@font-face {
    font-family: 'DINBold';
    src: url('/sites/all/themes/pfca/css/font/din-bold-webfont.eot');
    src: url('/sites/all/themes/pfca/css/font/din-bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('/sites/all/themes/pfca/css/font/din-bold-webfont.woff') format('woff'),
         url('/sites/all/themes/pfca/css/font/din-bold-webfont.ttf') format('truetype'),
         url('/sites/all/themes/pfca/css/font/din-bold-webfont.svg#DINRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'DINMedium';
    src: url('/sites/all/themes/pfca/css/font/din-medium-webfont.eot');
    src: url('/sites/all/themes/pfca/css/font/din-medium-webfont.eot?#iefix') format('embedded-opentype'),
         url('/sites/all/themes/pfca/css/font/din-medium-webfont.woff') format('woff'),
         url('/sites/all/themes/pfca/css/font/din-medium-webfont.ttf') format('truetype'),
         url('/sites/all/themes/pfca/css/font/din-medium-webfont.svg#DINMedium') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'DINRegular';
    src: url('/sites/all/themes/pfca/css/font/din-regular-webfont.eot');
    src: url('/sites/all/themes/pfca/css/font/din-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('/sites/all/themes/pfca/css/font/din-regular-webfont.woff') format('woff'),
         url('/sites/all/themes/pfca/css/font/din-regular-webfont.ttf') format('truetype'),
         url('/sites/all/themes/pfca/css/font/din-regular-webfont.svg#DINRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}


  .ReadMsgBody {width: 100%;}
  .ExternalClass {width: 100%;}
  body {color:#4b4b4b;line-height:20px;font-family:Arial, sans-serif;font-size:11px;background-color:#f5f5f5;margin-bottom:20px;margin-top:20px;margin-right:0px;margin-left:0px;-webkit-text-size-adjust:none;}
  table { font-size: 12px; }
  img { border: none; }
  a { color: #EE7202; text-decoration: underline; }
  a:hover { color: #879E34; text-decoration: none; }
  p { margin: 0; }

  span.yshortcuts { color:#000; background-color:none; border:none;}
  span.yshortcuts:hover,
  span.yshortcuts:active,
  span.yshortcuts:focus {color:#000; background-color:none; border:none;}
  /* ===== Orange Défault ===== */
	.coul1{ color: #e76807;}

	/* ===== Orange clair ===== */
	.coul2{ color: #f98a2e;}

	/* ===== Orange très clair ===== */
	.coul3{ color: #fcc597;}

	/* ===== Vert Défault===== */
	.coul4{ color: #84932c;}

	/* ===== Vert moyen===== */
	.coul5{ color: #879e33;}

	/* ===== Vert clair ===== */
	.coul6{ color: #a3ba4f;}

	/* ===== Gris ===== */
	.coul7{ color: #666666;}

	/* ===== Gris moyen ===== */
	.coul8{ color: #999999;}

	/* ===== Gris très clair ===== */
	.coul9{ color: #eeeeee;}

	/* ===== Blanc ===== */
	.coul10{ color: #FFFFFF;}
	h2 {
		font: normal 18px/22px 'DINRegular';
		color: #e76807;
		text-transform: uppercase;
		margin: 30px 0 22px 0;
		padding: 0;
	}
	h3{
		font: bold 16px/20px 'Arial';
		color: #84932c;
		margin: 20px 0 22px 0;
		padding: 0;
		text-transform: none;
	}
	h4{
		font: bold 14px/19px 'Arial';
		color: #e76807;
		margin: 15px 0 22px 0;
		padding: 0;
	}
	h5{
		font: normal 14px/19px 'DINMedium';
		color: #E76807;
		margin: 25px 0 22px 0;
		padding: 0 0 3px 0;
		border-bottom: 1px dotted #cccccc;
	}
	h6{
		font: normal 14px/19px 'DINMedium';
		color: #E76807;
		margin: 22px 0 0px 0;
		padding: 0;
	}
</style>

</head>

<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" style="color:#4b4b4b;line-height:20px;font-family:Arial, sans-serif;font-size:11px;background-color:#f5f5f5;margin-bottom:20px;margin-top:20px;margin-right:0px;margin-left:0px;-webkit-text-size-adjust:none;">

<center>
    Si vous rencontrez des difficult&#233;s pour visualiser cette newsletter, consultez la <a href="<?php echo url( 'node/'.$node->nid ); ?>" title="Consultez la version en ligne" target="_blank" style="color:#879e33; text-decoration: underline;">version en ligne.</a><br/>
  </center>
<?php
	global $user;
	if(in_array('administrator', array_values($user->roles)) || in_array('webmaster', array_values($user->roles))){
	?>
	<div style="text-align:center; width:100%;">
	<a href="/node/<?php print $node->nid; ?>/edit" style="text-decoration: none; color: #074965;font-family: Arial;font-size: 11px;">Cliquez ici pour modifier la newsletter</a><br/>
	<a href="/node/<?php print $node->nid; ?>/simplenews" style="text-decoration: none; color: #074965;font-family: Arial;font-size: 11px;">Cliquez ici pour envoyer la newsletter</a>
	</div><br />
	<?php
	}
	?>
	<?php print $page; ?>
</body>
</html>
