<?php

namespace WeglotWP\Services;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Custom URL services
 *
 * @since 2.3.0
 */
class Custom_Url_Service_Weglot {

	/**
	 * @since 2.3.0
	 */
	public function __construct() {
		$this->option_services      = weglot_get_service( 'Option_Service_Weglot' );
		$this->request_url_services = weglot_get_service( 'Request_Url_Service_Weglot' );
	}

	/**
	 * @since 2.3.0
	 * @param string $key_code
	 * @param boolean $add_no_redirect
	 * @return string
	 */
	public function get_link( $key_code, $add_no_redirect = true ) {

		if ( apply_filters( 'weglot_need_reset_postdata', false ) ) {
			wp_reset_postdata();
		}

		$original_language         = weglot_get_original_language();
		$current_language          = weglot_get_current_language();

		$weglot_url                = $this->request_url_services->get_weglot_url();
		$url_lang                  = $weglot_url->getForLanguage( $key_code );

		$custom_urls = $this->option_services->get_option( 'custom_urls' );

		$language_code_rewrited    = apply_filters( 'weglot_language_code_replace', array() );
		$to_translate_language_iso = ( $key = array_search( $key_code, $language_code_rewrited, true ) ) ? $key : $key_code;
		$current_language_iso      = ( $key = array_search( $current_language, $language_code_rewrited, true ) ) ? $key : $current_language;

		if ( isset( $custom_urls[ $current_language_iso ] ) ) {
			foreach ( $custom_urls[ $current_language_iso ] as $key => $value ) {
				$url_lang = str_replace( '/' . $key . '/', '/' . $value . '/', urldecode($url_lang) );
			}
		}

		if ( isset( $custom_urls[ $to_translate_language_iso ] ) ) {
			foreach ( $custom_urls[ $to_translate_language_iso ] as $key => $value ) {
				$url_lang = str_replace( '/' . $value . '/', '/' . $key . '/', $url_lang );
			}
		}

		$link_button = apply_filters( 'weglot_link_language', $url_lang, $key_code );

		if (
			weglot_has_auto_redirect() &&
			strpos( $link_button, 'no_lredirect' ) === false && // If not exist
			( is_home() || is_front_page() ) && // Only for homepage
			$key_code === $original_language && // Only for original language
			$add_no_redirect // Example : for hreflang service
		) {
			$link_button .= '?no_lredirect=true';
		} else {
			// Remove ending "?no_lredirect=true"
			$link_button = preg_replace( '#\?no_lredirect=true$#', '', $link_button );
		}

		return apply_filters( 'weglot_get_link_with_key_code', $link_button );
	}

	/**
	 * @since 2.3.0
	 * @return string
	 * @param mixed $key_code
	 */
	public function get_link_button_with_key_code( $key_code ) {
		$link_button = $this->get_link( $key_code );

		return apply_filters( 'weglot_get_link_button_with_key_code', $link_button );
	}
}
