# # UPUIDArticleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The product type, so &#x60;PUP&#x60; for this type. |
**upuid** | **string** | The Used Part Unique Identifier of the article. | [optional]
**oen** | **string** | The Original Equipment Number of the article. | [optional]
**manufacturer_name** | **string** | The name of the manufacturer. Must be used together with &#x60;manufacturer_number&#x60; to have an effect. | [optional]
**stock** | **int** | The amount of articles left in the stock. |
**alzura_item_id** | **string** | The unique id of the article. | [optional]
**customer_article_id** | **string** | A internal number given by the customer, to identify an article using a different id than our database. | [optional]
**manufacturer_number** | **string** | The number of the manufacturer. | [optional]
**prices** | [**\Tyre24\Seller\Model\PriceDataRequest[]**](PriceDataRequest.md) | List of prices for different countries. If activated, the price validation will run for all prices. If the difference of &#x60;price_one&#x60; is to great in comparison with the normal price it will be capped. If the normal price is &lt;&#x3D; 250€ (or 1000zł) the cap is 5€. For prices above that border the difference is 2%. At least one price must be given. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
