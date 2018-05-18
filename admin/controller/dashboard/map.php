<?php
/*	Author		: Puranjan.
**	Date		: 12-05-2018
**	Description	: Core Framework Files.
**	Note		: Please do not edit this file unless you are absolutely sure about what you are doing.
**	scriptClass	: Controller.
**	Type		: Backend Dashboard Status Processing.
*/
class ControllerDashboardMap extends Controller {
	public function index() {
		$this->load->language('dashboard/map');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_order'] = $this->language->get('text_order');
		$data['text_sale'] = $this->language->get('text_sale');

		$data['token'] = $this->session->data['token'];
		
		return $this->load->view('dashboard/map', $data);
	}

	public function map() {
		$json = array();

		$this->load->model('report/sale');

		$results = $this->model_report_sale->getTotalOrdersByCountry();

		foreach ($results as $result) {
			$json[strtolower($result['iso_code_2'])] = array(
				'total'  => $result['total'],
				'amount' => $this->currency->format($result['amount'], $this->config->get('config_currency'))
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}