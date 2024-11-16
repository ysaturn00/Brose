<?php

function setFlash(string $flashName, string $message, string $type = 'error')
{
    if (!isset($_SESSION['flash'][$flashName])) {
        $_SESSION['flash'][$flashName] = [
            'message' => $message,
            'type' => $type,
        ];
    }
}

function getFlash(string $flash)
{
    if (isset($_SESSION['flash'][$flash])) {
        $type = $_SESSION['flash'][$flash]['type'];
        $flashMessage = $_SESSION['flash'][$flash]['message'];

        unset($_SESSION['flash'][$flash]);

        return "<span style='display: block;' class='box-$type'>$flashMessage</span>";
    }

    return '';
}