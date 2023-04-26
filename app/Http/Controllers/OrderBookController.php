<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order_books;

use App\Models\Book;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

// use App\Models\Book;

class OrderBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     

        $user_id = Auth::id();
       
        $data = DB::table('order_items')
        ->join('items', 'items.id', '=', 'order_items.book_id')
        ->select('items.*', 'order_items.*')
        ->where('user_id', $user_id)
        ->paginate(10);

        // dd($data);

        return view('vue/orders', compact('data'));

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
        $item_id = $request->data['id'];

        $in_database = order_books::where('book_id', $item_id)->first();

        //if(empty($in_database)){

            $book = Book::where('id', $item_id)->first();

            if(Auth::check()){
                
                $modelData = $request->data['modelData'];
                $hour = $request->data['hour_form'];
                
                // $end_to_book = $request->data['end_to_book'];


                $user_id = Auth::id();

                $order_book = new order_books;   

                $order_book->book_id = $item_id;
    
                $order_book->user_id = $user_id;


                $date_from_request = $modelData['year']  . '-' . $modelData['month'] . '-' . $modelData['day'];
    
                $order_book->date_main = date("Y-m-d", (strtotime ($date_from_request) ));

                $order_book->hour = $hour;
    
                $order_book->status = 1;
    
                $order_book->save();

                return json_encode($order_book);
            }


            return json_encode($book);


            
        exit;

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
    public function destroy(Request $request)
    {

        ///echo $request->id;

        order_books::find($request->id)->delete();
        //
    }
}
