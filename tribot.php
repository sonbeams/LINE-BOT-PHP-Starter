<?php

function stocksData() {
    return array(
      array("CPF", 28.75, 1.00, +3.6, 2358, 89714, 28.20, 29.00, 27.50),
      array("CPALL", 59.00, 0.25, -0.42, 1063, 19944, 58.92, 59.25, 58.50),
      array("PTT", 404.00, -2.00, -0.49, 696, 1419, 402.65,  404.00, 402.00)
    );
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
      
         $stocks[][] = stocksData();
      
      try {
        $messages = [
          'type' => 'text',
          'text' => $stocks[0][0]
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
