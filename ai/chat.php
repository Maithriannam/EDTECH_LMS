<?php

header("Content-Type: application/json");

$user_message =
$_POST['message'];

$api_key =
"AIzaSyAZfOrxkqnHDLTt25P3NMtR2NvnQVjduBs";

$url =
"https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=" . $api_key;

$data = [

"contents" => [

[
"parts" => [

[
"text" => $user_message
]

]
]

]

];

$options = [

"http" => [

"header" =>
"Content-Type: application/json",

"method" => "POST",

"content" =>
json_encode($data)

]

];

$context =
stream_context_create($options);

$response =
file_get_contents(
$url,
false,
$context
);

if($response === FALSE){

echo json_encode([

"reply" =>
"API Error"

]);

exit;
}

$result =
json_decode($response, true);

$reply =
$result['candidates'][0]['content']['parts'][0]['text']
?? "No response";

echo json_encode([

"reply" => $reply

]);

?>