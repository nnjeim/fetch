
<p><img src="https://eu.ui-avatars.com/api/?name=Najm+Njeim?size=100" width="100"/></p>

## Nnjeim Guzzle Wrapper

A Laravel wrapper for the Guzzle client http library. It provides a fluent syntax to make http requests.

## Installation

You can install the package via composer:
```
composer require nnjeim/fetch
```

## Configuration
```
php artisan vendor:publish --provider="Nnjeim\Fetch\FetchServiceProvider"
```

## Usage

##### Fetch Facade

``` 
use Nnjeim\Fetch\Fetch;

$countries = Fetch::setBaseUri('https://someapi.com')->get('countries');
```
##### FetchHelper Instantiation
```
use Nnjeim\Fetch\FetchHelper;

private $fetch;

public function __construct(FetchHelper $fetch) {

    $this->fetch = $fetch;
}

.
.
.
return $this->fetch
        ->setBaseUri('https://someapi.com')
        ->get('countries');
```

## Methods

##### Set the headers
```
Set the http headers  

@return $this       setHeaders(array $headers)
```

##### Set the base uri
```
Sets the base uri for the composition of the http request url.   

@return $this       setBaseUri(string 'http://someapi.com/')
```

##### Set the request url
```
Sets the http request url.   

@return $this       setUrl(string $url)
```

##### Set the request method
```
Sets the http request method.   

@return $this       setMethod(string $method)
```

#####  Set the request body format
```
Sets the request body format. The required format are 'query' | 'form_params' | 'multipart'.  

@return $this       setBodyFormat(string $format)
```

##### Async request
```
Sets the type of the request to async.  

@return $this       setAsync()       
```

##### Get request
```
Sets the body format to query.

@return array       get(?string $url = null, ?array $data = null)
```

##### Post request
```
Sets the body format to form-params.

@return array       post(?string $url = null, ?array $data = null)
```

##### Put request
```
Sets the body format to form-params.

@return array       put(?string $url = null, ?array $data = null)
```

##### Delete request
```
Sets the body format to query.

@return array       delete(?string $url = null, ?array $data = null)
```

##### Upload request
```
Sets the body format to multipart.

@return array       upload(?string $url = null, ?array $data = null)
```

## Response

```
@return array

    [
        'response' => ...,
        'status' => ...,
    ];
```
## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
