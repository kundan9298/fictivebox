<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Table</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>


<div class="container">

<form class="row row-cols-lg-auto g-3 align-items-center" action="{{route('search')}}" method="post">

        @csrf
        <!-- Dropdown -->
        <div class="col-12">
            <select class="form-select" name="name" aria-label="Select Category">
                <option selected value="">Choose</option>
                <option value="title">Title</option>
                <option value="author">Author</option>
            </select>
        </div>

        <!-- Search Box -->
        <div class="col-12">
            <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search input">
        </div>

        <!-- Submit Button -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

 

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
  @foreach($sql as $list)
    <tr>
      <th scope="row">{{$list->id}}</th>
      <td>{{$list->title}}</td>
      <td>{{$list->author}}</td>
      <td>{{$list->price}}</td>
      <td><a href="{{url('details/'.$list->id)}}"> <button type="button" class="btn btn-info">Details</button></a></td>
    </tr>
   @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $sql->links('pagination::bootstrap-4') }}
</div>




</div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


</body>
</html>