<h1><?php echo T('settings');?></h1>

<?php $tabs = cache('settings'); $data =  cache('settings_data'); ?>

<?php echo form(['fields' => $tabs, 'data' =>$data, 'table' => false, 'plain' => false]); ?>