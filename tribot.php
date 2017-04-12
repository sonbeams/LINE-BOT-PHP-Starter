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
	      array("ADVANC", 174.5,1,0.58,134855,774768,174,174.5,173.5,"XD",174,174.5),
array("AOT", 39.25,0,0,56069,1426210,39.375,39.5,39.25,0,39.25,39.5),
array("BA", 19.9,-0.1,-0.5,9288,466200,19.95,20,19.9,0,19.9,20),
array("BANPU", 20.6,0.1,0.49,375899,18374723,20.45,20.6,20.3,"XD",20.5,20.6),
array("BBL", 186,3.5,1.92,8532490,46423283,185.25,187,183.5,0,186,186.5),
array("BCP", 33.25,0.5,1.53,16311,494305,33,33.25,32.75,0,33,33.25),
array("BDMS", 20.6,-0.2,-0.96,217858,10562852,20.65,20.8,20.5,0,20.5,20.6),
array("BEM", 7.4,0.05,0.68,127894,17323893,7.375,7.45,7.3,0,7.4,7.45),
array("BH", 181,0,0,23375,129579,180.5,181.5,179.5,0,180.5,181),
array("BLA", 50.25,-0.5,-0.99,2539,50480,50.5,50.75,50.25,0,50.25,50.5),
array("BTS", 8.45,0,0,20441,2409386,8.475,8.5,8.45,0,8.45,8.5),
array("CBG", 68,1,1.49,361321,5372732,67.125,68,66.25,0,67.75,68),
array("CENTEL", 35.5,0,0,21755,612900,35.375,35.5,35.25,0,35.25,35.5),
array("CK", 28,0.25,0.9,175891,6304636,27.875,28.25,27.5,0,27.75,28),
array("CPALL", 61.25,-0.5,-0.81,144397,2347003,61.5,61.75,61.25,0,61.25,61.5),
array("CPF", 27.75,-0.25,-0.89,300261,10841233,27.75,28,27.5,0,27.5,27.75),
array("CPN", 58.5,1,1.74,82695,1426835,57.875,58.5,57.25,0,58.25,58.5),
array("DELTA", 86.5,0.25,0.29,41775,483188,86.5,87,86,0,86.25,86.5),
array("DTAC", 42.5,0,0,25420,597751,42.5,42.75,42.25,0,42.25,42.5),
array("EGCO", 209,1,0.48,106364,505596,210,212,208,0,208,209),
array("GLOBAL", 16.9,0.1,0.6,28117,1660876,16.95,17.1,16.8,0,16.9,17),
array("GLOW", 83.5,0.25,0.3,112944,1349954,83.625,84,83.25,0,83.5,83.75),
array("GPSC", 33.75,0,0,19075,564230,33.75,34,33.5,0,33.75,34),
array("HMPRO", 9.6,0,0,10940,1138955,9.625,9.65,9.6,0,9.6,9.65),
array("INTUCH", 54,0,0,24053,445727,53.875,54,53.75,"XD",53.75,54),
array("IRPC", 5.2,0,0,26030,4985124,5.225,5.25,5.2,0,5.2,5.25),
array("IVL", 35.25,0,0,100731,2877424,35,35.25,34.75,0,35,35.25),
array("KBANK", 195.5,2,1.03,658558,3382968,194.25,195.5,193,"XD",195,195.5),
array("KCE", 105,0.5,0.48,29343,280063,104.75,105.5,104,0,104.5,105),
array("KKP", 69.5,-0.75,-1.07,312565,4480505,69.875,70.5,69.25,0,69.25,69.5),
array("KTB", 20.8,0,0,117760,5652824,20.85,20.9,20.8,0,20.8,20.9),
array("LH", 9.8,0,0,16861,1728103,9.775,9.8,9.75,0,9.75,9.8),
array("MINT", 37.25,0,0,84868,2276457,37.25,37.5,37,"XD",37.25,37.5),
array("PSH", 22.6,0.1,0.44,9147,406506,22.5,22.6,22.4,0,22.5,22.6),
array("PTG", 23.2,0,0,48122,2073700,23.2,23.3,23.1,0,23.2,23.3),
array("PTT", 394,-1,-0.25,565024,1433099,394.5,396,393,0,393,394),
array("PTTEP", 98.5,0,0,180252,1829274,98.5,98.75,98.25,0,98.5,98.75),
array("PTTGC", 73.25,1,1.38,471947,6437895,73.125,73.75,72.5,0,73,73.25),
array("ROBINS", 62.5,0.5,0.81,49636,797201,62.375,62.75,62,0,62.25,62.5),
array("SCB", 163,0,0,829833,5090703,163,164,162,0,162.5,163),
array("SCC", 550,0,0,356478,648064,550,552,548,0,548,550),
array("SPRC", 13.7,0,0,207851,15086749,13.75,13.9,13.6,0,13.7,13.8),
array("TCAP", 48.5,0.5,1.04,66823,1381617,48.25,48.5,48,0,48.25,48.5),
array("THAI", 17.8,0.1,0.56,14745,831602,17.75,17.8,17.7,0,17.7,17.8),
array("TMB", 2.44,0,0,35090,14494274,2.43,2.44,2.42,0,2.42,2.44),
array("TOP", 76.75,1.5,1.99,223006,2917493,76.375,77,75.75,0,76.75,77),
array("TPIPL", 2.5,0.02,0.81,113302,45404850,2.49,2.52,2.46,0,2.48,2.5),
array("TRUE", 6.65,0.05,0.76,173996,26245019,6.65,6.7,6.6,0,6.6,6.65),
array("TU", 21,0.1,0.48,70161,3349681,20.9,21.1,20.7,0,21,21.1),
array("WHA", 3.12,0,0,74852,23896528,3.13,3.16,3.1,0,3.1,3.12)
	 );
	      
      $text = strtoupper($text);
      $cmdmatch = true;
	      
      try {
	$key = searchForId($text, $stocks);
        if ($stocks[$key][2] > 0) {
	   $dir = "🔺";
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
	      
	// "ID" command
	elseif ($text == "ID") {
	   $messages = [
	      'type' => 'text',
	      'text' => $events['userId']
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
	   elseif($prt_stk[1] == "MINT") 
	        { 
		   $prt_vol = 5500;
		   $prt_cost = 33.75;
	   	}
	   $key = searchForId($prt_stk[1], $stocks);
		
           if ($stocks[$key][1] > $prt_cost) {
	      $dir = "🔺";
	   } elseif ($stocks[$key][1] < $prt_cost) {
	      $dir = "🔻";
	   } else {
	      $dir = "▬";
	   }
	   if ($stocks[$key][9] == "0") {
	      $xd = "";
	   } else {
	      $xd = " <".$stocks[$key][9].">";
	   }
		
	   $amount = ($prt_cost*$prt_vol);
	   $gl = ($prt_vol*$stocks[$key][1])-$amount;
	   $pgl = $gl/$amount*100;
	   	
	   $messages = [
	      'type' => 'text',
	      'text' => $stocks[$key][0]."".$xd." ".number_format($stocks[$key][1],2)." ".
		   $dir." ".number_format($gl,2)." ".number_format($pgl,2)."%\n\n".
		   "ราคาซื้อ : ".number_format($prt_cost,2)."\n".
		   "จำนวน   : ".number_format($prt_vol,2)."\n".
		   "รวม	    : ".number_format($amount,2)."\n".
		   "ค่าธรรมเนียม : ".number_format($amount*0.002749,2)."\n".
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
	      'text' => "ท่านมียอด \"ชำระ\" วันนี้\nจำนวน 264,866.58 บาท\n\n".
		        "🕙  [".date("d/m/Y h:i")."]"
	   ];
	}
	// One Stock command
	elseif (searchForId($text, $stocks)) {
	   $key = searchForId($text, $stocks);
	   if ($stocks[$key][9] == "0") {
	      $xd = "";
	   } else {
	      $xd = " <".$stocks[$key][9].">";
	   }
	   $messages = [
             'type' => 'text',
             'text' => $stocks[$key][0]."".$xd."\n\n".
		    "Price : ".number_format($stocks[$key][1],2)." ".$dir."\n".
		    "Chg : ".number_format($stocks[$key][2],2)." , ".number_format($stocks[$key][3],2)."%\n".
		    "Mkt Value: ".number_format($stocks[$key][4],0)." MB\n".
		    "Mkt Vol : ".number_format($stocks[$key][5],0)."\n".
		    "Avg : ".number_format($stocks[$key][6],2)."\n".
		    "High : ".number_format($stocks[$key][7],2)."\n".
		    "Low : ".number_format($stocks[$key][8],2)."\n\n".
		    "Bid : ".number_format($stocks[$key][10],2)." || ".
		    "Offer : ".number_format($stocks[$key][11],2)."\n\n".
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
		      $dir = "🔺";
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
