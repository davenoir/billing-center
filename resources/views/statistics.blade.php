@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Statistics</b></h1>
            <hr>
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
                            <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"> <i style="font-size: 3em;" class="fas fa-tachometer-alt"></i> </h5>
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
                <div class="col-md-12 text-center">
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-chart-line"></i> </h5>
                    <hr>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row justify-content-center tools">
                        <div class="col-md-5 col-sm-12 text-center btn purple-gradient" style="color:whitesmoke; margin-right:5%; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Total Issued Invoices</span>
                            <hr style="background-color: whitesmoke">
                            <p style="font-size: xxx-large; font-weight:900">{{$invoices}}</p>
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-2 text-center btn aqua-gradient" style="color:whitesmoke; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Paid Invoices</span>
                            <hr style="background-color: whitesmoke">
                            <p style="font-size: xxx-large; font-weight:900">{{$invoicesPayed}}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center tools" style="margin-top: 4%">
                        <div class="col-md-5 col-sm-12 text-center btn ripe-malinka-gradient" style="color:whitesmoke; margin-right:5%; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Unpaid Invoices</span>
                            <hr style="background-color: whitesmoke">
                            <p style="font-size: xxx-large; font-weight:900">{{$invoicesNotPayed}}</p>
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-2 text-center btn blue-gradient" style="color:whitesmoke; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Total with 18% VAT</span>
                            <hr style="background-color: whitesmoke">
                            <div style="display: none">
                            @php
                            $total = 0;
                            $amount = 15.254;
                        @endphp
                        @foreach ($products as $product)
                               <div style="display: none"> {{$total += $product->price}} </div>

                        @endforeach

                            </div>
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($total)}}</p> EUR
                        </div>
                    </div>
                    <div class="row justify-content-center tools" style="margin-top: 4%">
                        <div class="col-md-5 col-sm-12 text-center btn peach-gradient" style="color:whitesmoke; margin-right:5%; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Total without 18% VAT</span>
                            <hr style="background-color: whitesmoke">
                            @php
                                $new_price = round($total * ((100 - $amount) / 100));
                                $DDV = $total - $new_price;
                            @endphp
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($new_price)}}</p> EUR
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-2 text-center btn near-moon-gradient" style="color:whitesmoke; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Total VAT</span>
                            <hr style="background-color: whitesmoke">
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($DDV)}}</p> EUR
                        </div>
                    </div>
                    <div class="row justify-content-center tools" style="margin-top: 4%">
                        <div class="col-md-5 col-sm-12 text-center btn aqua-gradient" style="color:whitesmoke; margin-right:5%; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Customers</span>
                            <hr style="background-color: whitesmoke">
                        <p style="font-size: xxx-large; font-weight:900">{{$customers}}</p>
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-2 text-center btn mean-fruit-gradient" style="color:whitesmoke;  font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Paid with 18% VAT</span>
                            <hr style="background-color: whitesmoke">
                            <div style="display: none">
                            @php
                            $totalPayed = 0;
                            $amount = 15.254;
                        @endphp
                        @foreach ($productsPayed as $productPayed)
                               <div style="display: none"> {{$totalPayed += $productPayed->price}} </div>

                        @endforeach

                            </div>
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($totalPayed)}}</p> EUR
                        </div>
                    </div>
                    <div class="row justify-content-center tools" style="margin-top: 4%">
                        <div class="col-md-5 col-sm-12 text-center btn purple-gradient" style="color:whitesmoke; margin-right:5%; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Unpaid without 18% VAT</span>
                            <hr style="background-color: whitesmoke">
                            @php
                                $new_pricePayed = round($totalPayed * ((100 - $amount) / 100));
                                $DDVPayed = $totalPayed - $new_pricePayed;
                            @endphp
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($new_pricePayed)}}</p> EUR
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-2 text-center btn peach-gradient" style="color:whitesmoke; font-size:large; font-weight:bold; border-radius:50px;box-shadow: 0px 0px 15px 2px rgba(1, 2, 1, 0.3);">
                            <br>
                            <span>Total VAT of Paid Invoices</span>
                            <hr style="background-color: whitesmoke">
                            <p style="font-size: xxx-large; font-weight:900">€{{number_format($DDVPayed)}}</p> EUR
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>

