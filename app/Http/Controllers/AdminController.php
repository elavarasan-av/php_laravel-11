<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class AdminController extends Controller
{
   public function index()
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $categories = Category::orderBy('id', 'asc')->paginate(3);
         return View('Admin.index', compact('categories'));
      }
   }

   public function addCategory()
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         return View('Admin.cateCreate');
      }
   }

   public function CateStore(Request $request)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $request->validate([
            'CategoryName' => 'required',
            'Catimage' => 'required|mimes:jpeg,jpg,png,gif',
         ], [
            'Catimage.mimes' => 'selcet the image was about format jpeg - jpg - png - gif ',
         ]);

         $imageName = time() . "." . $request->Catimage->Extension();
         $request->Catimage->move(public_path('/images/categories'), $imageName);

         $data = $request->except('_token');
         $data = [
            'CategoryName' => $request->CategoryName,
            'Catimage' => $imageName,
            'Status' => ($request->Status == null ? 0 : 1),
         ];
         Category::create($data);
         return redirect()->route('home')->withSuccess('Category creat has been successfully');
      }
   }


   public function cateDetails($id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $category = Category::where('id', $id)->first();
         return view('Admin.cateDetails', ['category' => $category]);
      }
   }



   public function CateEdit($id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $category = Category::where('id', $id)->first();
         return view('Admin.CateEdit', ['category' => $category]);
      }
   }



   public function CateUpdate(Request $request, $id, Category $category)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $category = Category::where('id', $id)->first();

         if ($request->image != '') {
            $path = public_path('images/categories/');

            $file_old = $path . $request->hidpic;
            // unlink($file_old);
            File::delete($file_old);

            $file = $request->image;
            $filename = time() . "." . $request->image->Extension();
            $file->move($path, $filename);
         } else {
            $filename = $category->Catimage;
         }
         if ($request->status == null) {
            $active = 0;
         } else {
            $active = 1;
         }
         $category->CategoryName = $request->categoryName;
         $category->Catimage = $filename;
         $category->Status = $active;
         $category->save();
         return redirect()->route('home')->withSuccess('Category Updated has been successfully');
      }
   }

   public function cateDelete($id, Request $request)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $category = Category::where('id', $id)->first();

         $pth = public_path('images/categories/');
         $filedel = $pth . $request->imgvl;
         File::delete($filedel);

         $category->delete();
         return redirect()->route('home')->withSuccess(' Category Deleted has been successfully');
      }
   }



   public function ProdList()
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $prod = Product::orderBy('id', 'asc')->paginate(5);
         return View('Admin.ProdList', compact('prod'));
      }
   }

   public function ProdCreate()
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $categories = Category::get()->where('Status', 1);
         return View('Admin.ProdCreate', compact('categories'));
      }
   }

   public function ProdStore(Request $request)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $request->validate([
            'ProductName' => 'required',
            'categoryName' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'prdimage' => 'required|mimes:jpeg,png,jpg,gif,svg',
         ], [
            'price.numeric' => 'enter the value amount'
         ]);

         $imageName = time() . "." . $request->prdimage->Extension();
         $request->prdimage->move(public_path('/images/products'), $imageName);
         if ($request->prodstatus == null) {
            $active = 0;
         } else {
            $active = 1;
         }
         $product = new Product;
         $product->ProductName = $request->ProductName;
         $product->Category = $request->categoryName;
         $product->Description = $request->description;
         $product->Prodimg = $imageName;
         $product->Price = $request->price;
         $product->ProdStatus = $active;
         $product->save();
         return redirect()->route('product.list')->withSuccess('Products Added has been successfully');
      }
   }

   public function ProdDetails($id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $product = Product::where('id', $id)->first();
         return View('Admin.ProdDetails', ['product' => $product]);
      }
   }

   public function ProdEdit($id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $product = Product::where('id', $id)->first();
         $category = Category::get()->where('Status', 1);
         return View('Admin.ProdEdit', compact('product', 'category'));
      }
   }

   public function ProdUpdate(Request $request, $id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $product = Product::where('id', $id)->first();
         // image update
         if ($request->prdimage != "") {
            // delete old img
            $path = public_path('/images/products/');

            $old = $path . $request->prdpic;
            File::delete($old);
            //save new ing
            $file = $request->prdimage;
            $imageName = time() . "." . $request->prdimage->Extension();
            $file->move($path, $imageName);
         } else {
            $imageName = $product->Prodimg;
         }
         if ($request->prodstatus == null) {
            $active = 0;
         } else {
            $active = 1;
         }
         $product->ProductName = $request->ProductName;
         $product->Category = $request->categoryName;
         $product->Description = $request->description;
         $product->Prodimg = $imageName;
         $product->Price = $request->price;
         $product->ProdStatus = $active;
         $product->save();
         return redirect()->route('product.list')->withSuccess('Products Update has been successfully');
      }
   }

   public function ProdDelete(Request $request, $id)
   {
      if (session()->get('id') == null) {
         return redirect()->route('login');
      } else {
         $prod = Product::where('id', $id)->first();

         File::delete(public_path('/images/products/') . $request->pdimg);
         $prod->delete();
         return redirect()->route('product.list')->withSuccess('Products Deleted Successfully!!!!');
      }
   }

   public function OrderStatus()
   {
      $order = DB::table('Orders')->join('products', 'orders.ProductId', '=', 'products.id')->paginate(6);
      return View('Admin.Status', compact('order'));
   }

   public function OrderUpdate(Request $request)
   {
      $data = Order::where('OrderNo', $request->OrderNo)->first();
      $data->Status = $request->Status;
      $data->save();
      return back();
   }
}
