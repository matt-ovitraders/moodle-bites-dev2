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
 * block_superiframe main file
 *
 * @package   block_superiframe
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Modified for use in MoodleBites for Developers Level 1
 * by Richard Jones & Justin Hunt. 
 *
 * See: https://www.moodlebites.com/mod/page/view.php?id=24546
 */

defined('MOODLE_INTERNAL') || die();

/*

Notice some rules that will keep plugin approvers happy when you want
to register your plugin in the plugins database

    Use 4 spaces to indent, no tabs
    Use 8 spaces for continuation lines
    Make sure every class has php doc to describe it
    Describe the parameters of each class and function

    https://docs.moodle.org/dev/Coding_style
*/

/**
 * Class superiframe minimal required block class.
 *
 */
class block_superiframe extends block_base {
    /**
     * Initialize our block with a language string.
     */
    function init() {
        $this->title = get_string('pluginname', 'block_superiframe');
    }
    function get_content(){
        global $CGF, $OUTPUT, $USER;

        if($this->content !== null){
            return $this->content;
        }

        if(empty($this->instance)){
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $this->content->text = '';

        $blockId = $this->instance->id;

        $renderer = $this->page->get_renderer('block_superiframe');
        $this->content->text = $renderer->fetch_block_content($blockId);
        return $this->content;
    }
    
    function instance_allow_multiple() {
        return true;
    }

    function has_config() {
        return true;
    }
}
