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

function setUrl($name)
{
    $name = mb_strtolower($name, 'UTF-8');

    $name = preg_replace(
        ['/[áàâãäå]/u', '/[éèêë]/u', '/[íìîï]/u', '/[óòôõö]/u', '/[úùûü]/u', '/[ç]/u', '/[ñ]/u'],
        ['a', 'e', 'i', 'o', 'u', 'c', 'n'],
        $name
    );

    $name = preg_replace('/[^a-z0-9\s-]/', '', $name);

    $name = preg_replace('/\s+/', ' ', $name);

    $name = preg_replace('/\s/', '-', $name);

    $name = preg_replace('/-+/', '-', $name);

    $name = trim($name, '-');

    return $name;
}

function getActualURI()
{
    $uri = $_SERVER['REQUEST_URI'];

    $uri = explode('/', $uri);

    $_SESSION['Alluri'] = $uri;
    $_SESSION['uri'] = !empty($uri[3]) ? $uri[3] : '/';
    $_SESSION['uri2'] = !empty($uri[4]) ? $uri[4] : '';
    $_SESSION['uri3'] = !empty($uri[5]) ? $uri[5] : '';
}