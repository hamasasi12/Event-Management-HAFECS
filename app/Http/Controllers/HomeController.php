<?php

namespace App\Http\Controllers;
use App\Services\HomeService;

class HomeController extends Controller
{
    protected $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $data = $this->service->getHomeData();
        return view('welcome', [
            'trainers' => $data['trainers'],
            'seminars' => $data['seminars'],
            'settings' => $data['settings'] ?? [],
            'documentations' => $data['documentations']
        ]);
    }

    public function old() // NANTI HAPUS
    {
        $data = $this->service->getHomeData();
        return view('welcomeOLD', [
            'trainers' => $data['trainers'],
            'seminars' => $data['seminars'],
            'settings' => $data['settings'] ?? [],
            'documentations' => $data['documentations']
        ]);
    }
}
