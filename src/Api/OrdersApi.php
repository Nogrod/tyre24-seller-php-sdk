<?php
/**
 * OrdersApi
 * PHP version 8.1
 *
 * @package  Tyre24\Seller
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * API-B2B Seller
 *
 * ## API Versioning We're constantly updating and improving the API, and while we try to ensure backwards compatibility, there's always a chance that we'll introduce a change that affects the way your app works.  To get around any problems that this might cause, we recommend that you include the Accept header with every API request that you make. This header enables you to target your request to a particular version of the API. It looks like this in HTTP:  ```text Accept: application/vnd.saitowag.api+json;version={version_number} ```  Normally, you set the value of the placeholder to the current version of the API. But if you're troubleshooting your app, and you know that an older version of the API works perfectly, say version 1.0, you'd substitute 1.0 for the placeholder value. The API then handles the request as if it were for version 1.0, and your app goes back to working properly.  ### Example of an error with invalid `ACCEPT` header. The `HTTP status code` in case of an invalid `ACCEPT` header will be `400 Bad Request` and the following response will be returned. ```json   {     \"data\": [       {         \"error_code\": \"ERR_ACCEPT_HEADER_NOT_VALID\",         \"error_message\": \"Accept header is not valid or not set.\"       }     ]   } ```  ### Unexpected Error If an unexpected error occours, a so called Error General will be returned. The `HTTP status code` in case of an invalid `ACCEPT` header will be `500` and the following response will be returned. ```json {   \"data\": [     {       \"error_code\": \"ERR_GENERAL\",       \"error_message\": \"An unexpected error has occurred. If this problem persists, please contact our support.\"     }   ] } ```  ### Invalid Endpoint Error Any call to a non-existing API endpoint (i.e. wrong route) will return a response with `HTTP status code` `404` and the following response body: ```json {   \"data\": [     {       \"error_code\": \"ERR_GENERAL_INVALID_ENDPOINT\",       \"error_message\": \"The requested endpoint does not exist.\"     }   ] } ```  Please, note that this error is returned also when a request parameter, part of a valid route, is not well formed. For example, a call to a route that contains a wrong order id (i.e. it does not meet the accepted order id pattern - e.g. 123456789PAC instead of PAC123456789) will return the error just mentioned, as the route is considered as badly formed.  In conclusion, please pay special attention to all those routes that have request parameters with specific pattern requirements.  ### Shipping Method IDs These ids may not be available in all the countries.  | ID | Name | | --- | --- | | 1 | Standard `Standard` | | 2 | Self-collection `Selbstabholung`  | | 3 | Express morning (truck) `Express-Morgen (LKW)` | | 4 | Express Today (Truck)  `Express-Heute (LKW)` | | 5 | Express morning (package forwarding) `Express-Morgen (Packet Spedition)` | | 7 | Express-now |  ### Payment Method IDs These ids may not be available in all the countries.  | ID | Name | | --- | --- | | 1 | SEPA Direct Debit `SEPA-Lastschrift` | | 2 | Prepayment `Vorkasse` | | 3 | Cash on delivery `Nachnahme` | | 4 | PayPal/Credit Card `PayPal/Kreditkarte` | | 5 | open payment method `offene Zahlungsart` | | 7 | Invoice(8 days payment term) `Rechnung(8 Tage Zahlungsziel)` | | 8 | open payment method (SEPA) `offene Zahlungsart (SEPA)` |  ## Query String Filters      <details> <summary><strong id=\"query-string-filters\">Query String Filters</strong></summary>  | Operator | Full Name | Description | Example | | ------ | ------ | ------ | ------ | | eq | Equal | Used to narrow down the result of a query to some specific value, for specified field. It adds the \"**=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=eq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} = 11` | integer: `{url}?filter[id]=eq;21`<br>float: `{url}?filter[average]=eq;3.7`<br>string: `{url}?filter[free_text]=eq;apple`<br>Date: `{url}?filter[birthday]=eq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=eq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=eq;1`<br> | | neq | Not equal | Used to exclude the value from a query result. It adds the \"**<>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=neq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <> 11` | integer: `{url}?filter[id]=neq;21`<br>float: `{url}?filter[average]=neq;3.7`<br>string: `{url}?filter[free_text]=neq;apple`<br>Date: `{url}?filter[birthday]=neq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=neq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=neq;1`<br> | | gt | Greater than | Used to reduce fetched values to those greater than the one provided in a query string. It adds the \"**>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} > 11` | integer: `{url}?filter[id]=gt;21`<br>float: `{url}?filter[average]=gt;3.7`<br>Date: `{url}?filter[birthday]=gt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gt;2020-06-03 14:32:32`<br> | | gte | Greater than or equal | Used to reduce fetched values to those greater than or equal to the one provided in a query string. It adds the \"**>=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} >= 11` | integer: `{url}?filter[id]=gte;21`<br>float: `{url}?filter[average]=gte;3.7`<br>Date: `{url}?filter[birthday]=gte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gte;2020-06-03 14:32:32`<br> | | lt | Less than | Used to reduce fetched values to those less than provided in a query string. It adds the \"**<**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} < 11` | integer: `{url}?filter[id]=lt;21`<br>float: `{url}?filter[average]=lt;3.7`<br>Date: `{url}?filter[birthday]=lt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lt;2020-06-03 14:32:32`<br> | | lte | Less than or equal | Used to reduce fetched values to those less than or equal to the one provided in a query string. It adds the \"**<=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <= 11` | integer: `{url}?filter[id]=lte;21`<br>float: `{url}?filter[average]=lte;3.7`<br>Date: `{url}?filter[birthday]=lte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lte;2020-06-03 14:32:32`<br> | | in | In | Used to narrow down the query result to multiple, specific entries. It adds the **IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=in;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=in;21,55,76`<br>float: `{url}?filter[average]=in;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=in;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=in;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=in;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> | | nin | Not in | Used to exclude multiple values from query result. It adds the **NOT IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nin;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=nin;21,55,76`<br>float: `{url}?filter[average]=nin;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=nin;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=nin;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=nin;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> | | wc | Like | Used to find specified pattern. It adds the **LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=wc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=wc;j**n** doe`<br> | | nwc | Not like | Used to find everything but the specified pattern. It adds the **NOT LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nwc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=nwc;j**n** doe`<br> | | btw | Between | Used to find results containing values between two, specified values. It adds the **BETWEEN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=btw;10,20` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} BETWEEN 10 AND 20` | integer: `{url}?filter[id]=btw;21,55`<br>float: `{url}?filter[average]=btw;3.7,6.5`<br>Date: `{url}?filter[birthday]=btw;2020-06-03,2021-10-13`<br>DateTime: `{url}?filter[created_at]=btw;2020-06-03 14:32:32,2020-09-12 17:35:32`<br> | | rxp | Regular expression | Used to find results matching the regular expression. It adds the **REGEXP** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=rxp;j(oh\\|a)ne` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} REGEXP 'j(oh\\|a)ne?'` | string: `{url}?filter[free_text]=rxp;j(oh\\|a)ne?`<br> | | null | Is null | Used to find results that values of specified column are set to null. It adds the **IS NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=null;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NULL` | integer: `{url}?filter[id]=null;`<br>float: `{url}?filter[average]=null;`<br>string: `{url}?filter[free_text]=null;`<br>Date: `{url}?filter[birthday]=null;`<br>DateTime: `{url}?filter[created_at]=null;`<br>boolean: `{url}?filter[is_active]=null;`<br> | | nnull | Is not null | Used to find results that values of specified column are not set to null. It adds the **IS NOT NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nnull;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NOT NULL` | integer: `{url}?filter[id]=nnull;`<br>float: `{url}?filter[average]=nnull;`<br>string: `{url}?filter[free_text]=nnull;`<br>Date: `{url}?filter[birthday]=nnull;`<br>DateTime: `{url}?filter[created_at]=nnull;`<br>boolean: `{url}?filter[is_active]=nnull;`<br> | </details>      ### Additional information If you want to filter by multiple columns, you can do that, so `{url}?filter[id]=gt;3&filter[email]=like;**@gmail.com&filter[is_active]=eq;1` is a valid query string.  <strong>However you are not allowed to use one operator multiple times, for the same column.</strong> So `{url}?filter[id]=gte;3&filter[id]=lte;5` is not going to work and might result in unexpected behavior. You can achieve similar result using `{url}?filter[id]=btw;3,5`.  # Changelog  ## Moved endpoints | date | previous endpoint | new endpoint | | :--  | :---------------- | :----------- | | 03.09.2025 | DELETE /seller/article | PATCH /seller/articles | | 03.09.2025 | PATCH /seller/article | PATCH /seller/articles | ## Removed endpoints  | date | endpoint | | :--  | :------- | ## Added endpoints  | date | endpoint | | :--  | :------- | ## Changes in request body ### 03.09.2025 #### PATCH /seller/articles ```json {     \"requiredAdded\": [         \"data\"     ],     \"requiredRemoved\": [         \"stock\",         \"article_type\"     ],     \"propertiesAdded\": [         \"data\"     ],     \"propertiesRemoved\": [         \"stock\",         \"article_type\",         \"article_id\",         \"customer_article_id\",         \"manufacturer_number\",         \"manufacturer_name\",         \"brand_id\",         \"ean\",         \"oen\"     ] } ```  ## Changes in responses ### 03.09.2025 #### PATCH /seller/articles  - Added responses: 202, 409, 422  - Removed responses: 204, 403  Changes for status code `400`:  The reference of the model changed from `B2bFormError` to `FormResponseEmptyBody`: ```json [] ```
 *
 * The version of the OpenAPI document: 1.2
 * Contact: info@alzura.com
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.18.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Tyre24\Seller\Api;

use InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tyre24\Seller\ApiException;
use Tyre24\Seller\Configuration;
use Tyre24\Seller\HeaderSelector;
use Tyre24\Seller\FormDataProcessor;
use Tyre24\Seller\ObjectSerializer;

/**
 * OrdersApi Class Doc Comment
 *
 * @package  Tyre24\Seller
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OrdersApi
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * @var HeaderSelector
     */
    protected HeaderSelector $headerSelector;

    /**
     * @var int Host index
     */
    protected int $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'changeInvoiceInformationByOrderNumberForSeller' => [
            'application/json',
        ],
        'changeOrderPositionStatusForSeller' => [
            'application/json',
        ],
        'linkTwoExistingOrdersForSeller' => [
            'application/json',
        ],
        'setOrderStatusByOrderNumberForSeller' => [
            'application/json',
        ],
        'setTrackingCompanyAndParcelNumberForSeller' => [
            'application/json',
        ],
        'updatePaymentStatusByOrderNumberForSeller' => [
            'application/json',
        ],
        'uploadDeliveryNotePdfByOrderNumberForSeller' => [
            'application/json',
        ],
        'uploadInvoicePdfByOrderNumberForSeller' => [
            'application/json',
        ],
        'uploadRefundPdfByOrderNumberForSeller' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null   $config
     * @param HeaderSelector|null  $selector
     * @param int                  $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex(int $hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation changeInvoiceInformationByOrderNumberForSeller
     *
     * Change order invoice information
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestInvoiceinformation|null $request_invoiceinformation request_invoiceinformation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function changeInvoiceInformationByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestInvoiceinformation $request_invoiceinformation = null,
        string $contentType = self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->changeInvoiceInformationByOrderNumberForSellerWithHttpInfo($country, $order, $request_invoiceinformation, $contentType);
        return $response;
    }

    /**
     * Operation changeInvoiceInformationByOrderNumberForSellerWithHttpInfo
     *
     * Change order invoice information
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestInvoiceinformation|null $request_invoiceinformation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function changeInvoiceInformationByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestInvoiceinformation $request_invoiceinformation = null,
        string $contentType = self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->changeInvoiceInformationByOrderNumberForSellerRequest($country, $order, $request_invoiceinformation, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation changeInvoiceInformationByOrderNumberForSellerAsync
     *
     * Change order invoice information
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestInvoiceinformation|null $request_invoiceinformation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function changeInvoiceInformationByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestInvoiceinformation $request_invoiceinformation = null,
        string $contentType = self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->changeInvoiceInformationByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $request_invoiceinformation, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation changeInvoiceInformationByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Change order invoice information
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestInvoiceinformation|null $request_invoiceinformation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function changeInvoiceInformationByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestInvoiceinformation $request_invoiceinformation = null,
        string $contentType = self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->changeInvoiceInformationByOrderNumberForSellerRequest($country, $order, $request_invoiceinformation, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'changeInvoiceInformationByOrderNumberForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestInvoiceinformation|null $request_invoiceinformation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function changeInvoiceInformationByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestInvoiceinformation $request_invoiceinformation = null,
        string $contentType = self::contentTypes['changeInvoiceInformationByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling changeInvoiceInformationByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling changeInvoiceInformationByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/invoiceinformation';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_invoiceinformation)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_invoiceinformation));
            } else {
                $httpBody = $request_invoiceinformation;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation changeOrderPositionStatusForSeller
     *
     * Set order position status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  string $position position (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeOrderPositionStatusForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|null
     */
    public function changeOrderPositionStatusForSeller(
        string $country,
        string $order,
        string $position,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['changeOrderPositionStatusForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response
    {
        list($response) = $this->changeOrderPositionStatusForSellerWithHttpInfo($country, $order, $position, $model_status_update, $contentType);
        return $response;
    }

    /**
     * Operation changeOrderPositionStatusForSellerWithHttpInfo
     *
     * Set order position status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  string $position (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeOrderPositionStatusForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function changeOrderPositionStatusForSellerWithHttpInfo(
        string $country,
        string $order,
        string $position,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['changeOrderPositionStatusForSeller'][0]
    ): array
    {
        $request = $this->changeOrderPositionStatusForSellerRequest($country, $order, $position, $model_status_update, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation changeOrderPositionStatusForSellerAsync
     *
     * Set order position status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  string $position (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeOrderPositionStatusForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function changeOrderPositionStatusForSellerAsync(
        string $country,
        string $order,
        string $position,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['changeOrderPositionStatusForSeller'][0]
    ): PromiseInterface
    {
        return $this->changeOrderPositionStatusForSellerAsyncWithHttpInfo($country, $order, $position, $model_status_update, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation changeOrderPositionStatusForSellerAsyncWithHttpInfo
     *
     * Set order position status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  string $position (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeOrderPositionStatusForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function changeOrderPositionStatusForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        string $position,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['changeOrderPositionStatusForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->changeOrderPositionStatusForSellerRequest($country, $order, $position, $model_status_update, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'changeOrderPositionStatusForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  string $position (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['changeOrderPositionStatusForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function changeOrderPositionStatusForSellerRequest(
        string $country,
        string $order,
        string $position,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['changeOrderPositionStatusForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling changeOrderPositionStatusForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling changeOrderPositionStatusForSeller'
            );
        }

        // verify the required parameter 'position' is set
        if ($position === null || (is_array($position) && count($position) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $position when calling changeOrderPositionStatusForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/position/{position}/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }
        // path params
        if ($position !== null) {
            $resourcePath = str_replace(
                '{' . 'position' . '}',
                ObjectSerializer::toPathValue($position),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($model_status_update)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($model_status_update));
            } else {
                $httpBody = $model_status_update;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation linkTwoExistingOrdersForSeller
     *
     * Link two existing orders.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestOrderRelation|null $request_order_relation request_order_relation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkTwoExistingOrdersForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function linkTwoExistingOrdersForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestOrderRelation $request_order_relation = null,
        string $contentType = self::contentTypes['linkTwoExistingOrdersForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->linkTwoExistingOrdersForSellerWithHttpInfo($country, $order, $request_order_relation, $contentType);
        return $response;
    }

    /**
     * Operation linkTwoExistingOrdersForSellerWithHttpInfo
     *
     * Link two existing orders.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestOrderRelation|null $request_order_relation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkTwoExistingOrdersForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function linkTwoExistingOrdersForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestOrderRelation $request_order_relation = null,
        string $contentType = self::contentTypes['linkTwoExistingOrdersForSeller'][0]
    ): array
    {
        $request = $this->linkTwoExistingOrdersForSellerRequest($country, $order, $request_order_relation, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation linkTwoExistingOrdersForSellerAsync
     *
     * Link two existing orders.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestOrderRelation|null $request_order_relation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkTwoExistingOrdersForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function linkTwoExistingOrdersForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestOrderRelation $request_order_relation = null,
        string $contentType = self::contentTypes['linkTwoExistingOrdersForSeller'][0]
    ): PromiseInterface
    {
        return $this->linkTwoExistingOrdersForSellerAsyncWithHttpInfo($country, $order, $request_order_relation, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation linkTwoExistingOrdersForSellerAsyncWithHttpInfo
     *
     * Link two existing orders.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestOrderRelation|null $request_order_relation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkTwoExistingOrdersForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function linkTwoExistingOrdersForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestOrderRelation $request_order_relation = null,
        string $contentType = self::contentTypes['linkTwoExistingOrdersForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->linkTwoExistingOrdersForSellerRequest($country, $order, $request_order_relation, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'linkTwoExistingOrdersForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestOrderRelation|null $request_order_relation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkTwoExistingOrdersForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function linkTwoExistingOrdersForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestOrderRelation $request_order_relation = null,
        string $contentType = self::contentTypes['linkTwoExistingOrdersForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling linkTwoExistingOrdersForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling linkTwoExistingOrdersForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/relation';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_order_relation)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_order_relation));
            } else {
                $httpBody = $request_order_relation;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation setOrderStatusByOrderNumberForSeller
     *
     * Set order status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setOrderStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function setOrderStatusByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['setOrderStatusByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->setOrderStatusByOrderNumberForSellerWithHttpInfo($country, $order, $model_status_update, $contentType);
        return $response;
    }

    /**
     * Operation setOrderStatusByOrderNumberForSellerWithHttpInfo
     *
     * Set order status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setOrderStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function setOrderStatusByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['setOrderStatusByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->setOrderStatusByOrderNumberForSellerRequest($country, $order, $model_status_update, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation setOrderStatusByOrderNumberForSellerAsync
     *
     * Set order status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setOrderStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function setOrderStatusByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['setOrderStatusByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->setOrderStatusByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $model_status_update, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation setOrderStatusByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Set order status.
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setOrderStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function setOrderStatusByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['setOrderStatusByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->setOrderStatusByOrderNumberForSellerRequest($country, $order, $model_status_update, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'setOrderStatusByOrderNumberForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelStatusUpdate|null $model_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setOrderStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function setOrderStatusByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelStatusUpdate $model_status_update = null,
        string $contentType = self::contentTypes['setOrderStatusByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling setOrderStatusByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling setOrderStatusByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($model_status_update)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($model_status_update));
            } else {
                $httpBody = $model_status_update;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation setTrackingCompanyAndParcelNumberForSeller
     *
     * Set tracking company and parcel number(s).
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestTrackingInformation|null $request_tracking_information request_tracking_information (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function setTrackingCompanyAndParcelNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestTrackingInformation $request_tracking_information = null,
        string $contentType = self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->setTrackingCompanyAndParcelNumberForSellerWithHttpInfo($country, $order, $request_tracking_information, $contentType);
        return $response;
    }

    /**
     * Operation setTrackingCompanyAndParcelNumberForSellerWithHttpInfo
     *
     * Set tracking company and parcel number(s).
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestTrackingInformation|null $request_tracking_information (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function setTrackingCompanyAndParcelNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestTrackingInformation $request_tracking_information = null,
        string $contentType = self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'][0]
    ): array
    {
        $request = $this->setTrackingCompanyAndParcelNumberForSellerRequest($country, $order, $request_tracking_information, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation setTrackingCompanyAndParcelNumberForSellerAsync
     *
     * Set tracking company and parcel number(s).
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestTrackingInformation|null $request_tracking_information (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function setTrackingCompanyAndParcelNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestTrackingInformation $request_tracking_information = null,
        string $contentType = self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->setTrackingCompanyAndParcelNumberForSellerAsyncWithHttpInfo($country, $order, $request_tracking_information, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation setTrackingCompanyAndParcelNumberForSellerAsyncWithHttpInfo
     *
     * Set tracking company and parcel number(s).
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestTrackingInformation|null $request_tracking_information (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function setTrackingCompanyAndParcelNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestTrackingInformation $request_tracking_information = null,
        string $contentType = self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->setTrackingCompanyAndParcelNumberForSellerRequest($country, $order, $request_tracking_information, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'setTrackingCompanyAndParcelNumberForSeller'
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestTrackingInformation|null $request_tracking_information (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function setTrackingCompanyAndParcelNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestTrackingInformation $request_tracking_information = null,
        string $contentType = self::contentTypes['setTrackingCompanyAndParcelNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling setTrackingCompanyAndParcelNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling setTrackingCompanyAndParcelNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/tracking';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_tracking_information)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_tracking_information));
            } else {
                $httpBody = $request_tracking_information;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updatePaymentStatusByOrderNumberForSeller
     *
     * Update the payment status of a given order.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\ModelPaymentStatusUpdate|null $model_payment_status_update model_payment_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function updatePaymentStatusByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelPaymentStatusUpdate $model_payment_status_update = null,
        string $contentType = self::contentTypes['updatePaymentStatusByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->updatePaymentStatusByOrderNumberForSellerWithHttpInfo($country, $order, $model_payment_status_update, $contentType);
        return $response;
    }

    /**
     * Operation updatePaymentStatusByOrderNumberForSellerWithHttpInfo
     *
     * Update the payment status of a given order.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelPaymentStatusUpdate|null $model_payment_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePaymentStatusByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelPaymentStatusUpdate $model_payment_status_update = null,
        string $contentType = self::contentTypes['updatePaymentStatusByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->updatePaymentStatusByOrderNumberForSellerRequest($country, $order, $model_payment_status_update, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation updatePaymentStatusByOrderNumberForSellerAsync
     *
     * Update the payment status of a given order.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelPaymentStatusUpdate|null $model_payment_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function updatePaymentStatusByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelPaymentStatusUpdate $model_payment_status_update = null,
        string $contentType = self::contentTypes['updatePaymentStatusByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->updatePaymentStatusByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $model_payment_status_update, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updatePaymentStatusByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Update the payment status of a given order.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelPaymentStatusUpdate|null $model_payment_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function updatePaymentStatusByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelPaymentStatusUpdate $model_payment_status_update = null,
        string $contentType = self::contentTypes['updatePaymentStatusByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->updatePaymentStatusByOrderNumberForSellerRequest($country, $order, $model_payment_status_update, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updatePaymentStatusByOrderNumberForSeller'
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\ModelPaymentStatusUpdate|null $model_payment_status_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentStatusByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updatePaymentStatusByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\ModelPaymentStatusUpdate $model_payment_status_update = null,
        string $contentType = self::contentTypes['updatePaymentStatusByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling updatePaymentStatusByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling updatePaymentStatusByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/paymentstatus';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($model_payment_status_update)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($model_payment_status_update));
            } else {
                $httpBody = $model_payment_status_update;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadDeliveryNotePdfByOrderNumberForSeller
     *
     * Upload a delivery note for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function uploadDeliveryNotePdfByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->uploadDeliveryNotePdfByOrderNumberForSellerWithHttpInfo($country, $order, $request_pdf, $contentType);
        return $response;
    }

    /**
     * Operation uploadDeliveryNotePdfByOrderNumberForSellerWithHttpInfo
     *
     * Upload a delivery note for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadDeliveryNotePdfByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->uploadDeliveryNotePdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation uploadDeliveryNotePdfByOrderNumberForSellerAsync
     *
     * Upload a delivery note for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadDeliveryNotePdfByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->uploadDeliveryNotePdfByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $request_pdf, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadDeliveryNotePdfByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Upload a delivery note for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadDeliveryNotePdfByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->uploadDeliveryNotePdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadDeliveryNotePdfByOrderNumberForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function uploadDeliveryNotePdfByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadDeliveryNotePdfByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling uploadDeliveryNotePdfByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling uploadDeliveryNotePdfByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/deliverynote';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_pdf)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_pdf));
            } else {
                $httpBody = $request_pdf;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadInvoicePdfByOrderNumberForSeller
     *
     * Upload an invoice pdf with optional XML e-invoice-attachment for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function uploadInvoicePdfByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->uploadInvoicePdfByOrderNumberForSellerWithHttpInfo($country, $order, $request_pdf, $contentType);
        return $response;
    }

    /**
     * Operation uploadInvoicePdfByOrderNumberForSellerWithHttpInfo
     *
     * Upload an invoice pdf with optional XML e-invoice-attachment for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadInvoicePdfByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->uploadInvoicePdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation uploadInvoicePdfByOrderNumberForSellerAsync
     *
     * Upload an invoice pdf with optional XML e-invoice-attachment for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadInvoicePdfByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->uploadInvoicePdfByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $request_pdf, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadInvoicePdfByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Upload an invoice pdf with optional XML e-invoice-attachment for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadInvoicePdfByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->uploadInvoicePdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadInvoicePdfByOrderNumberForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function uploadInvoicePdfByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadInvoicePdfByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling uploadInvoicePdfByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling uploadInvoicePdfByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/invoicepdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_pdf)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_pdf));
            } else {
                $httpBody = $request_pdf;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadRefundPdfByOrderNumberForSeller
     *
     * Upload a refund pdf for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadRefundPdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response|null
     */
    public function uploadRefundPdfByOrderNumberForSeller(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadRefundPdfByOrderNumberForSeller'][0]
    ): ?\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response|\Tyre24\Seller\Model\SellerArticles401Response
    {
        list($response) = $this->uploadRefundPdfByOrderNumberForSellerWithHttpInfo($country, $order, $request_pdf, $contentType);
        return $response;
    }

    /**
     * Operation uploadRefundPdfByOrderNumberForSellerWithHttpInfo
     *
     * Upload a refund pdf for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadRefundPdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadRefundPdfByOrderNumberForSellerWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadRefundPdfByOrderNumberForSeller'][0]
    ): array
    {
        $request = $this->uploadRefundPdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SetOrderStatusByOrderNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\SellerArticles401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        
            throw $e;
        }
    }

    /**
     * Operation uploadRefundPdfByOrderNumberForSellerAsync
     *
     * Upload a refund pdf for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadRefundPdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadRefundPdfByOrderNumberForSellerAsync(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadRefundPdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->uploadRefundPdfByOrderNumberForSellerAsyncWithHttpInfo($country, $order, $request_pdf, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadRefundPdfByOrderNumberForSellerAsyncWithHttpInfo
     *
     * Upload a refund pdf for an order
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadRefundPdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadRefundPdfByOrderNumberForSellerAsyncWithHttpInfo(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadRefundPdfByOrderNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->uploadRefundPdfByOrderNumberForSellerRequest($country, $order, $request_pdf, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadRefundPdfByOrderNumberForSeller'
     *
     * @param  string $country Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. (required)
     * @param  string $order (required)
     * @param  \Tyre24\Seller\Model\RequestPdf|null $request_pdf (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadRefundPdfByOrderNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function uploadRefundPdfByOrderNumberForSellerRequest(
        string $country,
        string $order,
        ?\Tyre24\Seller\Model\RequestPdf $request_pdf = null,
        string $contentType = self::contentTypes['uploadRefundPdfByOrderNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling uploadRefundPdfByOrderNumberForSeller'
            );
        }

        // verify the required parameter 'order' is set
        if ($order === null || (is_array($order) && count($order) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $order when calling uploadRefundPdfByOrderNumberForSeller'
            );
        }



        $resourcePath = '/seller/order/{order}/refundpdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }

        // path params
        if ($order !== null) {
            $resourcePath = str_replace(
                '{' . 'order' . '}',
                ObjectSerializer::toPathValue($order),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_pdf)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_pdf));
            } else {
                $httpBody = $request_pdf;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-AUTH-TOKEN');
        if ($apiKey !== null) {
            $headers['X-AUTH-TOKEN'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
    protected function createHttpClientOption(): array
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

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response,
    ): array {
        if (in_array($dataType, ['\SplFileObject', '\Psr\Http\Message\StreamInterface'])) {
            $content = $response->getBody(); //stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ($dataType !== 'string') {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(
                        sprintf(
                            'Error JSON decoding server response (%s)',
                            $request->getUri()
                        ),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                        $content
                    );
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode,
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
