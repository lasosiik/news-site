<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
{
    
    $articles = Article::with(['category', 'user'])->latest()->get(); 
    return view('pages.home', compact('articles'));
}

    
    public function category(Request $request)
{
    $categoryId = $request->query('category_id', 1); 
    $category = Category::find($categoryId);
    $selectedCategory = $category ? $category->name : 'Неизвестно';
    $articles = Article::where('category_id', $categoryId)->latest()->get();
    
    return view('pages.category', compact('articles', 'selectedCategory', 'categoryId'));
}

public function store(Request $request)
{
    $request->validate([
        'heading' => 'required|max:255',
        'text' => 'required',
        'category_id' => 'required',
    ]);

    Article::create([
        'heading' => $request->heading,
        'text' => $request->text,
        'category_id' => $request->category_id,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('home')->with('success', 'Статья успешно создана!');
}
}