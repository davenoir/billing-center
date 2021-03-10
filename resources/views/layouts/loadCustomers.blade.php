<div id="load">
    @foreach($customers as $customer)
        <div class="row tools">
            <div class="col-md-10 offset-md-1 col-sm-12 col-12 customerCard" style="border: 2px solid #E8E8E8; border-radius: 8px; padding-top:1.2%; padding-bottom:1.2%; box-shadow: 0px 0px 19px -17px rgba(0, 0, 0, 0.75); margin-bottom:0.8%">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-10">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                        <h6>
                            <i class="far fa-user"></i> Customer | <span style="font-weight:900"><b>{{$customer->name}} </b> </span>
                        </h6>
                        <hr>
                        <p> <i class="fas fa-map-marker-alt"></i> Address | <b style="font-weight: 900">{{$customer->address}}</b></p>
                        <p><i class="fas fa-at"></i> E-mail | <b style="font-weight: 900">{{$customer->email}}</b></p>
                        <p><i class="fas fa-phone"></i> Phone | <b style="font-weight: 900">{{$customer->phone}}</b></p>
                            </div>
                            <div class="col-md-2 offset-md-2">
                            <a href="/viewCustomer/{{$customer->id}}"><button type="button" style="border-radius:20px; font-size:small; color:white" class="btn btn peach-gradient"><b>View</b></button></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row text-right">
        <div class="col-md-11">
        <span style="color:#808080; font-style:italic;font-family: 'Ubuntu', sans-serif; font-weight:900">Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} from total of {{$customers->total()}} customers</span>
        </div>
    </div>

</div>
{{ $customers->links() }}


