<?php

function user_language($code = false) {
    $userLanguage = (isset($_SESSION['language'])) ? $_SESSION['language'] : 'spanish';

    //Override with GET
    if (isset($_GET['lang'])) {
        $userLanguage = lang_for_code($_GET['lang']);
    }

    $_SESSION['language'] = $userLanguage;

    return ($code) ? code_for_lang($userLanguage) : $userLanguage;
}

function lang_for_code($code) {
    $languages = array(
        'en' => 'english',
        'es' => 'spanish'
    );

    return $languages[$code];
}

function code_for_lang($lang) {
    $languages = array(
        'english' => 'en',
        'spanish' => 'es'
    );

    return $languages[$lang];
}

function localized($key, $params = NULL) {
    $CI =& get_instance();
    $openTag = '[var]';
    $closeTag = '[/var]';

    $line = $CI->lang->line($key);

    if ($params) {
        $vars = find_vars($line, $openTag, $closeTag);
        if (!empty($vars)) {
            foreach ($vars as $var) {
                $replace = (empty($params[$var])) ? '' : $params[$var];
                $line = str_replace($openTag . $var . $closeTag, $replace, $line);
            }
        }
    }

    return $line;
}

function find_vars($str, $startDelimiter, $endDelimiter) {
    $contents = array();
    $startDelimiterLength = strlen($startDelimiter);
    $endDelimiterLength = strlen($endDelimiter);
    $startFrom = $contentStart = $contentEnd = 0;
    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
        $contentStart += $startDelimiterLength;
        $contentEnd = strpos($str, $endDelimiter, $contentStart);
        if (false === $contentEnd) {
            break;
        }
        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
        $startFrom = $contentEnd + $endDelimiterLength;
    }

    return $contents;
}