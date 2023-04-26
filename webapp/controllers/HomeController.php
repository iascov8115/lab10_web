<?php

use services\CraftiDB;
use services\Template;

class HomeController {
    private function getEvents() {
        $db = new CraftiDB();
        $events = $db->getEvents();
        $template = new Template();
        $template->assign('events',$events);
        return $template->render('events_list.php');
    }
    public function index() {
        $template = new Template();
        $events = $this->getEvents();
        $template->assign('title', 'Crafti события');
        $template->assign('main', $events);
        $render = $template->render('base.php');
        echo $render;
    }
}