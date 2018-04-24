/** Forms **/

input[type="file"] {
    display: none;
}
select,
input {
	width: 300px;
	padding: 8px;
	border-radius: 3px;
	box-sizing: border-box;
	border: 1px <?php echo $mainColor; ?> solid;
}

textarea {
	border-radius: 3px;
	width: auto;
	min-width: 1200px !important;
	border: 1px <?php echo $mainColor; ?> solid;	
}

.mce-tinymce textarea {
    width: 100% !important;
}

.form sup {
	font-size: 14px;
	font-weight: 900;
	color: <?php echo $mainColor; ?>;
}


input[type="checkbox"] + label:before {
    content: '';
    background: #fff;
    border: 1px solid <?php echo $mainColor; ?>;
    display: inline-block;
    vertical-align: middle;
    width: 22px;
    height: 22px;
    padding: 2px;
    margin: 10px;
    text-align: center;
    line-height: 15px;
    font-size: 15px;
    border-radius: 3px;
    margin-left: 0;
    margin-top: 8px;
}

.mce-tinymce {
	border: 1px <?php echo $mainColor; ?> solid !important;
	border-radius: 3px;
	width: 1200px !important;
}
.hidden {
  visibility: hidden !important;
  display: none !important;
}

.visible {
  visibility: visible !important;
  display: block !important;
}


input[type="checkbox"] {
    display: none;
}

input[type="checkbox"]:checked + label:before {
    content: "\f00c";
	font-family: 'FontAwesome';
}

input[type="checkbox"] + label:before {
	cursor: pointer;
}

form sup {
    font-size: 14px;
    font-weight: 900;
    color: <?php echo $mainColor2; ?>;
}

.messages .message {
	display: inline-block;
	margin: 20px;
	border: 1px gray solid;
	padding: 10px;
	width: 300px;
}

input.error {
    margin: 0 !important;
}

label.error {
    position: absolute;
    margin: 0 10px;
}

.tbl-fields select, 
.tbl-fields input, 
.tbl-fields textarea {
    width: 200px !important;
}

textarea.list {
    position: absolute;
    min-width: 200px !important;
    height: 300px;
    display:none;
}


.section .radiolist li:before {
    width: 0
    height:0
    background-color: transparent;
    color: white;
    border: none
    font-size: 0 !important;
    text-align: center;
    vertical-align: middle;
    line-height: 0;
    border-radius: 0;
    margin-right: 0;
    font-family: FontAwesome;
    margin-top: 0;
    content: "";
    position: inherit;
    margin-left: 0;
}

.section .radiolist li {
    margin: 0;
    margin-left: 0;
}

.radiolist {
    margin: 0;
    padding: 0;
}