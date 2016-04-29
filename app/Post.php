<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title', 'content','category_id','status','published_at','user_id','score',
    ];
    protected $dates=[
        'published_at'
    ];
    
    public function excerpt($length = 25)
    {

        return Str::words($this->content, $length);      
    }

    public function date()
    {
        setlocale(LC_TIME, 'fr');
        return Carbon::parse($this->created_at)->formatLocalized('%A %d %B %Y à %Hh%M'); 
    }
    
    public function user(){
        
        return $this->belongsTo('App\User');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function picture()
    {
        return $this->hasOne('App\picture');
    }
    public function scopeOpened($query){

        return $query->where('status','=','opended');
    }
    public function scores()
    {
        return $this->hasMAny('App\Score');
    }
    public function averageScore()
    {
        $scores = $this->scores;

        if ( count($scores) !== 0)

        {
            $total =0;
            foreach ($scores as $score) {
                $total += $score->score;
                $nb = count($scores);

                $total =ceil($total / $nb); // arrondi au supérieur

                return $total;
            }

        }
        
            else
                return null; 
    }
    /**
    * @param bool
    **/
    public function hasTag($id)
    {
        if(is_null($this->tags)) return false;

            foreach($this->tags as $tag)
            {
                if($tag->id === $id) return true;
            }

            return false;
    }

}


