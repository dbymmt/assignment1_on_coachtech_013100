<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // クエリ作成用
    public function scopeBuildQuery($query, $keyword = null, $gender = null, $category_id = null, $date = null) {
        
        // キーワード
        if ($keyword) {
                // $keyword = $request->input('keyword');
                $query->where(function ($query) use ($keyword) {
                    $query->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('email', 'like', "%$keyword%");
                });
            }

        // 性別
        if ($gender) {
            $query->where('gender', $gender);
        }

        // カテゴリーID
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // created_at
        if ($date) {
            $query->whereDate('created_at', $date);
        }

        return $query;
    }
}
