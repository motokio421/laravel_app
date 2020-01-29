<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','user_id']; // 追記  $fillableにカラムtittle代入　protected クラス内または派生したクラスからアクセス可能
    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
}
