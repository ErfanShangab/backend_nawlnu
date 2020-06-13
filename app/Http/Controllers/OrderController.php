<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Client;
use App\Order;
use DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['role:super-admin','permission:publish articles|edit articles']);
        $this->middleware(['role:employee|super_admin']);
    }
    public function index(Request $request)
    {
  $item =null;
        if(request()->ajax())
        {
      
            {
         if(!empty($request->from_date))
         {
     $items = Order::whereBetween('created_at', array($request->from_date, $request->to_date))
     ->with('Customer.User')->with('Client.User')->get();
         }
         else
         {
            $items = Order::with('Customer.User')->with('Client.User')->get();
         }
            return Datatables::of($items)
 

             ->addColumn('id', function ($items) {
                return '<a href="' . route(ADMIN . '.orders.show', $items->id) .'">'.$items->id.'</a>'; 
            })
            ->rawColumns(['id'])


            ->editColumn('Customer.name', function($items)
            {
               return $items->Customer->User->name;
            })
           
            ->editColumn('Customer.f_phone', function($items)
            {
               return $items->Customer->User->f_phone;
            })
            ->editColumn('Client.name', function($items)
            {
                return $items->Customer->User->name;
            })
            ->editColumn('town_id', function($items)
            {
                if($items->town_id =="1")
                return " الخرطوم"     ;
               elseif($items->town_id =="2")
               return   " أمدرمان";
               elseif($items->town_id =="3")
               return   " بحري";
 
            })
            ->editColumn('Driver.name', function($items)
            {
                return $items->Driver->User->name;
            })
              ->editColumn('Client.name', function($items)
            {
                return $items->Client->User->name;
            })

          
            ->editColumn('status', function($items)
            {
                if($items->status =="inprogress")
                return "جاري التوصيل "     ;
               elseif($items->status =="delivered")
               return   "تم التوصيل";
              
            })
         
          

            ->editColumn('is_payed', function($items)
            {
                if($items->is_payed ==0)
                return "  تم السداد    "     ;
               elseif($items->is_payed ==1)
               return   "غير مسدد  ";
              
            })
 

               ->editColumn('created_at', function($items)
            {
                return $items->created_at->toDateString();
            })
            ->make(true);
        }}
            
    //         ->editColumn('action', function($items)
    //         {
           

                 

    // return '<a href="bills/'.$account->id.'" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> View Bills</a><a href="edit_accounts/'.$account->id.'" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="javascript:void(0);" class="btn delete_account btn-sm btn-xs btn-danger" data-id="'.$account->id.'"><i class="fa fa-trash-alt"></i> Delete</a>';
    //         })
 
            

  
 

        return view('admin.orders.index');
           
        
           
    
        

    }



//     if(request()->ajax())
//     {
//      if(!empty($request->from_date))
//      {
//       $data = DB::table('tbl_order')
//         ->whereBetween('order_date', array($request->from_date, $request->to_date))
//         ->get();
//      }
//      else
//      {
//       $data = DB::table('tbl_order')
//         ->get();
//      }
//      return datatables()->of($data)->make(true);
//     }
//     return view('daterange');
//    }


    // return datatables($bills)
    // ->addColumn('fname', function ($bill) {
    //     if ($bill->member_id == 0) {
    //         return $bill->employee->fname; // Employee First Name
    //     }

    //     return $bill->member->fname; // Member First Name
    // })
    // ->toJson();
   
    // ->addColumn('action', function ($account) {
    //     return '<a href="bills/'.$account->id.'" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> View Bills</a><a href="edit_accounts/'.$account->id.'" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="javascript:void(0);" class="btn delete_account btn-sm btn-xs btn-danger" data-id="'.$account->id.'"><i class="fa fa-trash-alt"></i> Delete</a>';
    // })
    
    public function delivered()
    {
        $items = Order::where('status', 'deliverd')->get();
        $items->load('Customer.User', 'Client.User');

        return view('admin.orders.delivered', compact('items'));
    }

    public function inprogress()
    {
        $items = Order::where('status', 'inprogress')->get();
        $items->load('Customer.User', 'Client.User');

        return view('admin.orders.inprogress', compact('items'));
    }

    public function payed()
    {
        $items = Order::where('status', 'payed')->get();
        $items->load('Customer.User', 'Client.User');

        return view('admin.orders.payed', compact('items'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

     
    public function store(Request $request)
    {
        $this->validate($request, User::rules());
        
        // Customer::create($request->all());
      
        $user=User::create($request->all());
        // $customer = new Customer( );

        // $customer = new Customer([
        //     'user_id' =>   $user->id,
          
        // ]);
        $user->Customer()->save(new Customer());
        return redirect()->route(ADMIN . '.orders.index')->withSuccess(trans('app.success_store'));
    }

     
    public function show($id)
    {
        // $items->load('Customer.User' , 'Client.User');

        $item = Order::with('Customer.User', 'Client.User')->findOrFail($id);
        return view('admin.orders.show', compact('item'));
    }

     
    public function edit($id)
    {
        $item = Order::findOrFail($id);

        return view('admin.orders.edit', compact('item'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, User::rules(true, $id));

        $item = Order::findOrFail($id);

        $item->update($request->all());

        return redirect()->route(ADMIN . '.orders.index')->withSuccess(trans('app.success_update'));
    }

    
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route(ADMIN . '.orders.index')->withSuccess(trans('app.success_destroy'));
    }
}
