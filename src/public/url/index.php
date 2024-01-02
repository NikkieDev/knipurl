<?php
if (!isset($_GET["s"]))
  Header("Location: ../index.html");
else {
  $site_code = $_GET["s"];
  $file_loc = "../../api/data/$site_code.json";

  $fPtr = fopen($file_loc, "r") or Header("Location: ../error/404_code.html");
  $data = fread($fPtr, filesize($file_loc));
  $data_parsed = json_decode($data, true);
  $new_loc = $data_parsed["long_url"];

  if (strlen($data_parsed["long_url"]) > 0) $read = 0;
  else $read = -1;
  fclose($fPtr);

  if ($read == 0)
  {
    $fPtr = fopen($file_loc, "w");
    $views = intval($data_parsed["views"]);
    $views++;

    $data_parsed["views"] = $views;
    fwrite($fPtr, json_encode($data_parsed));
    fclose($fPtr);
  }
}
?>
<!DOCTYPE html>
<html lang="en" style="width: 100%; height: 100%;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirecting url</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column gap-2 justify-content-center align-items-center" style="width: 100%; height: 100%;">
  <div class="d-flex flex-column gap-2">
    <div class="d-flex flex-row gap-2">
      <p>This URL was shortened by</p>
      <a href="https://knipurl.nl">knipurl</a>
      <div class="d-flex flex-row">
        <p>Redirecting you in <span id="seconds"></span></p>
      </div>
    </div>
    <p>Shorten your own URL's <a href="https://knipurl.nl" class="btn bg-primary text-white px-2 py-1 shadow rounded">here</a></p>
  </div>
  <script type="text/javascript"> var infolinks_pid = 3411827; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
  <script>
    let seconds = 3; const secondsSpan = document.querySelector("span#seconds"); secondsSpan.textContent = seconds.toString();
    const counter = setInterval(() => {if (seconds > 0)
      {seconds--;secondsSpan.textContent = seconds.toString();} else {clearInterval(counter);
        location.href="https://<?php echo $new_loc; ?>";}}, 1000)
  </script>
</body>
</html>