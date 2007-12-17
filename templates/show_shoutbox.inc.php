<?php
/*

 Copyright (c) 2001 - 2007 Ampache.org
 All rights reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License v2
 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/
?>
<?php show_box_top(_('Shoutbox')); ?>
<table class="tabledata" cellpadding="0" cellspacing="0">
<?php foreach ($shouts as $shout_id) { 
	$shout = new shoutBox($shout_id); 
	$object = shoutBox::get_object($shout->object_type,$shout->object_id); 
	$object->format(); 
	$client = new User($shout->user); 
	$client->format(); 
?>
<tr>
	<td class="cel_image">
	<?php echo $shout->get_image(); ?><br />
	<strong><?php echo ucfirst($shout->object_type); ?>:</strong> <?php echo $object->f_link; ?><br />
	</td>
	<td valign="top" class="cel_comment">
		<?php echo scrub_out($shout->text); ?>
		<br />
		<span class="information">- <?php echo $client->f_link; ?> <?php echo date("d/m/Y H:i",$shout->date); ?></span>
	</td>
</tr>
<?php } ?>
</table>
<?php show_box_bottom(); ?>
