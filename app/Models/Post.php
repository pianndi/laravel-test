<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // protected $fillable = ['title','author','excerpt','body'];
  protected $guarded = ['id', 'created_at', 'updated_at'];
  protected $with = ['category', 'author'];

  public function scopeFilter($query, array $filters)
  {
    // if (isset($filters['search'])) {
    //       return $query
    //         ->where('title', 'like', '%' . $filters['search'] . '%')
    //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
    //     }
    $query->when(
      $filters['search'] ?? false,
      fn($query, $search) => $query
        ->where('title', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%')
        ->orWhere('excerpt', 'like', '%' . $search . '%')
    );

    $query->when($filters['category'] ?? false, function ($query, $category) {
      $query->whereHas('category', function ($query) use ($category) {
        return $query->where('slug', $category);
      });
    });
    $query->when(
      $filters['author'] ?? false,
      fn($query, $author) => $query->whereHas('author', function ($query) use (
        $author
      ) {
        $query->where('username', $author);
      })
    );
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function getRouteKeyName(): string
{
    return 'slug';
}
}
