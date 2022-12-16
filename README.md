# pug-filter-less

[![Latest Stable Version](https://poser.pugx.org/pug-php/pug-filter-less/v/stable.png)](https://packagist.org/packages/pug-php/pug-filter-less)
[![Build Status](https://travis-ci.org/pug-php/pug-filter-less.svg?branch=master)](https://travis-ci.org/pug-php/pug-filter-less)
[![Code Climate](https://codeclimate.com/github/pug-php/pug-filter-less/badges/gpa.svg)](https://codeclimate.com/github/pug-php/pug-filter-less)
[![Test Coverage](https://codeclimate.com/github/pug-php/pug-filter-less/badges/coverage.svg)](https://codeclimate.com/github/pug-php/pug-filter-less/coverage)
[![StyleCI](https://styleci.io/repos/64429930/shield?branch=master)](https://styleci.io/repos/64429930)

This template:
```pug
//- set from php controller
- $prev = $color

//- set in the pug template
- $color = 'red'

head
  :less
    @prev: yellow;
    p {
      width: 200px;
      color: #{color};
      a {
        color: #{prev};
      }
      em {
        color: @prev;
      }
    }
body
  p
    | I'm
    =color
    |  but my links are
    a=prev
    |  and my quotes are
    em=prev
```

with data like this:
```php
$pug = new Pug();
$pug->render('template.pug', array(
    'color' => 'red',
));
```

will be rendered like this:
```html
<head>
  <style type="text/css">
    p {
      color: red;
    }
    p a {
      color: yellow;
    }
    p em {
      color: yellow;
    }
  </style>
</head>
<body>
  <p>
    I'm red but my links are <a>yellow</a> and my quotes are <em>yellow</em>
  </p>
</body>
```

## Security contact information

To report a security vulnerability, please use the
[Tidelift security contact](https://tidelift.com/security).
Tidelift will coordinate the fix and disclosure.
