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

require_once('../../../config.php');

$context = context_system::instance();

require_login();
if (!is_siteadmin()) {
    return '';
}

$PAGE->set_context($context);
$PAGE->set_url('/block/notifications/signup.php?'.http_build_query($_GET));
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('pluginname', 'block_notifications'));
$PAGE->navbar->add(get_string('pluginname', 'block_notifications'));

$userid = \block_notifications\message::get_user_id_by_url();
$message = new \block_notifications\signup_message($userid);
$message->send();

redirect(new \moodle_url('/user/profile.php?id='.$userid), 'Email reinviata a '.$message->user->email);



