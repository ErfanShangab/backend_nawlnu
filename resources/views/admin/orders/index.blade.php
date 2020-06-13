@extends('admin.default')

@section('page-header')
    إدارة الطلبيات 
@endsection
{{-- <small>{{ trans('app.manage') }}</small> --}}
@section('content')
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

   
   </head>
    
    @include('admin.partials.order_buttons')
 
  
               <div class="row input-daterange">
                   <div class="col-md-4">
                       <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                   </div>
                   <div class="col-md-4">
                       <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                   </div>
                   <div class="col-md-4">
                       <button type="button" name="filter" id="filter" class="btn btn-primary">فلترة</button>
                       <button type="button" name="refresh" id="refresh" class="btn btn-default">تحديث</button>
                   </div>
               </div>
               <br />


               <div class="table-responsive">
                <table class="table table-bordered table-striped" id="order_table">
                       <thead>
                        <tr>
                            <th> رقم الطلبية  </th>
                            <th>اسم الزبون</th>
                            <th> رقم الهاتف   </th>
                            <th> اسم العميل   </th>
                            <th>المدينة</th>
                            <th> الكمية     </th>
                            <th> التكلفة     </th>
                            <th> اسم الكابتن     </th>
                            <th> الحالة     </th>
                            <th> السداد     </th>
                            <th> التاريخ     </th>
                            {{-- <th>التحكم</th> --}}
                        </tr>
                       </thead>
                   </table>
               </div>
              </div>
             </body>
            </html>
            
            
            <script>
            $(document).ready(function(){
             $('.input-daterange').datepicker({
              todayBtn:'linked',
              format:'yyyy-mm-dd',
              autoclose:true
             });
            
             load_data();
            
             function load_data(from_date = '', to_date = '')
             {
              $('#order_table').DataTable({
               processing: true,
               serverSide: true,
               ajax: {
                url:'{{ route("admin.orders.index") }}',
                data:{from_date:from_date, to_date:to_date}
               },
               columns: [
                {
                 data:'id',
                 name:'id'
                },
               
                
                {
                 data:'Customer.name',
                 name:'Customer.name'
                },
                {
                 data:'Customer.f_phone',
                 name:'Customer.f_phone'
                },
                {
                 data:'Client.name',
                 name:'Client.name'
                },
                {
                 data:'town_id',
                 name:'town_id'
                },
                
                {
                 data:'Quantity',
                 name:'Quantity'
                },
                {
                 data:'cost',
                 name:'cost'
                },
                
                {
                 data:'Driver.name',
                 name:'Driver.name'
                },
                {
                 data:'status',
                 name:'status'
                },
                {
                 data:'is_payed',
                 name:'is_payed'
                },
                
                
                {
                 data:'created_at',
                 name:'created_at'
                },

                   
                // {
                //  data:'action',
                //  name:'action'
                // },
                 
               ]
              });
             }


                     
                      

            
             $('#filter').click(function(){
              var from_date = $('#from_date').val();
              var to_date = $('#to_date').val();
              if(from_date != '' &&  to_date != '')
              {
               $('#order_table').DataTable().destroy();
               load_data(from_date, to_date);
              }
              else
              {
               alert('يجب ادخال تاريخ البداية والنهاية');
              }
             });
            
             $('#refresh').click(function(){
              $('#from_date').val('');
              $('#to_date').val('');
              $('#order_table').DataTable().destroy();
              load_data();
             });
            
            });
            </script>
            
@endsection