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

namespace OCA\DefaultGroup;

use OCP\IUser;
use OCP\IUserManager;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\Util;
use OCP\IConfig;

class HookManager {
    /** @var IConfig */
    private $config;

    /** @var IGroupManager */
    private $groupManager;
  
	/** @var IUserManager */
	private $userManager;

  	/**
	 * Hook manager constructor.
	 */
	public function __construct(IUserManager $userManager, IGroupManager $groupManager,IConfig $config) {
        $this->groupManager = $groupManager;
		$this->userManager = $userManager;
        $this->config = $config;
	}

    /**
     * Connect hooks
     */
	public function setup() {
        Util::connectHook('OC_User',
			'post_createUser',
			$this,
			'postCreateUser');

        Util::connectHook('OC_User',
            'post_login',
            $this,
            'postLoginUser');
    }


    /**
     * We need to add user to default groups on every successful login, because hooks
     * doesn't work when creating users (first login) with user_external app.
     *
     * @param array $params
     */
	public function postLoginUser($params) {
        $groupNames = json_decode( $this->config->getAppValue("DefaultGroup", "default_groups") );

		$user = $this->userManager->get($params['uid']);
        foreach($groupNames as $groupName)
        {
          $groups = $this->groupManager->search($groupName, $limit = null, $offset = null);
          foreach($groups as $group)
          {
            if($group->getGID() === $groupName)
            {
              $group->addUser($user);
            }
          }
        }
    }
  
    /**
     * @param array $params
     */
	public function postCreateUser($params) {
        $groupNames = json_decode( $this->config->getAppValue("DefaultGroup", "default_groups") );
      
		$user = $this->userManager->get($params['uid']);
      
        foreach($groupNames as $groupName)
        {
          $groups = $this->groupManager->search($groupName, $limit = null, $offset = null);
          foreach($groups as $group)
          {
            if($group->getGID() === $groupName)
            {
              $group->addUser($user);
            }
          }
        }
    }
}
