<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //db


class UserController extends Controller
{

   public function UserIndex()
   {
      if (session()->get('id') == null) {
         session()->put('count', 0);
      } else {

         $count = Cart::where('CustomerId', session()->get('id'))->count();
         session()->put('count', $count);
      }
      $category = Category::get();
      return View('user.index', compact('category'));
   }

   public function Login()
   {
      if (session()->get('id') == null) {
         session()->put('count', 0);
      } else {

         $count = Cart::where('CustomerId', session()->get('id'))->count();
         session()->put('count', $count);
      }
      return View('user.login');
   }

   public function Registration()
   {
      if (session()->get('id') == null) {
         return View('user.registration');
      } else {
         return redirect()->route('profile');
      }
   }

   public function Signup(Request $request)
   {

      $request->validate([
         'cus_name' => 'required',
         'mobile' => 'required|numeric|unique:customers,mobile',
         'email' => 'required|email|unique:customers,email',
         'password' => 'required'
      ], [
         'mobile.unique' => 'This Number alredy exist',
         'mobile.numeric' => 'Enter the Valid Mobile Number',
         'email.unique' => 'This Mail id alredy exist',
         'email.email' => 'Enter the Valid Email'
      ]);
      $data = $request->except('_token');
      Customer::create($data);
      return redirect()->route('login')->withInfom("User Registration Successfully!!!");
   }

   public function Signin(Request $re)
   {
      $re->validate([
         'email' => 'required',
         'password' => 'required'
      ], [
         'email.required' => 'Enter the Email',
         'password.required' => 'Enter the  Password',
      ]);
      if ($data = Customer::where('email', $re->email)->where('password', $re->password)->first()) {
         session()->put('id', $data->id);
         Session()->put('name', $data->cus_name);
         Session()->put('email', $data->email);
         Session()->put('mobile', $data->mobile);
         Session()->put('date', $data->created_at);


         if ($data->position == 'Admin') {
            return redirect()->route('home')->withSuccess($data->cus_name . ' Login Successfully');
         } else {
            return redirect()->route('default')->withInfom('WellCome !!! ' . $data->cus_name);
         }
      } else {
         return back()->withError('Invalid credentials');
      }
   }


   public function Logout()
   {
      // session::forget('id');
      // session::forget('name');
      session::flush();  // all session clear
      return redirect()->route('login');
   }

   public function About()
   {
      return View('user.about');
   }

   public function Products($id)
   {
      if ($id == 1) {
         $products = Product::where('Category', 'Computers')->get();
         session()->put('titel', "Computers");
         return View('user.products', compact('products'));
      } elseif ($id == 2) {
         $products = Product::where('Category', 'Laptops')->get();
         session()->put('titel', 'Laptops');
         return View('user.products', compact('products'));
      } elseif ($id == 3) {
         $products = Product::get();
         session()->put('titel', 'Products');
         return View('user.products', compact('products'));
      } else {
         $products = Product::where('Category', $id)->get();
         session()->put('titel', $id);
         return View('user.products', compact('products'));
      }
   }

   public function Details($id)
   {
      $product = Product::where('id', $id)->first();
      return View('user.details', compact('product'));
   }

   public function Profile()
   {
      $user = Customer::where('id', session()->get('id'))->first();

      $order = DB::table('orders')->join('products', 'orders.ProductId', '=', 'products.id')->where('orders.CustomerId', session()->get('id'))->paginate(6);


      return View('user.profile', compact('order', 'user'));
   }
}
