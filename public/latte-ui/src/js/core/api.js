/*
 * Copyright (c) 2018-2019 - Bas Milius <bas@mili.us>
 *
 * This file is part of the Latte UI package.
 *
 * For the full copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

/**
 * Generates a random unique ID using the browsers crypto capabilities.
 *
 * @returns {String}
 * @author Bas Milius <bas@mili.us>
 * @since 1.0.0
 */
export function id()
{
	const array = new Uint32Array(3);

	window.crypto.getRandomValues(array);

	return "latte-" + array.join("-");
}

/**
 * Requests an API endpoint.
 *
 * @param {String} url
 * @param {RequestInit} options
 *
 * @returns {Promise<Response>}
 * @author Bas Milius <bas@mili.us>
 * @since 1.0.0
 */
export function request(url, options = {})
{
	return fetch(url, Object.assign({}, {credentials: "same-origin"}, options));
}

/**
 * Requests a JSON endpoint.
 *
 * @param {String} url
 * @param {RequestInit} options
 *
 * @returns {Promise<Object>}
 * @author Bas Milius <bas@mili.us>
 * @since 1.0.0
 */
export function requestJson(url, options = {})
{
	return request(url, options)
		.then(r => r.json());
}

export default {
	id,
	request,
	requestJson
}
