<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function dashboard(): string
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
    }
}
