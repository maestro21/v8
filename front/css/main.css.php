
* {
	font-family: 'Open Sans';
	color: <?php echo $textColor; ?>
}

h1,h2,h3,h4,h5,h6 {
	color: <?php echo $mainColor; ?>;	
}

h1,h2,h3,h4,h5,h6,
.footer a, .header a {
	font-family: 'PT Serif';
}

.fa {
	font-family: FontAwesome !important;
}

body, html {
	height: 100%;
	padding: 0px; 
	margin: 0px;
}

body.admin {
	padding-top:35px;
}


.page-wrapper {
    min-height: 100%;
    margin-bottom: -50px;
}
* html .page-wrapper {
    height: 100%;
   
}
.page-buffer {
    height: 80px;
}


a {
 color: <?php echo $mainColor2; ?>;	
 /*font-weight:bold;*/
 cursor:pointer;
 text-decoration: none;
}


.wrap {
	width:1200px;
	margin:auto auto;
	display: block;
}

@media(max-width:1200px) {
	.wrap {
		width: calc(100% - 40px);
		padding: 0 20px;
	}

	.langs {
		top:0;
		right: 0;
	}
}
.header .wrap div.hamburger {
	position: absolute;
	left: 140px;
	z-index: 22;
	color: white;
	height: 50px;
	line-height: 50px;
	width: 50px;
	display: none;
	cursor:pointer;
	top:0;
}

.mainmenu {
}

.header .mainmenu.responsive li:not(:first-child) {
	float: none;
	display: none;
	text-align: left;
}

.header .mainmenu.responsive.open li {
	display: block;
	z-index:10;
	float: none;
}

.header,
.header a,
.footer,
.footer .wrap,
.footer a {
	background-color: <?php echo $mainColor; ?>;
	color: <?php echo $bgColor; ?>;
}
	.header a:hover {
		color: <?php echo $mainColor; ?>;
		background-color: <?php echo $bgColor; ?>;
	}

.header .wrap {
	height: 50px;
}
.header .wrap.open {
	height: auto;
}

.header .wrap div {
	display: inline-block;
	/*float: left; */
	/*margin-right: 50px; */
}

	.menu {
		height:50px;
	}
	
	.menu a{
		font-size:18px;
		line-height:20px;
		padding:15px 20px;
		display: block;
		/*font-weight:bold; */
	}

		.logo {
			vertical-align: top;
			height:50px;
		}
		.logo img{
			margin: 5px;
			height: 40px;
		}
		
		.topmenu {
			
		margin: 0 50px;
		}

		.header .wrap .langs {
			float: right !important;
		}
			.header .wrap .langs,
			.header .wrap .langs .dropdownmenu {
				margin-right: 0;
			}


	
.content {
	padding-bottom:30px;
	font-size:15px;
	text-align:justify;
}
	

	.item {
		padding:5px 20px;
		text-align:justify;
	}

.footer {
	height: 50px;
}	
	
.footer .wrap {
	padding-top: 15px;
	font-size: smaller;
}


.login .center {
	text-align: center;
	margin-top: 10%;
}


.i18nform {
	padding-left: 0 !important;	
}

 #form.i18nform input,
 #form.i18nform textarea,
 #form.i18nform select
{
	min-width: 200px  !important;
	width: 200px  !important;
}

.message {
	padding: 10px;
	margin: 10px;
    border-bottom: 1px black solid;
}