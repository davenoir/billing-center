@extends('layouts.app')

@section('content')
<div class="container">
    <div id="heading" class="row text-center">
        <div class="col-md-12">
        <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Add new Customer</b></h1>
            <hr>
            @if (\Session::has('successCustomerAdd'))
    <div class="btn peach-gradient" style="border-radius: 50px">

           <span style="font-size: larger; font-weight:900"> {!! \Session::get('successCustomerAdd') !!} </span>

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
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-user-plus"></i> </h5>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12">
                            <a href="{{ route('customers') }}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn peach-gradient"><i class="far fa-id-card"></i> All Customers</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/globalCreateInvoice"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn aqua-gradient"> <i style="font-size: x-large" class="fas fa-hand-holding-usd"></i> Create Invoice</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/home"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn purple-gradient"><i class="fas fa-search-dollar"></i> All Invoices</button></a>
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


        <div class="col-md-8" style="margin-top: 2.6%; background-color: rgba(0, 0, 0, 0.01); box-shadow: 0px 0px 15px -5px rgba(1, 2, 1, 0.3);border: 1px solid #E8E8E8; color:#505050;border-radius:10px; padding-top:3%; padding-bottom:5%">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-wave-square"></i> </h5>
                    <hr>
                </div>
                <div class="col-md-12" style="margin-top: 12%">
                    <form method="POST" action="/addCustomerForm">
                        @csrf

                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="name" class="col-md-4 col-form-label text-md-right"><i class="far fa-user"></i> Full Name |</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="address" class="col-md-4 col-form-label text-md-right"><i class="fas fa-map-marker-alt"></i> Address |</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-at"></i> E-mail |</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="phone" class="col-md-4 col-form-label text-md-right"><i class="fas fa-phone"></i> Phone No|</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                            </div>
                        </div>

                        <div class="form-group row tools mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="border-radius: 50px; color:white; font-weight:bold" type="submit" class="btn peach-gradient">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
