<h1><?php echo T('settings');?></h1>

<?php $tabs = cache('settings'); $data =  cache('settings_data'); ?>

<form id="form" action="<?php echo BASE_URL;?>system/save">
<div class="tabMenu">
	<?php $i = 0; foreach($tabs as $tab => $tabdata) { $i++;?>
		<div data-id="<?php echo $i;?>"><?php echo T($tab);?></div>
	<?php } ?>
</div>
<div class="tabs">
	<?php $i = 0; foreach($tabs as $tab => $tabdata) { $i++; ?>
		<div class="tab" data-id="<?php echo $i;?>">
			<?php echo form(['fields' => $tabdata, 'data' =>$data]); ?>
		</div>
	<?php } ?>
</div>
<a href="#" class="btn submit"><?php echo T('submit');?></a>
</form>