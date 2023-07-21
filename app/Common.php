<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

function newUserName()
{
    return uniqueID(20);
}
function uniqueID($lenght = 13)
{
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return strtoupper(substr(bin2hex($bytes), 0, $lenght));
}

function getSetSettings($key)
{
    if (!service('settings')->get($key)) {
        service('settings')->set($key, null);
    }
    return service('settings')->get($key);
}
function setSetiings($group, $key, $value)
{
    return service('settings')->set($group . '.' . $key, $value);
}

function isActiveUrl($first, $second)
{
    $first = str_replace('/', '', $first);
    $second = str_replace('/', '', $second);

    if ($first == '/' || $second == '/' || empty($first) || empty($second) || $first == '' || $second == '' || $first == ' ' || $second == ' ' || !$first || !$second) {
        return false;
    }

    if ($first == $second) {
        return 'active';
    }
    // if (str_contains($first, $second)) {
    //     return 'active active2';
    // }
    if (str_contains($first, $second)) {
        return 'active 2';
    }
    if (str_contains($second, $first)) {
        return 'active 3';
    }
    if (strpos($second, $first)) {
        return 'active 4';
    }
    return false;
}

function getMenuItems($request = null)
{
    $menuItems = [
        [
            'active' => $request ? ($request['REQUEST_URI'] == '/' ? 'active' : false) : false,
            'link' => route_to('dashboard'),
            'icon' => 'house-fill',
            'name' => 'Dashboard',
            'type' => 'menu',
        ],
        [
            'active' => $request ? (isActiveUrl($request['REQUEST_URI'], route_to('manage_admins'))) : false,
            'link' => route_to('manage_admins'),
            'icon' => 'person-fill-gear',
            'name' => 'Admins',
            'type' => 'menu',
        ],
        // [
        //     'icon' => 'people-fill',
        //     'name' => 'Users Management',
        //     'type' => 'heading',
        // ],
        [
            'active' => $request ? (isActiveUrl($request['REQUEST_URI'], route_to('manage_users'))) : false,
            'link' => route_to('manage_users'),
            'icon' => 'people-fill',
            'name' => 'Users',
            'type' => 'menu',
        ],
        [
            'active' => $request ? (isActiveUrl($request['REQUEST_URI'], route_to('manage_message_groups'))) : false,
            'link' => route_to('manage_message_groups'),
            'icon' => 'collection-fill',
            'name' => 'Message Groups',
            'type' => 'menu',
        ],
        [
            'type' => 'diveder',
        ],
        [
            'active' => $request ? (isActiveUrl($request['REQUEST_URI'], route_to('manage_settings'))) : false,
            'link' => route_to('manage_settings'),
            'icon' => 'gear-wide-connected',
            'name' => 'Settings',
            'type' => 'menu',
        ],
        [
            'active' => false,
            'link' => base_url('logout'),
            'icon' => 'door-closed',
            'name' => 'Sign out',
            'type' => 'menu',
        ],
    ];
    return $menuItems;
}

function getFullUserAvatar($avatar, $id)
{
    return base_url('uploads/users/' . $id . '/' . $avatar);
}

function getFullGroupImage($image, $groupid)
{
    return base_url('uploads/group/' . $groupid . '/' . $image);
}
