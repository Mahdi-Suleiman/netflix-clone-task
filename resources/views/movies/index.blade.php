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


    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Genres</th>
            {{-- <th scope="col">Genre 2</th> --}}
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movies as $movie)
            <tr>
              <th scope="row">{{$movie->id}}</th>
              <td>{{$movie->movie_name}}</td>
              <td>{{$movie->movie_description}}</td>
              <td>{{$movie->genre_name}}</td>
            </tr>
            @endforeach --}}

            {{-- @for ($i=0; $i < count($movies); $i++)
             <tr>
                <th scope="row">{{$movies[$i]->id}}</th>
                @if ( $i != count($movies)-1 && $movies[$i]->movie_name == $movies[$i+1]->movie_name)
                <td>{{$movies[$i]->movie_name}}</td>
                <td>{{$movies[$i]->movie_description}}</td>
                <td>{{$movies[$i]->genre_name}}</td>
                <td>{{$movies[$i+1]->genre_name}}</td>
                <div style="display: none;">
                    {{$i++}}
                  </div>
                @else
                <td>{{$movies[$i]->movie_name}}</td>
                <td>{{$movies[$i]->movie_description}}</td>
                <td>{{$movies[$i]->genre_name}}</td>
                <td></td>
                @endif
                <td>
                    <form action="{{URL::to('movies/'. $movies[$i]->id)}}" method="GET">
                        @csrf
                        <input type="submit" value="Show" class="btn btn-primary"/>
                    </form>
                </td>
                <td>
                    <form action="{{route('movies.edit', $movies[$i]->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="submit" value="Edit" class="btn btn-success"/>
                    </form>
                </td>
                <td>
                    <form action="{{route('movies.destroy', $movies[$i]->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"/>
                    </form>
                </td>
              </tr>
            @endfor --}}

            @foreach ($movies as $movie)
            <tr>
                <th scope="row">{{$movie->id}}</th>
                {{-- @if ( $i != count($movies)-1 && $movies[$i]->movie_name == $movies[$i+1]->movie_name) --}}
                <td>{{$movie->movie_name}}</td>
                <td>{{$movie->movie_description}}</td>
                <td>
                    @foreach ($movie->genres as $genre)
                        {{$genre->genre_name}}
                        <br/>
                    @endforeach
                </td>
                {{-- @else --}}
                {{-- <td>{{$movies[$i]->movie_name}}</td>
                <td>{{$movies[$i]->movie_description}}</td>
                <td>{{$movies[$i]->genre_name}}</td>
                <td></td> --}}
                {{-- @endif --}}
                <td>
                    <form action="{{route('movies.show', $movie)}}" method="GET">
                        @csrf
                        <input type="submit" value="Show" class="btn btn-primary"/>
                    </form>
                </td>
                <td>
                    <form action="{{route('movies.edit', $movie)}}" method="POST">
                        @csrf
                        @method('get')
                        <input type="submit" value="Edit" class="btn btn-success"/>
                    </form>
                </td>
                <td>
                    <form action="{{route('movies.destroy', $movie)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"/>
                    </form>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
