<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use App\Models\OrderType;
use App\Models\User;
use App\Models\Book;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Order::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                // $order_type = OrderType::where('title', 'like', '%'. $request['search'] .'%')->first();
                // if($order_type){
                //     $query->where('order_type_id', $order_type->id);
                // }
                // $user = User::where('name', 'like', '%'. $request['search'] .'%')->first();
                // if($user){
                //     $query->where('user_id', $user->id);
                // }
                // $book = Book::where('title', 'like', '%'. $request['search'] .'%')->first();
                // if($book){
                //     $query->where('book_id', $book->id);
                // }
                $query->where('order_id', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('order_status_id', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.orders.search', compact('models'));
        }
        $page_title = 'All Orders';
        $onlySoftDeleted = Order::onlyTrashed()->get();
        $models = Order::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.orders.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    public function getOrderTypes(Request $request)
    {
        $order_types = OrderType::where('status', 1)->whereNotIn('id', $request->order_types_ids)->get();
        return (string) view('admin.orders.order_type_ajax', compact('order_types'));
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
        $data['menu'] = 'orders';
        $data['show'] = Order::with('book')->where('id', $id)->first();
        $data['page_title'] = 'Order Details';
        if (!empty($data['show'])) {
            $data['order_statuses']  = OrderStatus::all();
            return view('admin.orders.show', $data);
        }
        return redirect()->route('admin.orders.index')->with('error', 'Order not found or deleted!');
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
        try {
            $delete = Order::where('id', $id)->first();
            $onlySoftDeleted = Order::onlyTrashed()->count();
            if (!empty($delete)) {
                $delete->delete();
                return response()->json([
                    'status' => true,
                    'trash_records' => $onlySoftDeleted
                ]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changeOrderStatus(Request $request)
    {
        try {

            $order = Order::where('id', $request->order_id)->first();
            if (!empty($order)) {
                $update = $order->update(['order_status_id' => $request->status_id]);
                if ($update > 0) {
                    return apiResponse(true, "Order Status has been updated", null, 200);
                }
                return apiResponse(false, "Failed to update order status", null, 500);
            }
            return apiResponse(false, "Order Not Found", null, 500);
        } catch (Exception $e) {
            return apiResponse(false,  $e->getMessage(), null, 500);
        }
    }

    public function trashAllOrders(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Order::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('order_id', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.orders.trash-search', compact('models'));
        }
        $models = Order::onlyTrashed()->paginate($per_page_records);
        return view('admin.orders.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Order::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
