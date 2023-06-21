<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<style>
body {
    background-color: #DCDCDC;
    /* background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 123, 149, 1) 0%, rgba(63, 106, 144, 1) 65%); */

}

.main-content {
    margin: 20px 0;
    flex-basis: 25%;
    position: sticky;
    top: 70px;
    align-self: flex-start;
    width: 50%;
}
</style>

<body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Tue-Tweet - Manage Users</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container">
        <div class="list-group">
            <div class="main-content">
                <form action="{{ route('adminDash') }}" method="GET">
                    <button type="submit" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-right-from-bracket"></i><a> back </a></button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>