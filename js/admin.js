/**
 * Copyright (c) 2017
 *
 * @author Ján Stibila <nextcloud@stibila.eu>
 *
 * Based on work of Lukas Reschke <lukas@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function(){

  var $notificationTargetGroups = $('#default_groups');
  
	OC.Settings.setupGroupsSelect($notificationTargetGroups, null, {excludeAdmins : true});
	$notificationTargetGroups.change(function(ev) {
		var groups = ev.val || [];
		groups = JSON.stringify(groups);
		OCP.AppConfig.setValue('DefaultGroup', 'default_groups', groups);
	});

	$('#default_groups .icon-info').tooltip({placement: 'right'});
});
