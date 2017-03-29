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
	      array("PTT", 404, 0.00, 0.00, 2336, 5782, 404.04, 406.00, 402.00),
	      array("GL", 25.75, 1.55, 6.40, 2219, 88498, 25.07, 25.75, 24.50),
	      array("KTB", 20.30, -0.30, -1.46, 1919, 94722, 20.26, 20.60, 20.10),
	      array("ADVANC", 180.50, 2.50, 1.40, 1536, 8551, 179.66, 180.50, 178.50),
	      array("BEM", 7.60, 0.15, 2.01, 1367, 181380, 7.54,  7.60, 7.45)
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
	$prt_stk = explode(" ",$text);
	$cmd = count($stk_list);
	$msg = 1;
	      
	// "SET" command
	if ($text == "SET") {
	   $msg = 2;
	   $messages = [
	     'type' => 'text',
	     'text' => "SET index : 1,585.72\n".
		     "Change : -2.46 , -0.16%\n".
		     "Trade val : 35,685 MB\n\n".
		     "👨‍👩‍👧 รายย่อย : -1,071 MB\n".
		     "🏛 สถานบัน : +75 MB\n".
		     "🏢 โบรกเกอร์ : -536 MB\n".
		     "🌍 ต่างประเทศ : +1,533 MB\n\n".
		     "🕙  [".date("d/m/Y h:m")."]"
	   ];
	   $messages2 = [
	     'type' => 'text',
	     'text' => "ค่าสถิติสำคัญ\n\n".
		       "P/E     17.31 เท่า\n".
		       "P/BV    1.92  เท่า\n\n".
		       "อัตราปันผลตอบแทน 3.14\n".
		       "การเปลี่ยนแปลงในรอบ 3 เดือน +3.99%\n".
		       "การเปลี่ยนแปลงในรอบ 6 เดือน +5.49%\n".
		       "การเปลี่ยนแปลงในรอบ 1 ปี      +1.67%\n"
	   ];
	}
	// "Port" command
	elseif ($text == "PORT") {
	   $messages = [
	      'type' => 'image',
	      'originalContentUrl' => 'https://img.in.th/images/1caa7923979ef1c4684d8fc88526e943.png',
	      'previewImageUrl' => 'https://img.in.th/images/157cfb79730a265550d20a7a87652d4e.png'
	   ];
	}
	// "Port-Type" command
	elseif ($text == "PORT 0") {
	   $messages = [
	      'type' => 'image',
	      'originalContentUrl' => 'https://img.in.th/images/625ad187dca740ce48ad4688a97d6fef.png',
	      'previewImageUrl' => 'https://img.in.th/images/a49ec61c791a47cfd5bdec83c3ec49e5.png'
	   ];
	}
	// "Port-Stock" command
	elseif ($prt_stk[0] == "PORT" and $prt_stk[1] <> "") {
	   if($prt_stk[1] == "PTT") { $prt_vol = 2000 : $prt_cost = 350; }
	   elseif($prt_stk[1] == "CPF") { $prt_vol = 4000 : $prt_cost = 25; }
		
	   $amount = $prt_cost*$prt_vol;
	   $gl = ($amount)-($prt_vol*$stocks[$key][1]);
	   $pgl = $gl/($amount)*100;
	   	
	   $messages = [
	      'type' => 'text',
	      'text' => $dir." ".$stocks[$key][0]." @ ".number_format($stocks[$key][1],2).
		   " ".number_format($gl,2)." ".number_format($pgl,2)."%\n\n".
		   "ราคาซื้อ : ".number_format($prt_cost,2)."\n".
		   "จำนวน   : ".number_format($prt_vol,2)."\n".
		   "รวม	    : ".number_format($amount,2)."\n".
		   "ค่า Fee : ".number_format($amount*0.002,2)."\n".
		   "รวมต้นทุน : ".number_format($amount+($amount*0.002),2)."\n\n".
		   "วันที่ทำรายการ : 15/03/2017\n".
		   "วันที่ชำระค่าซื้่อ : 18/03/2017\n\n".
		   "ดูใบคอนเฟิร์ม http://www.trinityquicktrade.com\n\n".
		    "🕙  [".date("d/m/Y h:m")."]"  
	   ];
	}
	// One Stock command
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
	}
	// Multi stocks command
	else {
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
	$msg = 1;
        $messages = [
          'type' => 'text',
          'text' => 'Caught exception: '.  $e->getMessage()
        ];
      }
			
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      if ($msg == 1) {
	$data = [
	   'replyToken' => $replyToken,
	   'messages' => [$messages],
        ];      
      }
      elseif ($msg == 2) {
	 $data = [
	    'replyToken' => $replyToken,
	    'messages' => [$messages, $messages2],
        ];
      }
      
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

