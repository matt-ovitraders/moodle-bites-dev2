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
 * superiframe configuration form
 *
 * @package   block_superiframe
 * @copyright Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_superiframe_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Section header title according to language file.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        // A sample string variable with a default value.
        $mform->addElement('text', 'config_text', get_string('blockstring', 'block_superiframe'));
        $mform->setDefault('config_text', 'default value');
        $mform->setType('config_text', PARAM_MULTILANG);

        // Url
        $config = get_config('block_superiframe');
        $mform->addElement('text', 'config_url', get_string('url','block_superiframe'));
        $mform->setDefault('config_url',$config->url);
        $mform->setType('config_url',PARAM_URL);

        $sizeOptions = [get_string('custom','block_superiframe'), 
                        get_string('small','block_superiframe'), 
                        get_string('medium','block_superiframe'), 
                        get_string('large','block_superiframe')];
        // Size
        $mform->addElement('select','config_size', get_string('size','block_superiframe'),$sizeOptions);
        $mform->setDefault('config_size', $sizeOptions[0]);

    }
}
