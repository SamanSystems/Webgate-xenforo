<?php
class bdPaygateZarinPal_Helper
{
	public static function requestPayment($api, $amount, $itemName, $itemId, $callbackUrl)
	{
		$client = self::_getClient();
		$invoiceId = $client->call('requestpayment', array(
			$api,
			floatval($amount),
			$callbackUrl,
			$itemId,
			urlencode($itemName)
		));

		if ($invoiceId < 0)
		{
			throw new XenForo_Exception(sprintf('%s (%s)', self::_getErrorMessage($invoiceId), $invoiceId));
		}

		return sprintf('http://www.zarinpal.com/pay_invoice/%s', $invoiceId);
	}

	public static function verification($api, $amount, $au)
	{
		$client = self::_getClient();
		$result = $client->call('verification', array(
			$api,
			$amount,
			$au
		));

		if (strval($result) !== '1')
		{
			throw new XenForo_Exception(sprintf('%s (%s)', self::_getErrorMessage($result), $result));
		}

		return true;
	}

	/**
	 * @return zarinpal
	 */
	protected static function _getClient()
	{
		require_once (dirname(__FILE__) . '/library/zarinpal.php');

		return new zarinpal();
	}

	protected static function _getErrorMessage($errorCode)
	{
		switch ($errorCode)
		{
			case -32:
				return 'transactions is done but the amount is not correct';
			case -31:
				return 'transactions wasn\’t successful';
			case -30:
				return 'this transactions is not available';
			case -29:
				return 'callback address is empty';
			case -27:
				return 'your IP is block';
			case -26:
				return 'port is not active';
			case -24:
				return 'amount is not false';
			case -23:
				return 'amount is too much';
			case -22:
				return 'amount is too few';
			case -21:
				return 'IP is not valid for this port';
			case -20:
				return 'Api is not true';
			case -9:
				return 'system error';
			case -6:
				return 'error in connecting to bank';
		}

		return 'unknown error';
	}

}
