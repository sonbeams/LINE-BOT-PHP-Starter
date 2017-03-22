<?php

function dataInit() {
    $stocks => array(
      array("stock" => "CPF", "price" => 28.75, "chg" => 1.00, "pchg" => +3.6, "mktval" => 2358, "mktvol" => 89714, "avg" => 28.20, "high" => 29.00, "low" => 27.50),
      array("stock" => "CPALL", "price" => 59.00, "chg" => 0.25, "pchg" => -0.42, "mktval" => 1063, "mktvol" => 19944, "avg" => 58.92, "high" => 59.25, "low" => 58.50),
      array("stock" => "PTT", "price" => 404.00, "chg" => -2.00, "pchg" => -0.49, "mktval" => 696, "mktvol" => 1419, "avg" => 402.65, "high" => 404.00, "low" => 402.00)
    )
    return $stocks;
}

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
      
      $stocks = dataInit();
      
      try {
        $messages = [
          'type' => 'text',
          'text' => $stocks[0]
        ];
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
