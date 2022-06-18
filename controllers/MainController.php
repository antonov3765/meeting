<?php
require_once (ROOT .'/components/Tools.php');
require_once(ROOT . '/models/MeetingModel.php');
include_once(ROOT . '/views/layouts/header.php');
Tools::Style();

class MainController
{
    public function actionCreate()
    {
        if(!isset($_POST['frm_create'])){
            require_once(ROOT . '/views/main/create.php');
            Tools::Js();
        }
        else
        {
            $validationResult = Tools::checkFields();

            if (!$validationResult['success']) {
                foreach ($validationResult['error'] as $error):
                    Tools::notify($error, 'danger');
                endforeach;
            } else {
              Tools::addRow();
            }
        }
    }

    public function actionList()
    {
        $mm = new MeetingModel();
        $meetings =$mm->get_array();
        require_once(ROOT . '/views/main/list.php');
        Tools::Js();
    }

    public function actionEdit($id)
    {
        $mm= new MeetingModel();
        $meetings =$mm->getById($id);
        if(!isset($_POST['frm_create'])){
        require_once(ROOT .'/views/main/edit.php');
            Tools::Js();
        }else{
            $validationResult = Tools::checkFields();

            if (!$validationResult['success']) {
                foreach ($validationResult['error'] as $error):
                    Tools::notify($error, 'danger');
                endforeach;
            } else {
                Tools::editRow($id);
            }
        }
    }

    public function actionInfo($id)
    {

        $mm = new MeetingModel();
        $meetings =$mm->getById($id);
        require_once(ROOT .'/views/main/info.php');
        Tools::Js();
    }

    public function actionDelete($id)
    {
        $mm = new MeetingModel();
        $mm->delete($id);
        header('Location: /list');
    }
}