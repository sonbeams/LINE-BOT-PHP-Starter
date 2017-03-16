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
			//Build message to reply back
			/*$messages = [
				'type' => 'text',
				'text' => 'เลขบัญชีของท่านคือ'.$text //$text
			];*/
			
		try {
			if ($text == 'test') {
				$messages = [
					'type' => 'template',
					'altText' => 'TRINITY Update',
					'template' => [
						'type' => 'carousel',
						'columns' => array(
							array("thumbnailImageUrl" => "https://www.img.in.th/images/90e08230ea70df009df00502147814a8.png",
							"title" => "Quant Trading",
							"text" => "Short term trading",
							"actions" => array(
								array("type" => "message",
								"label" => "View portfolio",
								"text" => "perfect gems"
								),
								array("type" => "uri",
								"label" => "Read more",
								"uri" => "https://www.trinityquicktrade.com"
								)
							    )
							),
							array("thumbnailImageUrl" => "https://www.img.in.th/images/86be082e281fba804d9c8b05b91b5c57.png",
							"title" => "Trinity Trigger",
							"text" => "Short term trading",
							"actions" => array(
								array("type" => "message",
								"label" => "View Portfolio",
								"text" => "seafco"
								),
								array("type" => "uri",
								"label" => "View detail",
								"uri" => "https://www.trinitythai.com"
								)
							    )
							)
						)
					]
				];
			}
			
			if ($text == 'imgtest') {
				$messages = [
					'type' => 'imagemap',
					'baseUrl' => 'https://www.img.in.th/images/18c25e35d2b0c2fb9066f550f20deb06.png',
					'altText' => 'This is an imagemap',
					'baseSize' => array(
						"height" => 326,
						"width" => 529
					),
					'actions' => array(
						array(
						    "type" => "uri",
						    "linkUri" => "https://www.img.in.th/images/18c25e35d2b0c2fb9066f550f20deb06.png/700",
						    "area" => array(
							    "x" => 0,
							    "y" => 0,
							    "width" => 520,
							    "height" => 320
							)
						),
						array(
						    "type" => "message",
						    "text" => "hello",
						    "area" => array(
							    "x" => 500,
							    "y" => 0,
							    "width" => 520,
							    "height" => 320
						     )
						)
					)		
				];
			}
		} catch (Exception $e) {
			$messages = [
				'type' => 'text',
				'text' => 'Caught exception: '.  $e->getMessage()
			];
		}
			
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
