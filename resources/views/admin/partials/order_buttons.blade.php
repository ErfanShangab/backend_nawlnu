<div class="mC-20 mb-2">

    <a href="{{ route(ADMIN . '.orders.create') }}" class="btn btn-info">
        إضافة جديد
    </a>


    <a href="{{ route('/orders/delivered') }}" class="btn btn-primary">
        تم التوصيل 
    </a>


    <a href="{{ route('/orders/inprogress') }}" class="btn btn-danger">
        جاري التوصيل
    </a>


    <a href="{{ route('/orders/payed') }}" class="btn btn-secondary">
        المدفوعة
    </a>

</div>

 

 