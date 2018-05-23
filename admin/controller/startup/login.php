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
class ControllerStartupLogin extends Controller {
	public function index() {
		$route = isset($this->request->get['route']) ? $this->request->get['route'] : '';

		$ignore = array(
			'common/login',
			'common/forgotten',
			'common/reset'
		);

		// User
		$this->registry->set('user', new Cart\User($this->registry));

		if (!$this->user->isLogged() && !in_array($route, $ignore)) {
			return new Action('common/login');
		}

		if (isset($this->request->get['route'])) {
			$ignore = array(
				'common/login',
				'common/logout',
				'common/forgotten',
				'common/reset',
				'error/not_found',
				'error/permission'
			);

			if (!in_array($route, $ignore) && (!isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token']))) {
				return new Action('common/login');
			}
		} else {
			if (!isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
				return new Action('common/login');
			}
			
			echo 'hi';
		}
	}
}