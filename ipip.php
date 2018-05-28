<?php
$ip = gethostbyname('{query}');

echo '<?xml version="1.0"?>';
echo '<items>';
if(!filter_var($ip, FILTER_VALIDATE_IP)) {
    echo '<item>';
    echo '<title>IP不正确</title>';
    echo '</item>';
}else{
    $address = implode(" ",json_decode(file_get_contents("http://freeapi.ipip.net/{$ip}")));
    $uid = md5($ip);
    echo "<item uid=\"{$uid}\">";
    echo "<title>{$address}</title>";
    echo "<subtitle>{$ip} 来自ipip.net </subtitle>";
    echo '<icon>icon.png</icon>';
    echo '</item>';
}
echo '</items>';