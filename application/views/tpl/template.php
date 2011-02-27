<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo html::style('style.css'); ?>
    <?php echo html::style('slider.css'); ?>
    <?php echo html::script('jquery.js'); ?>
</head>
<body>
<div id="WholePage">
<div id="Inner">
<div id="Container">
<?php echo View::factory('tpl/header'); ?>
<div id="CentralPart">
<?php echo View::factory('tpl/left')->set('category',$categories)->set('regions',$regions);?>
<div id="RightPart">
<div id="Page">
<?php echo $content ?>
</div>
</div>
<div class="cleaner"></div>
</div>
<?php echo View::factory('tpl/footer'); ?>
<?php echo View::factory('profiler/stats'); ?>
</div>
</div>
</div>
</body>
</html>
