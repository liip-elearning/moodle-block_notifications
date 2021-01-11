<?php

/**
 * Capabilities
 *
 * @package        block_notifications
 * @author         Andrea Mancino <andreamancino2@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = array(

    // Whether or not the user can add the block.
    'block/notifications:addinstance' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    ),

    // Whether or not the user can add the block on their dashboard.
    // We don't allow anyone to add it, the teacher/manager should add it
    // to their default dashboards.
    'block/notifications:myaddinstance' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(),
    ),

    // Whether or not a user can see the block
    'block/notifications:view' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'read',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array()
    ),

);

