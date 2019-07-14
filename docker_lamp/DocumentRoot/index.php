<?php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost:3000/'
]);

$result = curl_exec($curl);
list($html, $initialProps) = explode("!!, ", $result);
curl_close($curl);
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!doctype html>
<html lang="en">

<head>
    <title>React PHP starter Kit</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/public/bundle.js" defer></script>
</head>

<body>
    <div id="app"><?php echo $html; ?></div>
    <script type="text/javascript">
    window.__INITIAL_DATA__ = <?php echo $initialProps; ?>;
    </script>
</body>

</html>