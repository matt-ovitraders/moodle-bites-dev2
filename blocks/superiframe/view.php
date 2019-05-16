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
 * superiframe view page
 *
 * @package    block_superiframe
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require('../../config.php');
require_once('../../lib/moodlelib.php');

require_login();

$blockId = required_param('blockid',PARAM_INT);
$config = $def_config;



$config_data = $DB->get_field('block_instances','configdata', array('id'=>$blockId));

if($config_data){
    $config = unserialize(base64_decode($config_data));
    $size = $config->size;
}

if(isset($_GET['size'])){
    $size = $_GET['size'];
}

switch($size){
    case '0':
    case 'custom':
        $width = $def_config->width;
        $height = $def_config->height;
        break;
    case '1':
    case 'small':
        $width = 360;
        $height = 240;
        break;
    case '2':
    case 'medium':
        $width = 720;
        $height = 480;
        break;
    case '3':
    case 'large':
        $width = 1080;
        $height = 720;
        break;
}

// Get our config.
$def_config = get_config('block_superiframe');

$usercontext = context_user::instance($USER->id);

$PAGE->set_course($COURSE);
$PAGE->set_url('/blocks/superiframe/view.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout($pagelayout);
$PAGE->set_title(get_string('pluginname', 'block_superiframe'));
$PAGE->navbar->add(get_string('pluginname', 'block_superiframe'));
$renderer = $PAGE->get_renderer('block_superiframe');
$renderer->display_view_page($config->url, $width, $height, $blockId);

return;