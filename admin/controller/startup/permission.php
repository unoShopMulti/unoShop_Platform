<?php
/*	Initial Author		: Puranjan.
**	Date				: 24-03-2018
**	Description			: Core Framework Files. DATABASE INTERFACE.
**	Note				: Please do not edit this file unless you are absolutely sure about what you are doing.
**	scriptClass			: admin/Controller.
**	Type				: CONNECTION, SESSION & ADMIN START-UP Module.
**	scriptDescription	: This Script initialize the SECURE Admin Session and connection with the DataBase.
**	Developer			: Puranjan Gaur.
**	TEAM				: Backend Team.
*/
class ControllerStartupPermission extends Controller {
	public function index() {
		if (isset($this->request->get['route'])) {
			$route = '';

			$part = explode('/', $this->request->get['route']);

			if (isset($part[0])) {
				$route .= $part[0];
			}

			if (isset($part[1])) {
				$route .= '/' . $part[1];
			}

			$ignore = array(
				'common/dashboard',
				'common/login',
				'common/logout',
				'common/forgotten',
				'common/reset',
				'error/not_found',
				'error/permission',
				'dashboard/order',
				'dashboard/sale',
				'dashboard/customer',
				'dashboard/online',
				'dashboard/map',
				'dashboard/activity',
				'dashboard/chart',
				'dashboard/recent'
			);

			if (!in_array($route, $ignore) && !$this->user->hasPermission('access', $route)) {
				return new Action('error/permission');
			}
		}
	}
}
