<?php

function generate_name($n)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $new = "";

  for ($i = 0; $i < 10; ++$i)
    $new .= $characters[rand(0, strlen($characters) -1)];

  $new = md5($new);
  $new = substr($new, 0, -30);

  $new = file_exists("./data/$code.json") ? generate_name($new) : $new;
  return $new_fucker;
}

$data_stream = file_get_contents("php://input");
$data_parsed = json_decode($data_stream);

$code = generate_name($data_parsed->name);
if (file_exists("./data/$code.json"))

$file = fopen("./data/".$code.".json", "w+") or false;
$data = json_encode([
  "long_url" => $data_parsed->url,
  "code" => $code,
  "views" => 0,
]); 

if ($file == false)
{

}

fwrite($file, $data);
fclose($file);

header("Content-Type: application/json;");
echo json_encode(["shortUrl"=>"https://knipurl.nl/url/?s=$code", "shortAnal"=>"https://knipurl.nl/a/?s=$code"]);
return;
?>