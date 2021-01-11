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
 * Block Notifications
 *
 * @package        block_notifications
 * @author         Andrea Mancino <andreamancino2@gmail.com>
 */

class block_notifications extends block_list {

    public function init()
    {
        $this->title = get_string('notifications', 'block_notifications');
    }

    public function applicable_formats() {
        return array('user-profile' => true);
    }

    public function hide_header() {
        return true;
    }

    public function get_content()
    {
        if (!is_siteadmin()) {
            return '';
        }
        if ($this->content !== null) {
            return $this->content;
        }

        // ottengo l'id dell'utente
        $id = \block_notifications\message::get_user_id_by_url();

        $this->content             = new stdClass;
        $this->content->items     = array();
        $this->content->icons     = array();

        $this->content->items[] = html_writer::tag('a', get_string('resend_signup_email', 'block_notifications'), array('href' => new \moodle_url('/blocks/notifications/pages/signup.php?id='.$id)));
        $this->content->icons[] = html_writer::empty_tag('img', array('src' => 'images/icons/1.gif', 'class' => 'icon'));

        return $this->content;
    }
}