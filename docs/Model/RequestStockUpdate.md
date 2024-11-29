# # RequestStockUpdate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**stock** | **int** | Article stock. |
**article_type** | **string** | Article type. For a full list of available types, please refer to the endpoint &#x60;/common/article-types&#x60;. |
**article_id** | **int** | Article id. | [optional]
**customer_article_id** | **string** | Original customer article id. | [optional]
**manufacturer_number** | **string** | The manufacturer number (valid if used with either the manufacturer name or the the brand id). | [optional]
**manufacturer_name** | **string** | The manufacturer name (valid if used with the manufacturer number). | [optional]
**brand_id** | **int** | The brand id (valid if used with the manufacturer number). | [optional]
**ean** | **string** | The article EAN. | [optional]
**oen** | **string** | The article OEN. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
