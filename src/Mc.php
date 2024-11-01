<?php
/**
 * Math Captcha
 *
 * @package Haruncpi\WpCf
 * @author Harun<harun.cox@gmail.com>
 * @link https://learn24bd.com
 * @since 1.1.3
 */

namespace Haruncpi\WpCf;

class Mc {

	private static $key = 'wpcf_mc';

	private function addition( $num1, $num2 ) {
		return $num1 + $num2;
	}

	private function substruction( $num1, $num2 ) {
		return $num2 - $num1;
	}

	private function multiplication( $num1, $num2 ) {
		return $num1 * $num2;
	}

	public static function generate() {
		$self          = new self();
		$num1          = rand( 2, 5 );
		$num2          = rand( 6, 9 );
		$action_number = rand( 1, 3 );
		$arr           = array();
		$arr['num1']   = $num1;
		$arr['num2']   = $num2;

		switch ( $action_number ) {
			case 1:
				$arr['question'] = $num1 . ' + ' . $num2 . ' = ? ';
				$arr['answer']   = $self->addition( $num1, $num2 );
				break;

			case 2:
				$arr['question'] = $num2 . ' - ' . $num1 . ' = ? ';
				$arr['answer']   = $self->substruction( $num1, $num2 );
				break;

			case 3:
				$arr['question'] = $num1 . ' * ' . $num2 . ' = ? ';
				$arr['answer']   = $self->multiplication( $num1, $num2 );
				break;
		}

		set_transient( self::$key, $arr );
	}

	public static function get_question() {
		$data = get_transient( self::$key );
		return $data['question'];
	}

	public static function get_answer() {
		$data = get_transient( self::$key );
		return $data['answer'];
	}
}
