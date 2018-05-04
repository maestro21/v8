<!-- META stuff -->
<title><?php echo ($class->title!=''?strip_tags($class->title) . ' - ' : '') . G('sitename');?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="<?php echo BASE_URL . UPLOADS_FOLDER;?>favicon.ico?erg" rel="icon" type="image/x-icon" />

<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>


<!-- CSS -->
<LINK REL="StyleSheet" HREF="<?php echo PUB_URL;?>style.php" TYPE="text/css" MEDIA="screen">

<!-- JS -->
<script src="<?php echo BASE_URL . EXT_FOLDER;?>jquery.min.js" type="text/javascript"></script>
<script src="<?php echo PUB_URL;?>script.php?lang=<?php echo lang();?>" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>dropzone/dropzone.js" type="text/javascript"></script>

<!-- Bootstrap 4.01 -->
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>bootstrap/bootstrap.min.css">
<script src="<?php echo BASE_URL . EXT_FOLDER;?>bootstrap/bootstrap.min.js"></script>
<!-- Tempus Dominus Bootstrap 4 (Date & time picker) -->
<script type="text/javascript" src="<?php echo BASE_URL . EXT_FOLDER;?>moment.min.js"></script>
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>bootstrap/tempusdominus-bootstrap-4.min.css">
<script src="<?php echo BASE_URL . EXT_FOLDER;?>bootstrap/tempusdominus-bootstrap-4.min.js"></script>


<!-- Slideshow -->
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>slider/simple-slideshow-styles.css">
<script src="<?php echo BASE_URL . EXT_FOLDER;?>slider/better-simple-slideshow.min.js"></script>

<!-- Validate.js -->
<script src="<?php echo BASE_URL . EXT_FOLDER;?>validate/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL . EXT_FOLDER;?>validate/messages_<?php echo lang();?>.js" type="text/javascript"></script>

<!-- Slick -->
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick.css">
<link rel="stylesheet" href="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick-theme.css">
<script src="<?php echo BASE_URL . EXT_FOLDER;?>/slick/slick.min.js"></script>

<!-- Shadowbox -->
<script src="<?php echo BASE_URL . EXT_FOLDER;?>shadowbox/shadowbox.js" type="text/javascript"></script>
<LINK REL="StyleSheet" HREF="<?php echo BASE_URL . EXT_FOLDER;?>shadowbox/shadowbox.css" TYPE="text/css" MEDIA="screen">
