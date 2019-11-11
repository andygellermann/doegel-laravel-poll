<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class votes extends Model
{
    public function check($poll, $fipr){
        return DB::table('votes')->select('id')->where([['poll_id', '=', $poll],['fipr_token', '=', $fipr]])->first();
    }
}
