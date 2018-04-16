<!------------------------------------------------------------------------------
| List of elements in sample form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['categories.post', 'id' => @$item->id, '_key' => $request->get('_key')],  'files'=>true, 'method' => 'POST'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        <!-- DELETE BUTTON -->
        @if($item)
            <a href="{!! URL::route('categories.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
            class="btn btn-danger pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- DELETE BUTTON -->

        <!-- SAVE BUTTON -->
        {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--MENU 1-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.menu_1') !!}
            </a>
        </li>

        <!--MENU 2-->
        <li>
            <a data-toggle="tab" href="#menu_2">
                {!! trans($plang_admin.'.tabs.menu_2') !!}
            </a>
        </li>

        <!--MENU 3-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.menu_3') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--MENU 1-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--NAME-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'category_name',
                'label' => trans($plang_admin.'.labels.category-name'),
                'value' => @$item->category_name,
                'description' => trans($plang_admin.'.descriptions.category-name'),
                'errors' => $errors,
            ])
            <!--/NAME-->

            <!--SLUG-->
            @include('package-category::admin.partials.input_slug', [
                'name' => 'category_slug',
                'id' => 'category_slug',
                'ref' => 'category_name',
                'label' => trans($plang_admin.'.labels.category-slug'),
                'value' => @$item->category_slug,
                'description' => trans($plang_admin.'.descriptions.category-slug'),
                'errors' => $errors,
            ])
            <!--/SLUG-->

            <!-- CATEGORY -->
            @include('package-category::admin.partials.select_single', [
                'name' => 'category_id_parent',
                'label' => trans($plang_admin.'.labels.category'),
                'items' => $categories,
                'value' => @$item->category_id_parent,
            'description' => trans($plang_admin.'.descriptions.category', [

                                ]),
            'errors' => $errors,
            ])

            <!--STATUS-->
            @include('package-category::admin.partials.select_single', [
                'name' => 'status',
                'label' => trans($plang_admin.'.form.status'),
                'value' => @$item->category_status,
                'items' => $status,
            ])

        </div>

        <!--MENU 2-->
        <div id="menu_2" class="tab-pane fade">
            <!--CATEGORY OVERVIEW-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'category_overview',
                'label' => trans($plang_admin.'.labels.overview'),
                'value' => @$item->category_overview,
                'description' => trans($plang_admin.'.descriptions.overview'),
                'tinymce' => false,
                'errors' => $errors,
            ])
            <!--/CATEGORY OVERVIEW-->

            <!--CATEGORY DESCRIPTION-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'category_description',
                'label' => trans($plang_admin.'.labels.description'),
                'value' => @$item->category_description,
                'description' => trans($plang_admin.'.descriptions.description'),
                'rows' => 50,
                'tinymce' => true,
                'errors' => $errors,
            ])
            <!--/CATEGORY DESCRIPTION-->

        </div>

        <!--MENU 3-->
        <div id="menu_3" class="tab-pane fade">
            <!--CATEGORY IMAGE-->
            @include('package-category::admin.partials.input_image', [
                'name' => 'category_image',
                'label' => trans($plang_admin.'.labels.image'),
                'value' => @$item->category_image,
                'description' => trans($plang_admin.'.descriptions.image'),
                'errors' => $errors,
            ])
            <!--/CATEGORY IMAGE-->
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('_key',$request->get('_key','')) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in sample form
|------------------------------------------------------------------------------>