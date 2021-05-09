<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolled;
use App\Payments;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $enrolled = Enrolled::where('paymentStatus','!=','Fully Paid')->get();
        
        return view('Students.Accounting.index',compact('enrolled'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.Accounting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payments::create([
            'userId' => $request->studentId,
            'classSchedId' => $request->classSchedId,
            'enrolledId' => $request->enrolledId,
            'paymentForTheMonth' => $request->paymentForTheMonth,
            'paymentAmount' => $request->paymentAmount,
            'dateOfPayment' => $request->paymentDate,
            'notes' => $request->notes,
            'remarks' => 'installment',
        ]);

        if($request->paymentAmount >= $request->balanceAmount){

            Enrolled::find($request->enrolledId)->update([
                'paymentStatus' => 'Fully Paid',
            ]);
            return redirect()->route('accounting.index')->with('success', 'Payment Successfully');
        }

        return redirect()->route('accounting.show',$request->enrolledId)->with('success', 'Payment Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $enrolled = Enrolled::find($id);

        $payments = Payments::where('enrolledId',$id)->get();


        return view('Students.Accounting.show',compact('enrolled','payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $enrolled = Enrolled::find($id);

        // return view('Students.Accounting.edit',compact('enrolled'));
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

    public function paymentCreate(Request $request)
    {
    
        $enrolled = Enrolled::find($request->enrolledId);
        $balanceAmount = $request->balanceAmount;

        return view('Students.Accounting.edit',compact('enrolled','balanceAmount'));

    }


    
}
