<?php

namespace App\Http\Controllers;

use App\Pemesanan_model;
use Illuminate\Http\Request;

class Payment extends Controller
{
    public function notification(Request $request)
    {
        // dd($request);
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_KEY'));
        // dd($validSignatureKey);
        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $this->initPaymentGateway();
        $statusCode = null;

        $paymentNotification = new \Midtrans\Notification();
        // dd($paymentNotification->transaction_status);
        $order = Pemesanan_model::where('kode_transaksi', $paymentNotification->order_id)->firstOrFail();
        // dd($order->status_pemesanan);
        if ($order->isPaid()) {
            return response(['message' => 'The order has been paid before'], 422);
        }

        $transaction = $paymentNotification->transaction_status;
        $type = $paymentNotification->payment_type;
        $orderId = $paymentNotification->order_id;
        $fraud = $paymentNotification->fraud_status;

        $vaNumber = null;
        $vendorName = null;
        if (!empty($paymentNotification->va_numbers[0])) {
            $vaNumber = $paymentNotification->va_numbers[0]->va_number;
            $vendorName = $paymentNotification->va_numbers[0]->bank;
        }

        $paymentStatus = null;
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $paymentStatus = Pemesanan_model::CHALLENGE;
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $paymentStatus = Pemesanan_model::SUCCESS;
                }
            }
        } elseif ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $paymentStatus = Pemesanan_model::SETTLEMENT;
        } elseif ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $paymentStatus = Pemesanan_model::PENDING;
        } elseif ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = Pemesanan_model::DENY;
        } elseif ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $paymentStatus = Pemesanan_model::EXPIRE;
        } elseif ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = Pemesanan_model::CANCEL;
        }

        // $paymentParams = [
        //     'order_id' => $order->id,
        //     'number' => Pemesanan_model::generateCode(),
        //     'amount' => $paymentNotification->gross_amount,
        //     'method' => 'midtrans',
        //     'status' => $paymentStatus,
        //     'token' => $paymentNotification->transaction_id,
        //     'payloads' => $payload,
        //     'payment_type' => $paymentNotification->payment_type,
        //     'va_number' => $vaNumber,
        //     'vendor_name' => $vendorName,
        //     'biller_code' => $paymentNotification->biller_code,
        //     'bill_key' => $paymentNotification->bill_key,
        // ];

        // $payment = Pemesanan_model::create($paymentParams);
        // $updateStatusPembayaran = Pemesanan_model::where('kode_transaksi', $paymentNotification->order_id)->update(array('status_pemesanan' => $paymentStatus));
        $order->status_pemesanan = $paymentStatus;
        $order->save();

        // if ($paymentStatus && $payment) {
        //     \DB::transaction(
        //         function () use ($order, $payment) {
        //             if (in_array($payment->status, [Pemesanan_model::SUCCESS, Pemesanan_model::SETTLEMENT])) {
        //                 $order->payment_status = Order::PAID;
        //                 $order->status = Order::CONFIRMED;
        //                 $order->save();
        //             }
        //         }
        //     );
        // }

        $message = 'Payment status is : '. $paymentStatus;

        $response = [
            'code' => 200,
            'message' => $message,
        ];

        return response($response, 200);

    }

    public function completed(Request $request)
    {
        // dd($request->transaction_status);
        $status = $request->transaction_status;
        $order = Pemesanan_model::where('kode_transaksi', $request->order_id)->firstOrFail();
        if($status == 'settlement'){
            $order->status_pemesanan = Pemesanan_model::SETTLEMENT;
        }else{
             $order->status_pemesanan = Pemesanan_model::PENDING;
        }
        
        $order->save();

        return redirect('/pemesanan_user');


    }

    public function unfinish(Request $request)
    {

    }

    public function failed(Request $request)
    {

    }
}
