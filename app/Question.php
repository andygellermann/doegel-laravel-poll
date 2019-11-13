<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $guarded = [];
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
    public function vote(Request $request)
    {
        DB::table('questions')
            ->where('id', $request->id)
            ->update(['votes' => $request->votes]);

        DB::table('votes')
            ->insert([
                'poll_id' => $request->poll_id,
                'fipr_token' => $request->cookie,
                'created_at' => now()
            ]);
    }
    public function position($request)
    {
        $this->update(compact('request'));
    }
    public function updatePosition($id,$position)
    {
        DB::table('questions')
            ->where('id', $id)
            ->update(['position' => $position]);
    }
}
