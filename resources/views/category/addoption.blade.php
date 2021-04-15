<option data-id="{{$project_region->id}}"
        data-region_type_id="{{$project_region->region_type->id}}"
        data-description="{{$project_region->description}}"
        data-parent_region_id="{{$project_region->parent_region_id}}"
        data-region_name_ar="{{$project_region->region_name_ar}}"
        data-region_name_en="{{$project_region->region_name_en}}"
        data-next_region_type_id="{{$project_region->next_region_type_id}}"
        data-lat="{{$project_region->latlong_region->region_lat}}"
        data-long="{{$project_region->latlong_region->region_long}}">
    {{$project_region->region_name_ar}}
</option>
