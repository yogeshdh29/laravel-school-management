<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    private function validateRequest() {
        return request()->validate([
            'title' => 'required|min: 3',
            'desc' => 'required|',
        ]);        
    }

    public function index() {
        $notice = Notice::all();
        return view('notices.index', compact('notice'));
    }

    public function create() {
        $notice = new Notice();
        return view('notices.create', compact('notice'));
    }

    public function store() {
        $student = Notice::create($this->validateRequest());
        return redirect('notices')->with('message', 'Notice created!');
    }

}
