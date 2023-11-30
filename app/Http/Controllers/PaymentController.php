<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    
    /**
     * Display the specified resource.
     */
    public function payment($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $data = [
                'payment' => $payment
            ];
            return view('pagament', $data);
        } catch (\Exception $e) {
            return redirect()->route('pagamento')->with('error', 'Pagamento não encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return redirect()->route('pagamento')->with('status', 'Pagamento excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('pagamento')->with('status', 'Falha ao excluir o pagamento');
        }
    }
}
