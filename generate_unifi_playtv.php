<?php
/**
Script by @samleong123.
Special thanks to @weareblahs.
Revived unifiPlayTV!
 **/
$userid = "YOUR_USER_NAME"; /**Put ur registered phone number with unifiPlayTV start with 0**/
$password = "YOUR_PASSWORD";/**Put ur unifiPlayTV password**/
$physicaldeviceid = "YOUR_PHYSICAL_DEVICE_ID";/** Retrieve physicalDeviceID from F12 Network when login to playtv.unifi.com.my**/


$url = "https://playtv.unifi.com.my:7041/VSP/V3/Authenticate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"authenticateBasic":{"userID":"'.$userid.'","userType":"1","timeZone":"Asia/Brunei","isSupportWebpImgFormat":"0","clientPasswd":"'.$password.'","lang":"en"},"authenticateDevice":{"physicalDeviceID":"'.$physicaldeviceid.'","terminalID":"'.$physicaldeviceid.'","deviceModel":"PC Web TV"},"authenticateTolerant":{"areaCode":"1200","templateName":"default","bossID":"","userGroup":"-1"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$vuid = $result["VUID"];
$csession = $result["cSessionId"];
$userid = $result["profileID"];
$jsession = $result["jSessionID"];

if (empty($vuid)) {echo "Uh-oh. Seems like your username / password is wrong. Please try again"; echo "
Raw Data:

"; echo $resp; echo $data;} else {
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000009","mediaID":"44534208","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv1 = $result["playURL"];
echo '#EXTM3U x-tvg-url="https://weareblahs.github.io/epg/unifitv.xml" url-tvg="https://weareblahs.github.io/epg/unifitv.xml" refresh="1440" max-conn="1" refresh="24"';
echo '

#EXTM3U
#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="101" tvg-id="101" tvg-chno="101" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708071026467w2e.png",TV1
'.$tv1;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000036","mediaID":"44534218","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv2 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="102" tvg-id="102" tvg-chno="102" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708070724242ygr.png",TV2
'.$tv2;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000011","mediaID":"43361030","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv3 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="103" tvg-id="103" tvg-chno="103" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202007/20200701/202007010436159112u3.png",TV3
'.$tv3;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000031","mediaID":"38477328","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$didiktv = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="107" tvg-id="107" tvg-chno="107" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202102/20210223/20210223181442797931.png",DidikTV KPM
'.$didiktv;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000017","mediaID":"38477341","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv8 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Chinese Variety" ch-number="108" tvg-id="108" tvg-chno="108" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708074041526yld.png",8TV
'.$tv8;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000020","mediaID":"38477354","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv9 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="109" tvg-id="109" tvg-chno="109" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/2019071607262664255l.png",TV9
'.$tv9;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000070","mediaID":"38675356","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$salam = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="113" tvg-id="113" tvg-chno="113" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716062504007e6f.png",Salam HD
'.$salam;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000014","mediaID":"38609447","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$AlHijrah = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="114" tvg-id="114" tvg-chno="114" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716072749378meg.png",TV Alhijrah
'.$AlHijrah;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000105","mediaID":"38609605","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$Laku = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="151" tvg-id="151" tvg-chno="151" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/2019071607335626707k.png",Laku Mall HD
'.$Laku;


$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000116","mediaID":"38654105","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$parlimen = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="News" ch-number="633" tvg-id="633" tvg-chno="633" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716073249333u7e.png",Parlimen Malaysia
'.$parlimen;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000066","mediaID":"38703123","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$nhk = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="News" ch-number="643" tvg-id="643" tvg-chno="643" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/201907160704507932rh.png",NHK WORLD-JAPAN
'.$nhk;

$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000016","mediaID":"38654032","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$cna = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="News" ch-number="611" tvg-id="611" tvg-chno="611" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/201907080719495046uu.png",Channel NewsAsia
'.$cna;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"52027474","mediaID":"52027484","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$unifisports1 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Sports" ch-number="701" tvg-id="701" tvg-chno="701" tvg-logo="https://playtv.unifi.com.my:7053/CPS/images/universal/film/logo/202108/20210811/2021081116172640657u.png",unifi Sports 1 HD
'.$unifisports1;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"41210859","mediaID":"41210868","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$unifisports2 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Sports" ch-number="702" tvg-id="702" tvg-chno="702" tvg-logo="https://playtv.unifi.com.my:7053/CPS/images/universal/film/logo/202108/20210811/20210811161847362lc0.png",unifi Sports 2 HD
'.$unifisports2;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"52026408","mediaID":"52026418","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$unifisports3 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Sports" ch-number="703" tvg-id="703" tvg-chno="703" tvg-logo="https://playtv.unifi.com.my:7053/CPS/images/universal/film/logo/202108/20210811/20210811162003633ulc.png",unifi Sports 3 HD
'.$unifisports3;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"52027492","mediaID":"52027502","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$unifisports4 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Sports" ch-number="704" tvg-id="704" tvg-chno="704" tvg-logo="https://playtv.unifi.com.my:7053/CPS/images/universal/film/logo/202108/20210811/20210811162111899up2.png",unifi Sports 4 HD
'.$unifisports4;
$url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"41208891","mediaID":"41214568","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$unifisports5 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Sports" ch-number="705" tvg-id="705" tvg-chno="705" tvg-logo="https://playtv.unifi.com.my:7053/CPS/images/universal/film/logo/202108/20210811/20210811162210893gcu.png",unifi Sports 5 HD
'.$unifisports5;

   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"51882374","mediaID":"51882384","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$sonygem= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="ENTERTAINMENT" ch-number="SGEM.id" tvg-id="SGEM.id" tvg-chno="SGEM.id" tvg-logo="https://playtv.unifi.com.my:7044/CPS/images/universal/film/logo/202109/20210926/20210926024214242p95.png",Sony Gem HD
'.$sonygem;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000090","mediaID":"38536178","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$sonymax= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Movies" tvg-id="331" tvg-chno="331" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716070246131li6.png",Sony Max
'.$sonymax;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000038","mediaID":"38606713","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$cineplex= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Movies" tvg-id="333" tvg-chno="333" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/2019071607255101998u.png",Colors Cineplex
'.$cineplex;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000103","mediaID":"38610254","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$dream= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Kids" tvg-id="550" tvg-chno="550" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202011/20201125/202011250800095510sa.png",Dreamworks HD
'.$dream;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000046","mediaID":"38729749","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$dunia= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Movies" tvg-id="CHN" tvg-chno="128" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716074123890vav.png",Dunia Sinema HD
'.$dunia;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000029","mediaID":"38729829","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$rockent= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="ENTERTAINMENT" ch-number="473" tvg-id="473" tvg-chno="473" tvg-logo="https://playtv.unifi.com.my:7044/CPS/images/universal/film/logo/202109/20210902/20210902163927011u1k.png",473 Rock Entertainment HD
'.$rockent;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000081","mediaID":"38729863","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$rockex= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="ENTERTAINMENT" ch-number="474" tvg-id="474" tvg-chno="474" tvg-logo="https://playtv.unifi.com.my:7044/CPS/images/universal/film/logo/202109/20210902/20210902163736941716.png",474 Rock Extreme HD
'.$rockex;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000080","mediaID":"38610133","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$cinemaworld= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Movies" tvg-id="411" tvg-chno="411" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716065916134bcf.png",CinemaWorld HD
'.$cinemaworld;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000088","mediaID":"38610307","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$travel= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Lifestyle & Knowledge" tvg-id="521" tvg-chno="521" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716073823792x3y.png",Travel Channel HD
'.$travel;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"52014533","mediaID":"52014543","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tech= $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Lifestyle & Knowledge" ch-number="505" tvg-id="505" tvg-chno="505" tvg-logo="https://playtv.unifi.com.my:7044/CPS/images/universal/film/logo/202110/20211002/20211002055719651qa7.png",505 Tech Storm HD
'.$tech;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"51882317","mediaID":"51882327","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$cm = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Chinese Variety" ch-number="1000" tvg-id="1000" tvg-chno="1000" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202109/20210926/20210926030715748ltd.png",Celestial Movies HD
'.$cm;
   
   $url = "https://playtv.unifi.com.my:7041/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000086","mediaID":"38729671","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$luxe = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Lifestyle & Knowledge" ch-number="529" tvg-id="529" tvg-chno="529" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708075136521klp.png",Luxe.TV HD
'.$luxe;
}
?>
