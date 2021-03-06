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
							array("thumbnailImageUrl" => "https://img.in.th/images/6c0d8dc2f11227d6479b3dfbfcc37c49.png",
							"title" => "Deep Value",
							"text" => "ลงทุนระยะยาว ด้วยปัจจัย valuation ที่ซ่อนอยู่",
							"actions" => array(
								array("type" => "message",
								"label" => "View portfolio",
								"text" => "deep value"
								),
								array("type" => "uri",
								"label" => "Read more",
								"uri" => "https://sonbeams.wixsite.com/trinityacademy/single-post/2017/02/23/Deep-Value"
								)
							    )
							),
							array("thumbnailImageUrl" => "https://img.in.th/images/dab040a3d72fe484064f40c40b87f898.png",
							"title" => "The Perfect Gems",
							"text" => "ลงทุนระยะกลาง ด้วยปัจจัยหนุน ด้านจุดเด่นของธุรกิจที่ตลาดกำลังให้ความสนใจ",
							"actions" => array(
								array("type" => "message",
								"label" => "View Portfolio",
								"text" => "perfect gems"
								),
								array("type" => "uri",
								"label" => "Read more",
								"uri" => "https://sonbeams.wixsite.com/trinityacademy/single-post/2016/03/30/Top-5-Beaches-in-Corfu"
								)
							    )
							)
						)
					]
				];
			}
			
			elseif ($text == 'yntest') {
				$messages = [
					'type' => 'template',
					'altText' => 'This is a confirm template',
					'template' => array(
							"type" => "confirm",
							"text" => "ต้องการตั้ง ซื้อ/ขาย",
							"actions" => array(
									array(
									    "type" => "uri",
									    "label" => "Yes",
									    "uri" => "https://www.trinityquicktrade.com/Quicktrade/jsp/02_streaming.jsp"
									),
									array(
									    "type" => "message",
									    "label" => "No",
									    "text" => "Cancel"
									)
								)
						)
				];
			}
			
			elseif ($text == 'imgtest') {
				$messages = [
					'type' => 'imagemap',
					'baseUrl' => 'https://www.img.in.th/images/18c25e35d2b0c2fb9066f550f20deb06/1040',
					'altText' => 'This is an imagemap',
					'baseSize' => array(
						"height" => 1040,
						"width" => 1040
					),
					'actions' => array(
						/*array(
						    "type" => "uri",
						    "linkUri" => "https://www.trinityquicktrade.com",
						    "area" => array(
							    "x" => 0,
							    "y" => 0,
							    "width" => 520,
							    "height" => 1040
							)
						),*/
						array(
						    "type" => "message",
						    "text" => "hello",
						    "area" => array(
							    "x" => 520,
							    "y" => 0,
							    "width" => 520,
							    "height" => 1040
						     )
						)
					)		
				];
			}
			else {
				$command = explode(" ",$text);
				if (is_numeric($command[1])) {
					$command[1] = number_format($command[1]);
				} else {
					throw new Exception();
				}
				
				if ($command[0] == 'dep') {
					$messages = [
						'type' => 'template',
						'altText' => 'This is a confirm template',
						'template' => array(
								"type" => "confirm",
								"text" => "ต้องการฝากหลักประกัน บัญชี 99-12345-4 จำนวน ".$command[1]." บาท ",
								"actions" => array(
										array(
										    "type" => "message",
										    "label" => "Confirm",
										    "text" => "ดำเนินการฝากหลักประกัน \nเข้าบัญชี 99-12345-4 \nจำนวน ".$command[1]." บาท \nเสร็จสิ้น"
										),
										array(
										    "type" => "message",
										    "label" => "No",
										    "text" => "ยกเลิกการฝากหลักประกัน"
										)
									)
								)
					];
				}
			
				if ($command[0] == 'wdr') {
					$messages = [
						'type' => 'template',
						'altText' => 'This is a confirm template',
						'template' => array(
								"type" => "confirm",
								"text" => "ต้องการถอนหลักประกัน บัญชี 99-12345-4 จำนวน ".$command[1]." บาท ",
								"actions" => array(
										array(
										    "type" => "message",
										    "label" => "Confirm",
										    "text" => "ดำเนินการถอนหลักประกัน \nจากบัญชี 99-12345-4 \nจำนวน ".$command[1]." บาท \nไปยัง บัญชี ATS เสร็จสิ้น"
										),
										array(
										    "type" => "message",
										    "label" => "No",
										    "text" => "ยกเลิกการถอนประกัน"
										)
									)
								)
					];
				}
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
