<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        $articles = Article::latest()->get();
        $users = User::with('role')->get();
        $roles = Role::all();
        
        return view('pages.admin', compact('articles', 'users', 'roles'));
    }

    
    public function destroyArticle($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->route('admin')->with('success', 'Статья удалена!');
    }

    
    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin')->with('success', 'Роль пользователя обновлена!');
    }
}