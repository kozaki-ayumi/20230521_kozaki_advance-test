<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
        
    ];

     public function scopeNameEqual($query,$searchfullname)
     {
           if (!empty($searchfullname)){
          
           $query->where('fullname', 'like', '%' . $searchfullname . '%');
            }
     }

     public function scopeGenderEqual($query,$searchgender)
     {
           $query->where('gender', 'like', '%' . $searchgender . '%');
     }

     public function scopeEmailEqual($query,$searchemail)
     {
           if (!empty($searchemail)) {
           $query->where('email','like', '%' .$searchemail . '%');
           }
    }  

    public function scopeFromDateEqual($query, $fromdate)
     {
            if (!empty($fromdate) ){
            $query->whereDate('created_at','>=' .$fromdate);
            }
      
       } 
     
     public function scopeUntilDateEqual($query, $untildate)
     {
            if (!empty($untildate)){
            $query->whereDate('created_at','<=' .$untildate);
            }
      
       }    

}

