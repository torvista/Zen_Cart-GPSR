# Zen Cart - GPSR

Encapsulated plugin compatible with the Zen Cart Plugin Manager.  
Tested with Zen Cart 2.1.0 and php 8.4.1.

Do not expect this to magically display as you would like, so test it and customise it **ON YOUR DEVELOPMENT SERVER FIRST**.

## Example

### Link:

![Alt text](rclassic_link.gif?raw=true "Title")

### Link clicked:

![Alt text](rclassic_link_clicked.gif?raw=true "Title")

## Status 13/12/2024
As this is a new requirement for EU shops, it's not too clear as to what exactly is ok/not ok, so please add your input/experience to the GitHub issues:  
https://github.com/torvista/Zen_Cart-GPSR/issues
 
## Description
Adds fields for GPSR manufacturer/importer contact data to the manufacturers table.  
Shows this GPSR data on the product pages.

By default the data is displayed after the product description.  
As it is inserted by javascript, it could be displayed anywhere, such as after the product details list  (Model/Shipping Weight/Units in Stock/Manufactured by...). 

It is displayed as a link with the details hidden, that toggles show/hide when clicked.

## Installation
- Via the Admin Plugin Manager.
- Installs new fields in the manufacturers table.  
- Installs a new constant SHOW_PRODUCT_INFO_GPSR in Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.  

By default, this is only for Product Type General.  
See below for customisation.

## Use
1. Add GPSR data via the Admin->Catalog->Manufacturers page.  The details for postal contact is free text rather than individual fields.  
If the GPSR company name is empty, nothing is displayed.  
Note: If you need to repeatedly put your details in the non-EU/importer fields, you could run a query to populate all those fields:  
UPDATE `manufacturers`
SET 
`manufacturers_gpsr_company_noneu` = 'YOUR COMPANY NAME', 
`manufacturers_gpsr_contact_noneu` = 'RESPONSIBLE PERSON
COMPANY NAME
STREET
CITY
PROVINCE
POSTCODE
COUNTRY', 
`manufacturers_gpsr_tel_noneu` = '+34 123 456 789', 
`manufacturers_gpsr_email_noneu` = 'email@yourcompany.com', 
`manufacturers_gpsr_url_noneu` = 'https://www.yourcompany.com',
`manufacturers_gpsr_add_1` = '', 
`manufacturers_gpsr_add_2` = '', 
`manufacturers_gpsr_add_3` = '';  
The sensible process would be to export/import the fields with DBIO to work with them all at once. 
1. Enable/disable the display of the data in Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.  
It is enabled by default.

The GPSR data is displayed as a link with the details hidden, that toggles show/hide when clicked.

The position of the link is set in gpsr_jscript.php, by default after the id "productDescription" but this is after "Ask a Question" so you may not like that!  
You could use a specific id  
e.g. ``<span id="gpsrInsert"></span>``   
in your template and it will insert there.

See below for customisation of position, layout etc.

## Customisation

### Additional Product Types
These will require a constant for each product type to be added to the configuration table.  
This requires the correct constant name and matching product_type id to be used in this query in the SQL patch tool that you can try out ON YOUR DEVELOPMENT SERVER.

e.g. for SHOW_PRODUCT_MUSIC_INFO_GPSR that is product type 2 (the "2" in "in page?', **2**, 3, NOW()")

INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified) VALUES ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_MUSIC_INFO_GPSR', '1', 'Should the extended GPSR manufacturer info be displayed on the product page?', 2, 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW());

### Positioning/Layout/Style
The structure/layout of the data and the position of the insertion of the data by javascript is all done in  
zc_plugins\GPSR\vxxx\catalog\includes\templates\default\jscript\gpsr_jscript.php

There are plenty of comments in this file so **read it**.

You may copy this to your template /jscript folder and it will be used **instead** of the default.

Basic css styling has been done in zc_plugins\GPSR\vxxx\catalog\includes\templates\default\css\gpsr_styles.css  

You may create a new file with the same name in your template /css to override/add to the default styles (**both** files are loaded).

### Problems/Suggestions
Via the GitHub Issues or in a parallel universe, PRs:  
https://github.com/torvista/Zen_Cart-GPSR/issues

## History
13/12/2024: torvista - Completely reworked as an encapsulated plugin.

Originally inspired by the great work done by webchills for the german Zen Cart:  
https://github.com/zencartpro/157-modul-gpsr
