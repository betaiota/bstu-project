<?php
	require once('defines.php');
	
	Class instagram_basic_display_api {
		private $_appid = INSTAGRAM_APP_ID;
		private $_appSecret = INSTAGRAM_APP_SECRET;
		private $_redirectUrl = INSTAGRAM_APP_REDIRECT_URI;
		private $_getCode = '';
		private $_apiBaseUrl = 'https://api.instagram.com/';
		
		public $authorizationUrl = '';
		
		function __construct($params) {
			$this->_getCode = $param['get_code'];
			
			//getting an access token here
			
			$this->_setAuthorizationUrl();
			
		}
		
		private function _setAuthorizationUrl() {
			$getVars = array(
				'app_id' => $this->$_app_id,
				'redirect_uri' => $this->$_redirectUrl,
				'scope' => 'user_profile,user_media',
				'response_type' => 'code');
			
			// create url
			$this->authorizationUrl = $this->_apiBaseUrl . 'oauth/authorize?' . http_build_query( $getVars );
			
		}
	}