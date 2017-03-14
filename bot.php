<?php
$access_token = 'IIckEKH4AEo7xgc74LJmTYBxU39gbny9jEwIbmroCsSTMFmg8RpQ1QPgVIm7kqrR4yO/0g0l/JvCX30uMq+WdFhjDXNuvZfo96+IrLgSZxJ2m2spr+eTIVo17dniDcIknwVf5BvWSFAs0yV3MuGY/gdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			 Build message to reply back
			/*$messages = [
				'type' => 'text',
				'text' => 'เลขบัญชีของท่านคือ'.$text //$text
			];*/
			
			$messages = [
				'type' => 'template',
				'altText' => 'this is a confirm template',
				'template' => [
					'type' => 'confirm',
					'text' => 'Are you sure?',
					'actions' => array(
						    array("type" => "message",
						    "label" => "Yes",
						    "text" => "yes"
						    ),
						    array("type" => "message",
						    "label" => "No",
						    "text" => "no"
						    )
					)
					
				]
			];
			
			/*$messages = [
				'type' => 'template',
				'altText' => 'TRINITY Update',
				'template' => [
					'type' => 'carousel',
					'columns' => array(
						array("thumbnailImageUrl" => "https://www.img.in.th/images/d5fb5e8f825cf7504dcc54d945019b04.png",
						"title" => "All about technical chart",
						"text" => "Daily technical research",
						"actions" => array(
							array("type" => "uri",
							"label" => "Read more",
							"data" => "https://www.trinityquicktrade.com"
							),
							array("type" => "postback",
							"label" => "Add to watch list",
							"data" => "action=addwatch&itemid=001"
							)
						)
					),    
						array("thumbnailImageUrl" => "https://www.img.in.th/images/f594e2eaf3401c1c0a6d22043b5c2906.png",
						"title" => "Technical Seminar",
						"text" => "26th March 2017",
						"actions" => array(
							array("type" => "uri",
							"label" => "Register",
							"data" => "https://www.trinitythai.com"
							),
							array("type" => "postback",
							"label" => "Read more",
							"data" => "action=read&itemid=002"
							)
						)
					)
				]
			];*/
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
