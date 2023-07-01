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
        <h5>All Polling Units</h5>
    </div>
        
    <div class="my-2">
      <a href="{{route('getvotesumbylga')}}" class="btn btn-sm btn-primary">Get Vote By LGA</a>
      {{-- <a href="{{route('storepollingunitresult')}}" class="btn btn-sm btn-info">Store Polling Unit Result</a> --}}
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Polling Unit Number</th>
            <th scope="col">Polling Unit Name</th>
            <th scope="col">Polling Unit Description</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pollingunits as $pu)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$pu->polling_unit_number}}</td>
                <td>{{$pu->polling_unit_name}}</td>
                <td>{{$pu->polling_unit_description}}</td>
                <td>{{$pu->lat}}</td>
                <td>{{$pu->long}}</td>
                <td>
                  <a href="{{route('loadpollingunitbyid', $pu->uniqueid)}}">View</a> | 
                  <a href="{{route('pollingunitresult', $pu->uniqueid)}}">Store Result</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>