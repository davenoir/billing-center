<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <style>
    body {
    font-family: DejaVu Sans;
    }
  </style>
  <body>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-12 tools1 invoiceTable">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6" style="border-bottom: 1px solid #DCDCDC; padding-top: -3%">
                                <div style="margin-left: 4%">
                                <img height="120px" width="120px" src="{{public_path('img/profile.png')}}">
                                </div>
                                <div style="margin-left: -3%">
                                <span style="font-size: 1.4em;">Demo Company</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right align-center" style="font-size:x-small">
                            <span style="font-weight: bold">Company Info</span>
                            <br>
                            <span><span style="font-weight: bold">Address</span> | st. XX-YY City</span>
                            <br>
                            <span><span style="font-weight: bold">Phone No</span> |  077XXXXXX / 072XXXXXX</span>
                            <br>
                            <span><span style="font-weight: bold">Account No</span> | 2X00X01XXX0X1XX</span>
                            <br>
                            <span><span style="font-weight: bold">E-mail</span> | demo.company@example.com</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" style="font-size: x-small; padding-top: -15%">
                            <span style="font-weight: bold">Customer</span>
                            <br>
                            <span><span style="font-weight: bold">Full Name</span> | {{$customer->name}}</span>
                            <br>
                        <span><span style="font-weight: bold">Address</span> | {{$customer->address}}</span>
                            <br>
                            <span><span style="font-weight: bold">Phone No</span> | {{$customer->phone}}</span>
                            <br>
                            <span><span style="font-weight: bold">E-mail</span> | {{$customer->email}}</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <br>
                            <span style="font-size: larger;">Invoice Number | @if($showInvoiceId[0]->id > 99) 0{{$showInvoiceId[0]->id}}-00 @else 00{{$showInvoiceId[0]->id}}-00 @endif</span>
                            <br>
                            <span style="font-size: xx-small">Issue date | {{$showInvoiceId[0]->created_at->format('d-m-Y')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table" style="font-size: x-small">
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
                                <td>{{number_format($DDV,2)}}</td>
                                <td>{{number_format($itemTotal,2)}}</td>
                              </tr>

                            @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table" style="font-size: x-small;">
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


                                $DDV = $itemTotal - $new_pricePayed;
                                @endphp
                                @foreach ($viewInvoice as $index => $item)
                                <span style="display: none">{{$itemTotalAll += $item->price * $item->quantity}}</span>

                                @endforeach
                                @php
                                    $new_pricePayedminusDDV = round($itemTotalAll * ((100 - $amount) / 100));
                                @endphp
                                <tr>
                                    <td>A 18%</th>
                                    <td>{{number_format($new_pricePayedminusDDV,2)}}</td>
                                    <td>{{number_format($itemTotalAll-$new_pricePayedminusDDV,2)}}</td>
                                    <td>{{number_format($itemTotalAll,2)}}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4 text-right" style="font-size: x-small; border-bottom: 1px solid #DCDCDC">
                            <p style="font-weight: bold">Total | {{number_format($new_pricePayedminusDDV,2)}}</p>
                            <p style="font-weight: bold">VAT | {{number_format($itemTotalAll-$new_pricePayedminusDDV,2)}}</p>
                            <p style="font-weight: bold">For payment | EUR |{{number_format($itemTotalAll,2)}}</p>
                        </div>
                    </div>
                    <br>
                   
                    
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <p>Recieved by</p>
                            <br>
                            <span>___________________</span>
                        </div>
                        <div class="col-md-4 text-center">
                            <img height="130px" width="130px" src="{{public_path('img/stamp.png')}}">
                        </div>

                        <div class="col-md-4 text-right">
                            <p>Issued by</p>
                            <img height="90px" width="160px" src="{{public_path('img/sig.png')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" >
                            <span style="font-size: xx-small; padding-top: -50%">*NOTICE: Invoice payment deadline is 7 days.</span>
                        </div>
                    </div>







                </div>
                </div>

            </div>
        </div>
      </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
