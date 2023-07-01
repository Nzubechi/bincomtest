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
        <h5>Store Results for {{$pollingunit->polling_unit_name}}</h5>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif 

    <div class="row">
        <form action="{{route('storepollingunitresult', $pollingunit->uniqueid)}}" method="POST">
            @csrf

            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Agent in Charge</label>
                  <input type="text" class="form-control" name="agent" placeholder="" value="">
                </div>
              </div>

            @foreach ($parties as $party)
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Party Abbreviation</label>
                  <input type="text" class="form-control" name="{{$party->partyname}}" placeholder="" value="{{$party->partyname}}">
                </div>
                <div class="col">
                    <label for="" class="form-label">Party Score</label>
                  <input type="text" class="form-control" placeholder="" name="{{$party->partyname}}score" value="">
                </div>
              </div>
            @endforeach

             <div class="my-3">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
             </div>

        </form>

    </div>
    

      <div class="text-center my-5">
        <a href="{{route('loadallpollingunits')}}" class="btn btn-lg btn-dark">Go Back</a>
      </div>
    
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>