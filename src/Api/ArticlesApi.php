<?php
/**
 * ArticlesApi
 * PHP version 8.1
 *
 * @package  Tyre24\Seller
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * API-B2B Seller
 *
 * ## API Versioning We're constantly updating and improving the API, and while we try to ensure backwards compatibility, there's always a chance that we'll introduce a change that affects the way your app works.  To get around any problems that this might cause, we recommend that you include the Accept header with every API request that you make. This header enables you to target your request to a particular version of the API. It looks like this in HTTP:  ```text Accept: application/vnd.saitowag.api+json;version={version_number} ```  Normally, you set the value of the placeholder to the current version of the API. But if you're troubleshooting your app, and you know that an older version of the API works perfectly, say version 1.0, you'd substitute 1.0 for the placeholder value. The API then handles the request as if it were for version 1.0, and your app goes back to working properly.  ### Example of an error with invalid `ACCEPT` header. The `HTTP status code` in case of an invalid `ACCEPT` header will be `400 Bad Request` and the following response will be returned. ```json   {     \"data\": [       {         \"error_code\": \"ERR_ACCEPT_HEADER_NOT_VALID\",         \"error_message\": \"Accept header is not valid or not set.\"       }     ]   } ```  ### Unexpected Error If an unexpected error occours, a so called Error General will be returned. The `HTTP status code` in case of an invalid `ACCEPT` header will be `500` and the following response will be returned. ```json {   \"data\": [     {       \"error_code\": \"ERR_GENERAL\",       \"error_message\": \"An unexpected error has occurred. If this problem persists, please contact our support.\"     }   ] } ```  ### Invalid Endpoint Error Any call to a non-existing API endpoint (i.e. wrong route) will return a response with `HTTP status code` `404` and the following response body: ```json {   \"data\": [     {       \"error_code\": \"ERR_GENERAL_INVALID_ENDPOINT\",       \"error_message\": \"The requested endpoint does not exist.\"     }   ] } ```  Please, note that this error is returned also when a request parameter, part of a valid route, is not well formed. For example, a call to a route that contains a wrong order id (i.e. it does not meet the accepted order id pattern - e.g. 123456789PAC instead of PAC123456789) will return the error just mentioned, as the route is considered as badly formed.  In conclusion, please pay special attention to all those routes that have request parameters with specific pattern requirements.  ### Shipping Method IDs These ids may not be available in all the countries.  | ID | Name | | --- | --- | | 1 | Standard `Standard` | | 2 | Self-collection `Selbstabholung`  | | 3 | Express morning (truck) `Express-Morgen (LKW)` | | 4 | Express Today (Truck)  `Express-Heute (LKW)` | | 5 | Express morning (package forwarding) `Express-Morgen (Packet Spedition)` | | 7 | Express-now |  ### Payment Method IDs These ids may not be available in all the countries.  | ID | Name | | --- | --- | | 1 | SEPA Direct Debit `SEPA-Lastschrift` | | 2 | Prepayment `Vorkasse` | | 3 | Cash on delivery `Nachnahme` | | 4 | PayPal/Credit Card `PayPal/Kreditkarte` | | 5 | open payment method `offene Zahlungsart` | | 7 | Invoice(8 days payment term) `Rechnung(8 Tage Zahlungsziel)` | | 8 | open payment method (SEPA) `offene Zahlungsart (SEPA)` |  ## Query String Filters      <details> <summary><strong id=\"query-string-filters\">Query String Filters</strong></summary>  | Operator | Full Name | Description | Example | | ------ | ------ | ------ | ------ | | eq | Equal | Used to narrow down the result of a query to some specific value, for specified field. It adds the \"**=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=eq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} = 11` | integer: `{url}?filter[id]=eq;21`<br>float: `{url}?filter[average]=eq;3.7`<br>string: `{url}?filter[free_text]=eq;apple`<br>Date: `{url}?filter[birthday]=eq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=eq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=eq;1`<br> | | neq | Not equal | Used to exclude the value from a query result. It adds the \"**<>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=neq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <> 11` | integer: `{url}?filter[id]=neq;21`<br>float: `{url}?filter[average]=neq;3.7`<br>string: `{url}?filter[free_text]=neq;apple`<br>Date: `{url}?filter[birthday]=neq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=neq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=neq;1`<br> | | gt | Greater than | Used to reduce fetched values to those greater than the one provided in a query string. It adds the \"**>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} > 11` | integer: `{url}?filter[id]=gt;21`<br>float: `{url}?filter[average]=gt;3.7`<br>Date: `{url}?filter[birthday]=gt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gt;2020-06-03 14:32:32`<br> | | gte | Greater than or equal | Used to reduce fetched values to those greater than or equal to the one provided in a query string. It adds the \"**>=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} >= 11` | integer: `{url}?filter[id]=gte;21`<br>float: `{url}?filter[average]=gte;3.7`<br>Date: `{url}?filter[birthday]=gte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gte;2020-06-03 14:32:32`<br> | | lt | Less than | Used to reduce fetched values to those less than provided in a query string. It adds the \"**<**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} < 11` | integer: `{url}?filter[id]=lt;21`<br>float: `{url}?filter[average]=lt;3.7`<br>Date: `{url}?filter[birthday]=lt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lt;2020-06-03 14:32:32`<br> | | lte | Less than or equal | Used to reduce fetched values to those less than or equal to the one provided in a query string. It adds the \"**<=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <= 11` | integer: `{url}?filter[id]=lte;21`<br>float: `{url}?filter[average]=lte;3.7`<br>Date: `{url}?filter[birthday]=lte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lte;2020-06-03 14:32:32`<br> | | in | In | Used to narrow down the query result to multiple, specific entries. It adds the **IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=in;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=in;21,55,76`<br>float: `{url}?filter[average]=in;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=in;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=in;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=in;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> | | nin | Not in | Used to exclude multiple values from query result. It adds the **NOT IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nin;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=nin;21,55,76`<br>float: `{url}?filter[average]=nin;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=nin;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=nin;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=nin;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> | | wc | Like | Used to find specified pattern. It adds the **LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=wc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=wc;j**n** doe`<br> | | nwc | Not like | Used to find everything but the specified pattern. It adds the **NOT LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nwc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=nwc;j**n** doe`<br> | | btw | Between | Used to find results containing values between two, specified values. It adds the **BETWEEN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=btw;10,20` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} BETWEEN 10 AND 20` | integer: `{url}?filter[id]=btw;21,55`<br>float: `{url}?filter[average]=btw;3.7,6.5`<br>Date: `{url}?filter[birthday]=btw;2020-06-03,2021-10-13`<br>DateTime: `{url}?filter[created_at]=btw;2020-06-03 14:32:32,2020-09-12 17:35:32`<br> | | rxp | Regular expression | Used to find results matching the regular expression. It adds the **REGEXP** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=rxp;j(oh\\|a)ne` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} REGEXP 'j(oh\\|a)ne?'` | string: `{url}?filter[free_text]=rxp;j(oh\\|a)ne?`<br> | | null | Is null | Used to find results that values of specified column are set to null. It adds the **IS NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=null;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NULL` | integer: `{url}?filter[id]=null;`<br>float: `{url}?filter[average]=null;`<br>string: `{url}?filter[free_text]=null;`<br>Date: `{url}?filter[birthday]=null;`<br>DateTime: `{url}?filter[created_at]=null;`<br>boolean: `{url}?filter[is_active]=null;`<br> | | nnull | Is not null | Used to find results that values of specified column are not set to null. It adds the **IS NOT NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nnull;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NOT NULL` | integer: `{url}?filter[id]=nnull;`<br>float: `{url}?filter[average]=nnull;`<br>string: `{url}?filter[free_text]=nnull;`<br>Date: `{url}?filter[birthday]=nnull;`<br>DateTime: `{url}?filter[created_at]=nnull;`<br>boolean: `{url}?filter[is_active]=nnull;`<br> | </details>      ### Additional information If you want to filter by multiple columns, you can do that, so `{url}?filter[id]=gt;3&filter[email]=like;**@gmail.com&filter[is_active]=eq;1` is a valid query string.  <strong>However you are not allowed to use one operator multiple times, for the same column.</strong> So `{url}?filter[id]=gte;3&filter[id]=lte;5` is not going to work and might result in unexpected behavior. You can achieve similar result using `{url}?filter[id]=btw;3,5`.
 *
 * The version of the OpenAPI document: 1.1
 * Contact: info@alzura.com
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.10.0
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
use Tyre24\Seller\ApiException;
use Tyre24\Seller\Configuration;
use Tyre24\Seller\HeaderSelector;
use Tyre24\Seller\ObjectSerializer;

/**
 * ArticlesApi Class Doc Comment
 *
 * @package  Tyre24\Seller
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ArticlesApi
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
        'deleteAvailableStockByArticleNumberForSeller' => [
            'application/json',
        ],
        'updateAvailableStockByArticleNumberForSeller' => [
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
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
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
     * Operation deleteAvailableStockByArticleNumberForSeller
     *
     * Remove the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $article_type The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. (required)
     * @param  int|null $article_id Alzura article id. (optional)
     * @param  string|null $customer_article_id Original customer article id. (optional)
     * @param  string|null $manufacturer_number The manufacturer number (valid if used with either the manufacturer name or the the brand id). (optional)
     * @param  string|null $manufacturer_name The manufacturer name (valid if used with the manufacturer number). (optional)
     * @param  int|null $brand_id The brand id (valid if used with the manufacturer number). (optional)
     * @param  string|null $ean The article EAN. (optional)
     * @param  string|null $oen The article OEN. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function deleteAvailableStockByArticleNumberForSeller(
        string $country,
        string $article_type,
        ?int $article_id = null,
        ?string $customer_article_id = null,
        ?string $manufacturer_number = null,
        ?string $manufacturer_name = null,
        ?int $brand_id = null,
        ?string $ean = null,
        ?string $oen = null,
        string $contentType = self::contentTypes['deleteAvailableStockByArticleNumberForSeller'][0]
    ): void
    {
        $this->deleteAvailableStockByArticleNumberForSellerWithHttpInfo($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen, $contentType);
    }

    /**
     * Operation deleteAvailableStockByArticleNumberForSellerWithHttpInfo
     *
     * Remove the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $article_type The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. (required)
     * @param  int|null $article_id Alzura article id. (optional)
     * @param  string|null $customer_article_id Original customer article id. (optional)
     * @param  string|null $manufacturer_number The manufacturer number (valid if used with either the manufacturer name or the the brand id). (optional)
     * @param  string|null $manufacturer_name The manufacturer name (valid if used with the manufacturer number). (optional)
     * @param  int|null $brand_id The brand id (valid if used with the manufacturer number). (optional)
     * @param  string|null $ean The article EAN. (optional)
     * @param  string|null $oen The article OEN. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function deleteAvailableStockByArticleNumberForSellerWithHttpInfo(
        string $country,
        string $article_type,
        ?int $article_id = null,
        ?string $customer_article_id = null,
        ?string $manufacturer_number = null,
        ?string $manufacturer_name = null,
        ?int $brand_id = null,
        ?string $ean = null,
        ?string $oen = null,
        string $contentType = self::contentTypes['deleteAvailableStockByArticleNumberForSeller'][0]
    ): array
    {
        $request = $this->deleteAvailableStockByArticleNumberForSellerRequest($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen, $contentType);

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
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAvailableStockByArticleNumberForSellerAsync
     *
     * Remove the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $article_type The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. (required)
     * @param  int|null $article_id Alzura article id. (optional)
     * @param  string|null $customer_article_id Original customer article id. (optional)
     * @param  string|null $manufacturer_number The manufacturer number (valid if used with either the manufacturer name or the the brand id). (optional)
     * @param  string|null $manufacturer_name The manufacturer name (valid if used with the manufacturer number). (optional)
     * @param  int|null $brand_id The brand id (valid if used with the manufacturer number). (optional)
     * @param  string|null $ean The article EAN. (optional)
     * @param  string|null $oen The article OEN. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated
     */
    public function deleteAvailableStockByArticleNumberForSellerAsync(
        string $country,
        string $article_type,
        ?int $article_id = null,
        ?string $customer_article_id = null,
        ?string $manufacturer_number = null,
        ?string $manufacturer_name = null,
        ?int $brand_id = null,
        ?string $ean = null,
        ?string $oen = null,
        string $contentType = self::contentTypes['deleteAvailableStockByArticleNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->deleteAvailableStockByArticleNumberForSellerAsyncWithHttpInfo($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAvailableStockByArticleNumberForSellerAsyncWithHttpInfo
     *
     * Remove the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $article_type The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. (required)
     * @param  int|null $article_id Alzura article id. (optional)
     * @param  string|null $customer_article_id Original customer article id. (optional)
     * @param  string|null $manufacturer_number The manufacturer number (valid if used with either the manufacturer name or the the brand id). (optional)
     * @param  string|null $manufacturer_name The manufacturer name (valid if used with the manufacturer number). (optional)
     * @param  int|null $brand_id The brand id (valid if used with the manufacturer number). (optional)
     * @param  string|null $ean The article EAN. (optional)
     * @param  string|null $oen The article OEN. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated
     */
    public function deleteAvailableStockByArticleNumberForSellerAsyncWithHttpInfo(
        $country,
        $article_type,
        $article_id = null,
        $customer_article_id = null,
        $manufacturer_number = null,
        $manufacturer_name = null,
        $brand_id = null,
        $ean = null,
        $oen = null,
        string $contentType = self::contentTypes['deleteAvailableStockByArticleNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->deleteAvailableStockByArticleNumberForSellerRequest($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen, $contentType);

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
     * Create request for operation 'deleteAvailableStockByArticleNumberForSeller'
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  string $article_type The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. (required)
     * @param  int|null $article_id Alzura article id. (optional)
     * @param  string|null $customer_article_id Original customer article id. (optional)
     * @param  string|null $manufacturer_number The manufacturer number (valid if used with either the manufacturer name or the the brand id). (optional)
     * @param  string|null $manufacturer_name The manufacturer name (valid if used with the manufacturer number). (optional)
     * @param  int|null $brand_id The brand id (valid if used with the manufacturer number). (optional)
     * @param  string|null $ean The article EAN. (optional)
     * @param  string|null $oen The article OEN. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function deleteAvailableStockByArticleNumberForSellerRequest(
        $country,
        $article_type,
        $article_id = null,
        $customer_article_id = null,
        $manufacturer_number = null,
        $manufacturer_name = null,
        $brand_id = null,
        $ean = null,
        $oen = null,
        string $contentType = self::contentTypes['deleteAvailableStockByArticleNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling deleteAvailableStockByArticleNumberForSeller'
            );
        }

        // verify the required parameter 'article_type' is set
        if ($article_type === null || (is_array($article_type) && count($article_type) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $article_type when calling deleteAvailableStockByArticleNumberForSeller'
            );
        }









        $resourcePath = '/seller/article';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $article_type,
            'article_type', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $article_id,
            'article_id', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $customer_article_id,
            'customer_article_id', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $manufacturer_number,
            'manufacturer_number', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $manufacturer_name,
            'manufacturer_name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $brand_id,
            'brand_id', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ean,
            'ean', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $oen,
            'oen', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateAvailableStockByArticleNumberForSeller
     *
     * Update the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  \Tyre24\Seller\Model\RequestStockUpdate|null $request_stock_update request_stock_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function updateAvailableStockByArticleNumberForSeller(
        string $country,
        ?\Tyre24\Seller\Model\RequestStockUpdate $request_stock_update = null,
        string $contentType = self::contentTypes['updateAvailableStockByArticleNumberForSeller'][0]
    ): void
    {
        $this->updateAvailableStockByArticleNumberForSellerWithHttpInfo($country, $request_stock_update, $contentType);
    }

    /**
     * Operation updateAvailableStockByArticleNumberForSellerWithHttpInfo
     *
     * Update the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  \Tyre24\Seller\Model\RequestStockUpdate|null $request_stock_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function updateAvailableStockByArticleNumberForSellerWithHttpInfo(
        string $country,
        ?\Tyre24\Seller\Model\RequestStockUpdate $request_stock_update = null,
        string $contentType = self::contentTypes['updateAvailableStockByArticleNumberForSeller'][0]
    ): array
    {
        $request = $this->updateAvailableStockByArticleNumberForSellerRequest($country, $request_stock_update, $contentType);

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
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tyre24\Seller\Model\DeleteAvailableStockByArticleNumberForSeller403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAvailableStockByArticleNumberForSellerAsync
     *
     * Update the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  \Tyre24\Seller\Model\RequestStockUpdate|null $request_stock_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated
     */
    public function updateAvailableStockByArticleNumberForSellerAsync(
        string $country,
        ?\Tyre24\Seller\Model\RequestStockUpdate $request_stock_update = null,
        string $contentType = self::contentTypes['updateAvailableStockByArticleNumberForSeller'][0]
    ): PromiseInterface
    {
        return $this->updateAvailableStockByArticleNumberForSellerAsyncWithHttpInfo($country, $request_stock_update, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAvailableStockByArticleNumberForSellerAsyncWithHttpInfo
     *
     * Update the available stock of a given article.
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  \Tyre24\Seller\Model\RequestStockUpdate|null $request_stock_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated
     */
    public function updateAvailableStockByArticleNumberForSellerAsyncWithHttpInfo(
        $country,
        $request_stock_update = null,
        string $contentType = self::contentTypes['updateAvailableStockByArticleNumberForSeller'][0]
    ): PromiseInterface
    {
        $returnType = '';
        $request = $this->updateAvailableStockByArticleNumberForSellerRequest($country, $request_stock_update, $contentType);

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
     * Create request for operation 'updateAvailableStockByArticleNumberForSeller'
     *
     * @param  string $country country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). (required)
     * @param  \Tyre24\Seller\Model\RequestStockUpdate|null $request_stock_update (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAvailableStockByArticleNumberForSeller'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function updateAvailableStockByArticleNumberForSellerRequest(
        $country,
        $request_stock_update = null,
        string $contentType = self::contentTypes['updateAvailableStockByArticleNumberForSeller'][0]
    ): Request
    {

        // verify the required parameter 'country' is set
        if ($country === null || (is_array($country) && count($country) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $country when calling updateAvailableStockByArticleNumberForSeller'
            );
        }



        $resourcePath = '/seller/article';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($country !== null) {
            $headerParams['country'] = ObjectSerializer::toHeaderValue($country);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_stock_update)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_stock_update));
            } else {
                $httpBody = $request_stock_update;
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
}
