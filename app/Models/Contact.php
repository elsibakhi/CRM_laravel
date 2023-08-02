<?php

namespace App\Models;

use App\Models\Scopes\UserContactScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',

        'user_id',
        'gender',
        'city',
        'cv',
        'cover_path',
    ];

public static function booted(){

static::addGlobalScope(new UserContactScope());

}


    public  function contacts () :BelongsTo{
        return $this->belongsTo(Contact::class);
    }

    public static function uploadCoverImage($file){
        $path=$file->store("/","public"); // there is public desk and local desk and s3(remote , amazon desk) desk to store files// default desk is local  (public and local is local desks)
        // we can use storeAs() to determine the name of file
    
        return $path;
    }
    public static function deleteCoverImage($path){
    
    
        return   Storage::disk("public")->delete($path);;
    }
}
