# `classes`

Function that conditionally builds a CSS class name.

## Installing

```
composer require zicht/classes
```

## Purpose

When building a component (or any piece of HTML, really), it's quite common to render or not render certain CSS classes based on certain variables. If you manually concatenate the class names, it quickly becomes a mess of `if` / `else` or ternary operators. This function helps to keep it readable.

## Usage

```
HtmlClassHelper::classes('art-vandelay'); ⇒ 'art-vandelay'
HtmlClassHelper::classes(['art-vandelay', 'kramerica']); ⇒ 'art-vandelay  kramerica'
HtmlClassHelper::classes(['art-vandelay' => true, 'kramerica' => false]); ⇒ 'art-vandelay'
HtmlClassHelper::classes('art-vandelay', ['kramerica' => false, 'kel-varnsen' => true]); ⇒ 'art-vandelay  kel-varnsen'
```

## Credits

This function was created because the JS equivalent [classnames](https://github.com/JedWatson/classnames) was nice to use in React.
