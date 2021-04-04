<?php

namespace Airondev\pCloud;

class Auth {

	public static function getAuth($credentialPath) {
		if (!file_exists($credentialPath)) {
			throw new Exception("Couldn't find credential file");			
		}

		//  airon using config file located in app/config here
		$conFile = config_path('airondev-pcloud.cred');

		if (!file_exists($conFile)) {
			throw new Exception("Couldn't find config file");			
		}

		$file = file_get_contents($conFile);
		$credential = json_decode($file, true);

		if (!isset($credential["access_token"]) || empty($credential["access_token"])) {
			throw new Exception("Couldn't find \"access_token\"");			
		}

		return $credential;
	}
}