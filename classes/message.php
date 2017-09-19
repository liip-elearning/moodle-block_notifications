<?php

/**
 * @package		block_notifications
 * @author 		Andrea Mancino <andreamancino2@gmail.com>
 */

namespace block_notifications;

defined('MOODLE_INTERNAL') || die();

abstract class message {

	public $user;

	public function __construct($user_id)
	{
		$this->user = static::get_user($user_id);
	}

	public static function get_user_id_by_url()
	{
		global $PAGE, $USER;
		parse_str($PAGE->url->get_query_string(), $params);
		return (empty($params['id'])) ? $USER->id : $params['id'];
	}

	public static function get_user($user_id)
	{
		global $DB;
		return $DB->get_record('user', array('id' => $user_id));
	}

}