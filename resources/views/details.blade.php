<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .rating .fa-star {
            color: #ccc;
        }
        .rating .fa-star.checked {
            color: #f39c12;
        }
        
.rate {
    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.buttons {
    top: 36px;
    position: relative
}

.rating-submit {
    border-radius: 8px;
    color: #fff;
    height: auto
}

.rating-submit:hover {
    color: #fff
}
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row">
           
            <!-- Book Details -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$data->title}}</h3>
                        <p class="text-muted">By {{$data->author}}</p>
                    </div>

                   
                    <div class="card-body">
                        <p><strong>Description:</strong>{{$data->description}}</p>
                        <p><strong>Price:</strong> {{$data->price}}</p>
                        
                        <!-- Book Rating -->
                        <div>
                            <h4>Rating:</h4>
                           
                             
                                <span> {{$ratingData}} / 5</span>
                            
                        </div>
                    </div>
                </div>
            </div>

            

            <!-- Comments Section -->
            <div class="col-md-4">
            
            <p>
              <a href="{{route('logout')}}">  <button type="button" class="btn btn-outline-secondary">LogOut</button></a>
            </p>
                <div class="card">
                    <div class="card-header">
                        <h4>Comments</h4>
                    </div>
                    <div class="card-body">
                        <!-- Display Comments -->

                        @foreach($allcomment as $list)
                        <div class="comment mb-3">
                            <strong>{{$list->user_name}}</strong> <small class="text-muted">{{$list->created_at}}</small>
                            <p>{{$list->comment}}</p>
                        </div>
                        @endforeach

                       
                    </div>
                </div>

                <!-- Add a Comment Form -->
                <div class="card mt-4">
         
                    <div class="card-header">
                        <h5>Add a Comment</h5>
                    </div>
                    <div class="card-body">



                        <form method="post" action="{{route('comment')}}">

                        @csrf

                        <input type="text" name="user_id" value="{{session('user_id')}}" hidden>
                        <input type="text" name="book_id" value="{{$data->id}}" hidden>

                                <div class=" d-flex justify-content-center mt-5">
                                    <div class=" text-center mb-5">
                                            <div class="rating"> 
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                 <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                                                 <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> 
                                                 <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                                                 <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> 
                                                </div>
                                             </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Your Comment</label>
                                    <textarea class="form-control"  name="comment" id="content" rows="3" required></textarea>
                                </div>

                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: Script to make the rating stars interactive -->
    <script>
        const stars = document.querySelectorAll('.fa-star');
        stars.forEach(star => {
            star.addEventListener('click', () => {
                let rating = star.getAttribute('data-rating');
                resetStars();
                highlightStars(rating);
            });
        });

        function resetStars() {
            stars.forEach(star => {
                star.classList.remove('checked');
            });
        }

        function highlightStars(rating) {
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('checked');
            }
        }
    </script>
</body>
</html>
