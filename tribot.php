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
	      
      $text = strtoupper($text);
	      
      try {
	$key = searchForId($text, $stocks);
        if ($stocks[$key][2] > 0) {
	   $dir = "△";
	} elseif ($stocks[$key][2] < 0) {
	   $dir = "🔻";
	} else {
	   $dir = "▬";
	}
	      
	$stk_list = explode(",",$text);
	$cmd = count($stk_list);
	
	if ($text == "SET") {
	   $messages = array(
		   array(
	   'type' => 'text',
	   'text' => "SET index : 1,585.72\n".
		     "Change : -2.46 , -0.16%\n".
		     "Trade val : 35,685 MB\n\n".
		     "👨‍👩‍👧 นักลงทุนทั่วไป : -1,071 MB\n".
		     "🏛 สถานบัน : +75 MB\n".
		     "🏢 บัญชีบล. : -536 MB\n".
		     "🌍 ต่างประเทศ : +1,533 MB\n\n".
		     "🕙  [".date("d/m/Y h:m")."]"
		   ),
		   array(
	    'type' => 'text',
	    'text' => 'second text'
	           )
	    );
	}
	elseif ($cmd == 1) {
	   $messages = [
           'type' => 'text',
           'text' => $stocks[$key][0]." ".$dir."\n\n".
		    "Price : ".number_format($stocks[$key][1],2)."\n".
		    "Chg : ".number_format($stocks[$key][2],2)." , ".number_format($stocks[$key][3],2)."%\n".
		    "Mkt Value: ".number_format($stocks[$key][4],0)." MB\n".
		    "Mkt Vol : ".number_format($stocks[$key][5],0)."\n".
		    "Avg : ".number_format($stocks[$key][6],2)."\n".
		    "High : ".number_format($stocks[$key][7],2)."\n".
		    "Low : ".number_format($stocks[$key][8],2)."\n\n".
		    "🕙  [".date("d/m/Y h:m")."]"
           ]; 
	} else {
	   $txt_cmd = "";
	   foreach ($stk_list as $list) {
		   $key = searchForId($list, $stocks);
		   if ($stocks[$key][2] > 0) {
		      $dir = "△";
		   } elseif ($stocks[$key][2] < 0) {
		      $dir = "🔻";
		   } else {
		      $dir = "▬";
		   }
		   $txt_cmd .= $dir." ".$stocks[$key][0].
			   	  " : ".number_format($stocks[$key][1],2).
			   	  ", ".number_format($stocks[$key][2],2).
			   	  ", ".number_format($stocks[$key][3],2)."%\n";
	   }
	   $messages = [
	   'type' => 'text',
	   'text' => $txt_cmd."\n🕙  [".date("d/m/Y h:m")."]"
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
echo "OK\n";
//echo $messages['text'];

?>

