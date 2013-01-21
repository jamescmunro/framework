<?php
	// This example header.inc.php is intended to be modfied for your application.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
		<style type="text/css">@import url("<?php _p(__CSS_ASSETS__ . '/' . __JQUERY_CSS__); ?>");</style>
<?php
		require 'lessc.inc.php';

		try {
			lessc::ccompile(__DOCROOT__ . __APP_CSS_ASSETS__ .'/styles.less', __DOCROOT__ .__APP_CSS_ASSETS__ .'/styles.css');
		} catch (exception $ex) {
			exit($ex->getMessage());
		}
?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ .__APP_CSS_ASSETS__ ); ?>/styles.css");</style>
		<script src="<?php echo __APP_JS_ASSETS__ .'/application.js'; ?>" type="text/javascript"></script>
	</head>
<<<<<<< HEAD
	<body id="application">
=======
	<body>
		<section id="content">
>>>>>>> feature-Reskin
