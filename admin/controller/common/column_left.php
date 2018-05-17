<?php
/*	Author		: Puranjan.
**	Date		: 01-05-2018
**	Description	: Core Framework Files.
**	Note		: Please do not edit this file unless you are absolutely sure about what you are doing.
**	scriptClass	: Controller.
**	Type		: Backend Processing.
*/
class ControllerCommonColumnLeft extends Controller {
	public function index() {
		if (isset($this->request->get['token']) && isset($this->session->data['token']) && ($this->request->get['token'] == $this->session->data['token'])) {
			$data['profile'] = $this->load->controller('common/profile');
			$data['menu'] = $this->load->controller('common/menu');
			$data['stats'] = $this->load->controller('common/stats');

			return $this->load->view('common/column_left', $data);
		}
	}
}