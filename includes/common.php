<?php
function buildUrl($base, $urlParams) {
    $r = $base . '?';
    foreach ($urlParams as $k => $v) {
        $r .= rawurlencode(strval($k)) . "=" . rawurlencode(strval($v)) . "&";
    }
    return substr($r, 0, -1); // Remove the last '&' from the url
}