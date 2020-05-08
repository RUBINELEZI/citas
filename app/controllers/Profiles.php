<?php


class Profiles extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $this->view('profile/profile');
    }

}