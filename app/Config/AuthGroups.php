<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://github.com/codeigniter4/shield/blob/develop/docs/quickstart.md#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'developer' => [
            'title'       => 'Developer',
            'description' => 'Site programmers.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ]
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'dev_settings.manage' => 'Can manage developer settings',
        'dev_settings.create' => 'Can create new developer settings',
        'dev_settings.read' => 'Can read developer settings',
        'dev_settings.update' => 'Can update developer settings',
        'dev_settings.delete' => 'Can delete developer settings',
        
        'settings.manage' => 'Can manage settings',
        'settings.create' => 'Can create new settings',
        'settings.read' => 'Can read settings',
        'settings.update' => 'Can update settings',
        'settings.delete' => 'Can delete settings',

        'admins.manage' => 'Can manage admins',
        'admins.create' => 'Can create new admins',
        'admins.read' => 'Can read existing admins',
        'admins.update' => 'Can update existing admins',
        'admins.delete' => 'Can delete existing admins',

        'users.manage' => 'Can manage users',
        'users.create' => 'Can create new non-admin users',
        'users.read' => 'Can read existing non-admin users & own',
        'users.update' => 'Can update existing non-admin users & own',
        'users.delete' => 'Can delete existing non-admin users',

        'conversations.manage' => 'Can manage conversations',
        'conversations.create' => 'Can create new conversations & own',
        'conversations.read' => 'Can read existing conversations & own',
        'conversations.update' => 'Can update existing conversations & own',
        'conversations.delete' => 'Can delete existing conversations & own',

        'messages.manage' => 'Can manage messages',
        'messages.create' => 'Can create new messages & own',
        'messages.read' => 'Can read existing messages & own',
        'messages.update' => 'Can update existing messages & own',
        'messages.delete' => 'Can delete existing messages & own',

        'conversation_members.manage' => 'Can manage conversation_members',
        'conversation_members.create' => 'Can create new conversation_members & own',
        'conversation_members.read' => 'Can read existing conversation_members & own',
        'conversation_members.update' => 'Can update existing conversation_members & own',
        'conversation_members.delete' => 'Can delete existing conversation_members & own',
        
        // 'users.*', 'conversations.*', 'conversation_members.*', 'messages.*', 'settings.*'
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'conversations.*',
            'conversation_members.*',
            'messages.*',
            'settings.*'
        ],
        'developer' => [
            'dev_settings.*',
            'admin.*',
            'users.*',
            'conversations.*',
            'conversation_members.*',
            'messages.*',
            'settings.*'
        ],
        'admin' => [
            'users.manage',
            'users.create',
            'users.read',
            'users.update',
            
            'conversations.manage',
            'conversations.create',
            'conversations.read',
            'conversations.update',
            
            'conversation_members.manage',
            'conversation_members.create',
            'conversation_members.read',
            'conversation_members.update',
            
            'messages.manage',
            'messages.create',
            'messages.read',
            'messages.update',
            
            'settings.manage',
            'settings.create',
            'settings.read',
            'settings.update',
        ],
        'user' => [],
    ];
}
