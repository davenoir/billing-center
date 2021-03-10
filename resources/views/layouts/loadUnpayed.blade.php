<div id="load">
    @foreach($invoices as $invoice)
        <div class="row">
            <div id="invoice" data-id={{$invoice->id}} class="col-md-10 offset-md-1 col-sm-12 col-12 courseCard" style="border: 2px solid #E8E8E8; border-radius: 8px; padding-top:1.2%; padding-bottom:1.2%; box-shadow: 0px 0px 19px -17px rgba(0,0,0,0.75); margin-bottom:0.8%">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-10">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                        <h5 style='color: @if($invoice->is_payed) green @else red @endif'>
                         <i class="fas fa-fingerprint"></i> Invoice No | @if($invoice->id > 99) <span style="font-weight:900"><b>0{{$invoice->id}}-00 </b> </span> @else <span style="font-weight:900"><b>00{{$invoice->id}}-00 </b></span>@endif
                        </h5>
                        <hr>
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($invoice->products as $item)
                               <div style="display: none"> {{$total += $item->price * $item->quantity}} </div>

                        @endforeach
                        <p> <i class="far fa-user"></i> Customer | <b style="font-weight: 900">{{$invoice->customer->name}}</b></p>
                        <p><i class="far fa-calendar-alt"></i> Date | <b style="font-weight: 900">{{$invoice->created_at->format('d-m-Y')}}</b></p>
                        <p><i class="fas fa-chart-line"></i> Amount | <b style="font-weight: 900">€{{number_format($total)}} EUR</b></p>
                            </div>
                            <div class="col-md-2 offset-md-2">
                                <a href="/viewInvoice/{{$invoice->customer->id}}/{{$invoice->id}}"><button type="button" style="border-radius:20px; font-size:small; color:white" class="btn purple-gradient"><b>View</b></button></a>
                                <a href="/downloadPDF/{{$invoice->customer->id}}/{{$invoice->id}}"><button type="button" style="border-radius:20px; font-size:small; color:white" class="btn btn-outline-secondary waves-effect"><b>PDF</b></button></a>
                            @if(!$invoice->is_payed) <a href="/payed/{{$invoice->id}}"><button data-id={{$invoice->id}} id="pay" type="button" style="border-radius:20px; font-size:small; color:white" class=" btn btn-outline-danger waves-effect"><i style="font-size: large" class="fas fa-check"></i></button></a> @else  @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row text-right">
        <div class="col-md-11">
        <span style="color:#808080; font-style:italic;font-family: 'Ubuntu', sans-serif; font-weight:900">Showing {{ $invoices->firstItem() }} to {{ $invoices->lastItem() }} from total of {{$invoices->total()}} invoices</span>
        </div>
    </div>

</div>
{{ $invoices->links() }}
