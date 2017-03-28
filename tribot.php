<?php

function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val[0] === $id) {
           return $key;
       }
   }
   return null;
}

$access_token = 'IIckEKH4AEo7xgc74LJmTYBxU39gbny9jEwIbmroCsSTMFmg8RpQ1QPgVIm7kqrR4yO/0g0l/JvCX30uMq+WdFhjDXNuvZfo96+IrLgSZxJ2m2spr+eTIVo17dniDcIknwVf5BvWSFAs0yV3MuGY/gdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');

$events = json_decode($content, true);

if (!is_null($events['events'])) {

   foreach ($events['events'] as $event) {

      if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

	 $text = $event['message']['text'];

	 $replyToken = $event['replyToken'];
      
         $stocks = array(
	      array("CPF", 28.75, 1.00, +3.6, 2358, 89714, 28.20, 29.00, 27.50),
	      array("CPALL", 59.00, 0.25, -0.42, 1063, 19944, 58.92, 59.25, 58.50),
	      array("PTT", 404.00, -2.00, -0.49, 696, 1419, 402.65,  404.00, 402.00)
	 );
      
      try {
	$key = searchForId($text, $stocks);
        if ($stocks[$key][2] > 0) {
	   $dir = "▲";
	} elseif ($stocks[$key][2] < 0) {
	   $dir = "🔻";
	} else {
	   $dir = "🔻";
	}
	      
        $messages = [	
          'type' => 'text',
          'text' => $stocks[$key][0]." ".$dir."\n\n".
		    "Price : ".$stocks[$key][1]."\n".
		    "Chg : ".$stocks[$key][2]."\n".
		    "Mkt Value: ".$stocks[$key][3]."\n".
		    "Mkt Vol : ".$stocks[$key][4]."\n".
		    "Avg : ".$stocks[$key][5]."\n".
		    "High : ".$stocks[$key][6]."\n".
		    "Low : ".$stocks[$key][7]."\n".
		    "[".date("d/m/Y h:m")."]"
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
echo "OK\n";
//echo $messages['text'];

?>

