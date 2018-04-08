<?php
/*
  $Id: html_output.php,v 1.1.1.1 2005/11/21 13:47:38 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/

////
// javascript to dynamically update the states/provinces list when the country is changed
// TABLES: zones
  function tep_js_zone_list($country, $form, $field) {
    global $db;
    $countries_query = $db->sql_query("select distinct zone_country_id from " . TABLE_ZONES . " order by zone_country_id");
    $num_country = 1;
    $output_string = '';
    while ($countries = $db->sql_fetchrow($countries_query)) {
      if ($num_country == 1) {
        $output_string .= '  if (' . $country . ' == "' . $countries['zone_country_id'] . '") {' . "\n";
      } else {
        $output_string .= '  } else if (' . $country . ' == "' . $countries['zone_country_id'] . '") {' . "\n";
      }

      $states_query = $db->sql_query("select zone_name, zone_id from " . TABLE_ZONES . " where zone_country_id = '" . $countries['zone_country_id'] . "' order by zone_name");

      $num_state = 1;
      while ($states = $db->sql_fetchrow($states_query)) {
        if ($num_state == '1') $output_string .= '    ' . $form . '.' . $field . '.options[0] = new Option("' . PLEASE_SELECT . '", "");' . "\n";
        $output_string .= '    ' . $form . '.' . $field . '.options[' . $num_state . '] = new Option("' . $states['zone_name'] . '", "' . $states['zone_id'] . '");' . "\n";
        $num_state++;
      }
      $num_country++;
    }
    $output_string .= '  } else {' . "\n" .
                      '    ' . $form . '.' . $field . '.options[0] = new Option("' . TYPE_BELOW . '", "");' . "\n" .
                      '  }' . "\n";

    return $output_string;
  }

////
// Output a form
  function tep_draw_form($name2, $action2, $method = 'post', $parameters = '') {
    $form = '<form name="' . tep_parse_input_field_data($name2, array('"' => '&quot;')) . '" action="' . tep_parse_input_field_data($action2, array('"' => '&quot;')) . '" method="' . tep_parse_input_field_data($method, array('"' => '&quot;')) . '"';

    if (tep_not_null($parameters)) $form .= ' ' . $parameters;

    $form .= '>';

    return $form;
  }

////
// Output a form
  function tep_draw_forma($name3, $action3, $parameters = '', $method = 'post', $params = '') {
	
	$form3 = '<form name="' . $name3 . '" action="';
    if ($parameters) {
      $form3 .= tep_href_linka($action3, $parameters);
    } else {
     $form3 .= tep_href_linka($action3);
    }
    $form3 .= '" method="' . $method . '"';
    if ($params) {
      $form3 .= ' ' . $params;
    }
    $form3 .= '>';
  //  echo '=>'.tep_href_linka($action3, $parameters);
    return $form3;
  }

// Output a form filefield
  function tep_draw_file_field($name, $required = false) {
    $field = tep_draw_input_field2($name, '', '', $required, 'file');

    return $field;
  }

////
// Parse the data used in the html tags to ensure the tags will not break
  function tep_parse_input_field_data($data, $parse) {
    return strtr(trim($data), $parse);
  }

////
// Output a form input field
  function tep_draw_input_field($name, $value = '', $parameters = '', $type = 'text', $reinsert_value = true) {
    $field = '<input type="' . tep_parse_input_field_data($type, array('"' => '&quot;')) . '" name="' . tep_parse_input_field_data($name, array('"' => '&quot;')) . '"';

    if ( (isset($GLOBALS[$name])) && ($reinsert_value == true) ) {
      $field .= ' value="' . tep_parse_input_field_data($GLOBALS[$name], array('"' => '&quot;')) . '"';
    } elseif (tep_not_null($value)) {
      $field .= ' value="' . tep_parse_input_field_data($value, array('"' => '&quot;')) . '"';
    }

    if (tep_not_null($parameters)) $field .= ' ' . $parameters;

    $field .= '>';

    return $field;
  }

////
// Output a form input field
  function tep_draw_input_field2($name, $value = '', $parameters = '', $required = false, $type = 'text', $reinsert_value = true) {
    $field = '<input type="' . $type . '" name="' . $name . '"';
    if ( ($GLOBALS[$name]) && ($reinsert_value) ) {
      $field .= ' value="' . htmlspecialchars(trim($GLOBALS[$name])) . '"';
    } elseif ($value != '') {
      $field .= ' value="' . htmlspecialchars(trim($value)) . '"';
    }
    if ($parameters != '') {
      $field .= ' ' . $parameters;
    }
    $field .= '>';

    if ($required) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }




////
// Output a form password field
  function tep_draw_password_field($name, $value = '', $parameters = 'maxlength="40"') {
    return tep_draw_input_field($name, $value, $parameters, 'password', false);
  }

////
// Output a form radio field
  function tep_draw_radio_field2($name, $value = '', $checked = false, $compare = '') {
    return tep_draw_selection_field2($name, 'radio', $value, $checked, $compare);
  }


////
// Output a selection field - alias function for tep_draw_checkbox_field() and tep_draw_radio_field()
  function tep_draw_selection_field($name, $type, $value = '', $checked = false, $parameters = '') {
    $selection = '<input type="' . tep_parse_input_field_data($type, array('"' => '&quot;')) . '" name="' . tep_parse_input_field_data($name, array('"' => '&quot;')) . '"';

    if (tep_not_null($value)) $selection .= ' value="' . tep_parse_input_field_data($value, array('"' => '&quot;')) . '"';

    if ( ($checked == true) || ($GLOBALS[$name] == 'on') || ( (isset($value)) && ($GLOBALS[$name] == $value) ) ) {
      $selection .= ' CHECKED';
    }

    if (tep_not_null($parameters)) $selection .= ' ' . $parameters;

    $selection .= '>';

    return $selection;
  }


 function tep_draw_selection_field2($name, $type, $value = '', $checked = false, $compare = '') {
    $selection = '<input type="' . $type . '" name="' . $name . '"';
    if ($value != '') {
      $selection .= ' value="' . $value . '"';
    }
    if ( ($checked == true) || ($GLOBALS[$name] == 'on') || ($value && ($GLOBALS[$name] == $value)) || ($value && ($value == $compare)) ) {
      $selection .= ' CHECKED';
    }
    $selection .= '>';

    return $selection;
  }


////
// Output a form checkbox field
  function tep_draw_checkbox_field($name, $value = '', $checked = false, $parameters = '') {
    return tep_draw_selection_field($name, 'checkbox', $value, $checked, $parameters);
  }

////
// Output a form radio field
  function tep_draw_radio_field($name, $value = '', $checked = false, $parameters = '') {
    return tep_draw_selection_field($name, 'radio', $value, $checked, $parameters);
  }

////
// Output a form textarea field
  function tep_draw_textarea_field($name, $wrap, $width, $height, $text = '', $parameters = '', $reinsert_value = true) {
    $field = '<textarea name="' . tep_parse_input_field_data($name, array('"' => '&quot;')) . '" wrap="' . tep_parse_input_field_data($wrap, array('"' => '&quot;')) . '" cols="' . tep_parse_input_field_data($width, array('"' => '&quot;')) . '" rows="' . tep_parse_input_field_data($height, array('"' => '&quot;')) . '"';

    if (tep_not_null($parameters)) $field .= ' ' . $parameters;

    $field .= '>';

    if ( (isset($GLOBALS[$name])) && ($reinsert_value == true) ) {
      $field .= $GLOBALS[$name];
    } elseif (tep_not_null($text)) {
      $field .= $text;
    }

    $field .= '</textarea>';

    return $field;
  }

////
// Output a form hidden field
  function tep_draw_hidden_field($name, $value = '', $parameters = '') {
    $field = '<input type="hidden" name="' . tep_parse_input_field_data($name, array('"' => '&quot;')) . '" value="';

    if (tep_not_null($value)) {
      $field .= tep_parse_input_field_data($value, array('"' => '&quot;'));
    } else {
      $field .= tep_parse_input_field_data($GLOBALS[$name], array('"' => '&quot;'));
    }

    if (tep_not_null($parameters)) $field .= ' ' . $parameters;

    $field .= '">';

    return $field;
  }

////
// Output a form hidden field
  function tep_draw_hidden_field2($name, $value = '') {
    $field = '<input type="hidden" name="' . $name . '" value="';
    if ($value != '') {
      $field .= trim($value);
    } else {
      $field .= trim($GLOBALS[$name]);
    }
    $field .= '">';

    return $field;
  }

////
// Hide form elements
//  function tep_hide_session_id() {
//    if (tep_not_null(SID)) return tep_draw_hidden_field(tep_session_name(), tep_session_id());
//  }

// Output a form pull down menu
  function tep_draw_pull_down_menu2($name, $values, $default = '', $params = '', $required = false) {
    $field = '<select name="' . $name . '"';
    if ($params) $field .= ' ' . $params;
    $field .= '>';
    for ($i=0; $i<sizeof($values); $i++) {
      $field .= '<option value="' . $values[$i]['id'] . '"';
      if ( ((strlen($values[$i]['id']) > 0) && ($GLOBALS[$name] == $values[$i]['id'])) || ($default == $values[$i]['id']) ) {
        $field .= ' SELECTED';
      }
      $field .= '>' . $values[$i]['text'] . '</option>';
	 
    }
    $field .= '</select>';

    if ($required) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }

////
// Output a form pull down menu
  function tep_draw_pull_down_menu($name, $values, $default = '', $parameters = '', $required = false) {
    $field = '<select name="' . tep_parse_input_field_data($name, array('"' => '&quot;')) . '"';

    if (tep_not_null($parameters)) $field .= ' ' . $parameters;

    $field .= '>';

    if ($default == '') $default = $GLOBALS[$name];

    $size = sizeof($values);
    for ($i=0; $i<$size; $i++) {
      $field .= '<option value="' . tep_parse_input_field_data($values[$i]['id'], array('"' => '&quot;')) . '"';
      if ($default == $values[$i]['id']) {
        $field .= ' SELECTED';
      }

      $field .= '>' . tep_parse_input_field_data($values[$i]['text'], array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;')) . '</option>';
    }
    $field .= '</select>';

    if ($required == true) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }

////
// Creates a pull-down list of countries
  function tep_get_country_list($name, $selected = '', $parameters = '') {
    $countries_array = array(array('id' => '', 'text' => PULL_DOWN_DEFAULT));
    $countries = tep_get_countries();
    $size = sizeof($countries);
    for ($i=0; $i<$size; $i++) {
      $countries_array[] = array('id' => $countries[$i]['countries_id'], 'text' => $countries[$i]['countries_name']);
    }

    return tep_draw_pull_down_menu($name, $countries_array, $selected, $parameters);
  }

?>
