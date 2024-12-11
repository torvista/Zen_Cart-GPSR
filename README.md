# Zen Cart - GPSR

Encapsulated plugin compatible with the Zen Cart Plugin Manager.  
Tested with Zen Cart 2.1.0 and php 8.4.1.

Do not expect this to magically display as you would like, so test it and customise it **ON YOUR DEVELOPMENT SERVER FIRST**.

## Status 11/12/2024
Works as described.  
But, as this is a new requirement for EU shops, as things become clearer as to what exactly is ok/nok...no doubt it'll be a work-in-progress for a while.

Please add your input/experience to the GitHub issues:  
https://github.com/torvista/Zen_Cart-GPSR/issues

 
## Description
Adds fields for GPSR manufacturer data to the manufacturers table.  
Shows this GPSR data on the product pages.

By default the data is displayed after the product description.  
As it is inserted by javascript, it could be displayed anywhere, such as after the product details list  (Model/Shipping Weight/Units in Stock/Manufactured by...). 

It is displayed as a link with the details hidden, that toggles show/hide when clicked.

## Installation
- Via the Admin Plugin Manager.
- Installs new fields in the manufacturers table.  
- Installs a new constant SHOW_PRODUCT_INFO_GPSR in Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.  

By default, this is only for Product Type General.  See below for customisation.

## Use
1. Add GPSR data via the Admin->Catalog->Manufacturers page.  
If the GPSR company name is empty, nothing is displayed.  

1. Enable the display of the data from  
Catalog->Product Types->Product - General->Layout Settings->Show GPSR Manufacturer Info.  

See below for customisation of position, layout etc.

## Customisation

### Additional Product Types
These will require a constant for each to be added to the configuration table.  
E.g. SHOW_PRODUCT_MUSIC_INFO_GPSR

"INSERT IGNORE INTO product_type_layout (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, date_added, set_function, last_modified)
               VALUES
               ('Show GPSR Manufacturer Info', 'SHOW_PRODUCT_MUSIC_INFO_GPSR', '0', 'Should the extended GPSR manufacturer info be displayed on the product page?', 1, 3, NOW(), 'zen_cfg_select_drop_down(array(array(\'id\'=>\'1\', \'text\'=>\'True\'), array(\'id\'=>\'0\', \'text\'=>\'False\')), ', NOW())";

### Positioning/Layout/Style
The structure of the data as lists and the position of the insertion of the data by javascript is done in    
zc_plugins\GPSR\vxxx\catalog\includes\templates\default\jscript\gpsr_jscript.php  
You may copy this file to your template /jscript folder and it will be loaded instead of the default.

Basic css styling has been done in zc_plugins\GPSR\vxxx\catalog\includes\templates\default\css\gpsr_styles.css  
You may create a new file in your template /css to override the default styles (both files are loaded).

### Problems/Suggestions/Improvements
Via the GitHub Issues or in a parallel universe, PRs:  
https://github.com/torvista/Zen_Cart-GPSR/issues

## History
11/12/2024: torvista  
Completely reworked as an encapsulated plugin.

Originally based on the work done by webchills for the german Zen Cart: https://github.com/zencartpro/157-modul-gpsr
