<select style="float: left" id="select{{$parent_id}}" class="search-select" onchange="choosecat(this)"
        title="choose Item">
    @foreach($categories as $category)
        <option data-id="{{$category->id}}"
                data-category_name_ar="{{$category->category_name_ar}}"
                data-category_name_en="{{$category->category_name_en}}"
                data-category_type_id="{{$category->category_type_id}}"
                data-photo_path="{{$category->photo_path}}"
                data-max_price_new="{{$category->max_price_new}}"
                data-min_price_new="{{$category->min_price_new}}"
                data-max_price_old="{{$category->max_price_old}}"
                data-min_price_old_="{{$category->min_price_old}}">{{$category->category_name_en}}</option>
    @endforeach
</select>

<input style="float: left" class="form-control-sm" type="button"
       onclick="document.getElementById('myModalAdd{{$parent_id}}').style.display = 'block';"
       value="Add Item">

<div id="myModalAdd{{$parent_id}}" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
                        <span style="text-align: right;"
                              onclick="document.getElementById('myModalAdd{{$parent_id}}').style.display = 'none'"
                              class="close">&times;</span>
        <input class="form-control" type="text" placeholder="insert a category_name_ar" name="category_name_ar">
        <input class="form-control" type="text" placeholder="insert a category_name_en" name="category_name_en">
        <input class="form-control" style="display: none;" type="text" placeholder="insert a category_type_id"
               value="{{$parent_id}}" name="parent_category_id">
        <input class="form-control" type="text" placeholder="insert a photo_path" name="photo_path">
        <iframe src="image-upload" width="250px" height="200px"></iframe>
        <select class="selectpicker" onchange="chooseTypeForCatItem(this)" title="Choose Type">
            @foreach($categories_types as $categories_type)
                <option data-item_parent="{{$parent_id}}"
                        data-id="{{$categories_type->id}}">{{$categories_type->category_type_name_en}}
                </option>
            @endforeach
        </select>
        <input class="form-control" style="display: none;" type="text" name="category_type_id">
        <input class="form-control" style="display: none;" type="text" placeholder="insert a max_price_new"
               name="max_price_new">
        <input class="form-control" style="display: none;" type="text" placeholder="insert a min_price_new"
               name="min_price_new">
        <input class="form-control" style="display: none;" type="text" placeholder="insert a max_price_old"
               name="max_price_old">
        <input class="form-control" style="display: none;" type="text" placeholder="insert a min_price_old"
               name="min_price_old">
        <input type="button" value="ADD" onclick="addcategoryclick({{$parent_id}})">
    </div>
</div>

<div class=" funcButtons" style="display: none;float: left" id="myModal{{$parent_id}}">
    <input class="form-control-sm" type="button"
           onclick="document.getElementById('myModalEdit{{$parent_id}}').style.display = 'block';"
           value="Edit">

    <div id="myModalEdit{{$parent_id}}" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
                <span style="text-align: right;"
                      onclick="document.getElementById('myModalEdit{{$parent_id}}').style.display = 'none'"
                      class="close">&times;</span>
            <input class="form-control" style="display: none;" type="text" name="id">
            <input class="form-control" type="text" name="category_name_ar">
            <input class="form-control" type="text" name="category_name_en">
            <input class="form-control" type="text" name="photo_path">
            <input class="form-control" style="display: none;" type="text" name="category_type_id">
            <input class="form-control" style="display: none;" type="text" name="max_price_new">
            <input class="form-control" style="display: none;" type="text" name="min_price_new">
            <input class="form-control" style="display: none;" type="text" name="max_price_old">
            <input class="form-control" style="display: none;" type="text" name="min_price_old">
            <input type="button" value="Edit" onclick="editcatclick({{$parent_id}})">
        </div>
    </div>

    <input class="form-control-sm" type="button"
           onclick="document.getElementById('myModalDel{{$parent_id}}').style.display = 'block'"
           value="Del">

    <div id="myModalDel{{$parent_id}}" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
                <span style="text-align: right;"
                      onclick="document.getElementById('myModalDel{{$parent_id}}').style.display = 'none'"
                      class="close">&times;</span>
            <div>
                <input onclick="delregionclick({{$parent_id}})" type="button" value="yes">
                <input type="button"
                       onclick="document.getElementById('myModalDel{{$parent_id}}').style.display = 'none'"
                       value="no">
                <input type="text" name="choosen_cattype_id" style="display: none;">
            </div>
        </div>
    </div>
</div>

<div class="lvlContainer" id="lvla{{$parent_id}}"></div>
