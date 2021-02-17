<?php

// https://php.watch/versions/8.1/CURLStringFile#CURLStringFile-polyfill
class CURLStringFile extends CURLFile
{
    public function __construct(string $data, string $postname, string $mime = "application/octet-stream")
    {
        parent::__construct('data://'. $mime .';base64,' . base64_encode($data), $mime, $postname);
    }
}
