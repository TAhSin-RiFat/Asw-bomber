<?php

// মোবাইল নাম্বার নেওয়া হবে URL থেকে
$mobileNo = $_GET['mobileNo'] ?? '01402209496';
$countryCode = '880';

$url = "https://www.bajiok.com/wps/verification/sms/register";

$payload = json_encode([
    "mobileNo" => $mobileNo,
    "countryDialingCode" => $countryCode
]);

$headers = [
    "Content-Type: application/json",
    "Language: BN",
    "sec-ch-ua-platform: \"Android\"",
    "Authorization:",
    "sec-ch-ua: \"Android WebView\";v=\"135\", \"Not-A.Brand\";v=\"8\", \"Chromium\";v=\"135\"",
    "sec-ch-ua-mobile: ?1",
    "Merchant: bajiokf4",
    "ModuleId: REGMOBVERF3",
    "User-Agent: Mozilla/5.0 (Linux; Android 14; TECNO KL7 Build/UP1A.231005.007) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.7049.111 Mobile Safari/537.36",
    "Accept: application/json, text/plain, */*",
    "Origin: https://www.bajiok.com",
    "X-Requested-With: mark.via.gq",
    "Referer: https://www.bajiok.com/m/register",
    "Accept-Encoding: gzip, deflate, br, zstd",
    "Accept-Language: en-US,en;q=0.9",
    "Cookie: tcg-sid=25c6d521-061c-4ec3-ac28-3a62e06d98d8; SHELL_deviceId=7b324d0d-4333-4e21-bd5b-e69e2260feb3"
];

// cURL সেটআপ
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);

// রেসপন্স আনো
$response = curl_exec($ch);

// যদি কোনো সমস্যা হয়
if (curl_errno($ch)) {
    echo 'Request Error: ' . curl_error($ch);
} else {
    // রেসপন্স দেখাও
    header('Content-Type: application/json');
    echo $response;
}

curl_close($ch);
?>