@extends('layouts.app')

@section('content')
<div class="container">
    <div id="heading" class="row text-center">
        <div class="col-md-12">
            <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Showing all Invoices</b></h1>
            <hr>
            @if (\Session::has('successPay'))
    <div class="btn purple-gradient tools" style="border-radius: 50px">

           <span style="font-size: larger; font-weight:900"> {!! \Session::get('successPay') !!} </span>

    </div>
    @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="row">
                <nav class="navbar navbar-expand-md" style="width:100%; box-shadow: none !important">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filters" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span><i class="fas fa-bars"></i> Tools
                      </button>
                      <div class="collapse navbar-collapse" id="filters">
                <div class="col-md-10 col-sm-12 col-12" style="background-color: rgba(0, 0, 0, 0.01); margin-top:6.5%;box-shadow: 0px 0px 15px -5px rgba(1, 2, 1, 0.3);border: 1px solid #E8E8E8; color:#505050;border-radius:10px; padding-top:10%; padding-bottom:5%">
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"> <i style="font-size: 3em;" class="fas fa-search-dollar"></i> </h5>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12">
                            <a href="{{ route('customers') }}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn peach-gradient"><i class="far fa-id-card"></i> All Customers</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/addCustomer"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn mean-fruit-gradient"><i class="fas fa-user-plus"></i> Add Customer</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/globalCreateInvoice"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn aqua-gradient"> <i style="font-size: x-large" class="fas fa-hand-holding-usd"></i> Create Invoice</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/unpayed"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn ripe-malinka-gradient"><i class="fas fa-business-time"></i> Unpaid Invoices</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="{{ route('statistics') }}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn blue-gradient"><i class="fas fa-tachometer-alt"></i> Statistics</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn amy-crisp-gradient"><i class="fas fa-home"></i> Home</button></a>
                        </div>
                    </div>

                </div>
                      </div>
                </nav>
            </div>
        </div>


        <div class="col-md-8" style="margin-top: 2.6%; background-color: rgba(0, 0, 0, 0.01);box-shadow: 0px 0px 15px -5px rgba(1, 2, 1, 0.3);border: 1px solid #E8E8E8; color:#505050;border-radius:10px; padding-top:3%; padding-bottom:5%">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 text-center">
                        <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-money-check"></i> </h5>
                        <hr>
                    </div>
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group has-search">
                            <input id="searchInvoice" type="text" class="form-control rounded-pill" placeholder='Search invoices by number, date or customer...'>
                        </div>
                        <hr style="width: 60%">
                    </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    @if (count($invoices) > 0)
                        <section class="products">
                            @include('layouts.load')
                        </section>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script type="text/javascript">

   $(function() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('keyup','#searchInvoice',function(){
            $('.products').html('');
        $value=$(this).val();
        $.ajax({
        type : 'get',
        url : '{{URL::to('searchInvoice')}}',
        data:{'search':$value},
        success:function(data){
        $('.products').hide().html(data).fadeIn(1100);
        }
        });
    });




    });




    </script>

