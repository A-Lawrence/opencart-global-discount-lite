=======
Overview
=======

Allows the shop owner to specify a global discount (either fixed price or percentage) to be automatically applied at checkout.

Features include:
* Ability to set either a fixed price OR a percentage discount.
* Discount to take VAT/Shipping into account (if you wish).
* No file edits! Simple upload.

=======
Demo
=======

http://www.anthonylawrence.me.uk/opencart/

Choose any version of OpenCart (bearing in mind which versions this extension is compatible with)!

Admin:
User: demo
Pass: demo

Customer:
User: demo@anthonylawrence.me.uk
Pass: demo

NB: Databases are restored to default on a nightly basis.

=======
Installation
=======

1) Choose the base version folder (for example, 1_4 or 1_5) - take note of what versions are supported by this extension!
2) Upload the "admin" and "catalog" directories to the root of your OpenCart installation.
3) Login to your admin panel.
4) Go to "Extensions" > "Order Totals".
5) Click "Install" next to "Global Discount".
6) Complete the form as you want it!  Note: Status must be set to enabled!
7) Done!

=======
Upgrade
=======

From v1.0 - v1.0.3
------------------
Since only the core files are edited, and no files are deleted, follow steps 1 & 2 of the installation.
If the global discount isn't enabled, follow steps 3 - 7

=======
FAQ
=======

Q) I have it setup as described but the total doesn't reflect the discount that has been applied.
A) That's normally caused by bad positioning of order totals.  Check to makesure that nothing else is given the same sort order as this extension.

Q) When using a fixed price discount, the value shown is different to what's expected.  Is this right?
A) This is because the discount is applied in your local currency.  For example, if you give a discount of 10 (with your default currency being US Dollars) when a customer switches to British Pounds, the value will be converted.

=======
Release Notes
=======

V1.0.3 - 22/12/2011 - [Opencart Version 1.4.9 - 1.5.1.3]
--------------------------------------------------------
- Fixed issue with incorrect values being reported to the user when discount is applied in 1.5.x. [Thanks goes to vladko13 for reporting this and suggesting a fix]

V1.0.2 - 04/12/2011 - [Opencart Version 1.4.9 - 1.5.1.3]
--------------------------------------------------------
- Fixed percentage based discount to use entire total, rather than just subtotal. [Thanks goes to skip for reporting this]

V1.0.1 - 04/12/2011 - [Opencart Version 1.4.9 - 1.5.1.3]
--------------------------------------------------------
- Fixed tax error in version 1.4.9.x. [Thanks goes to skip for reporting this]

V1.0 - 27/11/2011 - [Opencart Version 1.4.9 - 1.5.1.3]
------------------------------------------------------
- Initial release.