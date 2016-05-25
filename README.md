# wrap-statsd


## Installation

`composer.json`
```
...
"repositories":[
    {
        "type": "vcs",
        "url": "https://github.com/Plus-Telecom/wrap-statsd.git"
    }
],
"require": {
    ...
    "plus-telecom/statsd": "dev-master",
    ...
},
...
```
## .env


```
STATSD_HOST=localhost
STATSD_PORT=8125
STATSD_NAMESPACE=find-uk
STATSD_TRACKING=true
```

## Usage

```

use Plustelecom\Statsd\Statsd;

...

Statsd::increment("welcome");


```


Ref: http://domnikl.github.io/statsd-php/
