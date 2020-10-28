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
</head>

<body>
<div style="display:flex">
	<div style="width:285px;"><a href="/"><img src="/images/mamalook.png"></a></div>
	<div style="width:1000px;">
			{$content}
	</div>
</div>
</body>
</html>

END;
