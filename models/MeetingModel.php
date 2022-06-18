<?php
require_once (ROOT .'/models/Meeting.php');
require_once(ROOT. '/models/BaseModel.php');

class MeetingModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct('db');
    }

    public function getById($id): ?Meeting
    {
        $Fields = $this->getSome(['id' => $id])->fetch();

        if ($Fields) {
            return new Meeting($Fields);
        }

        return null;
    }
    public function get_array()
    {
        return array_map(fn($marr) => new Meeting($marr), $this->getAll()->fetchAll());
    }

    public function add($fields)
    {
        $this->addRow($fields);
    }

    public function edit($id, $fields)
    {
            $this->updateRow($id, $fields);
    }

    public function delete($id)
    {
        $this->deleteRow($id);
    }
}






