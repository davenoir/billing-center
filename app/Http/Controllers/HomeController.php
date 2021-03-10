<?php

namespace App\Http\Controllers;

use PDF;
use App\Invoice;
use App\Product;
use App\Customer;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invoices= Invoice::orderBy('id', 'desc')->paginate(5);

        return view('home', compact('invoices'));
    }

    public function customers()
    {
        $customers= Customer::orderBy('id', 'asc')->paginate(5);

        //dd($customers);

        return view('customers', compact('customers'));

    }

    public function markPayed($id)
    {

            $invoice=Invoice::find($id);
            $products=Product::where('invoice_id', '=', $invoice->id)->get();

            $invoices= Invoice::orderBy('id', 'desc')->paginate(5);
            $invoice->is_payed = 1;
            $invoice->save();

            foreach($products as $product)
            {
                $product->is_payed = 1;
                $product->save();
            }

            return redirect()->back()->with('successPay', 'Invoice has been marked as paid');


    }

    public function searchInvoice(Request $request)
    {
        $search = $request->search;
        $invoices = Invoice::where('id','LIKE','%'.$search."%")->orWhere('created_at','LIKE','%'.$search."%")->orWhereHas('customer', function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })
     ->get();



        return view('layouts.loadSearch', compact('invoices'));



    }

    public function searchInvoiceUnpayed(Request $request)
    {
        $search = $request->search;

        $invoices= Invoice::where('id','LIKE','%'.$search."%")->orWhere('created_at','LIKE','%'.$search."%")->orWhereHas('customer', function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })
   ->get();



        return view('layouts.loadSearchUnpayed', compact('invoices'));



    }

    public function searchCustomer(Request $request)
    {
        $customers = Customer::where('name','LIKE','%'.$request->search."%")->orWhere('address','LIKE','%'.$request->search."%")
        ->orWhere('email','LIKE','%'.$request->search."%")->orWhere('phone','LIKE','%'.$request->search."%")->get();

        return view('layouts.loadCustomersSearch', compact('customers'));
    }

    public function statistics()
    {
        $customers= count(Customer::all());
        $invoices= count(Invoice::all());
        $invoicesPayed= count(Invoice::where('is_payed', '=', true)->get());
        $invoicesNotPayed= count(Invoice::where('is_payed', '=', false)->get());

        $products = Product::all();
        $productsPayed = Product::where('is_payed','=',true)->get();

        return view('statistics',compact('customers', 'invoicesPayed', 'invoices', 'invoicesNotPayed', 'products', 'productsPayed'));
    }

    public function viewCustomer($id)
    {
            $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());


            return view('customerProfile', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed'));


    }

    public function unpayed()
    {
        $invoices= Invoice::where('is_payed', '=', false)->orderBy('id', 'desc')->paginate(5);

        return view('unpayed', compact('invoices'));
    }

    public function addCustomer()
    {
        return view('addCustomer');
    }

    public function addCustomerForm(Request $request)
    {

        $customer= new Customer();

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        $customer->save();


        $invoices=Invoice::where('customer_id', '=', $customer->id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $customer->id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $customer->id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $customer->id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $customer->id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $customer->id)->where('is_payed','=', false)->get());

        return view('customerProfile', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed'))->withSuccess('Customer has been added');

    }

    public function editCustomer($id)
    {
        $customer = Customer::find($id);

        $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
        $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

        $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

        $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
        $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
        $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());


        return view('editCustomer', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed'));
    }

    public function saveEditCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        $customer->save();

        $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
        $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

        $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

        $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
        $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
        $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());


        return view('customerProfile', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed'))->withSuccess('Changes have been saved');
    }


    public function viewInvoice($id, $invoiceId)
    {
            $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $viewInvoice = Product::where('invoice_id', '=', $invoiceId)->where('price', '!=', null)->get();

            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();


            return view('viewInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'));


    }

    public function downloadPDF($id, $invoiceId)
    {


        $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $viewInvoice = Product::where('invoice_id', '=', $invoiceId)->get();

            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();




            $pdf = \PDF::loadView('pdf', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'));

            return $pdf->download('INV_NO_'.$invoiceId.'.pdf');

    }

    public function viewCustomerCreateInvoice($id)
    {
            $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());


            return view('createInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed'));


    }

    public function addInvoiceToCustomer(Request $request, $id)
    {
            $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $newInvoice = new Invoice();
            $newInvoice->customer_id = $id;
            $newInvoice->is_payed = false;
            $newInvoice->save();

            for($i=0; $i < count($request->product); $i++)
            {
                $newProduct= new Product();
                $newProduct->desc = $request->product[$i];
                $newProduct->price = $request->price[$i];
                $newProduct->customer_id = $id;
                $newProduct->is_payed = false;
                $newProduct->invoice_id = $newInvoice->id;
                $newProduct->quantity = $request->quantity[$i];
                $newProduct->save();


            }

            $viewInvoice = Product::where('invoice_id', '=', $newInvoice->id)->get();

            $showInvoiceId = Invoice::where('id', '=', $newInvoice->id)->get();

            return view('viewInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'))->withSuccess('Invoice has been created');
    }


    public function editInvoice($id, $invoiceId)
    {
        $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $editInvoice = Product::where('invoice_id', '=', $invoiceId)->where('price', '!=', null)->get();
            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();

            return view('editInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'editInvoice', 'showInvoiceId'));
    }


    public function editInvoiceSave(Request $request, $invoiceId, $id)
    {
        $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $viewInvoice = Product::where('invoice_id', '=', $invoiceId)->where('price', '!=', null)->get();

            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();


            $editProducts = Product::where('invoice_id', '=', $invoiceId)->get();
            foreach($editProducts as $editProduct)
            {
                $editProduct->delete();
            }



            for($i=0; $i < count($request->product); $i++)
            {
                $editProducts= new Product();
                $editProducts->desc = $request->product[$i];
                $editProducts->price = $request->price[$i];
                $editProducts->customer_id = $id;
                $editProducts->is_payed = false;
                $editProducts->invoice_id = $invoiceId;
                $editProducts->quantity = $request->quantity[$i];
                $editProducts->save();


            }


            return view('viewInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'))->withSuccess('Invoice has been sucessfully changed');
    }


    public function globalCreateInvoice()
    {
        $customers = Customer::all();
        return view('globalCreateInvoice', compact('customers'));
    }

    public function getCustomers(Request $request)
    {
        $customers= Customer::all();

        if($request->isMethod('GET')) {
            return response()->json($customers);
            }

    }

    public function createGlobalInvoice(Request $request)
    {
        $customer = Customer::find($request->customer);
            $invoices=Invoice::where('customer_id', '=', $customer->id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $customer->id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $customer->id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $customer->id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $customer->id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $customer->id)->where('is_payed','=', false)->get());

            $newInvoice = new Invoice();
            $newInvoice->customer_id = $customer->id;
            $newInvoice->is_payed = false;
            $newInvoice->save();

            for($i=0; $i < count($request->product); $i++)
            {
                $newProduct= new Product();
                $newProduct->desc = $request->product[$i];
                $newProduct->price = $request->price[$i];
                $newProduct->customer_id = $customer->id;
                $newProduct->is_payed = false;
                $newProduct->invoice_id = $newInvoice->id;
                $newProduct->quantity = $request->quantity[$i];
                $newProduct->save();


            }

            $viewInvoice = Product::where('invoice_id', '=', $newInvoice->id)->get();

            $showInvoiceId = Invoice::where('id', '=', $newInvoice->id)->get();

            return view('viewInvoice', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'))->withSuccess('Invoice has been created');

    }
    public function downloadConsent($id)
    {


        $customer = Customer::find($id);




            $pdf = \PDF::loadView('consent', compact('customer'));

            return $pdf->download('Statement_'.$customer->name.'.pdf');

    }

    public function contract($id, $invoiceId)
    {


        $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $viewInvoice = Product::where('invoice_id', '=', $invoiceId)->get();

            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();




            $pdf = \PDF::loadView('contract', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'));

            return $pdf->download('Contract_'.$customer->name.'.pdf');

    }

    public function sendPDF($id, $invoiceId)
    {


        $customer = Customer::find($id);
            $invoices=Invoice::where('customer_id', '=', $id)->orderBy('id', 'desc')->paginate(5);
            $products=Product::where('customer_id', '=', $id)->where('is_payed', '=', true)->get();

            $productsUnpayed=Product::where('customer_id', '=', $id)->where('is_payed', '=', false)->get();

            $invoicesAll= count(Invoice::where('customer_id', '=', $id)->get());
            $invoicesPayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', true)->get());
            $invoicesUnpayed= count(Invoice::where('customer_id', '=', $id)->where('is_payed','=', false)->get());

            $viewInvoice = Product::where('invoice_id', '=', $invoiceId)->get();

            $showInvoiceId = Invoice::where('id', '=', $invoiceId)->get();




            $invoice = \PDF::loadView('pdf', compact('customer', 'invoices', 'products', 'invoicesAll', 'invoicesPayed', 'invoicesUnpayed', 'productsUnpayed', 'viewInvoice', 'showInvoiceId'));


                $pdf = $invoice->output();
                $data = [
                    'details' => 'This is an autmatically generated e-mail.',
                    'manager_name' => $customer->name
                ];
                Mail::send('mails.mail', $data, function ($message) use ($customer, $pdf) {
                   $message->subject('Invoice delivery');
                   $message->from('demo.invoice.center@gmail.com');
                   $message->to($customer->email);
                   $message->attachData($pdf, 'invoice.pdf', [
                       'mime' => 'application/pdf',
                   ]);
                });


                 return redirect()->back()->with('successMail', 'Invoice has been sucessfully sent via e-mail');

    }

}

