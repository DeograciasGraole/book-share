<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    //
    use HasFactory;

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function scopeTitle(Builder $query, string  $title):Builder{

        return $query->where('title','Like', '%'. $title.'%');
            }

     public function scopeWithReviewsCount(Builder $query ,$from=null ,$to=null):Builder{
        return  $query->withCount(['reviews'=>fn(Builder $q)=>$this->dateRangeFilter($q,$from,$to)]);
    }

    public function scopeWithAvgRting(Builder $query ,$from=null ,$to=null):Builder{
        return $query->withAvg(['reviews'=>fn(Builder $q)=>$this->dateRangeFilter($q,$from,$to)],'rating');
    }

    public function  scopePopular(Builder $query ,$from=null ,$to=null):Builder{
        return $query->withReviewsCount()->orderBy('reviews_count','desc');
    }

   
    // public function  scopePopular(Builder $query ,$from=null ,$to=null):Builder{
    //     return $query->withCount('reviews')->orderBy('reviews_count','desc');
    // }  for studing

    public function scopeHighestRated(Builder $query,$from=null ,$to=null):Builder{
        return $query->withAvg(['reviews'=>fn(Builder $q)=>$this->dateRangeFilter($q,$from,$to)],'rating')->orderBy('reviews_avg_rating', 'desc');

    }

public function  scopeMinReviews(Builder $query,$minReviews):Builder{
    return $query->having('reviews_count', '>=',$minReviews)  ;
}

    private function dateRangeFilter(Builder $query, $from=null, $to=null){
        if ($from && !$to){
            $query->where(
                'created','>=',$from
            );
         }elseif(!$from && $to){
         $query->where('created_at','<=',$to);
         }elseif($from && $to){
            $query->whereBetween('created_at',[$from,$to]);
         }
    }
    public function scopePopularLastMonth(Builder $query):Builder{
       return $query->popular(now()->subMonth(),now())
       ->highestRated(now()->subMonth(),now())
       ->minReviews(2);  
    }

    public function scopeHighestRatedLastMonth(Builder $query):Builder{
        return $query->highestRated(now()->subMonth(),now())->popular(now()->subMonth(),now())
        
        ->minReviews(2);  
     }

    public function scopePopularLast6Months(Builder $query):Builder{
        return $query->popular(now()->subMonths(6),now())
        ->highestRated(now()->subMonths(6),now())
        ->minReviews(5);  
     }


      public function scopeHighestRatedLast6Months(Builder $query):Builder{
        return $query->highestRated(now()->subMonths(6),now())->popular(now()->subMonths(6),now())
        
        ->minReviews(5);  
     }

    

}
