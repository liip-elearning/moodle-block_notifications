<?php

/**
 * Capabilities
 *
 * @package		block_notifications
 * @author 		Andrea Mancino <andreamancino2@gmail.com>
 */

defined('MOODLE_INTERNALS') || die();

$capabilities = array(

	// Whether or not the user can add the block.
    'block/notifications:addinstance' => array(
    	'riskbitmask' => RISK_SPAM,

		'captype' => 'write',
		'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
        	'editingteacher' => CAP_ALLOW
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
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
        	'editingteacher' => CAP_ALLOW,
        	'manager' => CAP_ALLOW
        ),
    ),

);

