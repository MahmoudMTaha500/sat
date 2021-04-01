<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Line;
use PDF;


class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

function index() {
            $data = [
                // 'foo' => 'bar'
            ];
            $pdf = PDF::loadView('admin.pdf', $data);
            // $pdf->autoScriptToLang = true;
         // $pdf->autoLangToFont = true;
            // $pdf->autoLangToFont = true;
            // $pdf->useAdobeCJK = true;        
            return $pdf->stream('admin.pdf');
        //     $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');
}


    // public function index2()
    // {
    //     return view('admin.pdf');

    //     // $data = '<h1>Test</h1>';
    //     // $pdf = \PDF::loadView('admin.pdf', $data);
    //     // return $pdf->download('admin.pdf');


    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML("$html");
        
    //     return $pdf->stream();
    //     // return view('admin.pdf');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
