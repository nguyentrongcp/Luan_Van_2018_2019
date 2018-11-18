<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportFee extends Model
{
    public function ExistedWard($id,$ward){
        return (TransportFee::where([
            ['district_id',$id],
            ['ward',$ward]
        ])->count() > 0);
    }
}
