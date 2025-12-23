# OpenAPIClient-php

  ## API Versioning
We're constantly updating and improving the API, and while we try to ensure backwards compatibility, there's always a chance that we'll introduce a change that affects the way your app works.

To get around any problems that this might cause, we recommend that you include the Accept header with every API request that you make. This header enables you to target your request to a particular version of the API. It looks like this in HTTP:

```text
Accept: application/vnd.saitowag.api+json;version={version_number}
```

Normally, you set the value of the placeholder to the current version of the API. But if you're troubleshooting your app, and you know that an older version of the API works perfectly, say version 1.0, you'd substitute 1.0 for the placeholder value. The API then handles the request as if it were for version 1.0, and your app goes back to working properly.

### Example of an error with invalid `ACCEPT` header.
The `HTTP status code` in case of an invalid `ACCEPT` header will be `400 Bad Request` and the following response will be returned.
```json
  {
    \"data\": [
      {
        \"error_code\": \"ERR_ACCEPT_HEADER_NOT_VALID\",
        \"error_message\": \"Accept header is not valid or not set.\"
      }
    ]
  }
```

### Unexpected Error
If an unexpected error occours, a so called Error General will be returned.
The `HTTP status code` in case of an invalid `ACCEPT` header will be `500` and the following response will be returned.
```json
{
  \"data\": [
    {
      \"error_code\": \"ERR_GENERAL\",
      \"error_message\": \"An unexpected error has occurred. If this problem persists, please contact our support.\"
    }
  ]
}
```

### Invalid Endpoint Error
Any call to a non-existing API endpoint (i.e. wrong route) will return a response with `HTTP status code` `404`
and the following response body:
```json
{
  \"data\": [
    {
      \"error_code\": \"ERR_GENERAL_INVALID_ENDPOINT\",
      \"error_message\": \"The requested endpoint does not exist.\"
    }
  ]
}
```

Please, note that this error is returned also when a request parameter, part of a valid route, is not well formed.
For example, a call to a route that contains a wrong order id (i.e. it does not meet the accepted order id pattern -
e.g. 123456789PAC instead of PAC123456789) will return the error just mentioned, as the route is considered as badly
formed.

In conclusion, please pay special attention to all those routes that have request parameters with specific pattern
requirements.

### Shipping Method IDs
These ids may not be available in all the countries.

| ID | Name |
| --- | --- |
| 1 | Standard `Standard` |
| 2 | Self-collection `Selbstabholung`  |
| 3 | Express morning (truck) `Express-Morgen (LKW)` |
| 4 | Express Today (Truck)  `Express-Heute (LKW)` |
| 5 | Express morning (package forwarding) `Express-Morgen (Packet Spedition)` |
| 7 | Express-now |

### Payment Method IDs
These ids may not be available in all the countries.

| ID | Name |
| --- | --- |
| 1 | SEPA Direct Debit `SEPA-Lastschrift` |
| 2 | Prepayment `Vorkasse` |
| 3 | Cash on delivery `Nachnahme` |
| 4 | PayPal/Credit Card `PayPal/Kreditkarte` |
| 5 | open payment method `offene Zahlungsart` |
| 7 | Invoice(8 days payment term) `Rechnung(8 Tage Zahlungsziel)` |
| 8 | open payment method (SEPA) `offene Zahlungsart (SEPA)` |

## Query String Filters





<details>
<summary><strong id=\"query-string-filters\">Query String Filters</strong></summary>

| Operator | Full Name | Description | Example |
| ------ | ------ | ------ | ------ |
| eq | Equal | Used to narrow down the result of a query to some specific value, for specified field. It adds the \"**=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=eq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} = 11` | integer: `{url}?filter[id]=eq;21`<br>float: `{url}?filter[average]=eq;3.7`<br>string: `{url}?filter[free_text]=eq;apple`<br>Date: `{url}?filter[birthday]=eq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=eq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=eq;1`<br> |
| neq | Not equal | Used to exclude the value from a query result. It adds the \"**<>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=neq;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <> 11` | integer: `{url}?filter[id]=neq;21`<br>float: `{url}?filter[average]=neq;3.7`<br>string: `{url}?filter[free_text]=neq;apple`<br>Date: `{url}?filter[birthday]=neq;2020-06-03`<br>DateTime: `{url}?filter[created_at]=neq;2020-06-03 14:32:32`<br>boolean: `{url}?filter[is_active]=neq;1`<br> |
| gt | Greater than | Used to reduce fetched values to those greater than the one provided in a query string. It adds the \"**>**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} > 11` | integer: `{url}?filter[id]=gt;21`<br>float: `{url}?filter[average]=gt;3.7`<br>Date: `{url}?filter[birthday]=gt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gt;2020-06-03 14:32:32`<br> |
| gte | Greater than or equal | Used to reduce fetched values to those greater than or equal to the one provided in a query string. It adds the \"**>=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=gte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} >= 11` | integer: `{url}?filter[id]=gte;21`<br>float: `{url}?filter[average]=gte;3.7`<br>Date: `{url}?filter[birthday]=gte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=gte;2020-06-03 14:32:32`<br> |
| lt | Less than | Used to reduce fetched values to those less than provided in a query string. It adds the \"**<**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lt;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} < 11` | integer: `{url}?filter[id]=lt;21`<br>float: `{url}?filter[average]=lt;3.7`<br>Date: `{url}?filter[birthday]=lt;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lt;2020-06-03 14:32:32`<br> |
| lte | Less than or equal | Used to reduce fetched values to those less than or equal to the one provided in a query string. It adds the \"**<=**\" symbol to the SQL query. Eg. `{url}?filter[{alias_name}]=lte;11` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} <= 11` | integer: `{url}?filter[id]=lte;21`<br>float: `{url}?filter[average]=lte;3.7`<br>Date: `{url}?filter[birthday]=lte;2020-06-03`<br>DateTime: `{url}?filter[created_at]=lte;2020-06-03 14:32:32`<br> |
| in | In | Used to narrow down the query result to multiple, specific entries. It adds the **IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=in;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=in;21,55,76`<br>float: `{url}?filter[average]=in;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=in;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=in;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=in;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> |
| nin | Not in | Used to exclude multiple values from query result. It adds the **NOT IN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nin;1,2,3,4` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT IN (1, 2, 3, 4)` | integer: `{url}?filter[id]=nin;21,55,76`<br>float: `{url}?filter[average]=nin;3.7,6.5,9.9`<br>string: `{url}?filter[free_text]=nin;apple,pear,watermelon`<br>Date: `{url}?filter[birthday]=nin;2020-06-03,2021-10-13,2021-10-14`<br>DateTime: `{url}?filter[created_at]=nin;2020-06-03 14:32:32,2020-09-12 17:35:32,2021-06-04 15:36:32`<br> |
| wc | Like | Used to find specified pattern. It adds the **LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=wc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=wc;j**n** doe`<br> |
| nwc | Not like | Used to find everything but the specified pattern. It adds the **NOT LIKE** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nwc;j**n** doe` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} NOT LIKE 'j%n% doe'` | string: `{url}?filter[free_text]=nwc;j**n** doe`<br> |
| btw | Between | Used to find results containing values between two, specified values. It adds the **BETWEEN** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=btw;10,20` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} BETWEEN 10 AND 20` | integer: `{url}?filter[id]=btw;21,55`<br>float: `{url}?filter[average]=btw;3.7,6.5`<br>Date: `{url}?filter[birthday]=btw;2020-06-03,2021-10-13`<br>DateTime: `{url}?filter[created_at]=btw;2020-06-03 14:32:32,2020-09-12 17:35:32`<br> |
| rxp | Regular expression | Used to find results matching the regular expression. It adds the **REGEXP** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=rxp;j(oh\\|a)ne` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} REGEXP 'j(oh\\|a)ne?'` | string: `{url}?filter[free_text]=rxp;j(oh\\|a)ne?`<br> |
| null | Is null | Used to find results that values of specified column are set to null. It adds the **IS NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=null;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NULL` | integer: `{url}?filter[id]=null;`<br>float: `{url}?filter[average]=null;`<br>string: `{url}?filter[free_text]=null;`<br>Date: `{url}?filter[birthday]=null;`<br>DateTime: `{url}?filter[created_at]=null;`<br>boolean: `{url}?filter[is_active]=null;`<br> |
| nnull | Is not null | Used to find results that values of specified column are not set to null. It adds the **IS NOT NULL** keyword to the SQL query. Eg. `{url}?filter[{alias_name}]=nnull;` will result in the following sql: `SELECT {field_name} AS {alias_name} FROM {table_name} WHERE {alias_name} IS NOT NULL` | integer: `{url}?filter[id]=nnull;`<br>float: `{url}?filter[average]=nnull;`<br>string: `{url}?filter[free_text]=nnull;`<br>Date: `{url}?filter[birthday]=nnull;`<br>DateTime: `{url}?filter[created_at]=nnull;`<br>boolean: `{url}?filter[is_active]=nnull;`<br> |
</details>





### Additional information
If you want to filter by multiple columns, you can do that, so `{url}?filter[id]=gt;3&filter[email]=like;**@gmail.com&filter[is_active]=eq;1` is a valid query string.

<strong>However you are not allowed to use one operator multiple times, for the same column.</strong> So `{url}?filter[id]=gte;3&filter[id]=lte;5` is not going to work and might result in unexpected behavior. You can achieve similar result using `{url}?filter[id]=btw;3,5`.

# Changelog

## Moved endpoints
| date | previous endpoint | new endpoint |
| :--  | :---------------- | :----------- |
| 03.09.2025 | DELETE /seller/article | PATCH /seller/articles |
| 03.09.2025 | PATCH /seller/article | PATCH /seller/articles |
## Removed endpoints

| date | endpoint |
| :--  | :------- |
## Added endpoints

| date | endpoint |
| :--  | :------- |
## Changes in request body
### 03.09.2025
#### PATCH /seller/articles
```json
{
    \"requiredAdded\": [
        \"data\"
    ],
    \"requiredRemoved\": [
        \"stock\",
        \"article_type\"
    ],
    \"propertiesAdded\": [
        \"data\"
    ],
    \"propertiesRemoved\": [
        \"stock\",
        \"article_type\",
        \"article_id\",
        \"customer_article_id\",
        \"manufacturer_number\",
        \"manufacturer_name\",
        \"brand_id\",
        \"ean\",
        \"oen\"
    ]
}
```

## Changes in responses
### 03.09.2025
#### PATCH /seller/articles
 - Added responses: 202, 409, 422
 - Removed responses: 204, 403

Changes for status code `400`:

The reference of the model changed from `B2bFormError` to `FormResponseEmptyBody`:
```json
[]
```



For more information, please visit [https://www.alzura.com](https://www.alzura.com).

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/nogrod/tyre24-seller-php-sdk.git"
    }
  ],
  "require": {
    "nogrod/tyre24-seller-php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: X-AUTH-TOKEN
$config = Tyre24\Seller\Configuration::getDefaultConfiguration()->setApiKey('X-AUTH-TOKEN', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tyre24\Seller\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-AUTH-TOKEN', 'Bearer');


$apiInstance = new Tyre24\Seller\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$articles_request = new \Tyre24\Seller\Model\ArticlesRequest(); // \Tyre24\Seller\Model\ArticlesRequest

try {
    $result = $apiInstance->sellerArticles($articles_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->sellerArticles: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api-b2b.alzura.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ArticlesApi* | [**sellerArticles**](docs/Api/ArticlesApi.md#sellerarticles) | **PATCH** /seller/articles | Update stocks and prices
*OrdersApi* | [**changeInvoiceInformationByOrderNumberForSeller**](docs/Api/OrdersApi.md#changeinvoiceinformationbyordernumberforseller) | **PATCH** /seller/order/{order}/invoiceinformation | Change order invoice information
*OrdersApi* | [**changeOrderPositionStatusForSeller**](docs/Api/OrdersApi.md#changeorderpositionstatusforseller) | **PATCH** /seller/order/{order}/position/{position}/status | Set order position status.
*OrdersApi* | [**linkTwoExistingOrdersForSeller**](docs/Api/OrdersApi.md#linktwoexistingordersforseller) | **PATCH** /seller/order/{order}/relation | Link two existing orders.
*OrdersApi* | [**setOrderStatusByOrderNumberForSeller**](docs/Api/OrdersApi.md#setorderstatusbyordernumberforseller) | **PATCH** /seller/order/{order}/status | Set order status.
*OrdersApi* | [**setTrackingCompanyAndParcelNumberForSeller**](docs/Api/OrdersApi.md#settrackingcompanyandparcelnumberforseller) | **PATCH** /seller/order/{order}/tracking | Set tracking company and parcel number(s).
*OrdersApi* | [**updatePaymentStatusByOrderNumberForSeller**](docs/Api/OrdersApi.md#updatepaymentstatusbyordernumberforseller) | **PATCH** /seller/order/{order}/paymentstatus | Update the payment status of a given order.
*OrdersApi* | [**uploadDeliveryNotePdfByOrderNumberForSeller**](docs/Api/OrdersApi.md#uploaddeliverynotepdfbyordernumberforseller) | **PATCH** /seller/order/{order}/deliverynote | Upload a delivery note for an order
*OrdersApi* | [**uploadInvoicePdfByOrderNumberForSeller**](docs/Api/OrdersApi.md#uploadinvoicepdfbyordernumberforseller) | **PATCH** /seller/order/{order}/invoicepdf | Upload an invoice pdf with optional XML e-invoice-attachment for an order
*OrdersApi* | [**uploadRefundPdfByOrderNumberForSeller**](docs/Api/OrdersApi.md#uploadrefundpdfbyordernumberforseller) | **PATCH** /seller/order/{order}/refundpdf | Upload a refund pdf for an order

## Models

- [AccessControlErrorResponse](docs/Model/AccessControlErrorResponse.md)
- [ArticlesRequest](docs/Model/ArticlesRequest.md)
- [ArticlesRequestData](docs/Model/ArticlesRequestData.md)
- [B2bFormError](docs/Model/B2bFormError.md)
- [EANArticleRequest](docs/Model/EANArticleRequest.md)
- [IterableFormErrorResponse](docs/Model/IterableFormErrorResponse.md)
- [ModelPaymentStatusUpdate](docs/Model/ModelPaymentStatusUpdate.md)
- [ModelStatusUpdate](docs/Model/ModelStatusUpdate.md)
- [OENArticleRequest](docs/Model/OENArticleRequest.md)
- [PriceDataRequest](docs/Model/PriceDataRequest.md)
- [RequestInvoiceinformation](docs/Model/RequestInvoiceinformation.md)
- [RequestOrderRelation](docs/Model/RequestOrderRelation.md)
- [RequestPdf](docs/Model/RequestPdf.md)
- [RequestTrackingInformation](docs/Model/RequestTrackingInformation.md)
- [SellerArticles401Response](docs/Model/SellerArticles401Response.md)
- [SellerArticles422Response](docs/Model/SellerArticles422Response.md)
- [SellerArticles429Response](docs/Model/SellerArticles429Response.md)
- [SetOrderStatusByOrderNumberForSeller400Response](docs/Model/SetOrderStatusByOrderNumberForSeller400Response.md)
- [UPUIDArticleRequest](docs/Model/UPUIDArticleRequest.md)
- [WearpartArticleRequest](docs/Model/WearpartArticleRequest.md)

## Authorization

### API-Key

- **Type**: API key
- **API key parameter name**: X-API-KEY
- **Location**: HTTP header



### basicAuth

- **Type**: HTTP basic authentication


### basicAuthOperator

- **Type**: HTTP basic authentication


### X-AUTH-TOKEN

- **Type**: API key
- **API key parameter name**: X-AUTH-TOKEN
- **Location**: HTTP header



### X-AUTH-TOKEN-OPERATOR

- **Type**: API key
- **API key parameter name**: X-AUTH-TOKEN
- **Location**: HTTP header



### OAuthAccessToken

- **Type**: Bearer authentication (JWT)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

info@alzura.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.2`
    - Generator version: `7.18.0`
- Build package: `org.openapitools.codegen.languages.PhpNextgenClientCodegen`
