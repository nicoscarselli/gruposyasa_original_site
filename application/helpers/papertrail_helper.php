<?php

function send_remote_syslog($message, $component = "syasa", $program = "syasa") {
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($sock === false) {
        log_message('error', 'Socket was unable to init. ' . socket_strerror(socket_last_error()));
    } else {
        foreach(explode("\n", $message) as $line) {
            $syslog_message = "<22>" . date('M d H:i:s ') . $program . ' ' . $component . ': ' . $line;
            $messageSent = socket_sendto($sock, $syslog_message, strlen($syslog_message), 0,
                config_item('papertrail_URL'),
                config_item('papertrail_port'));

            if ($messageSent === false) {
                log_message('error', 'Socket was unable to send. ' . socket_strerror(socket_last_error()));
            }
        }

        socket_close($sock);
    }
}

function papertrail($type = 'error', $message, $component = 'Syasa') {
    log_message($type, $message);

    if (config_item('use_papertrail') == true) {
        send_remote_syslog($message, $component , config_item('tool_name'));
    }
}