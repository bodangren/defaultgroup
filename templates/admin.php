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
?>

<div id="survey_client" class="section">
        <h2><?php p($l->t('Default Group')); ?></h2>
        <p>
                <label for="default_groups"><?php p($l->t('Select default groups: ')); ?></label>
        </p>
        <p>
                <input name="default_groups"  id="default_groups" value="<?php p($_['default_groups']) ?>" style="width: 400px">
        </p>
</div>