<?php

$content = <<< END

<!DOCTYPE html>
<html lang="ru" translate="no">
<head>
    <title>
        {$title}
    </title>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7; IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<link href="https://fonts.googleapis.com/css?family=Neucha&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/js/colorbox-master/example4/colorbox.css" />
    
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="/js/colorbox-master/jquery.colorbox.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Le6j68UAAAAACKoAhfME8xTqa7D1HIhgdJQAyBo"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le6j68UAAAAACKoAhfME8xTqa7D1HIhgdJQAyBo', {action: 'homepage'}).then(function(token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
  });
  </script>
    
</head>

<body>
<div style="display:flex">
	<div style="width:282px;"><a href="/"><img src="/images/mamawantto.png"></a></div>
	<div style="width:1000px;">
			{$content}
	</div>
</div>
</body>
</html>

END;



