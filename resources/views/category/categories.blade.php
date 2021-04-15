<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <title>ControlPanel</title>
      <meta name="google" content="notranslate" />
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <script src="js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src='searchselect/js/select2.js' type='text/javascript'></script>
    <link href='searchselect/css/select2css' rel='stylesheet' type='text/css'>
    <script src="js/custom_categories.js?v1=sdw2d1"></script>
    <script src="js/custom.js"></script>

</head>
<style>
    .map {
        height: 15em;
        width: 100%;
    }
</style>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <a href="controlpanel">  <h1>Control Panel</h1></a>
    <h4>Categories</h4>
</div>

<div id="container" class="container">

    <h5>Categories   </h5>
    <select style="float: left" class='search-select' id="son_select" style='width: 200px;' title="Choose Category"
            onchange="choose_soncat(this)">
        <option value="0">-- Choose Category --</option>

        @foreach($Categories as $category)
            <option data-id="{{$category->id}}"
                    data-category_name_ar="{{$category->category_name_ar }}"
                    data-category_name_en="{{$category->category_name_en }}"
                    data-category_type_id="{{$category->category_type_id}}"
                    data-photo_path="{{$category->photo_path}}"
                    data-show_pages="{{$category->show_pages}}"

                    data-tabe_site_photo="{{$category->tabe_site_photo}}"
                    data-mobile_site_photo="{{$category->mobile_site_photo}}"
                    data-pc_site_photo="{{$category->pc_site_photo}}"
                    data-size1_site_photo="{{$category->size1_site_photo}}"
                    data-size2_site_photo="{{$category->size2_site_photo}}"
                    data-size3_site_photo="{{$category->size3_site_photo}}"
                    data-size4_site_photo="{{$category->size4_site_photo}}"
                    data-size5_site_photo="{{$category->size5_site_photo}}"
                    data-size6_site_photo="{{$category->size6_site_photo}}"



                    data-max_price_new="{{$category->max_price_new}}"
                    data-min_price_new="{{$category->min_price_new}}"
                    data-max_price_old="{{$category->max_price_old}}"
                    data-min_price_old_="{{$category->min_price_old}}">{{' ///// '.$category->id.' - '.$category->category_name_en.' - '.$category->category_name_ar.' /////'.$category->parent}}</option>
        @endforeach
    </select>
    <input type="text" id="son_id" style="display: none;">

    <input style="float: left" class="form-control-sm" type="button"
           onclick="document.getElementById('myModalAdd').style.display = 'block';"
           value="Add Item">
    <div class=" funcButtons" style="display: none;float: left" id="myModal">
        <input class="form-control-sm" type="button"
               onclick="document.getElementById('myModalEdit').style.display = 'block';"
               value="Edit">

        <div id="myModalEdit" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span style="text-align: right;"
                      onclick="document.getElementById('myModalEdit').style.display = 'none'"
                      class="close">&times;</span>
                <input class="form-control" style="display: none;" type="text" name="id">
                <input class="form-control" type="text" name="category_name_ar">
                <input class="form-control" type="text"   name="show_pages">
                <input class="form-control" type="text" name="category_name_en">

                <input class="form-control" style="display: none;" type="text" name="max_price_new">
                <input class="form-control" style="display: none;" type="text" name="min_price_new">
                <input class="form-control" style="display: none;" type="text" name="max_price_old">
                <input class="form-control" style="display: none;" type="text" name="min_price_old">
                <table>
                    <tr>
                        <td>
                            img_tabe_site_photo
                            <img         name="img_tabe_site_photo"   id="img_tabe_site_photo_add" class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="tabe_site_photo" id="tabe_site_photo_add">
                            <iframe src="image-upload?target_img=img_tabe_site_photo_add&target_input=tabe_site_photo_add" width="270px" height="70px"></iframe>

                        </td>

                        <td>
                            img_pc_site_photo
                            <img         name="img_pc_site_photo"  id="img_pc_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="pc_site_photo" id="pc_site_photo_add">
                            <iframe src="image-upload?target_img=img_pc_site_photo_add&target_input=pc_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                        <td>
                            img_mobile_site_photo
                            <img         name="img_mobile_site_photo" id="img_mobile_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="mobile_site_photo" id="mobile_site_photo_add">
                            <iframe src="image-upload?target_img=img_mobile_site_photo_add&target_input=mobile_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            img_size1_site_photo
                            <img         name="img_size1_site_photo"   id="img_size1_site_photo_add" class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size1_site_photo" id="size1_site_photo_add">
                            <iframe src="image-upload?target_img=img_size1_site_photo_add&target_input=size1_site_photo_add" width="270px" height="70px"></iframe>

                        </td>

                        <td>
                            img_size2_site_photo
                            <img         name="img_size2_site_photo"  id="img_size2_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size2_site_photo" id="size2_site_photo_add">
                            <iframe src="image-upload?target_img=img_size2_site_photo_add&target_input=size2_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                        <td>
                            img_size3_site_photo
                            <img         name="img_size3_site_photo" id="img_size3_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size3_site_photo" id="size3_site_photo_add">
                            <iframe src="image-upload?target_img=img_size3_site_photo_add&target_input=size3_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            img_size4_site_photo
                            <img         name="img_size4_site_photo"   id="img_size4_site_photo_add" class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size4_site_photo" id="size4_site_photo_add">
                            <iframe src="image-upload?target_img=img_size4_site_photo_add&target_input=size4_site_photo_add" width="270px" height="70px"></iframe>

                        </td>

                        <td>
                            img_size5_site_photo
                            <img         name="img_size5_site_photo"  id="img_size5_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size5_site_photo" id="size5_site_photo_add">
                            <iframe src="image-upload?target_img=img_size5_site_photo_add&target_input=size5_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                        <td>
                            img_size6_site_photo
                            <img         name="img_size6_site_photo" id="img_size6_site_photo_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"  name="size6_site_photo" id="size6_site_photo_add">
                            <iframe src="image-upload?target_img=img_size6_site_photo_add&target_input=size6_site_photo_add" width="270px" height="70px"></iframe>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            photo_path
                            <img         name="img_photo_path" id="img_photo_path_add"   class="form-control"  style=" height: 300px;"    />
                            <input class="form-control" type="hidden"   name="photo_path" id="photo_path_add">
                            <iframe src="image-upload?target_img=img_photo_path_add&target_input=photo_path_add" width="270px" height="70px"></iframe>

                        </td>
                    </tr>


                </table>
                <input type="button" value="Edit" onclick="editcatclick()">
            </div>
        </div>

        <input class="form-control-sm" type="button"
               onclick="document.getElementById('myModalDel').style.display = 'block'"
               value="Del">

        <div id="myModalDel" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span style="text-align: right;"
                      onclick="document.getElementById('myModalDel').style.display = 'none'"
                      class="close">&times;</span>
                <div>
                    <input onclick="delcatclick()" type="button" value="yes">
                    <input type="button"
                           onclick="document.getElementById('myModalDel').style.display = 'none'"
                           value="no">
                    <input type="text" name="choosen_cattype_id" style="display: none;">
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div id='result'></div>

    <div id="myModalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
                        <span style="text-align: right;"
                              onclick="document.getElementById('myModalAdd').style.display = 'none'"
                              class="close">&times;</span>
            <input class="form-control" type="text" placeholder="insert a category_name_ar" name="category_name_ar">
            <input class="form-control" type="text" placeholder="insert a category_name_en" name="category_name_en">

            <input class="form-control" type="text" placeholder="insert a show_pages" name="show_pages" id="show_pages">

            <div>

                مكان ظهور التصنيف اختر

                <select onclick="show_pages.value=this.value">

                    <option value=""> لاتظهر بشكل مباشر في اي مكان</option>

                    <option value="home_page">الصفحة الرئيسية</option>

                    <option value="nav_bar">القائمة الرئيسية</option>

                </select>
            </div>


            <table>
                <tr>
                    <td>
                        img_tabe_site_photo
                         <img         name="img_tabe_site_photo"   id="img_tabe_site_photo" class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="tabe_site_photo" id="tabe_site_photo">
                         <iframe src="image-upload?target_img=img_tabe_site_photo&target_input=tabe_site_photo " width="270px" height="70px"></iframe>

                    </td>

                    <td>
                        img_pc_site_photo
                        <img         name="img_pc_site_photo"  id="img_pc_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="pc_site_photo" id="pc_site_photo">
                        <iframe src="image-upload?target_img=img_pc_site_photo&target_input=pc_site_photo" width="270px" height="70px"></iframe>

                    </td>
                    <td>
                        img_mobile_site_photo
                        <img         name="img_mobile_site_photo" id="img_mobile_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="mobile_site_photo" id="mobile_site_photo">
                        <iframe src="image-upload?target_img=img_mobile_site_photo&target_input=mobile_site_photo" width="270px" height="70px"></iframe>

                    </td>
                </tr>
                <tr>
                    <td>
                        img_size1_site_photo
                        <img         name="img_size1_site_photo"   id="img_size1_site_photo" class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size1_site_photo" id="size1_site_photo">
                        <iframe src="image-upload?target_img=img_size1_site_photo&target_input=size1_site_photo " width="270px" height="70px"></iframe>

                    </td>

                    <td>
                        img_size2_site_photo
                        <img         name="img_size2_site_photo"  id="img_size2_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size2_site_photo" id="size2_site_photo">
                        <iframe src="image-upload?target_img=img_size2_site_photo&target_input=size2_site_photo" width="270px" height="70px"></iframe>

                    </td>
                    <td>
                        img_size3_site_photo
                        <img         name="img_size3_site_photo" id="img_size3_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size3_site_photo" id="size3_site_photo">
                        <iframe src="image-upload?target_img=img_size3_site_photo&target_input=size3_site_photo" width="270px" height="70px"></iframe>

                    </td>
                </tr>
                <tr>
                    <td>
                        img_size4_site_photo
                        <img         name="img_size4_site_photo"   id="img_size4_site_photo" class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size4_site_photo" id="size4_site_photo">
                        <iframe src="image-upload?target_img=img_size4_site_photo&target_input=size4_site_photo " width="270px" height="70px"></iframe>

                    </td>

                    <td>
                        img_size5_site_photo
                        <img         name="img_size5_site_photo"  id="img_size5_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size5_site_photo" id="size5_site_photo">
                        <iframe src="image-upload?target_img=img_size5_site_photo&target_input=size5_site_photo" width="270px" height="70px"></iframe>

                    </td>
                    <td>
                        img_size6_site_photo
                        <img         name="img_size6_site_photo" id="img_size6_site_photo"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"  name="size6_site_photo" id="size6_site_photo">
                        <iframe src="image-upload?target_img=img_size6_site_photo&target_input=size6_site_photo" width="270px" height="70px"></iframe>

                    </td>
                </tr>
                <tr>
                    <td>
                        photo_path
                        <img         name="img_photo_path" id="img_photo_path"   class="form-control"  style=" height: 300px;"    />
                        <input class="form-control" type="hidden"   name="photo_path" id="photo_path">
                        <iframe src="image-upload?target_img=img_photo_path&target_input=photo_path" width="270px" height="70px"></iframe>

                    </td>
                </tr>


            </table>

            <input class="form-control" style="display: none;" type="text" placeholder="insert a max_price_new"
                   name="max_price_new">
            <input class="form-control" style="display: none;" type="text" placeholder="insert a min_price_new"
                   name="min_price_new">
            <input class="form-control" style="display: none;" type="text" placeholder="insert a max_price_old"
                   name="max_price_old">
            <input class="form-control" style="display: none;" type="text" placeholder="insert a min_price_old"
                   name="min_price_old">
            <input type="button" value="ADD" onclick="addcategoryclick()">
        </div>
    </div>

    <br>
    <br>
    <h5>Add Parent</h5>

    <input style="float: left" class="form-control-sm" type="button"
           onclick="set_parentcat()"
           value="Add as Parent">

    <select style="float: left" id="parent_select" class='search-select' style='width: 200px;' title="Choose Category"
            onchange="choose_parentcat(this)">
        <option>-- Choose Category --</option>
        @foreach($Categories as $category)
            <option data-id="{{$category->id}}">{{' ///// '.$category->id.' - '.$category->id.' - '.$category->category_name_en.' - '.$category->category_name_ar.' ///// '.$category->parent}}</option>
        @endforeach
    </select>
    <input type="text" id="parent_id" style="display: none;">

    <br>
    <br>
    <br>
    <h5>Parents</h5>
    <div id="parent_categories"></div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
    {{--<p>Footer</p>--}}
</div>
</body>
<!-- Script -->
<script>
    $(document).ready(function () {
        // Initialize select2
        $("#selUser").select2();
    });
</script>
</html>
