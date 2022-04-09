<?php 
	echo '<table id="sideMenu">';
	echo '<tr>';
	echo '<td class="menuBtn" id="menuBtn1"'.Highlight($button,1).'>HOME</td>';
	echo '</tr><tr>';
	echo '<td class="menuGap"></td>';
	echo '</tr><tr>';
	echo '<td class="menuBtn" id="menuBtn2"'.Highlight($button,2).'>PADDLESPORTS</td>';
	echo '</tr><tr>';
	echo '<td class="menuGap"></td>';
	echo '</tr><tr>';
	echo '<td class="menuBtn" id="menuBtn3"'.Highlight($button,3).'>ALL WATERSPORTS</td>';
	echo '</tr><tr>';
	echo '<td class="menuGap"></td>';
	echo '</tr><tr>';
	echo '<td class="menuBtn" id="menuBtn4"'.Highlight($button,4).'>COMPARISON</td>';
	echo '</tr><tr>';
	echo '<td class="menuGap"></td>';
	echo '</tr><tr>';
	echo '<td class="menuBtn" id="menuBtn5"'.Highlight($button,5).'>SUMMARY</td>';
	echo '</tr><tr>';
	echo '<td class="menuGap"></td>';
	echo '</tr><tr>';
	echo '<td class="menuBtn" id="menuBtn6"'.Highlight($button,6).'>LINKS</td>';
	echo '</tr>';
	echo '</table>';



function Highlight($button, $thisButton)
{
	if ($button==$thisButton)
		return 'style="color: red;"';
}

?>