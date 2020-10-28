<?php

$content = <<< END

<div style="width:500px; margin:0 auto;" class="border_error">
	<img src="/images/red3.png" width="70" height="70" style="float:left; padding-top:10px">
	<div style="height:50px; padding-top:35px; padding-left:80px; font-size:40px" class="border">{$exhibit}</div>
</div>
<br>
<div style="width:500px; margin:0 auto;" class="border_right">
	<img src="/images/yes.png" width="70" height="70" style="float:left; padding-top:10px">
	<div style="height:50px; padding-top:35px; padding-left:80px; font-size:40px" class="border">{$live}</div>
</div>
{$meaning}
{$other_meaning}
{$comment}

<div style="width:500px; margin:0 auto;">
	<div style="height:50px; padding-top:35px; padding-left:80px; margin-top:200px; font-size:20px"><img src="/images/pen.png" height="30"> Добавлено: <span class="mamagramma">{$adder}</span></div>
</div>

END;
