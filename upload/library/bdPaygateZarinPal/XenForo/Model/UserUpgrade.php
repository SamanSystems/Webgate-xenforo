<?php

class bdPaygateZarinPal_XenForo_Model_UserUpgrade extends XFCP_bdPaygateZarinPal_XenForo_Model_UserUpgrade
{
	public function prepareUserUpgrade(array $upgrade)
	{
		if ($upgrade['cost_currency'] == bdPaygateZarinPal_Processor::CURRENCY_TOMAN)
		{
			$upgrade['bdPaygateZarinPal_costCurrency'] = $upgrade['cost_currency'];
			$upgrade['cost_currency'] = 'Toman';
		}

		$upgrade = parent::prepareUserUpgrade($upgrade);

		if (!empty($upgrade['bdPaygateZarinPal_costCurrency']))
		{
			$upgrade['cost_currency'] = $upgrade['bdPaygateZarinPal_costCurrency'];
			unset($upgrade['bdPaygateZarinPal_costCurrency']);
		}

		return $upgrade;
	}

}
