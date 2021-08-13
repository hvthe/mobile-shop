<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::find(1);
        return view('admin.modules.configweb.config', compact('config'));
    }

    public function show()
    {
        $config = Config::find(1);
        return view('admin.modules.configweb.update', compact('config'));
    }

    public function update(Request $request)
    {
        dd($request->all());
        $config = Config::find(1);
        $config->title = $request->title;
        $config->address = $request->address;
        $config->service = $request->service;
        $config->hotline = $request->hotline;
        $config->save();
        return redirect()->route('config');
    }
}
