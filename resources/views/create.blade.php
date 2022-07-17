<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">


    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                    <div class="container">
                        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">title *</label>
                                            <input id="form_name" type="text" name="title" class="form-control"
                                                   placeholder="Please enter your title *"
                                                   data-error="title is required.">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">subtitle *</label>
                                            <input id="form_lastname" type="text" name="sub_title" class="form-control"
                                                   placeholder="Please enter your sub_title *"
                                                   data-error="sub_title is required.">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Image *</label>
                                            <input id="form_message" type="file" name="image" class="form-control"
                                                   placeholder="Please enter your image *"
                                                   data-error="Image is required.">
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Description *</label>
                                                <textarea id="form_message" name="description" class="form-control"
                                                          placeholder="Write  description here." rows="4"
                                                          data-error="Please, leave us a description."></textarea
                                                >
                                            </div>

                                        </div>


                                        <div class="col-md-12 m-1">

                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Create">

                                        </div>

                                    </div>


                                </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
</div>

</body>
</html>
