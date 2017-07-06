<?php
/**
 * @copyright Copyright (c) 2017
 *
 * @author Ján Stibila <nextcloud@stibila.eu>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

script('defaultgroup', 'admin');         // adds a Javascript file
style('defaultgroup', 'admin');

$login_hook_checked = filter_var($_['login_hook'], FILTER_VALIDATE_BOOLEAN) ? 'checked' : '';

?>

<div id="default_group_options" class="section">
	<h2><?php p($l->t('Default Group')); ?></h2>
	<p class="settings-hint">
		<?php p($l->t('Add new users to default groups.')); ?>
	</p>
        <p class="defaultgroup_settings_section">
                <label for="defaultgroup_default_groups"><?php p($l->t('Default groups:')); ?></label>
	        <br />
                <input name="defaultgroup_default_groups"  id="defaultgroup_default_groups" value="<?php p($_['default_groups']) ?>" style="width: 400px">
        	<br />
		<em><?php p($l->t('Automatically add new users to this groups.')); ?></em>
	</p>

        <p class="defaultgroup_settings_section">
                <label for="defaultgroup_login_hook"><?php p($l->t('Login hook:')); ?></label>
	        </br />
                <input name="defaultgroup_login_hook"  id="defaultgroup_login_hook" type="checkbox" class="checkbox" <?=$login_hook_checked?>>
		<label for="defaultgroup_login_hook"><?php p($l->t('Add to default groop on successful login.')); ?></label>
		<br />
		<em><?php p($l->t('In some cases, user create event is not triggered properly, for example when new user is created by user_external app on first login. Enable this to add user to default groups on every successful login.')); ?></em>
	</p>

        <p class="defaultgroup_settings_section">
                <label for="defaultgroup_ignore_groups"><?php p($l->t('Ignore users in groups: ')); ?></label>
	        </br />
                <input name="defaultgroup_ignore_groups"  id="defaultgroup_ignore_groups" value="<?php p($_['ignore_groups']) ?>" style="width: 400px">
	        <br />
		<em><?php p($l->t('Users that are already in at least one of this groups will not be added to default groups on login.')); ?></em>
	</p>


</div>
