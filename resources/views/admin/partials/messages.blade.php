@if (Session::has('errors'))
    <div x-data="{ open: true }">
        <div class="alert alert-danger" role="alert"
             x-show="open"
             @click.away="open = false">
            <button type="button" class="close" data-dismiss="alert" @click="open = false">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <ul class="list-unstyled">
                @foreach (Session::get('errors')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


@if (Session::has('warning'))
    <div x-data="{ open: true }">
        <div class="alert alert-warning" role="alert"
             x-show="open"
             @click.away="open = false">
            <button type="button" class="close" data-dismiss="alert" @click="open = false">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            {{Session::get('warning')}}
        </div>
    </div>
@endif


@if (Session::has('info'))
    <div x-data="{ open: true }">
        <div class="alert alert-info" role="alert"
             x-show="open"
             @click.away="open = false">
            <button type="button" class="close" data-dismiss="alert" @click="open = false">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            {{Session::get('info')}}
        </div>
    </div>
@endif


@if (Session::has('success'))
    <div x-data="{ open: true }">
        <div class="alert alert-success" role="alert"
             x-show="open"
             @click.away="open = false">
            <button type="button" class="close" data-dismiss="alert" @click="open = false">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            {{Session::get('success')}}
        </div>
    </div>
@endif
