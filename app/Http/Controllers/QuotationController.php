<?php

namespace App\Http\Controllers;

use App\Mail\QuotationMail;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


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
     * 
     * @author JDCASTRO
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @Descripcion:
     * Guardar cotizacion
     * 
     */
    public function store(Request $request)
    {
        // Validar envio de datos con email en la misma fecha.
        $checkDate = Quotation::where([['email', $request['email'], ['date', date('Y-m-d')]]])->exists();
        if ($checkDate) {
            return response()->json([
                'status' => ParamsController::WARNING,
                'msg' => "Ya tenemos tus datos registrados."
            ], 406);
            exit();
        }

        $quotation = new Quotation();
        $request['date'] = date('Y-m-d');
        $request['created_by'] = 'USERTEST';
        $request['updated_by'] = 'USERTEST';
        $request['active'] = true;
        $quotation->fill($request->all());
        $resp = $quotation->save();

        if ($resp) {
            // Enviar correo
            Mail::to('j.diego010297@gmail.com')->send(new QuotationMail($quotation));

            return response()->json([
                'status' => ParamsController::SUCCESS,
                'msg' => "¡Gracias por confiar en nosotros y dejarnos tus datos!"
            ], 200);
        } else {
            return response()->json([
                'status' => ParamsController::ERROR,
                'title' => "¡Ups!",
                'msg' => "Ocurrió un error al enviar datos, por favor intente de nuevo.",
            ], 400);
        }
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
