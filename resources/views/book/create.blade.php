<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">Create a new book</div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bookname" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="bookname" name="bookname" placeholder="Enter book name">
                            </div>
                            <div class="mb-3">
                                <label for="bookdescription" class="form-label">Book Description</label>
                                <textarea class="form-control" id="bookdescription" name="bookdescription" placeholder="Enter book description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bookcategory" class="form-label">Book Category</label>
                                <select name="bookcategory" class="form-select">
                                    <option value="" selected="selected">Select book category</option>
                                    <option value="fictional">Fictional Books</option>
                                    <option value="biography">Biography Books</option>
                                    <option value="comedy">Comedy Books</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>