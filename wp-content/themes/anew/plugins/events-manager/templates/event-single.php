<?php
/* 
 * Remember that this file is only used if you have chosen to override event pages with formats in your event settings!
 * You can also override the single event page completely in any case (e.g. at a level where you can control sidebars etc.), as described here - http://codex.wordpress.org/Post_Types#Template_Files
 * Your file would be named single-event.php
 */
/*
 * This page displays a single event, called during the the_content filter if this is an event page.
 * You can override the default display settings pages by copying this file to yourthemefolder/plugins/events-manager/templates/ and modifying it however you need.
 * You can display events however you wish, there are a few variables made available to you:
 * 
 * $args - the args passed onto EM_Events::output() 
 */
global $EM_Event;
/* @var $EM_Event EM_Event */
//echo $EM_Event->output_single();
/*
echo EM_Events::output(array('format'=>
'<a href="#_EVENTURL" border=0>$mycustomphpstuffiwantedherethatdoesntshowifiuseformats</a>
<B>#_EVENTLINK</B><br/>#_EVENTDATES #_EVENTTIMES<BR/><i>#_LOCATIONNAME, #_LOCATIONADDRESS, #_LOCATIONTOWN </i><br/><a href="#_EVENTURL">Details & map</a><HR>',
 'limit'=>20, 'pagination'=>1));
*/
echo EM_Events::output(array('format'=>
		'
		<div class="mydate"><img src="http://www.premiumweb.cz/testovaci/wp-content/uploads/2014/02/Calendar.png" alt="icon calendar" title="#_EVENTDATES" width="14px"> Datum konání: #_EVENTDATES</div>
		<div class="mytime"><img src="http://www.premiumweb.cz/testovaci/wp-content/uploads/2014/02/clock1.png" alt="icon clock" title="#_EVENTTIMES" width="14x"> Čas konání: #_EVENTTIMES</div><br>
		{has_location}<div class="mylocation"><img src="http://www.premiumweb.cz/testovaci/wp-content/uploads/2014/02/location.png" title="místo konání" width="14x"> Místo konání: #_LOCATIONLINK</div><br>
		{/has_location}
		<div class="mylector"><img src="http://www.premiumweb.cz/testovaci/wp-content/uploads/2014/02/clock1.png" alt="icon clock" title="#_EVENTTIMES" width="14x"> Lektor: #_ATT{skolitel}</div><br>
		#_EVENTIMAGE
		<h3>Program školení</h3>
		<div class="mynotes">#_EVENTNOTES<div>
		<br style="clear:both" />
		

		',
		'limit'=>1
	)
);

?>