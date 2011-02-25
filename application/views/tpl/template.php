<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=$title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?=html::style('style.css'); ?>
    <?=html::style('slider.css'); ?>
    <?=html::script('jquery.js'); ?>
</head>
<body>
<div id="WholePage">
<div id="Inner">
<div id="Container">
<?=View::factory('tpl/header'); ?>
<div id="CentralPart">
<?=View::factory('tpl/left')->set('category',$categories)->set('regions',$regions);?>
<div id="RightPart">
<div id="Page">
<?=$content ?>
</div>
</div>
<div class="cleaner"></div>
</div>
<?=View::factory('tpl/footer'); ?>
<?=View::factory('profiler/stats'); ?>
</div>
</div>
</div>
</body>
</html>
