<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Price_list;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function productAdd()
    {
        return view('product.create');
    }


    public function productStore(Request $request)
    {
        // ✅ Validate input
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.model'    => 'required|string|max:255',
            'items.*.price'    => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {

            // ✅ Generate PDF name
            $pdfName = 'price_list_' . time() . '.pdf';

            // ✅ Generate PDF (Blade view)
            $pdf = Pdf::loadView('pdfs.price-list', [
                'items' => $request->items,
                'date'  => now(),
            ]);

            // ✅ Store PDF in: public/storage/pricelists
            Storage::disk('public')->put(
                'pricelists/' . $pdfName,
                $pdf->output()
            );

            // ✅ Create price list DB record
            $priceList = Price_list::create([
                'file_name' => $pdfName,
                'status'    => 1,
            ]);

            // ✅ Store products linked to price list
            foreach ($request->items as $item) {
                Product::create([
                    'price_list_id' => $priceList->id,
                    'pdf_name'      => $pdfName,
                    'quantity'      => $item['quantity'],
                    'model'         => $item['model'],
                    'price'         => $item['price'],
                ]);
            }

            DB::commit();

            return redirect()->route('admin.index')->with('success', 'PDF created and products saved successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function productDelete($id)
    {
        DB::beginTransaction();

        try {

            // 🔍 Get price list
            $priceList = Price_list::findOrFail($id);

            // 🗑 Delete PDF file from storage
            $pdfPath = 'pricelists/' . $priceList->file_name;
            if (Storage::disk('public')->exists($pdfPath)) {
                Storage::disk('public')->delete($pdfPath);
            }

            // 🗑 Delete products linked to this price list
            Product::where('price_list_id', $priceList->id)->delete();

            // 🗑 Delete price list record
            $priceList->delete();

            DB::commit();

            return redirect()
                ->route('admin.index')
                ->with('success', 'Price list and related products deleted successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->route('admin.index')
                ->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

    public function productEdit($id)
    {
        $priceList = Price_list::findOrFail($id);

        $products = Product::where('price_list_id', $id)->get();

        return view('product.edit', compact('priceList', 'products'));
    }

    public function productUpdate(Request $request, $id)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.model' => 'required|string',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $priceList = Price_list::findOrFail($id);

            // Delete old products
            Product::where('price_list_id', $id)->delete();

            // Regenerate PDF
            $pdf = Pdf::loadView('pdfs.price-list', [
                'items' => $request->items,
                'date' => now(),
            ]);

            Storage::disk('public')->put(
                'pricelists/' . $priceList->file_name,
                $pdf->output()
            );

            // Insert updated products
            foreach ($request->items as $item) {
                Product::create([
                    'price_list_id' => $id,
                    'pdf_name' => $priceList->file_name,
                    'quantity' => $item['quantity'],
                    'model' => $item['model'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            return redirect()->route('admin.index')->with('success', 'Price list updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }


}
