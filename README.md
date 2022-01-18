# Interspark/YawavePublications

checkout to yawave_publications in your ext-folder in your Typo3 installation

## Push-Endpoint

The endpoint can be found  with
```
?type=1632820016
```
on the root of the site-URL.

## TODO

* check entities and their properties of the domain-model
* create a service to pull the publications
* add persist-methods to the service (easy to replace repository usages, for later porting the service to a Shopware Plugin...)
* call the Service from the controller push-action method
* ... after this we talk about additional controllers, actions and plugins (Plugins have to be created with the extension builder, a plugin is a name for one or more controller + action combinations)

## IMPORTANT

* the extension builder overrites the setup.typoscript, so after using the extension builder revert changes of this file with git
* in Typo3-Backend -> "Template" -> on main templates "Edit the whole template record" -> "Includes" -> add the "Yawave Adapter" setup.typoscript to "Selected Items"

# Links
https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/Database/BasicCrud/Index.html

https://docs.typo3.org/m/typo3/book-extbasefluid/master/en-us/6-Persistence/2a-creating-the-repositories.html

https://docs.typo3.org/m/typo3/book-extbasefluid/master/en-us/6-Persistence/3-implement-individual-database-queries.html

https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/DependencyInjection/Index.html

https://app.swaggerhub.com/apis/yawave/yawave_api/2.7.6#/Publications%20(Multi-Language%20Responses)/get_multilang_applications__application_id__publications
