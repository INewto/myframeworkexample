<?php

$content = <<< END

{$error}
{$success}

<script>

$(document).ready(function(){
	$(".inline").colorbox({inline:true, width:"50%"});
});

        
function checkForm()
{
    exhibit = $('#exhibit').val().toLowerCase();
    exhibit  = $.trim(exhibit);

    if(exhibit == 'ихний' || exhibit == 'ихнего' || exhibit == 'ихних' || exhibit == 'ихними'){ $('#butthurt-1').click(); $.post('/ajax/butthurt.php', {'exhibit':exhibit}, function(data){}); return false; }
    if(exhibit == 'ложит' || exhibit == 'ложить' || exhibit == 'ложут' || exhibit == 'ложим' || exhibit == 'ложите'){ $('#butthurt-2').click();  $.post('/ajax/butthurt.php', {'exhibit':exhibit}, function(data){}); return false; }
}
</script>

<form method="post" onsubmit="return checkForm()">
<div style="width:550px; margin:0 auto;">
	<div style="height:50px; padding-top:35px; padding-left:80px; font-size:40px" class="mamagramma">Что добавляем?</div>
	<div style="text-align:center">
		<input type="text" placeholder="Неверное слово или фраза" class="required-field" name="exhibit" id="exhibit" value="{$exhibit}">
		<br>
        <textarea placeholder="Ваш комментарий" name="comment">{$comment}</textarea>
		<br>
		<input type="text" placeholder="Исправленный вариант" class="required-field" name="live" value="{$live}">
		<br>
	</div>
	<div style="width:500px; margin:0 auto; padding-bottom: 20px; padding-left: 20px; background: #eff3f7; border-radius: 25px;" class="border">
		<img src="/images/attention.png" width="50" height="50" style="float:left; padding-top:10px">
		<div style="height:50px; padding-top:35px; padding-left:60px" class="border">
			Если вы хотите, чтобы <span class="mamagramma">мама Грамма</span> указала кто именно пополнил её коллекцию, то укажите ваше имя или ник, а так же e-mail.
			Если не хотите, то оставьте эти поля пустыми.
		</div>
		<br>
	</div>
	<div style="text-align:center">
		<input type="text" placeholder="Как вас звать?" name="name" value="{$name}">
		<br>
		<input type="text" placeholder="Электронная почта" name="email" value="{$email}">
		<br>
		<input type="submit" value="Предложить в коллекцию">
	</div>
</div>
<input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
</form>

<a class="inline cboxElement" href="#inline_content-1" id="butthurt-1" style="display:none"></a>
<a class="inline cboxElement" href="#inline_content-2" id="butthurt-2" style="display:none"></a>

<div style='display:none'>
	<div id='inline_content-1' style='padding:10px; background:#fff;'>
        <p><b>А.С. Пушкин</b>: "Слышно, земский суд к нам едет отдать нас под начал Кириле Петровичу Троекурову, потому что мы, дескать, <b>ихние</b>, а мы искони Ваши, и отроду того не слыхивали". («Дубровский»)</p>
        <p><b>И.С. Тургенев</b>: "Соломин с ним по-английски говорил, или он точно был поражен его сведениями — только он все его по плечу хлопал, и смеялся, и звал его с собою в Ливерпуль; а фабричным твердил на своем ломаном языке: «Караша оу вас эта! Оу! караша!» — чему фабричные, в свою очередь, много смеялись не без гордости: «Вот, мол, наш-то каков! Наш-то!» И он, точно, был их — и <b>ихний</b>". («Новь»)<p>
        <p><b>С.Т. Аксаков</b>: "И отпустил он дочерей своих, хороших, пригожих, в <b>ихние</b> терема девичьи". («Аленький цветочек»)</p>
        <div class="road-dashed">
            <p><span class="mamagramma">Мама Грамма</span> не спорит с классиками русской литературы и поэтому не добавляет это слово в свою коллекцию ¯\_(ツ)_/¯</p>
        </div>
	</div>
</div>
        
<div style='display:none'>
	<div id='inline_content-2' style='padding:10px; background:#fff;'>
        <p>
            <b>В.В. Маяковский</b>: 
            <br>Нежные!
            <br>Вы любовь на скрипки <b>ложите</b>.
            <br>Любовь на литавры <b>ложит</b> грубый.
            <br>А себя, как я, вывернуть не можете,
            <br>чтобы были одни сплошные губы! 
            <br>(«Облако в штанах»)
        </p>
        <p><b>М.В. Ломоносов</b>: На жу кончащиеся первообразные глаголы и производные от имен, кончащихся на г, не изменяют ж во втором лице и в прочих: блажу, ворожу, должу, дорожу, дружу, кружу, <b>ложу</b>, множу, лежу, держу. («Российская грамматика»)</p>
        <div class="road-dashed">
            <p><span class="mamagramma">Мама Грамма</span> не спорит с классиками русской литературы и поэтому не добавляет это слово в свою коллекцию ¯\_(ツ)_/¯</p>
        </div>
	</div>
</div>

END;
