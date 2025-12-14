<?php

require_once CLASS_REALDIR . 'SC_Display.php';

class SC_Display_Ex extends SC_Display
{
	public static function detectDevice($reset = FALSE)
{
if (is_null(SC_Display_Ex::$device) || $reset) {
$nu = new Net_UserAgent_Mobile();
$su = new SC_SmartphoneUserAgent_Ex();
if ($nu->isMobile()) {
SC_Display_Ex::$device = DEVICE_TYPE_MOBILE;
// } elseif ($su->isSmartphone()) {
// SC_Display_Ex::$device = DEVICE_TYPE_SMARTPHONE;
} else {
SC_Display_Ex::$device = DEVICE_TYPE_PC;
}
}

return SC_Display_Ex::$device;
}

}
