@extends('master')

@section('content')
<?php
/*$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.github.com/search/repositories?q=stars%3A%3E%3D500%20fork%3Atrue%20language%3Aphp&sort=stars&order=desc",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 8627c311-ab97-2362-baaf-43cd1d6505ad",
    "user-agent: Awesome-Octocat-App"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;

    $test_data = json_decode( $response, true);
    echo '<pre>'; print_r($test_data); echo '</pre>';


}
*/

  ?>
  <h2 style="padding-left: 300px;">Top Starred PHP Repositories</h2>
  <br>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Repository ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Created Date</th>
                <th>Last Push Date</th>
                <th>Description</th>
                <th>No. of Stars</th>
                <th colspan="2">Action</th>

            </tr>
            @foreach ($results as $result)
        <tr>
            <td>{{$result->repository_id}}</td>
            <td>{{$result->name}}</td>
            <td>{{$result->url}}</td>
            <td>{{$result->created_date}}</td>
            <td>{{$result->pushed_date}}</td>
            <td>{{$result->description}}</td>
            <td>{{$result->stars}}</td>
            <td><a href="{{url('/showone/')}}/<?php echo $result->repository_id;?>" class="btn btn-primary" role="button">View</a></td>
            <td><a href="{{url('/edit/')}}/<?php echo $result->repository_id;?>" class="btn btn-primary" role="button">Edit</a></td>
        </tr>
        @endforeach
        </thead>
    </table>

@stop

