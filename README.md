# Segfault 11

I am getting a `segfault 11`  when running PHPunit 8 or analysing code with PHPStan, i have been able recreate for PHPUnit but not PHPStan.  (but the fix resolves both of them)

## Setup

- PHP 7.3.11 (cli) (built: Oct 24 2019 11:29:52) ( NTS )
- PHPUnit 8.4.2

## Description

After some basic PHP debugging, the bug seems to be caused when reflecting multiple files that use traits and properties, then using the reflected class to check if it has a method or if its abstract etc.

> This bug only happens in PHP 7.3 (not 7.2 or 7.4) and when running multiple files.

To generate the segfault type

```linux
$ vendor/bin/phpunit tests
```

This will output `Segmentation fault: 11`

When i run gdb

```linux
sudo gdb --args php /code/punit/vendor/bin/phpunit tests
```

I get the following after doing `run` and `bt full`

```
Thread 3 received signal SIGSEGV, Segmentation fault.
0x000000010035f7d6 in _zend_mm_alloc ()
(gdb) bt full
#0  0x000000010035f7d6 in _zend_mm_alloc ()
No symbol table info available.
#1  0x00000001003808ae in zend_stack_push ()
No symbol table info available.
#2  0x0000000100353b2e in lex_scan ()
No symbol table info available.
#3  0x00000001003658de in zendlex ()
No symbol table info available.
#4  0x000000010434b3c0 in ?? ()
No symbol table info available.
#5  0x00007ffe00000000 in ?? ()
No symbol table info available.
#6  0x00007ffeefbfe380 in ?? ()
No symbol table info available.
#7  0x000000010034c060 in zendparse ()
No symbol table info available.
```


To stop this from happening, simply rename the `$result` property in the `TestTrait` then you will get the correct output `OK (3 tests, 3 assertions)`
