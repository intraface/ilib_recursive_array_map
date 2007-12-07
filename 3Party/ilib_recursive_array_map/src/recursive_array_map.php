<?php
/**
 * An improved <code>array_map</code> which can be used recursively
 *
 * Function can be dynamically changed at runtime
 *
 * @package recursive_array_map
 * @author  Lars Olesen <lars@legestue.net>
 */

if (!function_exists('recursive_array_map')) {
  /**
   * This function is dynamically redefinable.
   * @see $GLOBALS['_global_function_callback_recursive_array_map']
   */
  function recursive_array_map($args) {
    $args = func_get_args();
    return call_user_func_array($GLOBALS['_global_function_callback_recursive_array_map'], $args);
  }
  if (!isset($GLOBALS['_global_function_callback_recursive_array_map'])) {
    $GLOBALS['_global_function_callback_recursive_array_map'] = 'ilib_recursive_array_map';
  }
}
/**
 * An improved <code>array_map</code> which can be used recursively
 *
 * @param string $func Function to attach
 * @param array  $arr  Array to
 *
 * @return array
 */
function ilib_recursive_array_map($func, $arr)
{
   $result = array();
   do {
       $key = key($arr);
       if (empty($arr)) {
           $result = $arr;
       } elseif (is_array(current($arr))) {
           $result[$key] = ilib_recursive_array_map($func, $arr[$key]);
       } else {
           $result[$key] = $func(current($arr));
       }
   } while (next($arr) !== false);
   return $result;
}