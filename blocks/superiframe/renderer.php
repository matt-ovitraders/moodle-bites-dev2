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

class block_superiframe_renderer extends plugin_renderer_base{

    // Here we rturn all the content that goes in the block
    function fetch_block_content($blockId){
        global $USER;
        $pageContent = get_string('welcomeuser', 'block_superiframe', $USER);
        $pageContent .= '<br/>';
        $pageContent .= html_writer::link($CFG->wwwroot."/blocks/superiframe/view.php?blockid=".$blockId, get_string('gotosuperiframe', 'block_superiframe'));

        return $pageContent;
    }

    // Here we aggregate all the pieces of content of the view page and displays them
    function display_view_page($url, $width, $height, $blockId){
        global $USER;
        
        // Start output to browser
        echo $this->output->header();
        echo $this->output->heading(get_string('pluginname', 'block_superiframe'), 5);

       $systemcontext = context_system::instance();

        if(has_capability('block/superiframe:seeuserdetail', $systemcontext))
        {
            // Some content goes here.
            echo html_writer::tag('p',fullname($USER));
            echo html_writer::tag('p',$this->output->user_picture($USER));      
        }
                
        echo html_writer::div($this->fetch_size_links($blockId),'size-buttons');
        echo html_writer::tag('iframe', '', array('src'=>$url, 'height'=>$height, 'width'=>$width, 'style'=>'border:0;'));

        // Send footer out to browser. Important!
        echo $this->output->footer();
    }

    function fetch_size_links($blockId){
        $buttons = html_writer::link(new moodle_url('/blocks/superiframe/view.php?size=custom&blockid='.$blockId), get_string('custom', 'block_superiframe'));
        $buttons .= html_writer::link(new moodle_url('/blocks/superiframe/view.php?size=small&blockid='.$blockId), get_string('small', 'block_superiframe'));
        $buttons .= html_writer::link(new moodle_url('/blocks/superiframe/view.php?size=medium&blockid='.$blockId), get_string('medium', 'block_superiframe'));
        $buttons .= html_writer::link(new moodle_url('/blocks/superiframe/view.php?size=large&blockid='.$blockId), get_string('large', 'block_superiframe'));
    
        return $buttons;
    }
}


?>