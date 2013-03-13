<?php

/**
 * Global Discount (lite) extension for Opencart.
 *
 * @author Anthony Lawrence <freelancer@anthonylawrence.me.uk>
 * @copyright © Anthony Lawrence 2011
 * @license Creative Common's ShareAlike License - http://creativecommons.org/licenses/by-sa/3.0/
 */

class ControllerTotalGlobalDiscount extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('total/global_discount');

		$this->document->title = $this->language->get('heading_title');

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('global_discount', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/total&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');

		$this->data['entry_total'] = $this->language->get('entry_total');
		$this->data['entry_amount'] = $this->language->get('entry_amount');
		$this->data['entry_type'] = $this->language->get('entry_type');
		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

   		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=extension/total&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_total'),
      		'separator' => ' :: '
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=total/global_discount&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = HTTPS_SERVER . 'index.php?route=total/global_discount&token=' . $this->session->data['token'];

		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/total&token=' . $this->session->data['token'];

		if (isset($this->request->post['global_discount_total'])) {
			$this->data['global_discount_total'] = $this->request->post['global_discount_total'];
		} else {
			$this->data['global_discount_total'] = $this->config->get('global_discount_total');
		}

		if (isset($this->request->post['global_discount_amount'])) {
			$this->data['global_discount_amount'] = $this->request->post['global_discount_amount'];
		} else {
			$this->data['global_discount_amount'] = $this->config->get('global_discount_amount');
		}

		if (isset($this->request->post['global_discount_type'])) {
			$this->data['global_discount_type'] = $this->request->post['global_discount_type'];
		} else {
			$this->data['global_discount_type'] = $this->config->get('global_discount_type');
		}

		if (isset($this->request->post['global_discount_date_start'])) {
			$this->data['global_discount_date_start'] = $this->request->post['global_discount_date_start'];
		} else {
			$this->data['global_discount_date_start'] = $this->config->get('global_discount_date_start');
		}

		if (isset($this->request->post['global_discount_date_end'])) {
			$this->data['global_discount_date_end'] = $this->request->post['global_discount_date_end'];
		} else {
			$this->data['global_discount_date_end'] = $this->config->get('global_discount_date_end');
		}

		if (isset($this->request->post['global_discount_status'])) {
			$this->data['global_discount_status'] = $this->request->post['global_discount_status'];
		} else {
			$this->data['global_discount_status'] = $this->config->get('global_discount_status');
		}

		if (isset($this->request->post['global_discount_sort_order'])) {
			$this->data['global_discount_sort_order'] = $this->request->post['global_discount_sort_order'];
		} else {
			$this->data['global_discount_sort_order'] = $this->config->get('global_discount_sort_order');
		}

		$this->load->model('localisation/tax_class');

		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		$this->template = 'total/global_discount.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'total/global_discount')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>