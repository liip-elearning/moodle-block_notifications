<?php

/**
 * @package 	block_notifications
 * @author 		Andrea Mancino <andreamancino2@gmail.com>
 */

namespace block_notifications;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/user/profile/lib.php');
require_once($CFG->dirroot . '/user/lib.php');

class signup_message extends message {

	public function send()
	{
		send_confirmation_email($this->user);
	}

}