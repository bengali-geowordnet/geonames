<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2019-10-22 09:20:08 --> Config Class Initialized
INFO - 2019-10-22 09:20:08 --> Hooks Class Initialized
DEBUG - 2019-10-22 09:20:08 --> UTF-8 Support Enabled
INFO - 2019-10-22 09:20:08 --> Utf8 Class Initialized
INFO - 2019-10-22 09:20:08 --> URI Class Initialized
DEBUG - 2019-10-22 09:20:08 --> No URI present. Default controller set.
INFO - 2019-10-22 09:20:08 --> Router Class Initialized
INFO - 2019-10-22 09:20:08 --> Output Class Initialized
INFO - 2019-10-22 09:20:08 --> Security Class Initialized
DEBUG - 2019-10-22 09:20:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2019-10-22 09:20:08 --> Input Class Initialized
INFO - 2019-10-22 09:20:08 --> Language Class Initialized
INFO - 2019-10-22 09:20:08 --> Loader Class Initialized
INFO - 2019-10-22 09:20:08 --> Database Driver Class Initialized
ERROR - 2019-10-22 09:20:08 --> Severity: error --> Exception: Call to undefined function mysqli_init() /home/farhan/Farhan/Research/web/geonames/system/database/drivers/mysqli/mysqli_driver.php 126
ERROR - 2019-10-22 09:20:08 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in /home/farhan/Farhan/Research/web/geonames/system/core/Common.php on line 658 and defined in /home/farhan/Farhan/Research/web/geonames/system/core/Exceptions.php:190
Stack trace:
#0 /home/farhan/Farhan/Research/web/geonames/system/core/Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown /home/farhan/Farhan/Research/web/geonames/system/core/Exceptions.php 190
