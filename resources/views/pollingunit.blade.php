<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
   <div class="container">
    
    <div class="my-4 text-center">
        <h5>Results for {{$pollingunit->polling_unit_name}}</h5>
        <h6>Unique ID = {{$pollingunit->uniqueid}}</h6>
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Party Abbreviation</th>
            <th scope="col">Party Score</th>
            <th scope="col">Entered By</th>
            <th scope="col">Date Entered</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pollingunitresult as $puresult)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$puresult->party_abbreviation}}</td>
                <td>{{$puresult->party_score}}</td>
                <td>{{$puresult->entered_by_user}}</td>
                <td>{{$puresult->date_entered}}</td>
                <td><a href="#">Some Action</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>

      <div class="text-center my-5">
        <a href="{{route('loadallpollingunits')}}" class="btn btn-lg btn-dark">Go Back</a>
      </div>
    
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>