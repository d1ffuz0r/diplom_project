<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 560;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  // убираем скроллбар в js
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap все .slides с #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // распологаем горизонтально слайды
	.css({
'float' : 'left',
'width' : slideWidth
    });

  // устанавливаем #slideInner длину всем слайдам
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // вставляем котролы в DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');

  // скрываем левый и правый контрол если не активны
  manageControls(currentPosition);

  // создаём эвент листания .controls по клику
  $('.control')
    .bind('click', function(){
    // устанавливаем новую позицию
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;

	// скрываем / показываемконтрол
    manageControls(currentPosition);
    // двигаем slideInner используя левый отступ
    $('#slideInner').animate({
'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // уплаврение контролами: скрываем и показываем контролы в зависимости от позиции
  function manageControls(position){
    // скрываем левый контрол при первом слайде
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// скрываем правый контрол при последнем слайде
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }
});
</script>
<div id="Page_header">
<h1>Наши преимущества</h1>
<table width="100%">
<tr>
<div id="slideshow">
<div id="slidesContainer">
<? foreach($service as $serv) : ?>
    <div class="slide">
    <a class="page_header_img"><img src="img/<?php echo $serv->image ?>" alt="<?php echo $serv->rusname ?>" /></a>
    <a class="page_header_text" style="font-size: 20px;"><?php echo $serv->text ?></a>
    </div>
<? endforeach; ?>
</div>
</div>
</tr>
</table>
</div>

<div id="Page_top">
<p>Google контекстная реклама<br/>
реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама<br/>
реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама,реклама<br>
<a href="">1</a> 2 3 .... 11 12 13<br/>
</p>
</div>

<div id="Page_center">
<table>
<tr>
<? foreach($prodone as $desk){?>
<td class="page_center_button">
    <a class="page_center_buy" <? if(Cookie::get('loged_in') == TRUE) { ?> href="/shop/new_order/<?php echo $desk->p_id ?>" title="Оформить заказ"<? } ?> ><span>buy</span></a>
    <a class="page_center_info" href="/view/product/<?php echo $desk->p_id ?>" title="Просмотр"><span>more-info</span></a>
</td>
<td class="page_center_content">
    <div class="page_center_text">
        <span class="blue2"><?php echo $desk->p_rusname ?></span><br/>
        <span class="gray"><?php echo $desk->p_desc ?></span><br/>
        <br/>
        <span class="green"><?php echo round($desk->p_price)?> руб</span><br/>
    </div>
</td>
<td class="page_center_img">
    <img align="right" src="<?php echo Kohana::$base_url;?>img/prev/<?php echo $desk->p_category ?>/<?php echo $desk->p_id ?>.png" alt=""  width="100" />
</td>
<? } ?>
</tr>
<tr>
<? foreach($prowthree as $desk):?>
<td class="page_center_button">
    <a class="page_center_buy" <? if(Cookie::get('loged_in') == TRUE) { ?> href="/shop/new_order/<?php echo $desk->p_id ?>" title="Оформить заказ"><? } ?></a>
    <a class="page_center_info" href="/view/product/<?php echo $desk->p_id ?>" title="Просмотр"><span>more-info</span></a>
</td>
<td class="page_center_content">
    <div class="page_center_text">
        <span class="blue2"><?php echo $desk->p_rusname ?></span><br/>
        <span class="gray"><?php echo $desk->p_desc ?></span><br/>
        <br/>
        <span class="green"><?php echo round($desk->p_price)?> руб</span><br/>
    </div>
</td>
<td class="page_center_img">
    <img align="right" src="<?php echo Kohana::$base_url;?>img/prev/<?php echo $desk->p_category ?>/<?php echo $desk->p_id ?>.png" alt="" width="100" />
</td>
    <? endforeach; ?>
</tr>
</table>
</div>