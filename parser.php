<?php
	error_reporting(0);
set_time_limit(0);
 header('Content-Type: text/html; charset=windows-1251');

$cat["Билеты срочно"]=114;
$cat["Билеты эксклюзив"]=138;
$cat["Билеты онлайн"]=139;
$cat["Туры срочно"]=131;
$cat["Ознакомительные туры"]=130;
$cat["Эксклюзивные экскурсионные туры"]=135;
$cat["Гарантированные номера в отелях"]=122;
$cat["Майские праздники"]=127;
$cat["Внутренний туризм - гарантированные номера"]=120;
$cat["Каникулы"]=124;
$cat["Ближнее зарубежье - гарантированные номера"]=116;
$cat["Ближнее зарубежье - эксклюзивные экскурсионные туры"]=115;
$cat["Туры эксклюзив"]=140;
$cat["Туры онлайн"]=141;
//get_data($id,$date,"Москва","Турция",$description,131,100000);
function get_data($id,$date,$depart,$direction,$description,$categoria,$cost,$url)
{
	echo "$id,$date <br>";
	$depart=iconv('CP1251','UTF-8',$depart);
	$direction=iconv('CP1251','UTF-8',$direction);
	$description=iconv('CP1251','UTF-8',$description);
	//$params=array('parent'=>$categoria,'author'=>0,'name'=>$direction, 'fields' => array(array('id'=>236,'value'=>$depart),array('id'=>"81",'value'=>$cost),array('id'=>"71",'value'=>$direction),array('id'=>82,'value'=>$description),array('id'=>"73",'value'=>$date))';
	$params=array(
		array(
			'parent'=>$categoria,
			'author'=>0,
			'name'=> $direction, 
			'fields' => array(
				array('id'=>236,'value'=>$depart),
				array('id'=>81,'value'=>$cost),
				array('id'=>71,'value'=>$direction),
				array('id'=>83,'value'=>$description),
				array('id'=>621,'value'=>$url),
				array('id'=>73,'value'=>$date))
			)
		);
	
	
	$post = array(
		'apikey' =>"7853a80ac5d1f788f5190565290fb57d",
		 'params'=>$params
	);
	//print_r($post);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://alternativa.intrumnet.com:81/sharedapi/stock/insert');
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	curl_close ($ch);

 
	

	$result2=json_decode($result);
 	print_r($result2);

}	





 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://birga.tourdom.ru/');
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(
				"Accept: application/json, text/javascript, */*; q=0.01" ,
				"Host: birga.tourdom.ru" ,
				"Referer: birga.tourdom.ru" ,
				"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0" ,
				"X-Requested-With: XMLHttpRequest"
			));
	$source = curl_exec($ch);
	curl_close ($ch);
	  
 
	$j=0; $max_b=0;$max_t=0;
	$matches = array();
	preg_match_all('/<div class="col-xs-24 section-caption">(.*)<span>(.*)<\/span>(.*)<div class="section-offers">/Usi' , $source , $matches , PREG_SET_ORDER);
	if(count($matches)){
		for ($i=0; $i<count($matches); $i++) 
		{
			$categoria=trim(strip_tags($matches[$i][1]));
			$source2=trim(($matches[$i][3]));
			$matches2 = array();
			preg_match_all('/col-sm-3 col-xs-8 offer-date(.*)<div class="date">(.*)<\/div>(.*)<div class="col-sm-4 hidden-xs depart-city">(.*)<\/div>(.*)class="col-sm-4 col-xs-16 direction">(.*)<div class="offer-cost">(.*)руб.(.*)<\/div>(.*)<div class="adv item_description"(.*)data-item_id="(.*)"(.*)data-birga_id="(.*)">(.*)<a style=\'text-decoration: none;\'(.*)<a class="offer-link-detail" href="(.*)"(.*)redirected_login/Usi' , $source2 , $matches2 , PREG_SET_ORDER);
			if(count($matches2)){
				for ($ii=0; $ii<count($matches2); $ii++) 
				{
					$date=trim($matches2[$ii][2]); 
					$data[date][$j]=substr($date, 6, 4).'-'.substr($date, 3, 2).'-'.substr($date, 0, 2).' 00:00:00';
					$data[depart][$j]=trim(strip_tags($matches2[$ii][4])); 
					$data[direction][$j]=trim(strip_tags($matches2[$ii][6])); ;
					$data[cost][$j]=trim(strip_tags($matches2[$ii][7])); 
					$data[id][$j]=trim(strip_tags($matches2[$ii][11])); 
					if ($data[id][$j]<300000) { if ($data[id][$j]>$max_b) $max_b=$data[id][$j];} else { if ($data[id][$j]>$max_t) $max_t=$data[id][$j];}   
					$data[description][$j]=strip_tags(trim($matches2[$ii][14]));
					$data[url][$j]="https://birga.tourdom.ru/".trim($matches2[$ii][16]); 
					$data[categoria][$j]=$cat["$categoria"];
					$j++;
				}
			}
		}
	}  
	 //print_r($data); //exit();
	$id_data=file('id.txt');
	$max_b0=trim($id_data[0]);
	$max_t0=trim($id_data[1]);
	$categoryAllTours = 146;
	
	// print_r($data);
	foreach ($data[id] as $key => $value)
	{ 
		if (($value<300000)&&($value>$max_b0)) get_data($value,$data[date][$key],$data[depart][$key],$data[direction][$key],$data[description][$key],$categoryAllTours,$data[cost][$key],$data[url][$key]);
		if (($value>400000)&&($value>$max_t0)) get_data($value,$data[date][$key],$data[depart][$key],$data[direction][$key],$data[description][$key],$categoryAllTours,$data[cost][$key],$data[url][$key]);
	}
	
	
	$file_rec = fopen ('id.txt',"w+");
	fputs ($file_rec, $max_b."\n");
	fputs ($file_rec, $max_t."\n");
	fclose ($file_rec);
	

 
?>