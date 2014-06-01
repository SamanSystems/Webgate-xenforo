<?php

class bdPaygateZarinPal_XenForo_ControllerAdmin_UserUpgrade extends XFCP_bdPaygateZarinPal_XenForo_ControllerAdmin_UserUpgrade
{
	public function actionIndex()
	{
		$optionModel = $this->getModelFromCache('XenForo_Model_Option');
		$optionModel->bdPaygateZarinPal_hijackOptions();

		return parent::actionIndex();
	}

}
