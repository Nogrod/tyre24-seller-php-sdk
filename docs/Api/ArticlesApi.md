# Tyre24\Seller\ArticlesApi

All URIs are relative to https://api-b2b.alzura.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sellerArticles()**](ArticlesApi.md#sellerArticles) | **PATCH** /seller/articles | Update stocks and prices |


## `sellerArticles()`

```php
sellerArticles($articles_request): object
```

Update stocks and prices

This endpoint may be used to update multiple articles of different article types, such as tyres or wearparts, at once. Using this endpoint the stock of an article can be updated and optionally the prices and the prices for one article, if supported. The article amount is bordered to 200 per request.  At least one of the following identifiers (or identifier group) needs to be passed for each article. The order in this table represents the internal priority of the identifiers.  | Identifier | | ------ | | alzura_item_id | | customer_article_id | | ean | | oen | | upuid | | manufacturer_name + manufacturer_number | | brand_id + manufacturer_number |

### Example

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

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **articles_request** | [**\Tyre24\Seller\Model\ArticlesRequest**](../Model/ArticlesRequest.md)|  | [optional] |

### Return type

**object**

### Authorization

[X-AUTH-TOKEN](../../README.md#X-AUTH-TOKEN)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
