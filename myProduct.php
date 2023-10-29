<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>My Products | eShop</title>


        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="style.css"/>

        <link rel="icon" href="resource/logo.svg"/>


    </head>

    <body style="background-color: #E9EBEE;">

        <div class="container-fluid">
            
            </div class = "row">
                
                <!--heder-->
                <div class="col-12 bg-primary">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                                    <img src="resource/new_user.svg "width="90px" height="90px" class="rounded-circle"/>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="row text-center text-lg-start">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span class="text-white fw-bold">Malinu Prabod</span>
                                        </div> 
                                        <div class="col-12">
                                            <span class="text-black-50 fw-bold">malinduwmp@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row ">
                                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                                    <h1 class="offset-4 offset-lg-2 text-white fw-bold">My product</h1>
                                </div>
                                <div class="col-12 col-lg-2 mx-2 mb-2 mt-lg-4  mx-lg-0 d-grid">
                                            <a href="addProduct.php" class="btn btn-warning fw-bold ">Add Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of heder-->

                <!--body-->
                <div class="col-12">
                    <div class="row">
                        <!--filter-->
                        <div class="col-11 col-lg-2 mx-3 my-3 border border-primary rounded">
                            <div class="row">
                                <div class="col-12 mt-3 fs-5">
                                    <div class="row">
                                        <div class="col-12"> 
                                            <label class="form-label fw-bold fs-3">Sort Product</label>
                                        </div>
                                        <div class="col-11">
                                            <div class=" row">
                                                <div class="col-10 ">
                                                    <input type="text" placeholder="Search.." class="form-control"/>
                                                </div>
                                                <div class="col-1 p-1">
                                                    <label class="form-label"><i class="bi bi-search fs-5"></i></label>                                                    
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-lable fw-bold">Active Time</label>
                                                </div>
                                                <div class="col-12">
                                                    <hr style="width:80%;"/>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="n" name="r1">
                                                        <label class="form-check-lable" for="n">
                                                            Newst to oldest
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="o" name="r1">
                                                        <label class="form-check-lable" for="o">
                                                            Oldest to new
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label class="form-label fw-bold">By quantity</label>
                                                </div>
                                                <div class="col-12">
                                                    <hr style="width:80%;"/>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="h" name="r2">
                                                        <label class="form-check-lable" for="h">
                                                            High to 
                                                        </label>    
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="l" name="r2">
                                                        <label class="form-check-lable" for="l">
                                                            Low to high
                                                        </label>    
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label class="form-label fw-bold">By Condition</label>
                                                </div>
                                                <div class="col-12">
                                                    <hr style="width:80%;"/>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="b" name="r3">
                                                        <label class="form-check-lable" for="b">
                                                            Brandnew
                                                        </label>    
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="u" name="r3">
                                                        <label class="form-check-lable" for="u">
                                                            Used
                                                        </label>    
                                                    </div>
                                                </div>
                                                <div class=" col-12 text-center mt-3 mb-3">
                                                    <div class="row g-2">
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="btn btn-primary fw-bold">Sort</button>

                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="btn btn-primary fw-bold">Clear</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!--end of filter-->  
                         <!-- product -->
                    <div class="col-12 col-lg-9 mt-3 mb-3 bg-white">
                        <div class="row">
                            <div class="offset-1 col-10 text-center">
                                <div class="row justify-content-center">
                                    <!-- card -->
                                    <div class="card mb-3 mt-3 col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-md-4 mt-4">
                                                <img src="resource/mobile_images/iphone12.jpg" class="img-fluid rounded-start" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">Apple iPhone 12</h5>
                                                    <span class="card-text fw-bold text-primary">Rs. 100000 .00</span><br />
                                                    <span class="card-text fw-bold text-success">10 Items left</span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="fd" checked />
                                                        <label class="form-check-label fw-bold text-info" for="fd">Make Your Product Deactive</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row g-1">
                                                                <div class="col-12 col-lg-6 d-grid">
                                                                    <button class="btn btn-success fw-bold">Update</button>
                                                                </div>
                                                                <div class="col-12 col-lg-6 d-grid">
                                                                    <button class="btn btn-danger fw-bold">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end of card -->
                                </div>
                            </div>

                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!--end of product -->
                    </div>
                </div>
                <!--end of body-->
        </div>

    


        <script src="script.js"></script>

    </body>
</html>