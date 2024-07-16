<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['category_id','first_name','last_name','gender','email','tell','address','detail'];

    public static $rules = array(
        'category_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'tell' => 'required',
        'address' => 'required',
        'detail' => 'required',

    );

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
{
  if (!empty($category_id)) {
    $query->where('category_id', $category_id);
  }
}
public function scopeKeywordSearch($query, $keyword)
{
  if (!empty($keyword)) {
    $query->where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%');
  }
}
    public function scopeGenderSearch($query, $gender)
{
  if (!empty($gender)) {
    $query->where('gender', $gender);
  }
}

    public function scopeDateSearch($query, $date)
{
  if (!empty($date)) {
    $query->whereDate('created_at', $date);
  }
}


}
