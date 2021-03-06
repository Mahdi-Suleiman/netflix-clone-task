<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, movies!</title>
  </head>
  <body>

@include('navbar')

    <h1>Hello, movies!</h1>


    <div class="container">
        <h1>edit a movie!</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
   @endif
        <form action="{{route('movies.update', $movie)}}" method="POST" id="myForm" onsubmit="return checkboxesChecked(event)">
@csrf
@method('put')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">name</label>
                <input type="text" name="movie_name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$movie->movie_name}}">
                @error('movie_name')
                <div style="color:red;">
                  {{$message}}
                 </div>
              @enderror

            </div>

                {{-- @foreach ($genres as $genre)
                    @php
                        $found = false;
                    @endphp
                        @foreach ($movie->genres as $movie_genre )
                            @if ($genre->id == $movie_genre->id)
                            <div class="form-check">
                                <label class="form-check-label" for="flexCheckDefault{{$genre->id}}"> {{$genre->genre_name}}</label>
                                <input class="form-check-input checkboxes" type="checkbox" name="genre_id[]" value="{{$genre->id}}" id="flexCheckDefault{{$genre->id}}" checked>
                            </div>
                                @php
                                    $found = true;
                                    break;
                                @endphp
                            @endif
                            @endforeach

                            @php
                                if ($found) {
                                    continue;
                                }
                            @endphp
                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckDefault{{$genre->id}}"> {{$genre->genre_name}}</label>
                        <input class="form-check-input checkboxes" type="checkbox" name="genre_id[]" value="{{$genre->id}}" id="flexCheckDefault{{$genre->id}}">
                    </div>
                @endforeach --}}
                 @foreach ($genres as $genre)
                 <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault{{$genre->id}}"> {{$genre->genre_name}}</label>
                    <input class="form-check-input checkboxes" type="checkbox" name="genre_id[]" value="{{$genre->id}}" id="flexCheckDefault{{$genre->id}}" {{$movie_genre->contains($genre->id)? 'checked':'' }}>
                </div>

                {{-- {{dd($movie_genre->contains($genre->id))}} --}}
@endforeach
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="movie_description" id="exampleFormControlTextarea1" rows="3">{{$movie->movie_description}}</textarea>
                @error('movie_description')
                <div style="color:red;">
                  {{$message}}
                 </div>
              @enderror

            </div>


            <input type="submit" value="submit" class="btn btn-primary mb-3">
        </form>
        {{-- <button type="button" onclick="showCheckboxes()">showCheckboxes</button> --}}
        <script>
            function checkboxesChecked (e){
                // const myForm = document.getElementsById('myForm');
                const checkboxes = document.getElementsByClassName('checkboxes');
                for (let index = 0; index < checkboxes.length; index++) {
                    // console.log(checkboxes[index].checked);
                    if(checkboxes[index].checked){
                        return true
                    }
                }
                e.preventDefault();
                alert('please choose at least on genre');
                return false;
            }
        </script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
