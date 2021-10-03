<?php

function is_active(string $routeName) {
    return null !== request()->segment(2) && request()->segment(2) == $routeName ? "active" : "";
}

function is_welcome() {
    return null == request()->segment(1) ? true:false;
}

function youtube_video_id($url) {
    return substr($url,strpos($url,'=')+1);//video id
}
