 Copyright  Daniel Neis <danielneis@gmail.com>

 Modified for use in MoodleBites for Developers Level 1
 by Richard Jones & Justin Hunt.

 See: https://www.moodlebites.com/mod/page/view.php?id=24546

 Clone or download the zip file for a branch.  If you are following our MoodleBites course, clone or download branch start_point.

Rename the superiframe/ folder to the name of your module (eg "widget").
The module folder MUST be lower case.

Use search and replace on all files in this directory and change
all the instances of the string "superiframe" to your block name
(eg "widget").

Brackets is a free and open source text editor that can do search and replace
across multiple files.

Rename the file lang/en/superiframe.php to lang/en/widget.php
where "widget" is the name of your module.

Rename block_superiframe.php
in the main directory to block_widget.php

Place the widget folder into the /blocks folder of the moodle
directory.

Visit Site Administration > Notifications to install the block.

Go to Site Administration > Plugins > Blocks > Manage blocks
and you should find that this superiframe has been added to the list of
installed modules.

Good luck!