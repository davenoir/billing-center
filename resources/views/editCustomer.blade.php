@extends('layouts.app')

@section('content')
<div class="container">
    <div id="heading" class="row text-center">
        <div class="col-md-12">
        <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Customer Profile {{$customer->name}}</b></h1>
            <hr>
        @if (!empty($success))
            <div class="btn peach-gradient" style="border-radius: 50px">

                <span style="font-size: larger; font-weight:900"> {{$success}} </span>

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
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-user-cog"></i> </h5>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12">
                            <i class="far fa-user"></i> Customer | <br><span style="font-weight:900"><b>{{$customer->name}} </b> </span>
                        </div>
                    </div>
                    <br>
                    <div class="row tools">
                        <div class="col-md-12">
                            <p> <i class="fas fa-map-marker-alt"></i> Address | <br><b style="font-weight: 900">{{$customer->address}}</b></p>
                        </div>
                    </div>
                    <br>
                    <div class="row tools">
                        <div class="col-md-12">
                            <p><i class="fas fa-at"></i> E-mail | <br><b style="font-weight: 900">{{$customer->email}}</b></p>
                        </div>
                    </div>
                    <br>
                    <div class="row tools">
                        <div class="col-md-12">
                            <p><i class="fas fa-phone"></i> Phone No | <br><b style="font-weight: 900">{{$customer->phone}}</b></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <a href="/viewCustomer/{{$customer->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn btn aqua-gradient"><i class="fas fa-backward"></i> Back</button></a>
                        </div>
                    </div>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <h5 style="font-weight: bold">Financial Statement</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <p class="cloudy-knoxville-gradient" style="font-size: larger;  border-radius:50px; box-shadow: 0px 0px 15px -3px rgba(1, 2, 1, 0.3);">  Total Invoices  <br><b style="font-weight: 900; font-size: xx-large">{{$invoicesAll}}</b></p>
                        </div>
                    </div>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <p class="cloudy-knoxville-gradient" style="font-size: larger;  border-radius:50px;box-shadow: 0px 0px 15px -3px rgba(1, 2, 1, 0.3);"> Paid Invoices  <br><b style="font-weight: 900; font-size: xx-large;">{{$invoicesPayed}}</b></p>
                        </div>
                    </div>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <p class="cloudy-knoxville-gradient" style="font-size: larger;  border-radius:50px;box-shadow: 0px 0px 15px -3px rgba(1, 2, 1, 0.3);"> Unpaid Invoices  <br><b style="font-weight: 900; font-size: xx-large; color:red">{{$invoicesUnpayed}}</b></p>
                        </div>
                    </div>
                    @php
                            $total = 0;
                            $amount = 15.254;
                        @endphp
                        @foreach ($products as $product)
                               <div style="display: none"> {{$total += $product->price * $product->quantity}} </div>

                        @endforeach
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <p class="cloudy-knoxville-gradient" style="font-size: larger;  border-radius:50px;box-shadow: 0px 0px 15px -3px rgba(1, 2, 1, 0.3);"> Amount Paid  <br><b style="font-weight: 900; font-size: xx-large;">€{{number_format($total)}}</b> EUR</p>
                        </div>
                    </div>
                    @php
                            $totalUn = 0;
                            $amount = 15.254;
                        @endphp
                        @foreach ($productsUnpayed as $productUn)
                               <div style="display: none"> {{$totalUn += $productUn->price * $productUn->quantity}} </div>

                        @endforeach
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p  class="cloudy-knoxville-gradient" style="font-size: larger;  border-radius:50px;box-shadow: 0px 0px 15px -3px rgba(1, 2, 1, 0.3);">  Amount Unpaid   <br><b style="font-weight: 900; font-size: xx-large; color:red">€{{number_format($totalUn)}}</b> EUR</p>
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
                <div class="col-md-12 " style="margin-top: 17%">
                <form method="POST" action="/saveEditCustomer/{{$customer->id}}">
                        @csrf

                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="name" class="col-md-4 col-form-label text-md-right"><i class="far fa-user"></i> Full Name |</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="address" class="col-md-4 col-form-label text-md-right"><i class="fas fa-map-marker-alt"></i> Address |</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $customer->address }}" required autocomplete="address" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-at"></i> E-mail |</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $customer->email }}" autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-group row tools">
                            <label style="font-size: larger;" for="phone" class="col-md-4 col-form-label text-md-right"><i class="fas fa-phone"></i> Phone No |</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $customer->phone }}" autocomplete="phone" autofocus>
                            </div>
                        </div>

                        <div class="form-group row tools mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="border-radius: 50px; color:white; font-weight:bold" type="submit" class="btn peach-gradient">
                                    Save Changes
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
