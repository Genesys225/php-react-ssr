<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: text/html");

$curl = curl_init();
$postData = array();
$postData["data"] = "arr";

curl_setopt_array(
    $curl,
    [
        CURLOPT_URL => 'http://10.0.0.9:3000/form',
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($postData)),
            'Connection: Keep-Alive'
        )
    ]
);
print_r(json_encode($postData));
$node_output = curl_exec($curl);
list($html, $css, $sccss) = explode("!!, ", $node_output);
$initialProps["component"] = "/form";
curl_close($curl);

$doc = new DOMDocument();
$doc->loadHTMLFile("../../public/index.html");
$head_links = $doc->getElementsByTagName('link');
$body_scripts = $doc->getElementsByTagName('script');
// $body_scripts->item(0)->setAttribute('defer', "");
$cssHref = $doc->saveHTML($head_links->item(2));
$webpack_inline_func = $doc->saveHTML($body_scripts->item(0));
// $src_arr = array();
// foreach ($body_scripts as $item) {
//     $src = $item->getAttribute('src');
//     // $item->setAttribute('defer', "");
//     if ($src) {
//         $src_arr[] = $src;
//     }
// }

$first_react_script_tag = $doc->saveHTML($body_scripts->item(1));
$second_react_script_tag = $doc->saveHTML($body_scripts->item(2));
list($_, $asset_id) = explode(".", $cssHref);
?>
<!doctype html>
<html lang="en">

<head>
    <title>React PHP starter Kit</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/public/manifest.json" />
    <link href="/static/css/main.<?php echo $asset_id; ?>.chunk.css" rel="stylesheet">
    <style id="jss-server-side">
        <?php print_r($css); ?>
    </style>
    <?php print_r($sccss); ?>
</head>

<body>
    <script>
        window.__INITIAL_DATA__ = <?php print_r(json_encode($initialProps)); ?>;
    </script>
    <div id="root"><?php print_r($html); ?></div>
    <?php echo $webpack_inline_func; ?>
    <?php echo $first_react_script_tag; ?>
    <?php echo $second_react_script_tag; ?>
</body>

</html>