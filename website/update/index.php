<?php
$url = 'https://raw.githubusercontent.com/douxxtech/botwave/refs/heads/main/scripts/update.sh';

$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: botwavephp\r\n"
    ]
];
$context = stream_context_create($options);

$content = @file_get_contents($url, false, $context);

if ($content !== false) {
    $content = str_replace("\r\n", "\n", $content);
    $content = str_replace("\r", "\n", $content);

    header('Content-Type: text/plain');
    echo $content;
} else {
    http_response_code(500);
    echo "echo \"error while fetching update.sh, clone the repo and use it from there.\"";
}
