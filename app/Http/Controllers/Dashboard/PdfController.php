<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Line;
use PDF;


class PdfController extends Controller
{

    public function index2()
    {
        // $data = '<h1>Test</h1>';
        // $pdf = \PDF::loadView('admin.pdf', $data);
        // return $pdf->download('admin.pdf');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
