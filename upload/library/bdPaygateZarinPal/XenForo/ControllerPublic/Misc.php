<?php

class bdPaygateZarinPal_XenForo_ControllerPublic_Misc extends XFCP_bdPaygateZarinPal_XenForo_ControllerPublic_Misc
{
	public function actionZarinPal()
	{
		$input = $this->_input->filter(array(
			'amount' => XenForo_Input::UINT,
			'itemName' => XenForo_Input::STRING,
			'itemId' => XenForo_Input::STRING,
			'callbackUrl' => XenForo_Input::STRING,
		));

		$api = XenForo_Application::getOptions()->get('bdPaygateZarinPal_api');
		if (empty($api))
		{
			throw new XenForo_Exception('API has not been configured');
		}

		$invoiceUrl = bdPaygateZarinPal_Helper::requestPayment($api, $input['amount'], $input['itemName'], $input['itemId'], $input['callbackUrl']);

		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $invoiceUrl);

	}

}
