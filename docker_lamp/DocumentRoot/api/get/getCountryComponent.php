<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: text/html");
include_once "../../mysql/DB.php";
include_once "../../classes/Country.php";

$curl = curl_init();

$database = new DB();
$db = $database->connect();

$param = $_GET['Name'];

$country_db = new Country($db);
$country = $country_db->getByName($param);
$country_length = $country->rowCount();

if ($country_length > 0) {
    $country_arr['data'] = $country->fetch(PDO::FETCH_ASSOC);

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://10.0.0.9:3000/country',
        CURLOPT_POST => 1,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => json_encode(array('data' => $country_arr['data'])),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
            // 'Content-Length: ' . strlen($country_arr)
        )
    ]);
    $node_output = curl_exec($curl);
    list($html, $css) = explode("!!, ", $node_output);
    $country_arr["component"] = 'country';
    curl_close($curl);
} else {
    echo json_encode(
        array('message' => "No Country with name: $param")
    );
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>React PHP starter Kit</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/public/manifest.json" />
    <link href="/public/static/css/main.498d002a.chunk.css" rel="stylesheet">
    <style id="jss-server-side">
    <?php print_r($css) ?>
    </style>
</head>

<body>
    <div id="app"><?php print_r($html); ?></div>
    <script>
        window.__INITIAL_DATA__ = <?php print_r(json_encode($country_arr)); ?>;
    </script>
    <script>!function (l) { function e(e) { for (var r, t, n = e[0], o = e[1], u = e[2], f = 0, i = []; f < n.length; f++)t = n[f], p[t] && i.push(p[t][0]), p[t] = 0; for (r in o) Object.prototype.hasOwnProperty.call(o, r) && (l[r] = o[r]); for (s && s(e); i.length;)i.shift()(); return c.push.apply(c, u || []), a() } function a() { for (var e, r = 0; r < c.length; r++) { for (var t = c[r], n = !0, o = 1; o < t.length; o++) { var u = t[o]; 0 !== p[u] && (n = !1) } n && (c.splice(r--, 1), e = f(f.s = t[0])) } return e } var t = {}, p = { 1: 0 }, c = []; function f(e) { if (t[e]) return t[e].exports; var r = t[e] = { i: e, l: !1, exports: {} }; return l[e].call(r.exports, r, r.exports, f), r.l = !0, r.exports } f.m = l, f.c = t, f.d = function (e, r, t) { f.o(e, r) || Object.defineProperty(e, r, { enumerable: !0, get: t }) }, f.r = function (e) { "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 }) }, f.t = function (r, e) { if (1 & e && (r = f(r)), 8 & e) return r; if (4 & e && "object" == typeof r && r && r.__esModule) return r; var t = Object.create(null); if (f.r(t), Object.defineProperty(t, "default", { enumerable: !0, value: r }), 2 & e && "string" != typeof r) for (var n in r) f.d(t, n, function (e) { return r[e] }.bind(null, n)); return t }, f.n = function (e) { var r = e && e.__esModule ? function () { return e.default } : function () { return e }; return f.d(r, "a", r), r }, f.o = function (e, r) { return Object.prototype.hasOwnProperty.call(e, r) }, f.p = "/"; var r = window.webpackJsonp = window.webpackJsonp || [], n = r.push.bind(r); r.push = e, r = r.slice(); for (var o = 0; o < r.length; o++)e(r[o]); var s = n; a() }([])</script>
    <script src="/public/static/js/2.da008706.chunk.js"></script>
    <script src="/public/static/js/main.c9ba617b.chunk.js"></script>
</body>

</html>