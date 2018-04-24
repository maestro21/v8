<!-- META stuff -->
<title><?php echo ($class->title!=''?strip_tags($class->title) . ' - ' : '') . T('sitename');?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="<?php echo BASE_URL . UPLOADS_FOLDER;?>favicon.ico?erg" rel="icon" type="image/x-icon" />

<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>

<!-- CSS -->
<LINK REL="StyleSheet" HREF="<?php echo PUB_URL;?>style.php" TYPE="text/css" MEDIA="screen">
<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>slider/simple-slideshow-styles.css">

<!-- JS -->
<script src="<?php echo BASE_URL . EXT_FOLDER;?>jquery-latest.min.js" type="text/javascript"></script>
<script src="<?php echo PUB_URL;?>script.php?lang=<?php echo lang();?>" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>validate/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>validate/messages_<?php echo lang();?>.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>dropzone/dropzone.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>slider/better-simple-slideshow.min.js"></script>

<!-- Slick -->
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick.css">
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick-theme.css">
<script src="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick.min.js"></script>

<!-- Shadowbox -->
<script src="<?php echo BASE_URL . EXT_FOLDER;?>shadowbox/shadowbox.js" type="text/javascript"></script>
<LINK REL="StyleSheet" HREF="<?php echo BASE_URL . EXT_FOLDER;?>shadowbox/shadowbox.css" TYPE="text/css" MEDIA="screen">
