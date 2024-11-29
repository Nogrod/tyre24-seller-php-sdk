# Tyre24\Seller\ArticlesApi

All URIs are relative to https://api-b2b.alzura.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteAvailableStockByArticleNumberForSeller()**](ArticlesApi.md#deleteAvailableStockByArticleNumberForSeller) | **DELETE** /seller/article | Remove the available stock of a given article. |
| [**updateAvailableStockByArticleNumberForSeller()**](ArticlesApi.md#updateAvailableStockByArticleNumberForSeller) | **PATCH** /seller/article | Update the available stock of a given article. |


## `deleteAvailableStockByArticleNumberForSeller()`

```php
deleteAvailableStockByArticleNumberForSeller($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen)
```

Remove the available stock of a given article.

<div class=\"deprecationNotice\">As of 1.2, please use <code>PATCH /seller/articles</code>instead</div> Remove the available stock of the specified article. Depending on the article type, the list of accepted parameters changes. Please refer to the table `Request Parameters` for more details. Please pay attention that this endpoint can be called only 50 times within 60 seconds.  __Request Parameters__: depending on the article type, it is possible to send different combinations of request parameters. It is important to note that to uniquely identify one or multiple articles, only a subset of these possible parameters is required. For example, specifying an `article_id` should be enough to uniquely identify an article and all additional parameters would therefore be redundant and would only increase the chances of sending unconsistent data (e.g. an `EAN` is included in the request, but it is never associated to the specified `article_id`). When choosing the right request parameters, it is also important to be aware of all parameter depedencies, which are documented below in the __QUERY PARAMETERS__ section (e.g. `brand_id` is valid only if sent with `manufacturer_number`).  | Article type ID | Possible parameters | | ------ | ------ | | __R, F, K, A__ | _article_id, customer_article_id, ean, manufacturer_name, manufacturer_number._ | | __W__ | _customer_article_id, brand_id, manufacturer_number._ | | __PXX (e.g. PAC or POE)__ | _article_id, customer_article_id, ean, oen, manufacturer_name, manufacturer_number._ |

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: OAuthAccessToken
$config = Tyre24\Seller\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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
$country = de; // string | country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code).
$article_type = K; // string | The article type. For a full list of available types, please refer to the endpoint `/common/article-types`.
$article_id = 123456; // int | Alzura article id.
$customer_article_id = 10KRXS-20; // string | Original customer article id.
$manufacturer_number = Alzura Manufacturer; // string | The manufacturer number (valid if used with either the manufacturer name or the the brand id).
$manufacturer_name = 1234567891200; // string | The manufacturer name (valid if used with the manufacturer number).
$brand_id = 10; // int | The brand id (valid if used with the manufacturer number).
$ean = 0101093311309; // string | The article EAN.
$oen = 4902429499439; // string | The article OEN.

try {
    $apiInstance->deleteAvailableStockByArticleNumberForSeller($country, $article_type, $article_id, $customer_article_id, $manufacturer_number, $manufacturer_name, $brand_id, $ean, $oen);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->deleteAvailableStockByArticleNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). | |
| **article_type** | **string**| The article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. | |
| **article_id** | **int**| Alzura article id. | [optional] |
| **customer_article_id** | **string**| Original customer article id. | [optional] |
| **manufacturer_number** | **string**| The manufacturer number (valid if used with either the manufacturer name or the the brand id). | [optional] |
| **manufacturer_name** | **string**| The manufacturer name (valid if used with the manufacturer number). | [optional] |
| **brand_id** | **int**| The brand id (valid if used with the manufacturer number). | [optional] |
| **ean** | **string**| The article EAN. | [optional] |
| **oen** | **string**| The article OEN. | [optional] |

### Return type

void (empty response body)

### Authorization

[OAuthAccessToken](../../README.md#OAuthAccessToken), [X-AUTH-TOKEN](../../README.md#X-AUTH-TOKEN)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAvailableStockByArticleNumberForSeller()`

```php
updateAvailableStockByArticleNumberForSeller($country, $request_stock_update)
```

Update the available stock of a given article.

<div class=\"deprecationNotice\">As of 1.2, please use <code>PATCH /seller/articles</code>instead</div> Update the available stock of the specified article. Depending on the article type, the list of accepted parameters changes. Please refer to the table `Request Parameters` for more details. Please pay attention that this endpoint can be called only 50 times within 60 seconds.  __Request Parameters__: possible parameters sets by article type:  | Article type ID | Required parameters | | ------ | ------ | | __R, F, K, A__ | _article_id, customer_article_id, ean, manufacturer_name, manufacturer_number._ | | __W__ | _customer_article_id, brand_id, manufacturer_number._ | | __PXX (e.g. PAC or POE)__ | _article_id, customer_article_id, ean, oen, manufacturer_name, manufacturer_numbe._ |

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: OAuthAccessToken
$config = Tyre24\Seller\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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
$country = de; // string | country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code).
$request_stock_update = new \Tyre24\Seller\Model\RequestStockUpdate(); // \Tyre24\Seller\Model\RequestStockUpdate

try {
    $apiInstance->updateAvailableStockByArticleNumberForSeller($country, $request_stock_update);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->updateAvailableStockByArticleNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). | |
| **request_stock_update** | [**\Tyre24\Seller\Model\RequestStockUpdate**](../Model/RequestStockUpdate.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[OAuthAccessToken](../../README.md#OAuthAccessToken), [X-AUTH-TOKEN](../../README.md#X-AUTH-TOKEN)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
