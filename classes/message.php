<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package        block_notifications
 * @author         Andrea Mancino <andreamancino2@gmail.com>
 */

namespace block_notifications;

defined('MOODLE_INTERNAL') || die();

abstract class message {

    public $user;

    public function __construct($userid)
    {
        $this->user = static::get_user($userid);
    }

    public static function get_user_id_by_url()
    {
        global $PAGE, $USER;
        parse_str($PAGE->url->get_query_string(), $params);
        return (empty($params['id'])) ? $USER->id : $params['id'];
    }

    public static function get_user($userid)
    {
        global $DB;
        return $DB->get_record('user', array('id' => $userid));
    }

}
