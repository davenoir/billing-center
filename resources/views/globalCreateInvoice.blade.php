@extends('layouts.app')

@section('content')
<div class="container">
    <div id="heading" class="row text-center">
        <div class="col-md-12">
            <h1 style="font-size: 3.5em; margin-bottom:3%;font-family: 'Ubuntu', sans-serif !important;"><b>Create New Invoice</b></h1>
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
                    <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-folder-plus"></i> </h5>
                    <hr>
                    <div class="row tools">
                        <div class="col-md-12">
                            <a href="{{ route('customers') }}"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn peach-gradient"><i class="far fa-id-card"></i> Customers</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/addCustomer"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn mean-fruit-gradient"><i class="fas fa-user-plus"></i> Add Customer</button></a>
                        </div>
                    </div>
                    <div class="row tools" style="margin-top: 5%">
                        <div class="col-md-12">
                            <a href="/home"><button type="button" style="border-radius:50px; font-size:larger; padding-left:5%; padding-right:5%; color:white" class="btn purple-gradient"><i class="fas fa-search-dollar"></i> View Invoices</button></a>
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
                        <h5 style="font-size: 1.6em;font-family: 'Ubuntu', sans-serif;" class="boldFilter text-center tools"><i style="font-size: 3em;" class="fas fa-wave-square"></i> </h5>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 5%">
                    <form method="POST" action="/createGlobalInvoice">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 tools">
                                <h6><i class="fas fa-user"></i> Select a Customer |</h6>
                                <select class="form-control form-control-sm" id="customerList" name="customer" style="border-radius:50px !important">
                                </select>
                            </div>
                        </div>
                        <hr style="width: 95%">
                        <br>
                        <div class="form-group row  tools" style="margin-top: 1%">
                            <div class="col-md-6">
                                <label for="product" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="fas fa-toolbox"></i> Service | Product |</label> <br>
                                <input id="product" type="text" class="form-control" name="product[]" required  autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="quantity" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="fas fa-balance-scale"></i> Quantity |</label> <br>
                                <input id="quantity" type="text" class="form-control" name="quantity[]"  required autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="price" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="far fa-money-bill-alt"></i> Price |</label> <br>
                                <input id="price" type="text" class="form-control" name="price[]"  required  autofocus>

                            </div>
                        </div>
                        <div id="addInvoiceForm">
                        </div>
                        <div class="form-group row tools mb-0">
                            <div class="col-md-2 offset-md-9">
                                <button style="border-radius: 50px; color:white; font-weight:bold" type="submit" class="btn purple-gradient">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-6">
                            <button style="border-radius: 50px; color:white; font-weight:bold" type="submit" class=" tools btn aqua-gradient addField">
                                <i style="font-size: larger" class="fas fa-plus-circle"></i> add service | product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">


$(function() {

    $.get('/getCustomers').then(function(data) {
        createVer(data);
    });
    function createVer(data) {
        $('#customerList').html('');
      var container = $('#customerList');
        var content = "";
        data.forEach(element => {
            content += `
            <option data-id='${element.id}' value="${element.id}" data-name="${element.name}">${element.name}</option>`
    });
    $(content).appendTo(container);
    };
    $(document).ready(function() {
    $('#customerList').select2();
    });



    $('.addField').on('click', function() {

        var content = `<div class="form-group row  tools">
                            <div class="col-md-6">
                                <label for="product" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="fas fa-toolbox"></i> Service | Product |</label> <br>
                                <input id="product" type="text" class="form-control" name="product[]" required  autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="quantity" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="fas fa-balance-scale"></i> Quantity |</label> <br>
                                <input id="quantity" type="text" class="form-control" name="quantity[]"  required autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="price" style="color:#505050 !important" class="text-md-right"><i style="font-size: larger" class="far fa-money-bill-alt"></i> Price |</label> <br>
                                <input id="price" type="text" class="form-control" name="price[]"  required  autofocus>
                            </div>
                            <div class="col-md-1 text-center" style="padding-right:0 !important; position: relative; left: 93%; margin-top: -9%;" id="removeField">
                                <i style="font-size:larger; color:red !important" class="far fa-times-circle"></i>
                            </div>
                        </div>`;
        var new_div = $(content).hide();
        $('#addInvoiceForm').append(new_div);
        new_div.fadeIn(800);
    });

    $(document).on('click', '#removeField', function()
    {
        $(this).parent().remove();
    });
})



</script>

