<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $product;

    protected $productService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_categories = ProductCategory::all();
        $product = Product::all();
        return view('admin.pages.product.index', compact('product_categories', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_categories = ProductCategory::all();
        $product = Product::all();
        return view('admin.pages.product.modal.addproduct', compact('product_categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            // Sesuaikan dengan jenis file gambar yang diizinkan
        ]);

        // Upload gambar produk
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Simpan data produk ke database
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->image = $imagePath; // Simpan path gambar yang diunggah
        $product->save();

        // Redirect kembali ke halaman produk atau sesuai kebijakan Anda
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan ');

        // Proses penyimpanan data produk ke database
        // ...

        // Redirect kembali ke halaman produk atau sesuai kebijakan Anda
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product_categories = ProductCategory::all();
        $product = Product::findOrFail($product);
        return view('admin.pages.product.show-detail.detail', compact('product', 'product_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $product = Product::find($id);
        // You may also need to fetch the product categories for your select dropdown here.
        // Example:
        $product_categories = ProductCategory::all();

        return view('admin.pages.product.show-detail.edit-product', compact('product', 'product_categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:product_categories,id',
            // Add any other validation rules for the image if needed.
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            // Handle image upload and update logic here.
            // You might want to store the image in a specific directory and update the product's image field.
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
    }

    public function destroy($product)

    {
        try {
            DB::beginTransaction();
            $product = Product::findOrFail($product);
            $product->delete();
            DB::commit();
            return to_route('admin.Product.index')->with('success', "data Product sudah dihapus");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
