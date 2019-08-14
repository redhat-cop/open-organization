# Open Organization Capability Model

The Open Organization Capability Model is a tool for assessing an organization's culture.

More specifically, the tool measures an organization's relative degree of openness, with particular attention to open principles outlined in the [Open Organization Definition](https://github.com/open-organization-ambassadors/open-org-definition/blob/master/open_org_definition.md).

This tool is based on the [Open Organization Maturity Model](http://www.opensource.com/open-organization/resources/open-org-maturity-model), which the open [organization community maintains](https://github.com/open-organization-ambassadors) under a Creative Commons license.

## Requirements

*  PHP
*  MySQL
*  Apache

## Setup

Use openorg.sql to setup the table for the openorg database.

Edit dbconnect.php with your mysql credentials.

Create the database and tables:

mysql -u XXXX -p openorg < openorg.sql

The database will be initialized with an Admin User account (username: admin, password: admin).  For security reasonse, please delete this user before going live/public with your code.

This app uses a captcha to ensure no robot creation of users.

Securimage: A PHP class dealing with CAPTCHA images, audio, and validation
https://www.phpcaptcha.org/documentation/quickstart-guide/

To register with recaptcha, visit: https://www.google.com/recaptcha/intro/v3.html
