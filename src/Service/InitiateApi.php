<?php
/**
 * InitiateApi
 * PHP version 5
 *
 * @category Class
 * @package  Maviance\S3PApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Smobilpay S3P API
 *
 * Smobilpay Third Party API FOR PAYMENT COLLECTIONS
 *
 * OpenAPI spec version: 3.0.4
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.24
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Maviance\S3PApiClient\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Maviance\S3PApiClient\ApiException;
use Maviance\S3PApiClient\Configuration;
use Maviance\S3PApiClient\HeaderSelector;
use Maviance\S3PApiClient\ObjectSerializer;

/**
 * InitiateApi Class Doc Comment
 *
 * @category Class
 * @package  Maviance\S3PApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InitiateApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation billGet
     *
     * Get bill payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique  merchant code (required)
     * @param  int $serviceid Unique  service Identifier (required)
     * @param  string $serviceNumber Service number with merchant (e.g. meter number in bills from a utility provider) for which to perform the bill payment (required)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Maviance\S3PApiClient\Model\Bill[]
     */
    public function billGet($xApiVersion, $merchant, $serviceid, $serviceNumber)
    {
        list($response) = $this->billGetWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber);
        return $response;
    }

    /**
     * Operation billGetWithHttpInfo
     *
     * Get bill payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique  merchant code (required)
     * @param  int $serviceid Unique  service Identifier (required)
     * @param  string $serviceNumber Service number with merchant (e.g. meter number in bills from a utility provider) for which to perform the bill payment (required)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Maviance\S3PApiClient\Model\Bill[], HTTP status code, HTTP response headers (array of strings)
     */
    public function billGetWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Bill[]';
        $request = $this->billGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Bill[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation billGetAsync
     *
     * Get bill payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique  merchant code (required)
     * @param  int $serviceid Unique  service Identifier (required)
     * @param  string $serviceNumber Service number with merchant (e.g. meter number in bills from a utility provider) for which to perform the bill payment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function billGetAsync($xApiVersion, $merchant, $serviceid, $serviceNumber)
    {
        return $this->billGetAsyncWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation billGetAsyncWithHttpInfo
     *
     * Get bill payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique  merchant code (required)
     * @param  int $serviceid Unique  service Identifier (required)
     * @param  string $serviceNumber Service number with merchant (e.g. meter number in bills from a utility provider) for which to perform the bill payment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function billGetAsyncWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Bill[]';
        $request = $this->billGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'billGet'
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique  merchant code (required)
     * @param  int $serviceid Unique  service Identifier (required)
     * @param  string $serviceNumber Service number with merchant (e.g. meter number in bills from a utility provider) for which to perform the bill payment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function billGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber)
    {
        // verify the required parameter 'xApiVersion' is set
        if ($xApiVersion === null || (is_array($xApiVersion) && count($xApiVersion) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xApiVersion when calling billGet'
            );
        }
        // verify the required parameter 'merchant' is set
        if ($merchant === null || (is_array($merchant) && count($merchant) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant when calling billGet'
            );
        }
        // verify the required parameter 'serviceid' is set
        if ($serviceid === null || (is_array($serviceid) && count($serviceid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $serviceid when calling billGet'
            );
        }
        // verify the required parameter 'serviceNumber' is set
        if ($serviceNumber === null || (is_array($serviceNumber) && count($serviceNumber) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $serviceNumber when calling billGet'
            );
        }

        $resourcePath = '/bill';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($merchant !== null) {
            $queryParams['merchant'] = ObjectSerializer::toQueryValue($merchant, null);
        }
        // query params
        if ($serviceid !== null) {
            $queryParams['serviceid'] = ObjectSerializer::toQueryValue($serviceid, null);
        }
        // query params
        if ($serviceNumber !== null) {
            $queryParams['serviceNumber'] = ObjectSerializer::toQueryValue($serviceNumber, null);
        }
        // header params
        if ($xApiVersion !== null) {
            $headerParams['x-api-version'] = ObjectSerializer::toHeaderValue($xApiVersion);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation quotestdPost
     *
     * Request quote with price details about the payment
     *
     * @param  string $xApiVersion api version info (required)
     * @param  \Maviance\S3PApiClient\Model\QuoteRequest $body Quote Request (optional)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Maviance\S3PApiClient\Model\Quote
     */
    public function quotestdPost($xApiVersion, $body = null)
    {
        list($response) = $this->quotestdPostWithHttpInfo($xApiVersion, $body);
        return $response;
    }

    /**
     * Operation quotestdPostWithHttpInfo
     *
     * Request quote with price details about the payment
     *
     * @param  string $xApiVersion api version info (required)
     * @param  \Maviance\S3PApiClient\Model\QuoteRequest $body Quote Request (optional)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Maviance\S3PApiClient\Model\Quote, HTTP status code, HTTP response headers (array of strings)
     */
    public function quotestdPostWithHttpInfo($xApiVersion, $body = null)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Quote';
        $request = $this->quotestdPostRequest($xApiVersion, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Quote',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation quotestdPostAsync
     *
     * Request quote with price details about the payment
     *
     * @param  string $xApiVersion api version info (required)
     * @param  \Maviance\S3PApiClient\Model\QuoteRequest $body Quote Request (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function quotestdPostAsync($xApiVersion, $body = null)
    {
        return $this->quotestdPostAsyncWithHttpInfo($xApiVersion, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation quotestdPostAsyncWithHttpInfo
     *
     * Request quote with price details about the payment
     *
     * @param  string $xApiVersion api version info (required)
     * @param  \Maviance\S3PApiClient\Model\QuoteRequest $body Quote Request (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function quotestdPostAsyncWithHttpInfo($xApiVersion, $body = null)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Quote';
        $request = $this->quotestdPostRequest($xApiVersion, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'quotestdPost'
     *
     * @param  string $xApiVersion api version info (required)
     * @param  \Maviance\S3PApiClient\Model\QuoteRequest $body Quote Request (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function quotestdPostRequest($xApiVersion, $body = null)
    {
        // verify the required parameter 'xApiVersion' is set
        if ($xApiVersion === null || (is_array($xApiVersion) && count($xApiVersion) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xApiVersion when calling quotestdPost'
            );
        }

        $resourcePath = '/quotestd';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($xApiVersion !== null) {
            $headerParams['x-api-version'] = ObjectSerializer::toHeaderValue($xApiVersion);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation subscriptionGet
     *
     * Get subscription payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique merchant code (required)
     * @param  string $serviceid Unique service Identifier (required)
     * @param  string $serviceNumber service number with merchant (e.g. policy number with an insurance company or tax number for a governmental institution) (optional)
     * @param  string $customerNumber customer number with merchant (e.g. customer number with an insurance company or account number for a governmental institution) (optional)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Maviance\S3PApiClient\Model\Subscription[]
     */
    public function subscriptionGet($xApiVersion, $merchant, $serviceid, $serviceNumber = null, $customerNumber = null)
    {
        list($response) = $this->subscriptionGetWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber, $customerNumber);
        return $response;
    }

    /**
     * Operation subscriptionGetWithHttpInfo
     *
     * Get subscription payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique merchant code (required)
     * @param  string $serviceid Unique service Identifier (required)
     * @param  string $serviceNumber service number with merchant (e.g. policy number with an insurance company or tax number for a governmental institution) (optional)
     * @param  string $customerNumber customer number with merchant (e.g. customer number with an insurance company or account number for a governmental institution) (optional)
     *
     * @throws \Maviance\S3PApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Maviance\S3PApiClient\Model\Subscription[], HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionGetWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber = null, $customerNumber = null)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Subscription[]';
        $request = $this->subscriptionGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber, $customerNumber);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Subscription[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Maviance\S3PApiClient\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation subscriptionGetAsync
     *
     * Get subscription payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique merchant code (required)
     * @param  string $serviceid Unique service Identifier (required)
     * @param  string $serviceNumber service number with merchant (e.g. policy number with an insurance company or tax number for a governmental institution) (optional)
     * @param  string $customerNumber customer number with merchant (e.g. customer number with an insurance company or account number for a governmental institution) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionGetAsync($xApiVersion, $merchant, $serviceid, $serviceNumber = null, $customerNumber = null)
    {
        return $this->subscriptionGetAsyncWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber, $customerNumber)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionGetAsyncWithHttpInfo
     *
     * Get subscription payment handler
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique merchant code (required)
     * @param  string $serviceid Unique service Identifier (required)
     * @param  string $serviceNumber service number with merchant (e.g. policy number with an insurance company or tax number for a governmental institution) (optional)
     * @param  string $customerNumber customer number with merchant (e.g. customer number with an insurance company or account number for a governmental institution) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionGetAsyncWithHttpInfo($xApiVersion, $merchant, $serviceid, $serviceNumber = null, $customerNumber = null)
    {
        $returnType = '\Maviance\S3PApiClient\Model\Subscription[]';
        $request = $this->subscriptionGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber, $customerNumber);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'subscriptionGet'
     *
     * @param  string $xApiVersion api version info (required)
     * @param  string $merchant Unique merchant code (required)
     * @param  string $serviceid Unique service Identifier (required)
     * @param  string $serviceNumber service number with merchant (e.g. policy number with an insurance company or tax number for a governmental institution) (optional)
     * @param  string $customerNumber customer number with merchant (e.g. customer number with an insurance company or account number for a governmental institution) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function subscriptionGetRequest($xApiVersion, $merchant, $serviceid, $serviceNumber = null, $customerNumber = null)
    {
        // verify the required parameter 'xApiVersion' is set
        if ($xApiVersion === null || (is_array($xApiVersion) && count($xApiVersion) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xApiVersion when calling subscriptionGet'
            );
        }
        // verify the required parameter 'merchant' is set
        if ($merchant === null || (is_array($merchant) && count($merchant) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant when calling subscriptionGet'
            );
        }
        // verify the required parameter 'serviceid' is set
        if ($serviceid === null || (is_array($serviceid) && count($serviceid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $serviceid when calling subscriptionGet'
            );
        }

        $resourcePath = '/subscription';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($merchant !== null) {
            $queryParams['merchant'] = ObjectSerializer::toQueryValue($merchant, null);
        }
        // query params
        if ($serviceid !== null) {
            $queryParams['serviceid'] = ObjectSerializer::toQueryValue($serviceid, null);
        }
        // query params
        if ($serviceNumber !== null) {
            $queryParams['serviceNumber'] = ObjectSerializer::toQueryValue($serviceNumber, null);
        }
        // query params
        if ($customerNumber !== null) {
            $queryParams['customerNumber'] = ObjectSerializer::toQueryValue($customerNumber, null);
        }
        // header params
        if ($xApiVersion !== null) {
            $headerParams['x-api-version'] = ObjectSerializer::toHeaderValue($xApiVersion);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
