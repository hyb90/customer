<!DOCTYPE html>
<html lang="en">
<head>
    <title>ControlPanel</title>
      <meta name="google" content="notranslate" />
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/custom.js?v2wtw332dsswwwedesss2d14=2313"></script>
    <style type="text/css">
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
        .route_info{
            width:60% !important;
            margin-top: 10px !important;
        }
        p{
            width: 54em !important;
            font-size: 0.8rem;
        }
        button p{
            font-size: 1rem;
        }
        input{
            width: 10% !important;
            text-align: left !important;
        }
        button{
            display: inline-flex !important;
            border: 1px solid !important;
            border-radius: 7px !important;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
    <a href="controlpanel">  <h1>Control Panel</h1></a>

    <h4>Routes</h4>
</div>

<div class="container" style="margin-top:30px">
    @php $i=0;@endphp

    <button class="route_info" id="previewd_ids_route" onclick="getManyResourcesWithAttr(this, 'user_id_for_previewd_cars')" data-href="api/user-previewdcars-ids/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="user_id_for_previewd_cars" type="text" placeholder="id" class="form-control">
        <p>api/user-previewdcars-ids/{user_id}</p>
    </button>
    get previewd cars ids for specific user
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="users_route" onclick="getManyResources(this)" data-href="api/users" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <p>api/users</p>
    </button>
    get all Users
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="user_id_route" onclick="getOneResourceWithAttr(this, 'user_id')" data-href="api/user/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="user_id" type="text" placeholder="id" class="form-control">
        <p>api/user/{id}</p>
    </button>
    get specified User
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="usertypes_route" onclick="getManyResources(this)" data-href="api/usertypes" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <p>api/usertypes</p>
    </button>
    get all UserTypes
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="usertype_id_route" onclick="getOneResourceWithAttr(this, 'usertype_id')" data-href="api/usertype/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="usertype_id" type="text" placeholder="id" class="form-control">
        <p>api/usertype/{id}</p>
    </button>
    get specified UserType
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="regions_route" onclick="getManyResources(this)" data-href="api/regions" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <p>api/regions</p>
    </button>
    get All Regions
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="region_id_route" onclick="getOneResourceWithAttr(this, 'region_id')" data-href="api/region/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="region_id" type="text" placeholder="id" class="form-control">
        <p>api/region/{id}</p>
    </button>
    get specified Region
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="categories_route" onclick="getManyResources(this)" data-href="api/categories" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <p>api/categories</p>
    </button>
    get All Categories
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="category_id_route" onclick="getOneResourceWithAttr(this, 'category_id')" data-href="api/category/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="category_id" type="text" placeholder="id" class="form-control">
        <p>api/category/{id}</p>
    </button>
    get specified Category By Id
    <div class="info_area" id="area_{{$i}}"></div>


    <button class="route_info" id="category_pages_route" onclick="getJsonResourcesWithAttr(this, 'page_name')" data-href="api/categories/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="page_name" type="text" placeholder="page_name" class="form-control" style=" width: 70% !important; ">
        <p>api/categories/{page_name}</p>
    </button>
    get specified Category By page

    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="category_pages_route" onclick="getJsonResourcesWithAttr(this, 'page_name_4_tree')" data-href="api/categories_tree_sons/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="page_name_4_tree" type="text" placeholder="page_name_4_tree" class="form-control" style=" width: 70% !important; ">
        <p>api/show_tree_sons_by_page_name/{page_name}</p>
    </button>
    get tree sons of a  Category By page

    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="categorysons_route" onclick="getManyResourcesWithAttr(this, 'parent_cat_id')" data-href="api/categorysons/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="parent_cat_id" type="text" placeholder="id" class="form-control">
        <p>api/categorysons/{id}</p>
    </button>
    get specified Category Sons
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="rootcat_route" onclick="getManyResources(this)" data-href="api/categories/root" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <p>api/categories/root</p>
    </button>
    get Root Categories
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="regioncats_route" onclick="getManyResourcesWithAttr(this, 'regioncats_id')" data-href="api/categories-for-region/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="regioncats_id" type="text" placeholder="id" class="form-control">
        <p>api/categories-for-region/{region_id}</p>
    </button>
    get specified Region Categories
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="catregions_route" onclick="getManyResourcesWithAttr(this, 'catregions_id')" data-href="api/regions-for-category/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="catregions_id" type="text" placeholder="id" class="form-control">
        <p>api/regions-for-category/{category_id}</p>
    </button>
    get specified Category Regions
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="usercats_route" onclick="getManyResourcesWithAttr(this, 'usercats_id')" data-href="api/categories-for-user/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="usercats_id" type="text" placeholder="id" class="form-control">
        <p>api/categories-for-user/{user_id}</p>
    </button>
    get specified User Categories
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="catsuser_route" onclick="getManyResourcesWithAttr(this, 'catsuser_id')" data-href="api/users-for-category/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="catsuser_id" type="text" placeholder="id" class="form-control">
        <p>api/users-for-category/{category_id}</p>
    </button>
    get specified Category Users
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="usersreg_route" onclick="getManyResourcesWithAttr(this, 'usersreg_id')" data-href="api/users-for-region/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="usersreg_id" type="text" placeholder="id" class="form-control">
        <p>api/users-for-region/{region_id}</p>
    </button>
    get specified Region Users
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="userregs_route" onclick="getManyResourcesWithAttr(this, 'userregs_id')" data-href="api/regions-for-user/" data-area="{{++$i}}" class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="userregs_id" type="text" placeholder="id" class="form-control">
        <p>api/regions-for-user/{user_id}</p>
    </button>
    get specified User Regions
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="products_category_id_route" data-area="{{++$i}}"  onclick="getJsonResourcesWithAttr(this, 'category_id_{{$i}}')" data-href="api/products/"  class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="category_id_{{$i}}" type="text" placeholder="id" class="form-control">
        <p>api/products/{category_id}</p>
    </button>
    get products by category id
    <div class="info_area" id="area_{{$i}}"></div>

    <button class="route_info" id="products_category_id_route" data-area="{{++$i}}"
            onclick="getJsonResourcesWithAttr(this, 'text2search_{{$i}}')" data-href="api/products_search/"  class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="text2search_{{$i}}" type="text" placeholder="text2search" class="form-control">
        <p>api/products_search/{text2search}</p>
    </button>
    get products by category id
    <div class="info_area" id="area_{{$i}}"></div>


    <button class="route_info" id="products_category_id_route" data-area="{{++$i}}"  onclick="getJsonResourcesWithAttr(this, 'category_id_{{$i}}')" data-href="api/full_product_details/"  class="form-group">
        <input type="button" value="Get" class="form-control">
        <input id="category_id_{{$i}}" type="text" placeholder="id" class="form-control">
        <p>api/full_product_details/{product_id}</p>
    </button>
    get products by category id
    api/full_product_details/{product_id}
    <div class="info_area" id="area_{{$i}}"></div>



    <div class="info_area"  >

            <H2>routes to fetch user token</H2>

        </div>
      post  /login_user :
        email password
        <br>
       post  /register_user :
        name email password c_password
        <div class="info_area"  >

            <H2>routes need user token</H2>


            <button class="route_info" id="products_category_id_route" data-area="{{++$i}}"
                    onclick="getJsonResourcesWithBarrer('/user_profile','{{$i}}','token_{{$i}}')"
                    data-href="/user_profile"  class="form-group">
                <input type="button" value="Get" class="form-control" >

                <p>user_profile</p>
            </button>
            <input id="token_{{$i}}" type="text" placeholder="token " class="form-control" style="    width: 100% !important;">
            get  /user_profile
            <div class="info_area" id="area_{{$i}}"></div>

            <br>
           post   /add_product_to_favorid/{product_id}
            <br>
            post   /add_product_to_cart/{product_id}
            <br>
            get   /get_cart
            <br>
            get   /get_favorits

        </div>

    </div>





<div class="jumbotron text-center" style="margin-bottom:0">
    {{--        <p>Footer</p>--}}
</div>

</body>
</html>
