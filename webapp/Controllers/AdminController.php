<?php

namespace Controllers;

use Repository\ChildRepository;
use Repository\DepartmentEventRepository;
use Repository\DepartmentRepository;
use Repository\EventRecordRepository;
use Repository\EventRepository;
use Repository\ParentRepository;
use Services\DatabaseManager;
use Services\Request;
use Services\Template;

class AdminController
{
    private function getRepositoryByTableName(string $table_name){
        switch ($table_name) {
            case 'event':
                return new EventRepository();
            case 'child':
                return new ChildRepository();
            case 'parent':
                return new ParentRepository();
            case 'department':
                return new DepartmentRepository();
            case 'department_event':
                return new DepartmentEventRepository();
            case 'event_record':
                return new EventRecordRepository();
        }
    }

    public function insert(Request $request){
        $params = $request->parameters;
        $table = $params['table'];
        $template = new Template();
        if (!isset($params['submit'])) {
            $template->assign('main', $template->render("forms/$table.php"));
            echo $template->render('base.php');
        } else {
            switch ($table) {
                case 'department':
                    $rep = new DepartmentRepository();
                    $rep->insert($params['department_address'], $params['department_phone']);
                    break;
                case 'department_event':
                    $rep = new DepartmentEventRepository();
                    $rep->insert($params['de_date'], $params['de_time'], $params['department_id'], $params['event_id']);
                    break;
                case 'event_record':
                    $rep = new EventRecordRepository();
                    $rep->insert($params['er_date'], $params['de_id'], $params['child_id']);
                    break;
                case 'event':
                    $rep = new EventRepository();
                    $rep->insert($params['event_name'], $params['manager_id'], $params['available_places'], $params['event_price']);
                    break;
                case 'child':
                    $rep = new ChildRepository();
                    $rep->insert($params['child_name'], $params['child_year_of_birth'], $params['parent_id']);
                    break;
                case 'parent':
                    $rep = new ParentRepository();
                    $rep->insert($params['parent_name'], $params['parent_email']);
                    break;
            }
            header('Location: /admin');
            die();
        }
    }
    public function delete(Request $request)
    {
        $params = $request->parameters;
        $table = $params['table'];
        $id = $params['id'];
        $rep = $this->getRepositoryByTableName($table);
        $rep->delete($id);
        header("Location: http://{$params['HTTP_HOST']}/admin");
        die();
    }

    public function update(Request $request)
    {
        $params = $request->parameters;
        $table = $params['table'];
        $id = $params['id'];
        $template = new Template();
        if (!isset($params['submit'])) {
            $rep = $this->getRepositoryByTableName($table);
            $entity = $rep->findOneById($id);
            $template->assign($table, $entity);
            $template->assign('main', $template->render("forms/$table.php"));
            echo $template->render('base.php');
        } else {
            switch ($table) {
                case 'department':
                    $rep = new DepartmentRepository();
                    $rep->update($id, $params['department_address'], $params['department_phone']);
                    break;
                case 'department_event':
                    $rep = new DepartmentEventRepository();
                    $rep->update($id, $params['de_date'], $params['de_time'], $params['department_id'], $params['event_id']);
                    break;
                case 'event_record':
                    $rep = new EventRecordRepository();
                    $rep->update($id, $params['er_date'], $params['de_id'], $params['child_id']);
                    break;
                case 'event':
                    $rep = new EventRepository();
                    $rep->update($id,$params['event_name'], $params['manager_id'], $params['available_places'], $params['event_price']);
                    break;
                case 'child':
                    $rep = new ChildRepository();
                    $rep->update($id,$params['child_name'], $params['child_year_of_birth'], $params['parent_id']);
                    break;
                case 'parent':
                    $rep = new ParentRepository();
                    $rep->update($id,$params['parent_name'], $params['parent_email']);
                    break;
            }
            header('Location: /admin');
            die();
        }
    }
    public function logout(Request $request) {
        session_destroy();
        header('Location: /admin');
    }
    public function index(Request $request)
    {
        session_start();
        $template = new Template();

        if (!isset($_SESSION['manager'])) {
            if(!isset($request->parameters['submit'])) {
                $template->assign('main', $template->render('login.php'));
            } else {
                $dm = DatabaseManager::getInstance();
                $query = "SELECT * from manager";
                $managers = $dm->connection->query($query)->fetch_all();
                if (
                    in_array($request->parameters['login'], array_column($managers, 1))
                    && in_array(md5($request->parameters['password']), array_column($managers, 2))
                ) {
                    $_SESSION['manager'] = true;
                }
                header('Location: /admin');
            }
        } else {
            $cr = new ChildRepository();
            $pr = new ParentRepository();
            $dr = new DepartmentRepository();
            $er = new EventRepository();
            $der = new DepartmentEventRepository();
            $err = new EventRecordRepository();

            $child = $cr->findAll();
            $parents = $pr->findAll();
            $departments = $dr->findAll();
            $events = $er->findAll();
            $departments_events = $der->findAll();
            $events_records = $err->findAll();


            $template->assign('parents', $parents);
            $template->assign('child', $child);
            $template->assign('events', $events);
            $template->assign('departments', $departments);
            $template->assign('departments_events', $departments_events);
            $template->assign('events_records', $events_records);
            $template->assign('main', $template->render('admin.php'));
        }
        echo $template->render('base.php');
    }
}