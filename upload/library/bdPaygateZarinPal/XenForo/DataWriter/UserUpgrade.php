<?php

class bdPaygateZarinPal_XenForo_DataWriter_UserUpgrade extends XFCP_bdPaygateZarinPal_XenForo_DataWriter_UserUpgrade
{
	protected function _getFields()
	{
		$fields = parent::_getFields();
		
		$fields['xf_user_upgrade']['cost_currency']['allowedValues'][] = bdPaygateZarinPal_Processor::CURRENCY_TOMAN;
		
		return $fields;
	}
}
