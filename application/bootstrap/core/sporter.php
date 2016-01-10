<?php
basename($_SERVER["PHP_SELF"]) == "sporter.php" ? die("No direct script access allowed") : '';

class Sporter
{

	public function __construct()
	{}

	public function config_item( $args = '' )
	{

		// Add slashes to escape any chars
		// that may affect script behavior
		$args = addslashes( $args );

		$search = [ '{',
					'[',
					'(',
					"\\",
					';',
					'&',
					')',
					']',
					'}',
					NULL,
					TRUE,
					FALSE
		];

		$replace = ['',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					''
		];

		// Removes all special chars that
		// may affect script behavior
		$output = str_replace( $search, $replace, $args );

		if ( !empty( $output ) )
		{
			// if not empty, call private func config_prop
			$return = $this->config_prop($output);
		}
		else
		{
			// if empty, return array with Error key
			$return = ['error' => 'no key specified'];
		}


		return $return;
	}


	private function config_prop($property = '')
	{

		// New instance of Config to access it's properties
		$config = new Config;

		/**
		 * Check whether the provided key is an array
		 * if it is an array, check if provided key
		 * name is 'error'
		 */
		if ( is_array( $property ) )
		{
			if ( array_key_exists( 'error', $property ) )
			{
				$continue = FALSE;
			}
			else
			{
				$continue = TRUE;
			}
		}
		else
		{
			$continue = TRUE;
		}


		if ( $continue )
		{

			// Check whether the provided key exists in config array
			if ( array_key_exists($property, $config->start) )
			{
				$value = $config->start[$property];
			}
			else
			{
				$value = ['error' => 'key not found'];
			}

		}

		return $value;

	}


	public function view()
	{}

}
