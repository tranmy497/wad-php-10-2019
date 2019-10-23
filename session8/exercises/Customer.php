<?php

require_once './User.php';

class Customer extends User
{
    public function pay()
    {
        echo 'pay';
    }

    public function viewHistory()
    {
        echo 'view history';
    }
}
