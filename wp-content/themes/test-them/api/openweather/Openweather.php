<?php

	/**
	 * Api key
	 */
	 const KEY ='abbfbd5385a2b88e7055872b1e246b70';
	/**
	 * Get the Api data
	 */
	function true_get_subscribers() {

		// this is key for transient cache
		$transient_key = 'true_subscribers';

		// try to get value from transient cache
		$transient = get_transient( $transient_key );

		// if we have value in transient cache, we
		if( false !== $transient ) {
			// return cache data
			return $transient;

			// If cache is empty, we turn to the API
		} else {

			// contact the API
			$response = wp_remote_get(
				'http://api.openweathermap.org/data/2.5/find?q=Rostok,DEU&units=metric&cnt=7&APPID=' . KEY

			);



			// Save response Api to the transient cache.
			set_transient( $transient_key, $response, DAY_IN_SECONDS );

			// return result
			return $response;
		}

	}

	/**
	 * Get weather in Rostok city of Germany
	 */
	function openweather_today()
	{
		$response = true_get_subscribers();
		$bodyData =  $response["body"];

		$parsData = json_decode($bodyData)->{'list'};
		$data = $parsData[0];
		return '<h3>Weather API : </h3><ul><li>City -'.
		       $data->{'name'} . '</li><li>Weather -  ' .
		       $data->{'weather'}[0]->{'description'} .
		       '</li><li>Temperacha - ' .
		       (int)$data->{'main'}->{'temp'} .
		       '</li></ul>';
	}