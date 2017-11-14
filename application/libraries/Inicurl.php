<?php

class Inicurl
{

function grab($url){
$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
 curl_setopt($ch,CURLOPT_ENCODING,'gzip');
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;
}

public function posst($cari){
    

     $url = 'http://iruna-online.info/search_results.php';

    
     // setting CURL
   
  $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $data = curl_init();
    curl_setopt($data, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($data, CURLOPT_COOKIEFILE, "cookie.txt");
 		curl_setopt($data, CURLOPT_URL, $url);
 		curl_setopt($data, CURLOPT_POST, 1);
		curl_setopt($data, CURLOPT_POSTFIELDS, 'search='.$cari);
		curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($data, CURLOPT_TIMEOUT, 3000);	curl_setopt($data,CURLOPT_FOLLOWLOCATION, 1);
     
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}

}

?>

