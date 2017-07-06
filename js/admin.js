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
  var $defaultGroups = $('#defaultgroup_default_groups');
  var $ignoreGroups = $('#defaultgroup_ignore_groups');
  var $loginHook = $('#defaultgroup_login_hook');
  
  OC.Settings.setupGroupsSelect($defaultGroups, null, {excludeAdmins : true});
  $defaultGroups.change(function(ev) {
    var groups = ev.val || [];
    groups = JSON.stringify(groups);
    OCP.AppConfig.setValue('DefaultGroup', 'default_groups', groups);
  });

  $('#defaultgroup_default_groups .icon-info').tooltip({placement: 'right'});

  OC.Settings.setupGroupsSelect($ignoreGroups, null, {excludeAdmins : false});
  $ignoreGroups.change(function(ev) {
    var groups = ev.val || [];
    groups = JSON.stringify(groups);
    OCP.AppConfig.setValue('DefaultGroup', 'ignore_groups', groups);
  });

  $('#defaultgroup_ignore_groups .icon-info').tooltip({placement: 'right'});


  $loginHook.change(function(ev) {
    OCP.AppConfig.setValue('DefaultGroup', 'login_hook', this.checked);
  });

});
