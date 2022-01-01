<?php

use \Illuminate\Support\Facades\Route;

if (!function_exists('isActive')) {
    /**
     * Get the route and compare
     *
     * @param string $route_name
     * @param ?string $class
     * @return string
     */
    function isActive(string $route_name, ?string $class = 'active font-weight-bold'): string
    {
        return (strpos(Route::currentRouteName(), $route_name) !== false ? $class : '');
    }
}

if (!function_exists('messages')) {
    /**
     * Define session with messages notifications
     *
     * @param string $title
     * @param string $message
     * @param string $type['info', 'primary', 'success', 'danger', 'warning']
     * @param int $time
     */
    function messages(string $title, string $message, string $type = 'info', int $time = 4000)
    {
        session()->flash('title', $title);
        session()->flash('message', $message);
        session()->flash('type', $type);
        session()->flash('time', $time);
    }
}
