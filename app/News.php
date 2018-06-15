<?php

namespace Isidro;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $table = 'news';
   protected $primaryKey = 'idNew';

  protected $fillable = [
      'title', 'user_id', 'created_at', 'updated_at', 'image', 'text', 'idNew',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];

  public function user()
    {
        return $this->belongsTo(User::class);
    }

  public function wasCreatedBy($user)
  {
      if( is_null($user) ) {
          return false;
      }
      return $this->user_id === $user->id;
  }

  public function imageName(){
    $imagen = class_basename($this->image);
    return $imagen;
  }

}
