<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Infarma</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Infama</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            </div>
        </div>
    </nav>

    <div class="row" style=" padding-top:2%;">
        <div class="col col-md-3"></div>
        <div class="col col-md-6">
            <div class="card">
                <h5 class="card-title">Url Shortner</h5>
                <hr>
                <div class="card-body">

                    <form class="form">
                        <label>URL </label>
                        <input class="form-control" required id="url" name="url" value="https://www.google.com/"></input>
                        <br>

                        <button class="btn btn-success btn-block" id="shortend">Shorten</button>
                    </form>
                    <label>Short </label>
                    <input class="form-control" readonly required id="shortenedurl" name="shortend"></input>
                </div>
            </div>
        </div>
        <div class="col col-md-3"></div>
    </div>
    <!-- FLIGHT -->
    <div class="row" style=" padding-top:1%;">
        <div class="col col-md-3"></div>
        <div class="col col-md-6">
            <div class="card">
                <h5 class="card-title">
                    <center>Flight Function Test</center>
                </h5>
                <hr>
                <div class="card-body">
                    <form id="submitMoviesForm">
                        <label>Flight Length(Mins)</label>
                        <input class="form-control" id="flightlength" type="number">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Movie 1</label>

                                <select class="form-control" id="movie1">
                                    <option value="">Select Movie 1</option>
                                    @foreach($movies as $movie)
                                    <option value="{{$movie['id']}}">{{$movie['name']}}  ({{$movie['length']}} Mins)</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Movie 2</label>
                                <select class="form-control" id="movie2">
                                    <option value="">Select Movie 2</option>
                                    @foreach($movies as $movie)
                                    <option value="{{$movie['id']}}">{{$movie['name']}} ({{$movie['length']}} Mins) </option>
                                    @endforeach
                                    <br>

                                </select>
                            </div>
                            <br>

                            <br> <br>
                        </div>
                        <input class="form-control" id="moviestatus" readonly>
                        <button type="submit" id="checkstatus" class="form-control btn btn-info btn-block">Check</button>
                    </form>
                </div>
                <div class="col col-md-3"></div>
            </div>

            <!-- END OF FLIGHT -->


            <script>
                $('#shortend').on('click', function(e) {
                    e.preventDefault();
                    var url = $('#url').val();

                    axios.post('/api/geturl', {
                        url: url
                    }).then(function(resp) {
                        $('#shortenedurl').val(resp.data);
                    }).catch(function(error) {
                        console.log(error)
                    });
                });


                $("#checkstatus").on('click', function(e) {
                    e.preventDefault();
                    var minutes = $('#flightlength').val();
                    var movie1 = $('#movie1').val();
                    var movie2 = $('#movie2').val();

                    
                    axios.post('/api/postflight', {
                        minutes: minutes,
                        movie1: movie1,
                        movie2: movie2
                    }).then(function(resp) {
                        var response=resp.data[0];
                        var status=response['status'];
                        console.log(status)
                        if(status==false){
                            $('#moviestatus').val('Too Long')
                        }else{
                           
                            $('#moviestatus').val('Not Too Long')
                        }
                        console.log(response);
                    }).catch(function(error) {
                        console.log(error)
                    });
                });
            </script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>