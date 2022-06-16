<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Picqer;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // product code section

        $product_code = $request->product_code;
            $products = new Product;

            // images section

                if ($request->hasFile('product_image')) {
                    $file = $request->file('product_image');
                    $file->move(public_path(). '/product/images', $file->getClientOriginalName());
                    $product_image = $file->getClientOriginalName();
                    $products->product_image = $product_image;
                }

                //barcode images section

                    $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
                    file_put_contents('product/barcodes/' .$product_code . '.jpg',
                    $generator->getBarcode( $product_code,  $generator::TYPE_CODE_128, 3, 50,));

        // Product::create($request->all());
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->brand = $request->brand;
        $products->alert_stock = $request->alert_stock;
        $products->description = $request->description;
        $products->barcode = $product_code . '.jpg';
        $products->save();


        return redirect()->back()->with('success', 'thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {
        $product_code = $request->product_code;
            $products = Product::find($products);

            // images section

                if ($request->hasFile('product_image')) {
                    if ($products->product_image != '') {
                        $proImage_path = public_path() . '/product/images/' . $products->product_image;
                        unlink($proImage_path);
                    }
                    $file = $request->file('product_image');
                    $file->move(public_path(). '/product/images', $file->getClientOriginalName());
                    $product_image = $file->getClientOriginalName();
                    $products->product_image = $product_image;
                }

                //barcode images section
                if ($request->product_code != '' && $request->product_code != $products->product_code) {

                    $unique = Product::where('product_code', $product_code)->first();

                    if ($unique){
                        return redirect()->back()->with('error', 'Mã sản phẩm đã tồn tại');
                    }

                    if ($products->barcode != '') {
                        $barcode_path = public_path() . '/product/barcodes/' . $products->barcode;
                        unlink($barcode_path);
                    }
                    $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
                    file_put_contents('product/barcodes/' .$product_code . '.jpg',
                    $generator->getBarcode( $product_code,  $generator::TYPE_CODE_128, 3, 50,));
                    $products->barcode = $product_code . '.jpg';
                }

        // Product::create($request->all());
                    $products->product_name = $request->product_name;
                    $products->product_code = $product_code;
                    $products->quantity = $request->quantity;
                    $products->price = $request->price;
                    $products->brand = $request->brand;
                    $products->alert_stock = $request->alert_stock;
                    $products->description = $request->description;
                    $products->save();

        // $product->update($request->all());
        return redirect()->back()->with('success', 'cập nhật sản phẩm thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'xóa sản phẩm thành công');
    }

    public function GetProductBarcodes(){
        $productsBarcode = Product::select('barcode', 'product_code')->get();
        return view('products.barcode.index', compact('productsBarcode'));
    }
}
