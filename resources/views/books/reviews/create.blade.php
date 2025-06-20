@extends('layouts.app')

@section('content')
   <h1 class="mb-10 text-2xl">Add review for {{$book->title}}</h1>

   <form method="Post" action="{{route('books.reviews.store',$book)}}">
    @csrf
    <label for="">Review</label>
    <textarea name="review" id="review" class="input mb-4  @class([ 'bg-red-600' => $errors->has('review')])">
      @error('review')
      {{$message}}
      @enderror
    </textarea>
    <label for="rating">Rating</label>
    <select name="rating" id="rating" class="input mb-4">
        <option value="">Select a rating </option>
            @for ($i=1;$i<5;$i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
     

    </select>
    <button type="submit" class="btn">Add review</button>
   </form>
@endsection