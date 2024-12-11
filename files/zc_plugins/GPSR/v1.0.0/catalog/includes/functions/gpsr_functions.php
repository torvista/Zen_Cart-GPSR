<?php

declare(strict_types=1);
/**
 *  Plugin GPSR
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_company(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_company
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_company']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_contact_person(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_contact_person
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_contact_person']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_street(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_street
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_street']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_postcode(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_postcode
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_postcode']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_city(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_city
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_city']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_country(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_country
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_country']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_url(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_url
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_url']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_company_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_company_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_company_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_contact_person_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_contact_person_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_contact_person_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_street_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_street_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_street_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_postcode_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_postcode_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_postcode_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_city_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_city_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_city_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_country_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_country_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_country_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_url_noneu(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_url_noneu
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_url_noneu']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_additional_1(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_additional_1
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_additional_1']);
}


/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_additional_2(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_additional_2
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_additional_2']);
}

/**
 * @param  int  $product_id
 * @return string
 */
function zen_get_products_manufacturers_gpsr_additional_3(int $product_id): string
{
    global $db;

    $sql = "SELECT m.manufacturers_gpsr_additional_3
            FROM " . TABLE_PRODUCTS . " p
            LEFT JOIN " . TABLE_MANUFACTURERS . " m USING (manufacturers_id)
            WHERE p.products_id = " . $product_id;

    $product = $db->Execute($sql, 1);

    return ($product->EOF ? '' : $product->fields['manufacturers_gpsr_additional_3']);
}
