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
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
             <tr>
                <th scope="row">{{$movie->id}}</th>
                <td>{{$movie->movie_name}}</td>
                <td>{{$movie->movie_description}}</td>
                <td>
                    @foreach ($movie->genres as $genre)
                        {{$genre->genre_name}}
                        <br/>
                    @endforeach
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
        </tbody>
      </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
