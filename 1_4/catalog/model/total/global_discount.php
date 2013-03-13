<?php

/**
 * Global Discount (lite) extension for Opencart.
 *
 * @author Anthony Lawrence <freelancer@anthonylawrence.me.uk>
 * @copyright © Anthony Lawrence 2011
 * @license Creative Common's ShareAlike License - http://creativecommons.org/licenses/by-sa/3.0/
 */


class ModelTotalGlobalDiscount extends Model {
	public function getTotal(&$total_data, &$total, &$taxes) {
		if ($this->config->get('global_discount_status') && $this->cart->getSubTotal() && ($this->cart->getSubTotal() >= $this->config->get('global_discount_total'))) {
                        // Check the dates!
                        if(date("Y-m-d") < $this->config->get("global_discount_date_start") || date("Y-m-d") >= $this->config->get("global_discount_date_end")){
                            return;
                        }

                        $this->load->language('total/global_discount');

			$this->load->model('localisation/currency');

                        // Calculate how much we have to take away from products (incl taxes).
                        /*foreach ($this->cart->getProducts() as $product) {
                            // If this product is taxable, remove that amount of tax!
                            if ($product['tax_class_id']) {
                                    $taxes[$product['tax_class_id']] -= ($product['total'] / 100 * $this->tax->getRate($product['tax_class_id'])) - (($product['total'] - $discount) / 100 * $this->tax->getRate($product['tax_class_id']));
                            }
                        }*/

                        // Calculate how much we have to take away from the total.
                        $remove = "0.00";
                        $subTotal = $total;
                        if($this->config->get("global_discount_type") == "P"){
                            $perc = $this->config->get("global_discount_amount")/100;
                            $remove = $subTotal-($subTotal*(-$perc));
                        } else {
                            $remove = $this->config->get("global_discount_amount");

                        }

			$total_data[] = array(
                            'title'      => $this->language->get('text_global_discount'),
                            'text'       => $this->currency->format(-$remove),
                            'value'      => -$remove,
                            'sort_order' => $this->config->get('global_discount_sort_order')
			);

                        $total -= $remove;
		}
	}
}
?>