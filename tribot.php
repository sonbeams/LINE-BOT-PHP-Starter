<?php
function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val[0] === $id) {
           return $key;
       }
   }
   return null;
}

date_default_timezone_set('Asia/Bangkok');
$access_token = 'IIckEKH4AEo7xgc74LJmTYBxU39gbny9jEwIbmroCsSTMFmg8RpQ1QPgVIm7kqrR4yO/0g0l/JvCX30uMq+WdFhjDXNuvZfo96+IrLgSZxJ2m2spr+eTIVo17dniDcIknwVf5BvWSFAs0yV3MuGY/gdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['events'])) {
   foreach ($events['events'] as $event) {
      if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
	 $text = $event['message']['text'];
	 $replyToken = $event['replyToken'];
     
         $stocks = array(
	      array("", 0, 0, 0, 0, 0, 0, 0, 0),
	      array("ADVANC", 173.5,-1,-0.57,172468,993084,173.75,174.5,173),
array("AOT", 39.25,-0.5,-1.26,453227,11538407,39.25,39.5,39),
array("BA", 20,-0.1,-0.5,11737,584900,20.05,20.1,20),
array("BANPU", 20.4,-0.2,-0.97,381084,18649813,20.45,20.6,20.3),
array("BBL", 182.5,-0.5,-0.27,86494,473100,182.75,183,182.5),
array("BCP", 32.5,-0.5,-1.52,46951,1434712,32.75,33,32.5),
array("BDMS", 20.7,-0.2,-0.96,27860,1341427,20.75,20.8,20.7),
array("BEM", 7.35,-0.1,-1.34,184252,25065383,7.35,7.4,7.3),
array("BH", 180,0.5,0.28,65839,365100,180.5,181.5,179.5),
array("BLA", 50.5,0,0,14394,285502,50.5,50.75,50.25),
array("BTS", 8.5,0,0,77495,9173675,8.45,8.5,8.4),
array("CBG", 63.75,-0.5,-0.78,177650,2787134,63.625,64.25,63),
array("CENTEL", 35.5,0.25,0.71,78313,2207600,35.5,36,35),
array("CK", 27.5,-0.25,-0.9,125392,4554812,27.5,27.75,27.25),
array("CPALL", 61.25,-0.25,-0.41,191709,3119530,61.5,61.75,61.25),
array("CPF", 27.75,-0.25,-0.89,166658,6006679,27.625,27.75,27.5),
array("CPN", 57.75,0.25,0.43,35911,624812,57.5,57.75,57.25),
array("DELTA", 86.5,0.5,0.58,51422,596932,86.125,86.75,85.5),
array("DTAC", 42.75,0,0,44351,1042756,42.5,42.75,42.25),
array("EGCO", 211,1,0.48,68585,325134,211,214,208),
array("GLOBAL", 16.7,-0.2,-1.18,23050,1382605,16.7,16.8,16.6),
array("GLOW", 83.25,0.75,0.91,166759,2007327,83,83.5,82.5),
array("GPSC", 33.75,-0.75,-2.17,40659,1201320,34,34.25,33.75),
array("HMPRO", 9.65,0,0,25286,2619745,9.65,9.7,9.6),
array("INTUCH", 54,0,0,123697,2292513,53.875,54,53.75),
array("IRPC", 5.25,0,0,81580,15689424,5.2,5.25,5.15),
array("IVL", 34.75,-0.5,-1.42,41025,1176796,35,35.25,34.75),
array("KBANK", 193,-0.5,-0.26,112460,583082,193,193.5,192.5),
array("KCE", 104.5,-1,-0.95,116757,1109800,105.25,106,104.5),
array("KKP", 70.25,-0.25,-0.35,86082,1219617,70.625,71,70.25),
array("KTB", 20.8,-0.2,-0.95,207531,9958643,20.85,21,20.7),
array("LH", 9.7,0,0,41264,4251380,9.725,9.75,9.7),
array("MINT", 37,-0.5,-1.33,85732,2312536,37,37.25,36.75),
array("PSH", 22.5,-0.2,-0.88,5931,262826,22.55,22.6,22.5),
array("PTG", 23.4,0.3,1.3,121491,5223800,23.25,23.5,23),
array("PTT", 393,1,0.26,342276,870091,393,394,392),
array("PTTEP", 97.25,0.25,0.26,144000,1478004,97.375,97.75,97),
array("PTTGC", 72.5,-0.25,-0.34,193540,2666496,72.625,73,72.25),
array("ROBINS", 62,-1.25,-1.98,47660,768207,62.375,63,61.75),
array("SCB", 163.5,-0.5,-0.3,108439,663296,163.5,164,163),
array("SCC", 548,-2,-0.36,259559,475771,545,548,542),
array("SPRC", 13.6,-0.2,-1.45,165612,12144708,13.65,13.8,13.5),
array("TCAP", 48,-0.25,-0.52,14800,307130,48.125,48.25,48),
array("THAI", 17.6,-0.2,-1.12,28413,1604601,17.7,17.8,17.6),
array("TMB", 2.4,0,0,15797,6574739,2.41,2.42,2.4),
array("TOP", 75.5,1,1.34,45702,606758,75.25,75.75,74.75),
array("TPIPL", 2.48,-0.04,-1.59,153144,61524390,2.49,2.52,2.46),
array("TRUE", 6.55,-0.05,-0.76,92933,14113373,6.575,6.6,6.55),
array("TU", 20.9,0,0,90916,4385900,20.75,21,20.5),
array("WHA", 3.08,-0.06,-1.91,104217,33541798,3.11,3.16,3.06)

	 );
	      
      $text = strtoupper($text);
      $cmdmatch = true;
	      
      try {
	$key = searchForId($text, $stocks);
        if ($stocks[$key][2] > 0) {
	   $dir = "△";
	} elseif ($stocks[$key][2] < 0) {
	   $dir = "🔻";
	} else {
	   $dir = "▬";
	}
	      
	$stk_list = explode(",",str_replace(" ","",$text));
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
		     "🕙  [".date("d/m/Y h:i")."]"
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
	elseif ($prt_stk[0] == "PORT" and $prt_stk[1] != "") {
	   if ($prt_stk[1] == "PTT") 
	   	{ 
		   $prt_vol = 2000;
		   $prt_cost = 350; 
		}
	   elseif($prt_stk[1] == "CPF") 
	        { 
		   $prt_vol = 4000;
		   $prt_cost = 32.25;
	   	}
	   $key = searchForId($prt_stk[1], $stocks);
		
           if ($stocks[$key][1] > $prt_cost) {
	      $dir = "△";
	   } elseif ($stocks[$key][1] < $prt_cost) {
	      $dir = "🔻";
	   } else {
	      $dir = "▬";
	   }
		
	   $amount = ($prt_cost*$prt_vol);
	   $gl = ($prt_vol*$stocks[$key][1])-$amount;
	   $pgl = $gl/$amount*100;
	   	
	   $messages = [
	      'type' => 'text',
	      'text' => $stocks[$key][0]." ".number_format($stocks[$key][1],0)." ".
		   $dir." ".number_format($gl,2)." ".number_format($pgl,2)."%\n\n".
		   "ราคาซื้อ : ".number_format($prt_cost,2)."\n".
		   "จำนวน   : ".number_format($prt_vol,2)."\n".
		   "รวม	    : ".number_format($amount,2)."\n".
		   "ค่า Fee : ".number_format($amount*0.002749,2)."\n".
		   "รวมต้นทุน : ".number_format($amount+($amount*0.002749),2)."\n".
		   "มูลค่าปัจจุบัน : ".number_format($stocks[$key][1]*$prt_vol,2)."\n\n".
		   "วันที่ทำรายการ : 15/03/2017\n".
		   "วันที่ชำระค่าซื้่อ : 18/03/2017\n\n".
		   "ดูใบคอนเฟิร์ม http://www.trinityquicktrade.com\n\n".
		    "🕙  [".date("d/m/Y h:i")."]"  
	   ];
	}
	// "ORDER" command
	elseif ($text == "ORDER") {
	   $messages = [
	      'type' => 'image',
	      'originalContentUrl' => 'https://img.in.th/images/9aa8b06ad50d1c86cdf2886eae90d9c4.png',
	      'previewImageUrl' => 'https://img.in.th/images/2dfb601e8b8062ebbec74de7987153b8.png'
	   ];
	}      
	// "PAY" command
	elseif ($text == "PAY") {
	   $messages = [
	      'type' => 'text',
	      'text' => "ท่านมียอด \"ชำระ\" วันนี้ จำนวน 26,866.58 บาท\n".
		        "🕙  [".date("d/m/Y h:i")."]"
	   ];
	}
	// One Stock command
	elseif (searchForId($text, $stocks)) {
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
		    "🕙  [".date("d/m/Y h:i")."]"
           ];
	}
	// Multi stocks command
	else {
	   $cmdmatch = false;
	   $txt_cmd = "";
	   foreach ($stk_list as $list) {
	      if (searchForId($list, $stocks)) {
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
		   $cmdmatch = true;
	      }
	   }
	   $messages = [
	   'type' => 'text',
	   'text' => $txt_cmd."\n🕙  [".date("d/m/Y h:i")."]"
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
      
      if ($cmdmatch) {
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
}
echo "OK\n";
//echo $messages['text'];
?>
