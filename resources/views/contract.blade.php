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
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-top: 8%">
                        <span style="font-size: xx-large">CONTRACT</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12" style="padding-top: 10%">

                            @php
                                $amount = 15.254;
                                $itemTotalAll= 0;
                                $new_pricePayedminusDDV = round($itemTotalAll * ((100 - $amount) / 100));



                                @endphp
                                @foreach ($viewInvoice as $index => $item)
                                <span style="display: none">{{$itemTotalAll += $item->price * $item->quantity}}</span>

                                @endforeach
                                @php
                                    $new_pricePayedminusDDV = round($itemTotalAll * ((100 - $amount) / 100));
                                @endphp
                        <span style="font-size: smaller">Agreement signed between <b>{{$customer->name}}</b> and <b>Demo Company</b>,
                            Lorem ipsum dolor sit amet, usu clita epicuri ne.
                            In aliquando liberavisse has, dicant voluptaria est ad, feugiat detracto iudicabit vix eu.
                            An est prima aeque convenire. Odio scripta usu an, tale ferri admodum has no.
                            Debet congue instructior an sed. Modus iudico everti te pro, forensibus neglegentur ad vix, suscipit suscipiantur no mel.
                            <br>Lorem ipsum dolor sit amet, usu clita epicuri ne.
                            In aliquando liberavisse has, dicant voluptaria est ad, feugiat detracto iudicabit vix eu.
                            An est prima aeque convenire. Odio scripta usu an, tale ferri admodum has no.
                            Debet congue instructior an sed. Modus iudico everti te pro, forensibus neglegentur ad vix, suscipit suscipiantur no mel.
                            <br>Lorem ipsum dolor sit amet, usu clita epicuri ne.
                            In aliquando liberavisse has, dicant voluptaria est ad, feugiat detracto iudicabit vix eu.
                            An est prima aeque convenire. Odio scripta usu an, tale ferri admodum has no.
                            Debet congue instructior an sed. Modus iudico everti te pro, forensibus neglegentur ad vix, suscipit suscipiantur no mel.
                           <br>In the amount of <b>{{number_format($itemTotalAll)}}</b> EUR.
                        </span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <p>Recieved by</p>
                            <br>
                            <span>___________________</span>
                        </div>
                        <div class="col-md-4 text-center">
                            <img height="150px" width="150px" src="{{public_path('img/stamp.png')}}">
                        </div>

                        <div class="col-md-4 text-right">
                            <p>Issued by</p>
                            <img height="110px" width="180px" src="{{public_path('img/sig.png')}}">
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
