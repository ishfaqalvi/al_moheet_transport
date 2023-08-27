<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ExpenseType;
use App\Models\Client;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function expense(Request $request)
    {
        $expenses = array();
        $collection = ExpenseType::get();
        if ($request->method() == 'POST') {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $userRequest = $request;
            foreach ($collection as $type) {
                $expenses[] = [
                    'title' => $type->title, 
                    'amount' => $type->expenses()->whereBetween('date', [$startDate, $endDate])->sum('amount')];
            }
        }else{
            $userRequest = null;
            foreach ($collection as $type) {
                $expenses[] = ['title' => $type->title, 'amount' => $type->expenses()->sum('amount')];
            }
        }
        
        return view('admin.report.expense', compact('expenses', 'userRequest'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clients(Request $request)
    {
        if ($request->method() == 'POST') {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $userRequest = $request;
            $clients = Client::with(['statments' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date', [$startDate, $endDate]);
            }, 'statments.invoices'])->get();
        }else{
            $clients = Client::with(['statments', 'statments.invoices'])->get();
            $userRequest = null;
        }
        $totalDebit = 0;
        $totalCredit = 0;
        $clientData = [];
        foreach ($clients as $client) {
            $debit = $client->statments->sum('amount');
            $credit = 0;
            foreach ($client->statments as $statement) {
                $credit += $statement->invoices->sum('amount');
            }

            $totalDebit += $debit;
            $totalCredit += $credit;

            $clientData[] = [
                'name'      => $client->name,
                'cnic'      => $client->cnic,
                'debit'     => $debit,
                'credit'    => $credit,
                'balance'   => $debit - $credit
            ];
        }
        $totalBalance = $totalDebit - $totalCredit;
        $data = [
            'totalDebit'   => $totalDebit,
            'totalCredit'  => $totalCredit,
            'totalBalance' => $totalBalance,
            'clients'      => $clientData,
            'userRequest'  => $userRequest
        ];
        return view('admin.report.clients', compact('data'));
    }
}
