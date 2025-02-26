<?php
namespace App\Controllers;

use eftec\bladeone\BladeOne;
class Controller {
    protected $blade;
    public function __construct() {
        $views = ROOT_PATH . 'app/Views';
        $cache = ROOT_PATH . 'app/Cache';

        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
    }
}