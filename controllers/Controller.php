<?php

class Controller {
  public function view($view, $datas = []) {
    if(file_exists('views/' . $view . '.html.php')) {
      extract($datas); 
            
      ob_start();
      require('views/' . $view . '.html.php');
      $content = ob_get_clean();
      require('views/template.html.php');
    }
  }
}
