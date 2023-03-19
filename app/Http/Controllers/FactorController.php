<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    public function displayReport(Request $request)
    {
        /*$fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');*/

        $title = 'Registered User Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => 1 . ' To ' . 10,
            'Sort By' => 5
        ];

        $queryBuilder =User::first();
            /*User::select(['name', 'balance', 'registered_at']) // Do some querying..
        ->whereBetween('registered_at', [$fromDate, $toDate])
            ->orderBy($sortBy);*/

        $columns = [ // Set Column to be displayed
            'Name' => 'name',
            'Registered At'=>'Registered', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Total Balance' => 'balance',
            'Status' => 'status',


        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return (new \Jimmyjs\ReportGenerator\ReportMedia\PdfReport)->of($title, $meta, $queryBuilder, $columns)
            ->editColumn('Registered At', [ // Change column class or manipulate its data for displaying to report

                'class' => 'left'
            ])
            ->editColumns(['Total Balance', 'Status'], [ // Mass edit column
                'class' => 'right bold'
            ])
            ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                'Total Balance' => 'point' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
            ])
            ->limit(20) // Limit record to be showed
            ->stream(); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_record=User::find($id);
        $cart_record=Cart::where('user_id',$id)->latest()->first();
        $product=Product::where('id',$cart_record->product_id)->first();
        return response()->json([
            $user_record,
            $product,
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
