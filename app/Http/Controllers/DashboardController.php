<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $product = Product::count();
        $category = Category::count();
        $user = User::count();

        return view("dashboard.home", compact('product', 'category', 'user'));
    }

    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function users()
    {
        $users = User::paginate(10);
        return view("dashboard.users", compact('users'));
    }

    public function profile()
    {
        return view("dashboard.profile");
    }
}
