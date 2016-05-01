<?php

namespace Archigos\Framework;

if(!defined('Config_Security_Key')) {
 die(trigger_error('Security Key Not Present or Invalid', 256));
}

class Templates {
  protected $_root  = null,
            $_path  = null,
            $_tpl   = null;

  private   $_assignedValues = [];

  public function __construct() {
    $this->_path = __DIR__ . '/../../assets/templates/';
    $this->_root = str_replace('\\', '/', substr(realpath(dirname(__DIR__) . '../../'), strlen(realpath($_SERVER['DOCUMENT_ROOT']))));
  }

  public function load($name) {
    $file   = $this->_path . $name . '.tpl.php';
    // What to display if file fails to load:
    if(file_exists($file) == FALSE) {
      return trigger_error("Error Loading '$name' into the Template System.", 256);
    }

    switch($name) {
      case 'topnav':
        return include $file;
        break;
      default:
        $this->_tpl = file_get_contents($file);
    }
    return TRUE;
  }

  public function assign($search, $replace) {
    $this->_assignedValues[strtoupper($search)] = $replace;
  }

  public function display() {
    if(count($this->_assignedValues) > 0) {
      // Single out CSS first
      foreach($this->_assignedValues as $k => $v) {
        if(strtolower($k) == 'css') {
          $this->_tpl = str_replace('{CSS}', "\n  <link rel=\"stylesheet\"    href=\"{HERE}/views/css/$v.css\" />", $this->_tpl);
        }
      }
      // Now run the rest of the replacements
      foreach($this->_assignedValues as $k => $v) {
        $this->_tpl = str_replace('{CSS}',    '', $this->_tpl);
        $this->_tpl = str_replace('{'.$k.'}', $v, $this->_tpl);
      }
    }
    $this->_tpl = str_replace('{TITLE}', 'No Title Provided', $this->_tpl);
    $this->_tpl = str_replace('{HERE}', $this->_root, $this->_tpl);

    echo $this->_tpl;
  }

  public function reset() {
    if(!is_null($this->_tpl))             { $this->_tpl             = null; }
    if(!is_null($this->_assignedValues))  { $this->_assignedValues  = [];   }
  }

  public function footer(Array $args = []) {
    $this->_tpl = $this->_path . 'footer.tpl.php';
    return include $this->_tpl;
  }
}

?>
