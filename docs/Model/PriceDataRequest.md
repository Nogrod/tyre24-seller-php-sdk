# # PriceDataRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**country_code** | **string** | The ISO-2 lower country code, for which the price shall be applied. |
**price** | **float** | The normal price of the article. The prices must be sent in the same currency as in the CSV import. | [optional]
**price_one** | **float** | The price of the article when only one article is ordered. The prices must be sent in the same currency as in the CSV import. This field has only effect for the following types: &#x60;PSR&#x60;, &#x60;PTY&#x60;, &#x60;R&#x60;, &#x60;F&#x60; and &#x60;PUP&#x60; | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
