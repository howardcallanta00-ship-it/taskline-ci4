<?php

if (! function_exists('format_task_date')) {
    function format_task_date(string $date, string $format = 'F j, Y'): string
    {
        return date($format, strtotime($date));
    }
}
if (! function_exists('task_status_label')) {
    function task_status_label(string $status): string
    {
        return ucwords(str_replace('-', ' ', $status));
    }
}
