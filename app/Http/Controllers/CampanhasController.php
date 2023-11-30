<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use App\Models\WhatsappInstance;
use Illuminate\Http\Request;

class CampanhasController extends Controller
{
    public function index() {
        return view('campanhas.campanhas');
    }
    public function create() {
        return view('campanhas.nueva-campanha-configuracion');
    }
    public function edit($id) {
        return view('campanhas.nueva-campanha-configuracion');
    }
    public function show($id) {
        return view('campanhas.campanha');
    }
}