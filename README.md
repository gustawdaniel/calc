# Php calculator with logger into MySql database

This is exemplary project that presents simple php application that use AJAX form and MySql connection.

### Installation:

```bash
sudo apt-get install git -y
git clone https://github.com/gustawdaniel/calc.git
cd calc && perl install.pl
CTRL+N
firefox localhost:9000
```

### Screen shoot

[![calc.png](https://s17.postimg.org/z3jvat1gv/calc.png)](https://postimg.org/image/5oe71swx7/)

### Features

#### Centralized configuration
Both php and perl use database parameters form `config/parameters.yml` file. MySql file with database structure is parsed in installation to use database name from this config file.

#### Logging requests into database
Main functionality is no calculating sum and difference of input fields, but saving requests to database. Any request is represented by `Log` object. Database object have one method - `save` that has `Log` as argument. Into database theres are logged:

+ time - time of saving to database
+ a - first input
+ b - second input
+ action - sum or diff
+ user_agent - info about browser

#### Testing with behat and selenium
To test application setup selenium server `selenium-standalone start` and run `vendor/bin/behat`. Below there is presented result of testing.

[![test.png](https://s13.postimg.org/twxlybjzb/test.png)](https://postimg.org/image/xgjjo4moz/)

#### Access by API

Using `httpie` we can obtain access by API. Result of action is saved as `c` and is calculated in php, when on website javascript is used to do calculation.

    http -fv 127.0.0.1:9000/api.php/action a=1 b=2 action="sum"

```
POST /api.php/action HTTP/1.1
Accept: */*
Accept-Encoding: gzip, deflate
Connection: keep-alive
Content-Length: 18
Content-Type: application/x-www-form-urlencoded; charset=utf-8
Host: 127.0.0.1:9000
User-Agent: HTTPie/0.9.2

a=1&b=2&action=sum

HTTP/1.1 200 OK
Connection: close
Content-type: application/json
Host: 127.0.0.1:9000
X-Powered-By: PHP/7.0.8-0ubuntu0.16.04.3

{
    "a": "1", 
    "action": "sum", 
    "b": "2", 
    "c": 3
}
```

### External libs
#### Composer 
In backend there is installed `mustangostang/spyc` to parse yml config for php. We use composer to install it.
#### Bower
In frontend we use `bootstrap 4` and `jQuery` to send `post`. These components are installed by bower.
#### Npm
Testing server selenium is installed by Npm.

