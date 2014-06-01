<?php

class bdPaygateZarinPal_XenForo_Model_Option extends XFCP_bdPaygateZarinPal_XenForo_Model_Option
{
	private static $_bdPaygateZarinPal_hijackOptions = false;

	public function getOptionsByIds(array $optionIds, array $fetchOptions = array())
	{
		if (self::$_bdPaygateZarinPal_hijackOptions === true)
		{
			$optionIds[] = 'bdPaygateZarinPal_api';
		}

		$options = parent::getOptionsByIds($optionIds, $fetchOptions);

		self::$_bdPaygateZarinPal_hijackOptions = false;

		return $options;
	}

	public function bdPaygateZarinPal_hijackOptions()
	{
		self::$_bdPaygateZarinPal_hijackOptions = true;
	}

}
