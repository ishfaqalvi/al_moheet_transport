<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Models\Statment;
use Illuminate\Http\Request;

/**
 * Class InvoiceController
 * @package App\Http\Controllers
 */
class InvoiceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Invoice::$rules);
        $request['amount'] = $this->getAmmount($request->amount_in_dirham,$request->amount_in_rs,$request->rate);
        $statment = Statment::find($request->statment_id);
        $requiredAmount = $statment->amount - $statment->invoices()->sum('amount');
        if ($request['amount'] > $requiredAmount) {
            return redirect()->back()->with('error', 'Opps! current amount is greater than remaing balnce.');
        }
        $invoice = Invoice::create($request->all());

        return redirect()->back()->with('success', 'Invoice created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function getAmmount($dirham, $pkr,$rate)
    {
        $pkr = $pkr > 0 ? $pkr/$rate : $pkr;
        return round(($pkr + $dirham), 2);
    }
}
