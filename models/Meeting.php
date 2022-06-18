<?php
class Meeting
{
    public $id;
    public $date;
    public $time;
    public $title;
    public $address_lat;
    public $address_lng;
    public $country;

    public function __construct($fields)
    {
        $this->id = $fields['id'];
        $this->date = $fields['date'];
        $this->time =$fields["time"];
        $this->title =$fields['title'];
        $this->address_lat =$fields['address_lat'];
        $this->address_lng =$fields['address_lng'];
        $this->country =$fields['country'];
    }
}