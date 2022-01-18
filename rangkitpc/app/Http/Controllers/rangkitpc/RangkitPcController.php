<?php

namespace App\Http\Controllers\rangkitpc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rangkitpc\Product;
use App\Models\rangkitpc\Purchase;
use App\Models\rangkitpc\Purchase_Item;
// use App\Models\rangkitpc\User;
use App\Models\User;
use Carbon\Carbon;
use function PHPUnit\Framework\returnSelf;

class RangkitPcController extends Controller
{

    public function checkOut(Request $request){
        $request->validate([
            'courier' => 'required',
        ]);
        if ($request->session()->missing('builder_cart')) {
            // return jika builder_cart di session tidak ada
            return redirect('/rangkitpc/builder')->with('status', 'Builder Cart is not made');
        } else {
            // Auth::user();   //ambil data user
            // Auth::id();     //ambil id user saja

            $flag = 0;
            $builder_cart = $request->session()->get('builder_cart');

            // cek isi jika cart kosong atau tidak
            foreach ($builder_cart as $product => $value) {
                if ($value != "" && $product != "total") {
                    $flag++;
                    if ($flag > 0) {
                        break;
                    }
                }
            }
            if ($flag == 0) {
                return redirect('/rangkitpc/builder')->with('status', 'Cart empty. Please pick desired PC parts');
            }

            $pruchase = new Purchase;
            $pruchase->users_id = Auth::id();
            $pruchase->shipping = $request->courier;
            $pruchase->total = $builder_cart["total"];
            $pruchase->purchase_at = Carbon::now()->toDateTimeString();
            $pruchase->save();

            if ($pruchase) {
                foreach ($builder_cart as $product => $value) {
                    if ($value != "" && $product != "total") {
                        Purchase_Item::create([
                            'purchase_id' => $pruchase->id,
                            'product_id' => $value->id,
                        ]);
                    }
                }
                $request->session()->forget('builder_cart');
                return redirect('/rangkitpc/builder')->with('success', 'Purchased have been made! Your order now is on process');
            } else {
                // return jika gagal membuat model instance Purchase
                return redirect('/rangkitpc/builder')->with('status', 'Cart empty. Please pick desired PC parts');
            }
            return redirect('/rangkitpc/builder')->with('status', 'Something wrong with checkout (masuk if pertama)');
        }
        return redirect('/rangkitpc/builder')->with('status', 'Something wrong with checkout (lewat semua)');
    }

    public function remove(Request $request, $type){
        $builder_cart = $request->session()->get('builder_cart');
        $builder_cart['total'] = $builder_cart['total'] - $builder_cart[$type]->price;
        $builder_cart[$type] = '';
        $request->session()->put('builder_cart', $builder_cart);

        return redirect('/rangkitpc/builder');
    }

    public function builderAdd(Request $request){
        $product = Product::find($request->id);

        if (!$product) {
            return redirect('/rangkitpc/builder')->with('status', 'No Such Product Exist');
        }

        if ($request->session()->missing('builder_cart')) {

            $builder_cart = array("gpu"=>"", "cpu"=>"", "mb"=>"", "ram"=>"", "stor"=>"", "case"=>"", "psu"=>"", "moni"=>"",  "mos"=>"", "kb"=>"", "total"=>"");
            $builder_cart[$product->type] = $product;
            $builder_cart["total"] = $product->price;
            $request->session()->put('builder_cart', $builder_cart);

        } else {

            $builder_cart = $request->session()->get('builder_cart');
            $builder_cart[$product->type] = $product;
            $builder_cart["total"] = $product->price + $request->session()->get('builder_cart.total');
            $request->session()->put('builder_cart', $builder_cart);

        }

        return redirect('/rangkitpc/builder');
    }

    public function builder(Request $request){

        return view('rangkitPc.builder', [
            "title" => "PC Builder"
        ]);
    }

    public function browse(Request $request){

        $all = Product::paginate(12);

        return view('rangkitPc.browse', [
            'all' => $all,
            'title' => "PC Builder"

        ]);
    }

    public function browseType(Request $request, $type){
        $allType = Product::where('type', $type)->paginate(12);

        switch ($type) {
            case 'gpu':
                $type = 'Graphic Card';
                break;

            case 'cpu':
                $type = 'CPU';
                break;

            case 'mb':
                $type = 'Motherboard';
                break;

            case 'ram':
                $type = 'RAM/Memory';
                break;

            case 'stor':
                $type = 'Storage';
                break;

            case 'case':
                $type = 'Case';
                break;

            case 'psu':
                $type = 'Power Supply';
                break;

            case 'moni':
                $type = 'Monitor';
                break;

            case 'mos':
                $type = 'Mouse';
                break;

            case 'kb':
                $type = 'Keyboard';
                break;
        }

        return view('rangkitPc.browse', [
            'all' => $allType,
            'title' => "PC Builder",
            'type' => $type
        ]);
    }

    public function product(Request $request, $name){
        $product = Product::where('name', $name)->first();

        if (!$product) {
            return redirect('/rangkitpc/browse')->with('status', 'No Such Product Exist');
        } else {
            return view('rangkitPc.product', [
                'product' => $product,
                'price' => number_format($product->price,0,",","."),
                'title' => "Product"

            ]);
        }
    }
}
