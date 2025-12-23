<?php

/**
 * FormDataProcessor
 * PHP version 8.1
 *
 * @category Class
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

namespace Tyre24\Seller;

use ArrayAccess;
use DateTime;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use SplFileObject;
use Tyre24\Seller\Model\ModelInterface;

class FormDataProcessor
{
    /**
     * Tags whether payload passed to ::prepare() contains one or more
     * SplFileObject or stream values.
     */
    public bool $has_file = false;

    /**
     * Take value and turn it into an array suitable for inclusion in
     * the http body (form parameter). If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param array<string|bool|array|DateTime|ArrayAccess|SplFileObject> $values the value of the form parameter
     *
     * @return array [key => value] of formdata
     */
    public function prepare(array $values): array
    {
        $this->has_file = false;
        $result = [];

        foreach ($values as $k => $v) {
            if ($v === null) {
                continue;
            }

            $result[$k] = $this->makeFormSafe($v);
        }

        return $result;
    }

    /**
     * Flattens a multi-level array of data and generates a single-level array
     * compatible with formdata - a single-level array where the keys use bracket
     * notation to signify nested data.
     *
     * credit: https://github.com/FranBar1966/FlatPHP
     */
    public static function flatten(array $source, string $start = ''): array
    {
        $opt = [
            'prefix'          => '[',
            'suffix'          => ']',
            'suffix-end'      => true,
            'prefix-list'     => '[',
            'suffix-list'     => ']',
            'suffix-list-end' => true,
        ];

        if ($start === '') {
            $currentPrefix = '';
            $currentSuffix = '';
            $currentSuffixEnd = false;
        } elseif (array_is_list($source)) {
            $currentPrefix = $opt['prefix-list'];
            $currentSuffix = $opt['suffix-list'];
            $currentSuffixEnd = $opt['suffix-list-end'];
        } else {
            $currentPrefix = $opt['prefix'];
            $currentSuffix = $opt['suffix'];
            $currentSuffixEnd = $opt['suffix-end'];
        }

        $currentName = $start;
        $result = [];

        foreach ($source as $key => $val) {
            $currentName .= $currentPrefix . $key;

            if (is_array($val) && !empty($val)) {
                $currentName .= $currentSuffix;
                $result += self::flatten($val, $currentName);
            } else {
                if ($currentSuffixEnd) {
                    $currentName .= $currentSuffix;
                }

                if (is_resource($val)) {
                    $result[$currentName] = $val;
                } else {
                    $result[$currentName] = ObjectSerializer::toString($val);
                }
            }

            $currentName = $start;
        }

        return $result;
    }

    /**
     * formdata must be limited to scalars or arrays of scalar values,
     * or a resource for a file upload. Here we iterate through all available
     * data and identify how to handle each scenario
     *
     * @param string|bool|array|DateTime|ArrayAccess|SplFileObject $value
     */
    protected function makeFormSafe(mixed $value)
    {
        if ($value instanceof SplFileObject) {
            return $this->processFiles([$value])[0];
        }

        if (is_resource($value)) {
            $this->has_file = true;

            return $value;
        }

        if ($value instanceof ModelInterface) {
            return $this->processModel($value);
        }

        if (is_array($value) || is_object($value)) {
            $data = [];

            foreach ($value as $k => $v) {
                $data[$k] = $this->makeFormSafe($v);
            }

            return $data;
        }

        return ObjectSerializer::toString($value);
    }

    /**
     * We are able to handle nested ModelInterface. We do not simply call
     * json_decode(json_encode()) because any given model may have binary data
     * or other data that cannot be serialized to a JSON string
     */
    protected function processModel(ModelInterface $model): array
    {
        $result = [];

        foreach ($model::openAPITypes() as $name => $type) {
            $value = $model->offsetGet($name);

            if ($value === null) {
                continue;
            }

            if (str_contains($type, '\SplFileObject')) {
                $file = is_array($value) ? $value : [$value];
                $result[$name] = $this->processFiles($file);

                continue;
            }

            if ($value instanceof ModelInterface) {
                $result[$name] = $this->processModel($value);

                continue;
            }

            if (is_array($value) || is_object($value)) {
                $result[$name] = $this->makeFormSafe($value);

                continue;
            }

            $result[$name] = ObjectSerializer::toString($value);
        }

        return $result;
    }

    /**
     * Handle file data
     */
    protected function processFiles(array $files): array
    {
        $this->has_file = true;

        $result = [];

        foreach ($files as $i => $file) {
            if (is_array($file)) {
                $result[$i] = $this->processFiles($file);

                continue;
            }

            if ($file instanceof StreamInterface) {
                $result[$i] = $file;

                continue;
            }

            if ($file instanceof SplFileObject) {
                $result[$i] = $this->tryFopen($file);
            }
        }

        return $result;
    }

    private function tryFopen(SplFileObject $file)
    {
        return Utils::tryFopen($file->getRealPath(), 'rb');
    }
}
