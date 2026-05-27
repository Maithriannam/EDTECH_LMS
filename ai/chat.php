<?php

$message =
$_POST['message'];

$api_key =
"AIzaSyAZfOrxkqnHDLTt25P3NMtR2NvnQVjduBs";

$url =
"https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=".$api_key;

$data = [

"contents" => [

[
"parts" => [

[
"text" => $message
]

]
]

]

];

$options = [

"http" => [

"header" =>
"Content-type: application/json",

"method" => "POST",

"content" =>
json_encode($data)

]

];

$context =
stream_context_create($options);

$result =
file_get_contents(
$url,
false,
$context
);

$response =
json_decode($result,true);

echo $response['candidates'][0]['content']['parts'][0]['text'];

?>