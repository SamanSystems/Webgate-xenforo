<?php

class bdPaygateZarinPal_bdPaygate_Model_Processor extends XFCP_bdPaygateZarinPal_bdPaygate_Model_Processor
{
	public function getCurrencies()
	{
		$currencies = parent::getCurrencies();

		$currencies[bdPaygateZarinPal_Processor::CURRENCY_TOMAN] = 'Toman';

		return $currencies;
	}

	public function getProcessorNames()
	{
		$names = parent::getProcessorNames();

		$names['zarinPal'] = 'bdPaygateZarinPal_Processor';

		return $names;
	}

}
