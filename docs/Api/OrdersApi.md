# Tyre24\Seller\OrdersApi

All URIs are relative to https://api-b2b.alzura.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**changeInvoiceInformationByOrderNumberForSeller()**](OrdersApi.md#changeInvoiceInformationByOrderNumberForSeller) | **PATCH** /seller/order/{order}/invoiceinformation | Change order invoice information |
| [**changeOrderPositionStatusForSeller()**](OrdersApi.md#changeOrderPositionStatusForSeller) | **PATCH** /seller/order/{order}/position/{position}/status | Set order position status. |
| [**linkTwoExistingOrdersForSeller()**](OrdersApi.md#linkTwoExistingOrdersForSeller) | **PATCH** /seller/order/{order}/relation | Link two existing orders. |
| [**setOrderStatusByOrderNumberForSeller()**](OrdersApi.md#setOrderStatusByOrderNumberForSeller) | **PATCH** /seller/order/{order}/status | Set order status. |
| [**setTrackingCompanyAndParcelNumberForSeller()**](OrdersApi.md#setTrackingCompanyAndParcelNumberForSeller) | **PATCH** /seller/order/{order}/tracking | Set tracking company and parcel number(s). |
| [**updatePaymentStatusByOrderNumberForSeller()**](OrdersApi.md#updatePaymentStatusByOrderNumberForSeller) | **PATCH** /seller/order/{order}/paymentstatus | Update the payment status of a given order. |
| [**uploadDeliveryNotePdfByOrderNumberForSeller()**](OrdersApi.md#uploadDeliveryNotePdfByOrderNumberForSeller) | **PATCH** /seller/order/{order}/deliverynote | Upload a delivery note for an order |
| [**uploadInvoicePdfByOrderNumberForSeller()**](OrdersApi.md#uploadInvoicePdfByOrderNumberForSeller) | **PATCH** /seller/order/{order}/invoicepdf | Upload an invoice pdf for an order |
| [**uploadRefundPdfByOrderNumberForSeller()**](OrdersApi.md#uploadRefundPdfByOrderNumberForSeller) | **PATCH** /seller/order/{order}/refundpdf | Upload a refund pdf for an order |


## `changeInvoiceInformationByOrderNumberForSeller()`

```php
changeInvoiceInformationByOrderNumberForSeller($country, $order, $request_invoiceinformation)
```

Change order invoice information

Change the invoice information of the order with the order number specified in the URL.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$order = PAC12345670121; // string
$request_invoiceinformation = new \Tyre24\Seller\Model\RequestInvoiceinformation(); // \Tyre24\Seller\Model\RequestInvoiceinformation

try {
    $apiInstance->changeInvoiceInformationByOrderNumberForSeller($country, $order, $request_invoiceinformation);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->changeInvoiceInformationByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **order** | **string**|  | |
| **request_invoiceinformation** | [**\Tyre24\Seller\Model\RequestInvoiceinformation**](../Model/RequestInvoiceinformation.md)|  | [optional] |

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

## `changeOrderPositionStatusForSeller()`

```php
changeOrderPositionStatusForSeller($country, $order, $position, $model_status_update)
```

Set order position status.

Change the status for an order. The placeholder {order} should be replaced with the order. Order numbers always begin with a letter or letter abbreviation (e.g. R or PAC). This corresponds to the product type. Parameters must be set as JSON in body.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$order = PAC12345670121; // string
$position = 123456; // string
$model_status_update = new \Tyre24\Seller\Model\ModelStatusUpdate(); // \Tyre24\Seller\Model\ModelStatusUpdate

try {
    $apiInstance->changeOrderPositionStatusForSeller($country, $order, $position, $model_status_update);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->changeOrderPositionStatusForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **order** | **string**|  | |
| **position** | **string**|  | |
| **model_status_update** | [**\Tyre24\Seller\Model\ModelStatusUpdate**](../Model/ModelStatusUpdate.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkTwoExistingOrdersForSeller()`

```php
linkTwoExistingOrdersForSeller($country, $content_type, $order, $request_order_relation)
```

Link two existing orders.

Link the two specified and existing orders. Set the order status of the specified order with the given status id.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$content_type = 'content_type_example'; // string | The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned.
$order = PAC12345670121; // string
$request_order_relation = new \Tyre24\Seller\Model\RequestOrderRelation(); // \Tyre24\Seller\Model\RequestOrderRelation

try {
    $apiInstance->linkTwoExistingOrdersForSeller($country, $content_type, $order, $request_order_relation);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->linkTwoExistingOrdersForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **content_type** | **string**| The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned. | |
| **order** | **string**|  | |
| **request_order_relation** | [**\Tyre24\Seller\Model\RequestOrderRelation**](../Model/RequestOrderRelation.md)|  | [optional] |

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

## `setOrderStatusByOrderNumberForSeller()`

```php
setOrderStatusByOrderNumberForSeller($country, $order, $model_status_update)
```

Set order status.

Set the order status of the specified order with the given status id.  Some statuses require a comment:  | Status | | ------ | | DENIED | | SOLD_OUT | | PARTIALLY_CANCELED | | CANCELED_BY_SELLER | | CANCELED_BY_BUYER |

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$order = PAC12345670121; // string
$model_status_update = new \Tyre24\Seller\Model\ModelStatusUpdate(); // \Tyre24\Seller\Model\ModelStatusUpdate

try {
    $apiInstance->setOrderStatusByOrderNumberForSeller($country, $order, $model_status_update);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->setOrderStatusByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **order** | **string**|  | |
| **model_status_update** | [**\Tyre24\Seller\Model\ModelStatusUpdate**](../Model/ModelStatusUpdate.md)|  | [optional] |

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

## `setTrackingCompanyAndParcelNumberForSeller()`

```php
setTrackingCompanyAndParcelNumberForSeller($country, $order, $request_tracking_information)
```

Set tracking company and parcel number(s).

Set the tracking company and the parcel number(s) for the specified order id.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code).
$order = PAC12345670121; // string
$request_tracking_information = new \Tyre24\Seller\Model\RequestTrackingInformation(); // \Tyre24\Seller\Model\RequestTrackingInformation

try {
    $apiInstance->setTrackingCompanyAndParcelNumberForSeller($country, $order, $request_tracking_information);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->setTrackingCompanyAndParcelNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). | |
| **order** | **string**|  | |
| **request_tracking_information** | [**\Tyre24\Seller\Model\RequestTrackingInformation**](../Model/RequestTrackingInformation.md)|  | [optional] |

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

## `updatePaymentStatusByOrderNumberForSeller()`

```php
updatePaymentStatusByOrderNumberForSeller($country, $order, $model_payment_status_update)
```

Update the payment status of a given order.

Update the payment status of a given order with the one specified in the request.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code).
$order = PAC12345670121; // string
$model_payment_status_update = new \Tyre24\Seller\Model\ModelPaymentStatusUpdate(); // \Tyre24\Seller\Model\ModelPaymentStatusUpdate

try {
    $apiInstance->updatePaymentStatusByOrderNumberForSeller($country, $order, $model_payment_status_update);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->updatePaymentStatusByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). | |
| **order** | **string**|  | |
| **model_payment_status_update** | [**\Tyre24\Seller\Model\ModelPaymentStatusUpdate**](../Model/ModelPaymentStatusUpdate.md)|  | [optional] |

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

## `uploadDeliveryNotePdfByOrderNumberForSeller()`

```php
uploadDeliveryNotePdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf)
```

Upload a delivery note for an order

With this endpoint you can upload a delivery note for an order, by specifying the base64 encoded pdf in your request body.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$content_type = application/json; // string | The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned.
$order = PAC12345670121; // string
$request_pdf = new \Tyre24\Seller\Model\RequestPdf(); // \Tyre24\Seller\Model\RequestPdf

try {
    $apiInstance->uploadDeliveryNotePdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->uploadDeliveryNotePdfByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **content_type** | **string**| The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned. | |
| **order** | **string**|  | |
| **request_pdf** | [**\Tyre24\Seller\Model\RequestPdf**](../Model/RequestPdf.md)|  | [optional] |

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

## `uploadInvoicePdfByOrderNumberForSeller()`

```php
uploadInvoicePdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf)
```

Upload an invoice pdf for an order

With this endpoint you can upload an invoice pdf for an order, by specifying the base64 encoded pdf in your request body.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$content_type = application/json; // string | The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned.
$order = PAC12345670121; // string
$request_pdf = new \Tyre24\Seller\Model\RequestPdf(); // \Tyre24\Seller\Model\RequestPdf

try {
    $apiInstance->uploadInvoicePdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->uploadInvoicePdfByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **content_type** | **string**| The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned. | |
| **order** | **string**|  | |
| **request_pdf** | [**\Tyre24\Seller\Model\RequestPdf**](../Model/RequestPdf.md)|  | [optional] |

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

## `uploadRefundPdfByOrderNumberForSeller()`

```php
uploadRefundPdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf)
```

Upload a refund pdf for an order

With this endpoint you can upload a refund pdf for an order, by specifying the base64 encoded pdf in your request body.

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


$apiInstance = new Tyre24\Seller\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = de; // string | Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned.
$content_type = application/json; // string | The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned.
$order = PAC12345670121; // string
$request_pdf = new \Tyre24\Seller\Model\RequestPdf(); // \Tyre24\Seller\Model\RequestPdf

try {
    $apiInstance->uploadRefundPdfByOrderNumberForSeller($country, $content_type, $order, $request_pdf);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->uploadRefundPdfByOrderNumberForSeller: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**| Country code in ISO 3166-1 alpha-2 (lowercase 2-letter country code). If not specified, the error with code ERR_UNACCESSIBLE_ORDER and status code 400 will be returned. | |
| **content_type** | **string**| The content type for all json requests. If not specified, errors related to missing required request body parameters will be returned. | |
| **order** | **string**|  | |
| **request_pdf** | [**\Tyre24\Seller\Model\RequestPdf**](../Model/RequestPdf.md)|  | [optional] |

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
