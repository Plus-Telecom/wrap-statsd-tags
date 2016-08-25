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
STATSD_NAMESPACE=name_of_the_project
STATSD_TRACKING=true
```
Where `STATSD_NAMESPACE` should be set up differently for dev and live.
Example of live:
```
STATSD_NAMESPACE=my_project
```
Example of dev:
```
STATSD_NAMESPACE=my_project-dev
```

To turn the logging on or off you can have different value for `STATSD_TRACKING`
like:
```
STATSD_TRACKING=true
```
or
```
STATSD_TRACKING=false
```

## Usage

```

use Plustelecom\Statsd\Statsd;

...

Statsd::increment("welcome");


```


Ref: http://domnikl.github.io/statsd-php/
