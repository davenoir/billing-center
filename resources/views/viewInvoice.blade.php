@extends('layouts.app')

@section('content')
<div class="container">
    <div id="heading" class="row text-center">
        <div class="col-md-12">
        <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Invoice No | @if($showInvoiceId[0]->id > 99) <span style="font-weight:400">0{{$showInvoiceId[0]->id}}-00  </span> @else <span style="font-weight:400">00{{$showInvoiceId[0]->id}}-00 </span>@endif</b></h1>
            <hr>
            @if (\Session::has('successPay'))
    <div class="btn purple-gradient tools" style="border-radius: 50px">

           <span style="font-size: larger; font-weight:900"> {!! \Session::get('successPay') !!} </span>

    </div>
    @endif
    @if (!empty($success))
            <div class="btn peach-gradient tools" style="border-radius: 50px">

                <span style="font-size: larger; font-weight:900"> {{$success}} </span>

            </div>
        @endif
        @if (\Session::has('successMail'))
    <div class="btn mean-fruit-gradient" style="border-radius: 50px; color:white !important">

           <span style="font-size: larger; font-weight:900"> {!! \Session::get('successMail') !!} </span>

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
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-money-check"></i> </h5>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12">
                            <span><i class="fas fa-hashtag"></i> Invoice No | <br>@if($showInvoiceId[0]->id > 99) <span style="font-weight:900; font-size:x-large"><b>0{{$showInvoiceId[0]->id}}-00 </b> </span> @else <span style="font-weight:900;font-size:x-large"><b>00{{$showInvoiceId[0]->id}}-00 </b></span>@endif</b> </span></span>
                        </div>
                    </div>
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
                        <a href="/editInvoice/{{$customer->id}}/{{$showInvoiceId[0]->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn aqua-gradient"><i class="fas fa-edit"></i> Edit Invoice</button></a>
                        </div>
                    </div>
                    @if ($customer->email != null)
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <a href="/sendPDF/{{$customer->id}}/{{$showInvoiceId[0]->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn mean-fruit-gradient"><i style="font-size: x-large" class="fas fa-envelope"></i> Send PDF by e-mail</button></a>
                        </div>
                    </div>

                    @endif
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <a href="/downloadPDF/{{$customer->id}}/{{$showInvoiceId[0]->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn purple-gradient"><i style="font-size: x-large" class="fas fa-file-pdf"></i> Download PDF</button></a>
                        </div>
                    </div>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <a href="/contract/{{$customer->id}}/{{$showInvoiceId[0]->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn blue-gradient"><i style="font-size: x-large" class="fas fa-file-signature"></i> Contract</button></a>
                        </div>
                    </div>
                    <div class="row tools">
                        <div class="col-md-12 text-center">
                            <a href="/viewCustomer/{{$customer->id}}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn peach-gradient"><i class="fas fa-backward"></i> Back</button></a>
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
                    <div class="row tools">
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
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-12 tools1 invoiceTable">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <img style="margin-top: -6%" height="110px" width="110px" src="{{asset('img/profile.png')}}">
                                <p style="font-size: 1.2em;font-family: 'Ubuntu', sans-serif;" class="boldFilter">Demo Company</p>
                                    <hr>
                            </div>
                            <div class="col-md-6 text-right">
                                <h6 style="font-weight: 600">Company Info</h6>
                                <span><span style="font-weight: 600">Address</span> | st. XX-YY City</span>
                                <br>
                                <span><span style="font-weight: 600">Phone No</span> |  077XXXXXX / 072XXXXXX</span>
                                <br>
                                <span><span style="font-weight: 600">Account No</span> | 2X00X01XXX0X1XX</span>
                                <br>
                                <span><span style="font-weight: 600">E-mail</span> | demo.company@example.com</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">

                                <span style="font-weight: 600">Customer</span>
                                <br>
                                <span><span style="font-weight: 600">Full Name</span> | {{$customer->name}}</span>
                                <br>
                            <span><span style="font-weight: 600">Address</span> | {{$customer->address}}</span>
                                <br>
                                <span><span style="font-weight: 600">Phone No</span> | {{$customer->phone}}</span>
                                <br>
                                <span><span style="font-weight: 600">E-mail</span> | {{$customer->email}}</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center" style="padding-top: 5%; padding-bottom:5%">
                                <b><h3>Invoice Number | @if($showInvoiceId[0]->id > 99) 0{{$showInvoiceId[0]->id}}-00 @else 00{{$showInvoiceId[0]->id}}-00 @endif</b></h3>
                                <p>Issue date | {{$showInvoiceId[0]->created_at->format('d-m-Y')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Desc</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price without VAT</th>
                                        <th scope="col">VAT rate</th>
                                        <th scope="col">Total VAT</th>
                                        <th scope="col">Amount with VAT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalProducts =0;
                                        $totalDDV = 0;
                                        $totalBezDDV =0;

                                        @endphp
                                @foreach ($viewInvoice as $index => $item)
                                <tr>
                                <th scope="row">{{$index +1}}</th>
                                <td>{{$item->desc}}</td>
                                    <td>{{$item->quantity}}</td>
                                    @php
                                    $amount = 15.254;
                                    $itemTotal= $item->price * $item->quantity;
                                    $oneItemPrice = $item->price;

                                    $oneItemPriceDDV = round($oneItemPrice * ((100 - $amount) / 100));

                                    $new_pricePayed = round($itemTotal * ((100 - $amount) / 100));


                                    $DDV = $itemTotal - $new_pricePayed;
                                    @endphp
                                    <td>{{number_format($oneItemPriceDDV, 2)}}</td>
                                    <td>18%</td>
                                    <td>{{number_format($DDV, 2)}}</td>
                                    <td>{{number_format($itemTotal, 2)}}</td>
                                  </tr>

                                @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">VAT rate</th>
                                        <th scope="col">Base price</th>
                                        <th scope="col">VAT</th>
                                        <th scope="col">Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                    $amount = 15.254;
                                    $itemTotalAll= 0;
                                    $new_pricePayedminusDDV = round($itemTotalAll * ((100 - $amount) / 100));


                                    $DDV = $itemTotalAll - $new_pricePayed;
                                    @endphp
                                    @foreach ($viewInvoice as $index => $item)
                                    <span style="display: none">{{$itemTotalAll += $item->price * $item->quantity}}</span>

                                    @endforeach
                                    @php
                                        $new_pricePayedminusDDV = round($itemTotalAll * ((100 - $amount) / 100));
                                    @endphp
                                    <tr>
                                        <td>A 18%</th>
                                        <td>{{number_format($new_pricePayedminusDDV, 2)}}</td>
                                        <td>{{number_format($itemTotalAll-$new_pricePayedminusDDV,2)}}</td>
                                        <td>{{number_format($itemTotalAll, 2)}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4 text-right">
                                <hr>
                                <h6 style="font-weight: bold">Total | {{number_format($new_pricePayedminusDDV,2)}}</h6>
                                <h6 style="font-weight: bold">Vat | {{number_format($itemTotalAll-$new_pricePayedminusDDV,2)}}</h6>
                                <h6 style="font-weight: bold">For payment | EUR | {{number_format($itemTotalAll, 2)}}</h6>
                                <hr>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <span>Recieved by</span>
                                <br>
                                <br>
                                <br>
                                ___________________
                            </div>
                            <div class="col-md-4 text-center">
                                <img height="150px" width="150px" src="{{ asset('img/stamp.png') }}">
                            </div>
                            <div class="col-md-4 text-center">
                                <span>Issued by</span>
                                <br>
                                <img height="120px" width="180px" src="{{ asset('img/sig.png') }}">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="font-size: x-small">*NOTICE: Invoice payment deadline is 7 days.</p>
                            </div>
                        </div>







                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">



    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );




</script>
