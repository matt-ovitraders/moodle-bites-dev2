<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'sqlsrv';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'MoodleBitesDevCourse';
$CFG->dbuser    = 'moodlebitesuser';
$CFG->dbpass    = 'M00dlebites*1';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://localhost:2060';
$CFG->dataroot  = 'C:\\Users\\matt\\Documents\\MoodleBites\\Website\\moodledata';
$CFG->admin     = 'admin';
$CFG->customfrontpageinclude = 'frontpageinsert/frontpage.html';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
