<?php

namespace App\Http\Controllers;

use App\Jobs\DispatchEmailJob;
use App\Mail\SendPaymentSuccessEmail;
use App\Models\PaymentReceipt;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PaymentReceiptController extends Controller
{
    /**
     * The Currently authenticated User
     */
    private User $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('applicant');
        $this->middleware('verified');
        $this->middleware(function ($request, $next) {
            $this->user = User::whereId(auth()->user()->id)->first();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get last scholarship
        $lastScholarship = $this->user->last_active_scholarship;
        // Fetch receipt for scholarship
        $receipt = $this->user->payments()
            ->whereScholarshipId($lastScholarship->id)
            ->first();

        return inertia('PaymentSuccessful', ['receipt' => $receipt]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latestScholarship = $this->user->last_active_scholarship;

        $receipt = new PaymentReceipt;
        $receipt->name = $this->user->name;
        $receipt->email = $this->user->email;
        $receipt->phone = $latestScholarship->phone;
        $receipt->pin = "AGS-" . mt_rand(111111, 999999);
        $receipt->amount = $request->amount;
        $receipt->currency = $request->currency;
        $receipt->flutter_wave_reference = $request->flw_ref;
        $receipt->status = $request->status;
        $receipt->transaction_id = $request->transaction_id;
        $receipt->transaction_reference = $request->tx_ref;
        $receipt->email_sent_at = Carbon::now()->toDateString();

        $receipt->user()->associate($this->user);
        $receipt->scholarship()->associate($latestScholarship);

        $receipt->save();

        dispatch(new DispatchEmailJob(
            $this->user,
            new SendPaymentSuccessEmail(
                $this->user,
                $latestScholarship,
                $receipt,
                "Aptitude Test E-PIN",
                "Your payment was successful and a unique E-Pin has been generated for you.
                Please copy it down somewhere safe; you will need it for the Aptitude Test."
            )
        ));

        // Mail::to($this->user)->send();

        return redirect()->back()->with([
            "success" => $request->status == 'successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentReceipt  $paymentReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentReceipt $paymentReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentReceipt  $paymentReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentReceipt $paymentReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentReceipt  $paymentReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentReceipt $paymentReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentReceipt  $paymentReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentReceipt $paymentReceipt)
    {
        //
    }
}
