<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Artisan;
use Schema;
use File;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('menu-list');
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Role::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('menu', 'like', '%'. $request['search'] .'%');
                $query->orWhere('label', 'like', '%'. $request['search'] .'%');
                $query->orWhere('status', 'like', '%'. $request['search'] .'%');
                $query->orWhere('parent_id', 'like', '%'. $request['search'] .'%');
                $query->orWhere('menu_of', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                $query->where('menu_of', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.role.search', compact('models'));
        }
        $page_title = 'All Menus';
        $models = Menu::orderby('id', 'desc')->where('status', 1)->paginate($per_page_records);
        $roles = Role::where('status', 1)->get();
        $onlySoftDeleted = Menu::onlyTrashed()->get();
        return view('admin.menus.index',compact('models','page_title', 'roles', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Menu';
        $roles = Role::where('status', 1)->get();
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('admin.menus.create', compact('page_title', 'roles', 'parent_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        require base_path()."/crud-template/config.php";

        $this->validate($request, [
                'menu' => 'required|unique:menus,menu',
                'menu_of' => 'required',
                'icon' => 'required',
                'label' => 'required',
                'column_names' => 'required',
                'column_names.*' => 'required',
            ],
            [
                'column_names.*.required' => 'Column name is required.'
            ]
        );

        DB::beginTransaction();

        try{
            $rel_models = [];
            if(count($request->rel_tab_names)){
                $rel_models = $request->rel_tab_names;
            }
            $model = Menu::create([
                'menu_of' => Str::lower($request->menu_of),
                'parent_id' => $request->parent_id,
                'icon' => $request->icon,
                'label' => $request->label,
                'menu' => str_replace(' ', '_', strtolower($request->menu)),
                'url' => Str::lower($request->menu_of).'/'.str_replace(' ', '_', strtolower($request->menu)),
                'rel_models' => json_encode($rel_models),
            ]);

            DB::commit();

            if($model){
                $request['url'] = $model->url;
                $request['route_url'] = Str::lower($request->menu_of).'.'.str_replace(' ', '_', strtolower($request->menu));

                $this->addEntryInRoutes($request);
                $this->createMigration($request);
                $this->createController($request);
                $this->createModel($request);
                $this->createViews($request);
            }

            return redirect()->route('menu.index')->with('message', 'Menu Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $page_title = 'Edit Menu';
        $roles = Role::where('status', 1)->get();
        $parent_menus = Menu::where('parent_id', null)->where('id', '!=', $menu->id)->get();
        $table_name = Str::plural(str_replace(' ', '_', strtolower($menu->menu)));
        $columns = DB::select('show columns from ' . $table_name);

        $table_columns = [];
        foreach($columns as $value){
            if ($value->Field != 'status' && $value->Field != 'id' && $value->Field != 'deleted_at' && $value->Field != 'created_at' && $value->Field != 'updated_at') {
                $type = explode('(', $value->Type);
                if($type[0]=='text'){
                    $table_columns[] = array('field' => $value->Field, 'type' =>$value->Type, 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                }elseif($type[0]=='tinyint'){
                    $table_columns[] = array('field' => $value->Field, 'type' =>'boolean', 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                }elseif($type[0]=='varchar'){
                    $table_columns[] = array('field' => $value->Field, 'type' =>'string', 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                }elseif($type[0]=='int' || $type[0]=='bigint' || $type[0]=='decimal' || $type[0]=='float' || $type[0]=='double'){
                    if($type[0]=='int'){
                        $table_columns[] = array('field' => $value->Field, 'type' =>'integer', 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                    }else{
                        $table_columns[] = array('field' => $value->Field, 'type' =>$type[0], 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                    }
                }elseif($type[0]=='binary' || $type[0]=='varbinary' || $type[0]=='blob'){
                    $table_columns[] = array('field' => $value->Field, 'type' =>'binary', 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                }else{
                    $table_columns[] = array('field' => $value->Field, 'type' =>$type[0], 'default_type'=>$value->Null, 'default_value'=>$value->Default);
                }
            }
        }

        return view('admin.menus.edit', compact('menu', 'parent_menus', 'roles', 'page_title', 'table_columns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        require base_path()."/crud-template/config.php";

        $model = Menu::where('id', $id)->first();

        $this->validate($request, [
                'menu' => 'unique:menus,menu,'.$model->id,
                'menu_of' => 'required',
                'icon' => 'required',
                'label' => 'required',
            ]
        );

        if(count(array_filter($request->column_names))==0){
            $this->validate($request, [
                    'column_names' => 'required',
                    'column_names.*' => 'required',
                ],
                [
                    'column_names.*.required' => 'Column name is required.'
                ]
            );
        }

        try{
            if($model){
                //delete resource route from web
                $controller_name = str_replace(' ', '', ucwords($model->menu)) ;
                $menu_of = Str::lower($model->menu_of);
                $controller_name = 'App\Http\Controllers'.'\\'.$menu_of.'\\'.$controller_name;
                $replace_line = "Route::resource('". $model->url."', '". $controller_name ."Controller');";

                $route_file = base_path().'/routes/web.php';
                $contents = file_get_contents($route_file);
                $contents = str_replace($replace_line, '', $contents);
                file_put_contents($route_file, $contents);

                //delete trash records route
                $replace_line = "Route::get('". $model->menu."/trash/records', '". $controller_name ."Controller@trashRecords')->name('".$menu_of.".".$model->menu.".trash.records');";
                $route_file = base_path().'/routes/web.php';
                $contents = file_get_contents($route_file);
                $contents = str_replace($replace_line, '', $contents);
                file_put_contents($route_file, $contents);

                //delete restore trash record route
                $replace_line = "Route::get('". $model->menu."/restore/{id}', '". $controller_name ."Controller@restore')->name('".$menu_of.".".$model->menu.".restore');";
                $route_file = base_path().'/routes/web.php';
                $contents = file_get_contents($route_file);
                $contents = str_replace($replace_line, ' ', $contents);
                file_put_contents($route_file, $contents);

                //delete migration file
                $migration_file = Str::plural(str_replace(' ', '_', strtolower($model->menu)));
                $migration_file_name = '_create_'.$migration_file ."_table";
                foreach(File::allFiles('database/migrations') as $file){
                    if(str_contains($file,$migration_file_name)){
                        DB::table('migrations')->where('migration', 'like',  '%' .$migration_file_name)->delete();
                        unlink($file);
                    }
                }

                /* if(json_decode($model->rel_models)){

                } */

                //delete views with all files
                $modelName = str_replace(' ', '', ucwords($model->menu)) ;
                $viewFolderName = Str::plural(str::lower($modelName));
                $viewFolderPath = 'resources/views/'.$model->menu_of.'/'.$viewFolderName;
                if (\File::exists($viewFolderPath)){
                    \File::deleteDirectory($viewFolderPath);
                }

                //delete model
                $modelName = str_replace(' ', '', ucwords($model->menu));
                $model_name = $modelName  .".php";
                $modelPath = base_path('app/Models/').$model_name;
                if(file_exists($modelPath)){
                    unlink($modelPath);
                }

                //delete controller
                $modelName = str_replace(' ', '', ucwords($model->menu)) ;
                $menu_of = str_replace(' ', '', ucwords($model->menu_of));
                $ControllerName = $modelName  ."Controller.php";
                $controllerPath = base_path('app/Http/Controllers/').$menu_of.'/'.$ControllerName;
                if(file_exists($controllerPath)){
                    unlink($controllerPath);
                }

                //delete table from database
                $table_name = Str::plural(str_replace(' ', '_', strtolower($model->menu)));

                $folder_path = base_path('public/admin/images/'.$table_name);
                if(file_exists($folder_path)){
                    File::deleteDirectory($folder_path);
                }

                Schema::drop($table_name);

                //re-create menu
                $model->menu_of = Str::lower($request->menu_of);
                $model->parent_id = $request->parent_id;
                $model->icon = $request->icon;
                $model->label = $request->label;
                $model->menu = str_replace(' ', '_', strtolower($request->menu));
                $model->url = Str::lower($request->menu_of).'/'.str_replace(' ', '_', strtolower($request->menu));
                $model->save();

                if($model){
                    $request['url'] = $model->url;
                    $request['route_url'] = Str::lower($request->menu_of).'.'.str_replace(' ', '_', strtolower($request->menu));
                    $this->addEntryInRoutes($request);
                    $this->createMigration($request);
                    $this->createController($request);
                    $this->createModel($request);
                    $this->createViews($request);
                }

                DB::commit();

                return redirect()->route('menu.index')->with('message', 'Menu Updated Successfully !');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* $model = Menu::where('id', $id)->delete();
        $onlySoftDeleted = Menu::onlyTrashed()->count();
        if($model){
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        } */

        $model = Menu::where('id', $id)->first();

        if($model){
            //delete resource route from web
            $controller_name = str_replace(' ', '', ucwords($model->menu)) ;
            $menu_of = Str::lower($model->menu_of);
            $controller_name = 'App\Http\Controllers'.'\\'.$menu_of.'\\'.$controller_name;
            $replace_line = "Route::resource('". $model->url."', '". $controller_name ."Controller');";

            $route_file = base_path().'/routes/web.php';
            $contents = file_get_contents($route_file);
            $contents = str_replace($replace_line, '', $contents);
            file_put_contents($route_file, $contents);

            //delete trash records route
            $replace_line = "Route::get('". $model->menu."/trash/records', '". $controller_name ."Controller@trashRecords')->name('".$menu_of.".".$model->menu.".trash.records');";
            $route_file = base_path().'/routes/web.php';
            $contents = file_get_contents($route_file);
            $contents = str_replace($replace_line, '', $contents);
            file_put_contents($route_file, $contents);

            //delete restore trash record route
            $replace_line = "Route::get('". $model->menu."/restore/{id}', '". $controller_name ."Controller@restore')->name('".$menu_of.".".$model->menu.".restore');";
            $route_file = base_path().'/routes/web.php';
            $contents = file_get_contents($route_file);
            $contents = str_replace($replace_line, '', $contents);
            file_put_contents($route_file, $contents);

            //delete migration file
            $migration_file = Str::plural(str_replace(' ', '_', strtolower($model->menu)));
            $migration_file_name = '_create_'.$migration_file ."_table";
            foreach(File::allFiles('database/migrations') as $file){
                if(str_contains($file,$migration_file_name)){
                    DB::table('migrations')->where('migration', 'like',  '%' .$migration_file_name)->delete();
                    unlink($file);
                }
            }

            //delete views with all files
            $modelName = str_replace(' ', '', ucwords($model->menu)) ;
            $viewFolderName = Str::plural(str::lower($modelName));
            $viewFolderPath = 'resources/views/'.$model->menu_of.'/'.$viewFolderName;
            if (\File::exists($viewFolderPath)){
                \File::deleteDirectory($viewFolderPath);
            }

            //delete model
            $modelName = str_replace(' ', '', ucwords($model->menu));
            $model_name = $modelName  .".php";
            $modelPath = base_path('app/Models/').$model_name;
            if(file_exists($modelPath)){
                unlink($modelPath);
            }

            //delete controller
            $modelName = str_replace(' ', '', ucwords($model->menu)) ;
            $menu_of = str_replace(' ', '', ucwords($model->menu_of));
            $ControllerName = $modelName  ."Controller.php";
            $controllerPath = base_path('app/Http/Controllers/').$menu_of.'/'.$ControllerName;
            if(file_exists($controllerPath)){
                unlink($controllerPath);
            }

            //delete table from database
            $table_name = Str::plural(str_replace(' ', '_', strtolower($model->menu)));

            $folder_path = base_path('public/admin/images/'.$table_name);
            if(file_exists($folder_path)){
                File::deleteDirectory($folder_path);
            }

            Schema::drop($table_name);

            $model->delete();

            $onlySoftDeleted = Menu::onlyTrashed()->count();
            if($model){
                return response()->json([
                    'status' => true,
                    'trash_records' => $onlySoftDeleted
                ]);
            }
        }
    }

    private function addEntryInRoutes($request){
        $controller_name = str_replace(' ', '', ucwords($request->menu)) ;
        $menu_of = Str::lower($request->menu_of);
        $controller_name = 'App\Http\Controllers'.'\\'.$menu_of.'\\'.$controller_name;
        $new_route = "Route::resource('". $request->url."', '". $controller_name ."Controller');";

        $trash_records_route = "Route::get('". $request->menu."/trash/records', '". $controller_name ."Controller@trashRecords')->name('".$menu_of.".".$request->menu.".trash.records');";
        $restore_record_route = "Route::get('". $request->menu."/restore/{id}', '". $controller_name ."Controller@restore')->name('".$menu_of.".".$request->menu.".restore');";

        //restore record
        $marker = '// auto-routes: admin';
        $routes = file_get_contents('routes/web.php');
        $routes = str_replace($marker, $marker . PHP_EOL . $restore_record_route, $routes);
        file_put_contents('routes/web.php', $routes);

        //fatch trash records route
        $marker = '// auto-routes: admin';
        $routes = file_get_contents('routes/web.php');
        $routes = str_replace($marker, $marker . PHP_EOL . $trash_records_route, $routes);
        file_put_contents('routes/web.php', $routes);

        $myfile = fopen(ROUTES_FILE, "a") or die("Unable to open file!");
        $txt = PHP_EOL . $new_route;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    private function createMigration($request){
        $column_strings = [];
        foreach($request->column_names as $key=>$name){
            $default_type = '';
            if($request->default_types[$key]=='nullable'){
                $default_type='->nullable();';
            }elseif($request->default_types[$key]=='default'){
                $default_type='->default("'.$request->defaults[$key].'");';
            }else{
                $default_type=';';
            }
            $column_strings[] = '$table->'.$request->types[$key].'("'.str_replace(' ', '_', strtolower($name)).'")'.$default_type;
        }

        $migration_string = implode(',', $column_strings);
        $migration_columns = str_replace(',', ' ', $migration_string);

        $migration_file = Str::plural(str_replace(' ', '_', strtolower($request->menu)));
        $migration_class_name = Str::plural(str_replace(' ', '', ucwords($request->menu))) ;
    	$migration_file_name = date('Y_m_d_his').'_create_'.$migration_file ."_table";
    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = MIGRATION_PATH ;
    	$modelFile = file_get_contents($templateFolder."/migration.php");

    	$str1 = str_replace('{MigrationClassName}', $migration_class_name, $modelFile);
    	$str1 = str_replace('{tableName}', $migration_file, $str1);
    	$str1 = str_replace('{tableColumns}', $migration_columns, $str1);

        $ext = ".php";
		$str1  = "<?php \n". $str1;

		$this->createFile($newDir , $migration_file_name , $ext , $str1);

        if(count($request->rel_tab_names)){
            foreach($request->rel_tab_names as $index=>$rel_tab){
                $column_strings = [];
                foreach($request->rel_tab_column_names[$index] as $key=>$name){
                    $default_type = '';
                    if($request->rel_tab_column_default_types[$index][$key]=='nullable'){
                        $default_type='->nullable();';
                    }elseif($request->rel_tab_column_default_types[$index][$key]=='default'){
                        $default_type='->default("'.$request->defaults[$index][$key].'");';
                    }else{
                        $default_type=';';
                    }
                    $column_strings[] = '$table->'.$request->rel_tab_column_types[$index][$key].'("'.str_replace(' ', '_', strtolower($name)).'")'.$default_type;
                }

                $foreign_key = $request->rel_tab_foreign_keys[$index];
                $column_strings[] = '$table->integer("'.$foreign_key.'");';

                $migration_string = implode(',', $column_strings);
                $migration_columns = str_replace(',', ' ', $migration_string);

                $migration_file = Str::plural(str_replace(' ', '_', strtolower($rel_tab)));
                $migration_class_name = Str::plural(str_replace(' ', '', ucwords($rel_tab))) ;
                $migration_file_name = date('Y_m_d_his').'_create_'.$migration_file ."_table";
                $root = base_path();
                $templateFolder = $root ."/crud-template";
                $newDir = MIGRATION_PATH ;
                $modelFile = file_get_contents($templateFolder."/migration.php");

                $str1 = str_replace('{MigrationClassName}', $migration_class_name, $modelFile);
                $str1 = str_replace('{tableName}', $migration_file, $str1);
                $str1 = str_replace('{tableColumns}', $migration_columns, $str1);

                $ext = ".php";
                $str1  = "<?php \n". $str1;

                $this->createFile($newDir , $migration_file_name , $ext , $str1);
            }
        }

        Artisan::call('migrate');

		// echo "Controller Successfully Created at ".$newDir ."/". $migration_file_name ."<BR>";

    }

    private function createController($data){
    	$modelName = str_replace(' ', '', ucwords($data->menu)) ;
        $route_menu = str_replace(' ', '_', strtolower($data->menu));
    	$ControllerName = $modelName  ."Controller";

		$viewFolderName = Str::plural(str_replace(' ', '_', strtolower($data->menu)));
        $viewFolderName = $data->menu_of.'.'.$viewFolderName;

    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = CONTROLLER_PATH ;
        $menu_of = str_replace(' ', '', ucwords($data->menu_of));
        $newDir = $newDir.'/'.Str::lower($menu_of);
        if(!is_dir($newDir)){
			mkdir($newDir);
		}

    	$controllerFile = file_get_contents($templateFolder."/controller.php");

        $table_name = Str::plural(str_replace(' ', '_', strtolower($data->menu)));
        $columns = DB::select('show columns from ' . $table_name);

        $search_columns  = '';
        $boolean = true;
        $upload_fields = [];
		foreach ($columns as $key=>$value) {
            if ($value->Field != 'id' && $value->Field != 'deleted_at' && $value->Field != 'created_at' && $value->Field != 'updated_at' && $value->Field != 'status') {
                $type = explode('(', $value->Type);

                if ($boolean) {
                    $boolean = false;
                    $search_columns .=  '$query->where("'.$value->Field.'", "like", "%". $request["search"] ."%");';
                }else{
                    $search_columns .=  '$query->orWhere("'.$value->Field.'", "like", "%". $request["search"] ."%");';
                }
                if($type[0]=='binary' || $type[0]=='varbinary' || $type[0]=='blob'){
                    $upload_fields[] = $value->Field;
                }
            }
		}

        $upload_file = "";
        $update_validation_fields = '';
        if(count($upload_fields)){
            foreach ($upload_fields as $upload) {
                $upload_file  .= 'if (isset($request->'.$upload.')) {'.
                                    '$'.$upload.' = Str::random(5).date("d-m-Y-His").".".$request->file("'.$upload.'")->getClientOriginalExtension();'.
                                    '$request->'.$upload.'->move(public_path("/admin/images/'.$table_name.'"), $'.$upload.');'.
                                    '$input["'.$upload.'"]'.' = $'.$upload.';'.
                                '}';
                $update_validation_fields .= 'if($model->'.$upload.'){'.
                                                'unset($validation["'.$upload.'"]);'.
                                            '}';
            }
        }
        $authorize_menu = $data->menu;
    	$str1 = str_replace('{modelName}', $modelName, $controllerFile);
    	$str1 = str_replace('{menuof}', Str::lower($menu_of), $str1);
    	$str1 = str_replace('{menu_authorize}', $authorize_menu, $str1);
    	$str1 = str_replace('{menuName}', $route_menu, $str1);
    	$str1 = str_replace('{viewFolderName}', $viewFolderName, $str1);
    	$str1 = str_replace('{ControllerName}', $ControllerName, $str1);
    	$str1 = str_replace('{searchColumns}', $search_columns, $str1);
    	$str1 = str_replace('{upload}', $upload_file, $str1);
    	$str1 = str_replace('{table_name}', $table_name, $str1);
    	$str1 = str_replace('{update_validation}', $update_validation_fields, $str1);

		$ext = ".php";
		$str1  = "<?php \n". $str1;

		$this->createFile($newDir , $ControllerName , $ext , $str1);

		// echo "Controller Successfully Created at ".$newDir ."/". $ControllerName ."<BR>";

    }

    private function createModel($data){
    	$modelName = str_replace(' ', '', ucwords($data->menu));
        $table_name = Str::plural(str_replace(' ', '_', strtolower($data->menu)));
    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = MODEL_PATH;

    	$modelFile = file_get_contents($templateFolder."/model.php");
    	$str1 = str_replace('{modelName}', $modelName, $modelFile);
    	$str1 = str_replace('{tableName}', $table_name, $str1);

        $columns = DB::select('show columns from ' . $table_name);

        $temp  = array();
		$temp2 = array();
		$conditions  = "";
		foreach ($columns as $value) {
            if ($value->Field != 'id' && $value->Field != 'deleted_at' && $value->Field != 'created_at' && $value->Field != 'updated_at' && $value->Field != 'status') {
                $temp[] = $value->Field;
                if ($value->Null == "NO") {
                    $temp2[] .=  "'".$value->Field . "' => 'required'" ;
                }
                $conditions .='if(!empty(Input::get("'.$value->Field.'"))){
                $query->where("'.$value->Field.'","=",Input::get("'.$value->Field.'"));
                } ' ."\n";
            }
		}

        $relations = '';
        if(count($data->rel_tab_names)){
            foreach($data->rel_tab_names as $index=>$rel_tab){
                $modelName = str_replace(' ', '', ucwords($rel_tab)) ;
                $table_name = Str::plural(str_replace(' ', '_', strtolower($rel_tab)));
                $root = base_path();
                $templateFolder = $root ."/crud-template";
                $newDir = MODEL_PATH;

                foreach ($data->rel_tab_relations[$index] as $r_key => $relation) {
                    $foreign_key = $data->rel_tab_foreign_keys[$r_key];
                    $relations .= 'public function has'.Str::ucfirst($rel_tab).'(){'.
                                    '$this->'.$relation.'('.$rel_tab.'::class,"'.$foreign_key.'", "id")'.
                                '}';
                }

                $modelFile = file_get_contents($templateFolder."/model.php");
                $str1 = str_replace('{modelName}', $modelName, $modelFile);
                $str1 = str_replace('{tableName}', $table_name, $str1);

                $columns = DB::select('show columns from ' . $table_name);

                $temp  = array();
                $temp2 = array();
                $conditions  = "";
                foreach ($columns as $value) {
                    if ($value->Field != 'id' && $value->Field != 'deleted_at' && $value->Field != 'created_at' && $value->Field != 'updated_at' && $value->Field != 'status') {
                        $temp[] = $value->Field;
                        if ($value->Null == "NO") {
                            $temp2[] .=  "'".$value->Field . "' => 'required'" ;
                        }
                        $conditions .='if(!empty(Input::get("'.$value->Field.'"))){
                        $query->where("'.$value->Field.'","=",Input::get("'.$value->Field.'"));
                        } ' ."\n";
                    }
                }

                $fieldsName = "'".implode("','", $temp) ."'";
                $rules = implode(",", $temp2);
                $str1 = str_replace('{fieldsNameOnly}', $fieldsName, $str1);
                $str1 = str_replace('{rules}', $rules, $str1);
                $str1 = str_replace('{conditions}', $conditions, $str1);
                if(!is_dir($newDir)){
                    mkdir($newDir);
                }

                $ext = ".php";
                $str1  = "<?php \n". $str1;
                $this->createFile($newDir , $modelName , $ext , $str1);
            }
        }

        $fieldsName = "'".implode("','", $temp) ."'";
		$rules = implode(",", $temp2);
		$str1 = str_replace('{fieldsNameOnly}', $fieldsName, $str1);
		$str1 = str_replace('{rules}', $rules, $str1);
		$str1 = str_replace('{conditions}', $conditions, $str1);
        $str1 = str_replace('{relations}', $relations, $str1);
		if(!is_dir($newDir)){
			mkdir($newDir);
		}

		$ext = ".php";
		$str1  = "<?php \n". $str1;
		$this->createFile($newDir , $modelName , $ext , $str1);

		echo "Model Successfully Created at ".$newDir ."/". $modelName ."<BR>";
    }

    private function createViews($data){
        $table_name = Str::plural(str_replace(' ', '_', strtolower($data->menu)));
        $route_menu = str_replace(' ', '_', strtolower($data->menu));
        $modelName = str_replace(' ', '', ucwords($data->menu)) ;

        $viewFolderName =$table_name;

    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = VIEW_PATH ;

    	$newViewDir = $newDir ."/".$data->menu_of;
        if(!is_dir($newViewDir)){
			mkdir($newViewDir);
		}

        $newViewDir = $newViewDir."/".$viewFolderName;

        if(!is_dir($newViewDir)){
			mkdir($newViewDir);
		}

    	$indexFile = file_get_contents($templateFolder."/templateViews/index.blade.php");
        $createFile = file_get_contents($templateFolder."/templateViews/create.blade.php");
    	$editFile = file_get_contents($templateFolder."/templateViews/edit.blade.php");
    	$showFile = file_get_contents($templateFolder."/templateViews/show.blade.php");
        $searchFile = file_get_contents($templateFolder."/templateViews/_search.blade.php");

        //trash files
        $trash_index_file = file_get_contents($templateFolder."/templateViews/trash-index.blade.php");
        $trash_search_file = file_get_contents($templateFolder."/templateViews/trash-search.blade.php");

    	$form = '';
    	$edit_form = '';
        $show_form = '';
    	$index_page = "";
    	$trash_index_page = "";
    	$show  = "";
        $t_columns = "";

    	$columns = DB::select('show columns from ' . $table_name);

        $total_columns = count($columns);
        $create_page_title = ucwords($data->menu);
        foreach ($columns as $value) {
            if ($value->Field != 'id' && $value->Field != 'deleted_at' && $value->Field != 'created_at' && $value->Field != 'updated_at') {
                $type = explode('(', $value->Type);
                $t_columns.='<th>'.Str::upper($value->Field).'</th>';

                $form .= ' <div class="row mb-6">' ."\n";
                $edit_form .= ' <div class="row mb-6">' ."\n";

                $if_required = '';
                if($value->Null=='NO'){
                    $if_required = 'required';
                }

                $form .= '<label for="'.$value->Field.'" class="col-lg-2 col-form-label '.$if_required.' fw-bold fs-6">'.ucfirst($value->Field).'</label>';
                $form .= '<div class="col-lg-8 fv-row">';
                        if($type[0]=='text'){
                            $form .= '<textarea class="form-control ckeditor form-control-lg form-control-solid" id="'.$value->Field.'" name="'.$value->Field.'" placeholder="Enter '.$value->Field.'">{{ old("'.$value->Field.'") }}</textarea>'."\n";
                        }elseif($type[0]=='tinyint'){
                            $form .= '<select class="selectpicker" name="status" data-live-search="true">'.
                                        '<option value="1" {{ old("status")==1?"selected":"" }}>Active</option>'.
                                        '<option value="0" {{ old("status")==0?"selected":"" }}>In Active</option>'.
                                    '</select>';
                        }elseif($type[0]=='varchar'){
                            $form .= '<input type="text" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ old("'.$value->Field.'") }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }elseif($type[0]=='int' || $type[0]=='bigint' || $type[0]=='decimal' || $type[0]=='float' || $type[0]=='double'){
                            $form .= '<input type="number" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ old("'.$value->Field.'") }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }elseif($type[0]=='binary' || $type[0]=='varbinary' || $type[0]=='blob'){
                            $form .= '@php $default = asset("public/default.png"); @endphp';
                            $form .='<div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url({{ $default }})">'.
                                        '<div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>'.

                                        '<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Logo">'.
                                            '<i class="bi bi-pencil-fill fs-7"></i>'.

                                            '<input type="file" name="'.$value->Field.'" accept=".png, .jpg, .jpeg"/>'.
                                        '</label>'.

                                        '<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Logo">'.
                                            '<i class="bi bi-x fs-2"></i>'.
                                        '</span>'.

                                        '<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Logo">'.
                                            '<i class="bi bi-x fs-2"></i>'.
                                        '</span>'.
                                    '</div>';
                            $file_path = public_path('admin/images/'.$table_name);
                            if(!File::isDirectory($file_path)){
                                File::makeDirectory($file_path, 0777, true, true);
                            }
                        }else{
                            $form .= '<input type="'.$type[0].'" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ old("'.$value->Field.'") }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }

                        $form .= '<span style="color: red">{{ $errors->first("'.$value->Field.'") }}</span>'.
                    '</div>';

                $form .= '</div>';

                //Edit form
                $edit_form .= '<label for="'.$value->Field.'" class="col-lg-2 col-form-label '.$if_required.' fw-bold fs-6">'.ucfirst($value->Field).'</label>';

                $edit_form .='<div class="col-md-6 col-sm-6">';
                        if($type[0]=='text'){
                            $edit_form .= '<textarea class="ckeditor form-control form-control-lg form-control-solid" id="'.$value->Field.'" name="'.$value->Field.'">{{ $model->'.$value->Field.' }}</textarea>'."\n";
                        }elseif($type[0]=='tinyint'){
                            $edit_form .= '<select class="selectpicker" name="status">'.
                                        '<option value="1" {{ $model->'.$value->Field.'==1?"selected":"" }}>Active</option>'.
                                        '<option value="0" {{ $model->'.$value->Field.'==0?"selected":"" }}>In Active</option>'.
                                    '</select>';
                        }elseif($type[0]=='varchar'){
                            $edit_form .= '<input type="text" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ $model->'.$value->Field.' }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }elseif($type[0]=='binary' || $type[0]=='varbinary' || $type[0]=='blob'){
                            $edit_form .= '@php $default = asset("public/default.png"); @endphp '.
                                            '@if ($model->'.$value->Field.')'.
                                                ' @php $default = asset("public/admin/images/'.$table_name.'")."/".$model->'.$value->Field.'; @endphp '.
                                            '@endif ';
                            $edit_form .='<div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url({{ $default }})">'.
                                        '<div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>'.

                                        '<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Logo">'.
                                            '<i class="bi bi-pencil-fill fs-7"></i>'.

                                            '<input type="file" name="'.$value->Field.'" accept=".png, .jpg, .jpeg"/>'.
                                        '</label>'.

                                        '<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Logo">'.
                                            '<i class="bi bi-x fs-2"></i>'.
                                        '</span>'.

                                        '<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Logo">'.
                                            '<i class="bi bi-x fs-2"></i>'.
                                        '</span>'.
                                    '</div>';
                            $file_path = public_path('admin/images/'.$table_name);
                        }elseif($type[0]=='int' || $type[0]=='bigint' || $type[0]=='decimal' || $type[0]=='float' || $type[0]=='double'){
                            $edit_form .= '<input type="number" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ $model->'.$value->Field.' }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }else{
                            $edit_form .= '<input type="'.$type[0].'" class="form-control form-control-lg form-control-solid" name="'.$value->Field.'" value="{{ $model->'.$value->Field.' }}" placeholder="Enter '.$value->Field.'">'."\n";
                        }

                        $edit_form .= '<span style="color: red">{{ $errors->first("'.$value->Field.'") }}</span>'.
                    '</div>'.
                '</div>';

                if($value->Field=='status'){
                    $index_page .= '<td>'.
                                        '@if($model->status)'.
                                            '<span class="badge badge-success">Active</span>'.
                                        '@else'.
                                            '<span class="badge badge-danger">In-Active</span>'.
                                        '@endif'.
                                    '</td>';
                    $trash_index_page .= '<td>'.
                                            '@if($model->status)'.
                                                '<span class="badge badge-success">Active</span>'.
                                            '@else'.
                                                '<span class="badge badge-danger">In-Active</span>'.
                                            '@endif'.
                                        '</td>';

                    $show_form .= '<tr>'.
                                    '<th>'.ucfirst($value->Field).'</th>'.
                                    '<td>'.
                                        '@if($model->status)'.
                                            '<span class="badge badge-success">Active</span>'.
                                        '@else'.
                                            '<span class="badge badge-danger">In-Active</span>'.
                                        '@endif'.
                                    '</td>'.
                                '</tr>';
                }elseif($type[0]=='date'){
                    $index_page .= '<td>{{ date("d, M-Y", strtotime($model->'.$value->Field.')) }}</td>';
                    $trash_index_page .= '<td>{{ date("d, M-Y", strtotime($model->'.$value->Field.')) }}</td>';
                    $show_form .= '<tr><th>'.ucfirst($value->Field).'</th><td>{{ date("d, M-Y", strtotime($model->'.$value->Field.')) }}</td></tr>';
                }elseif($type[0]=='binary' || $type[0]=='varbinary' || $type[0]=='blob'){
                    $index_page .= '<td>'.
                                        '@if($model->'.$value->Field.')'.
                                            '<img style="border-radius: 50%;" src="{{ asset("public/admin/images/'.$table_name.'") }}/{{ $model->'.$value->Field.' }}" width="50px" height="50px" alt="">'.
                                        '@else'.
                                            '<img style="border-radius: 50%;" src="{{ asset("public/default.png") }}" width="50px" height="50px" alt="">'.
                                        '@endif'.
                                    '</td>';
                    $trash_index_page .= '<td>'.
                                    '@if($model->'.$value->Field.')'.
                                        '<img style="border-radius: 50%;" src="{{ asset("public/admin/images/'.$table_name.'") }}/{{ $model->'.$value->Field.' }}" width="50px" height="50px" alt="">'.
                                    '@else'.
                                        '<img style="border-radius: 50%;" src="{{ asset("public/default.png") }}" width="50px" height="50px" alt="">'.
                                    '@endif'.
                                '</td>';

                    $show_form .= '<tr><th>'.ucfirst($value->Field).'</th><td>'.
                                        '@if($model->'.$value->Field.')'.
                                            '<img style="border-radius: 50%;" src="{{ asset("public/admin/images/'.$table_name.'") }}/{{ $model->'.$value->Field.' }}" width="50px" height="50px" alt="">'.
                                        '@else'.
                                            '<img style="border-radius: 50%;" src="{{ asset("public/default.png") }}" width="50px" height="50px" alt="">'.
                                        '@endif'.
                                    '</td></tr>';
                }elseif($type[0]=='text'){
                    $index_page .= '<td>{!! Str::limit($model->'.$value->Field.', 20) !!}</td>';
                    $trash_index_page .= '<td>{!! Str::limit($model->'.$value->Field.', 20) !!}</td>';
                    $show_form .= '<tr><th>'.ucfirst($value->Field).'</th><td>{!! $model->'.$value->Field.' !!}</td></tr>';
                }else{
                    $index_page .= '<td>{!! $model->'.$value->Field.' !!}</td>';
                    $trash_index_page .= '<td>{!! $model->'.$value->Field.' !!}</td>';
                    $show_form .= '<tr><th width="250px">'.ucfirst($value->Field).'</th><td>{!! $model->'.$value->Field.' !!}</td></tr>';
                }
            }
		}

        $index_page .= '<td width="250px">'.
                    '<a href="{{ route("'.$route_menu.'.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show '.Str::ucfirst($modelName).'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>'.
                    '<a href="{{ route("'.$route_menu.'.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit '.Str::ucfirst($modelName).'" class="btn btn-primary btn-sm" style="margin-left: 3px;"><i class="fa fa-edit"></i></a>'.
                    '<button data-toggle="tooltip" data-placement="top" title="Delete '.Str::ucfirst($modelName).'" class="btn btn-danger btn-sm delete" data-slug="{{ $model->id }}" data-del-url="{{ route("'.$route_menu.'.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>'.
                '</td>';

        $trash_index_page .= '<td width="250px">'.
                '<a href="{{ route("'.$data->route_url.'.restore", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Restore '.Str::ucfirst($modelName).'" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Restore</a>'.
            '</td>';

		$createForm = $form;
        /* $createForm .= '<label for="" class="col-form-label col-md-3 col-sm-3  label-align"></label>'."\n".
                        '<div class="col-sm-6">'.
                            '<button type="submit" class="btn btn-success pull-left">Save</button>'.
                        '</div>'; */

        $menu_plural = ucfirst(str::plural($data->route_url));
		$createForm = str_replace('{createForm}', $createForm, $createFile);
		$createForm = str_replace('{store_route}', '{{ route("'.$route_menu.'.store") }}', $createForm);
		$createForm = str_replace('{view_all_route}', '{{ route("'.$route_menu.'.index") }}', $createForm);
		$createForm = str_replace('{page_title}', 'Add New '.$create_page_title, $createForm);
		$createForm = str_replace('{index_route}', $route_menu, $createForm);
		$createForm = str_replace('{menu_plural}', $menu_plural, $createForm);

		$updateForm = $edit_form;
        /* $updateForm .= '<label for="" class="col-form-label col-md-3 col-sm-3  label-align"></label>'."\n".
                        '<div class="col-sm-6">'.
                            '<button type="submit" class="btn btn-success pull-left">Save</button>'.
                        '</div>'; */
		$updateForm = str_replace('{createForm}', $updateForm, $editFile);
        $updateForm = str_replace('{store_route}', '{{ route("'.$route_menu.'.update", $model->id) }}', $updateForm);
		$updateForm = str_replace('{view_all_route}', '{{ route("'.$route_menu.'.index") }}', $updateForm);
        $updateForm = str_replace('{page_title}', 'Edit '.$create_page_title, $updateForm);
        $updateForm = str_replace('{index_route}', $route_menu, $updateForm);
        $updateForm = str_replace('{menu_plural}', $menu_plural, $updateForm);

		$searchForm = str_replace('{index}', $index_page, $searchFile);
		$searchForm = str_replace('{totalColumns}', $total_columns, $searchForm);

		$index = str_replace('{create_create_title}', 'Add New '.$create_page_title, $indexFile);
		$index = str_replace('{create_route}', $route_menu, $index);
		$index = str_replace('{index_route}', $route_menu, $index);
		$index = str_replace('{tcolumns}', $t_columns, $index);
		$index = str_replace('{index}', $index_page, $index);
		$index = str_replace('{totalColumns}', $total_columns, $index);
		$index = str_replace('{trash_index_route}', $data->route_url, $index);
		$index = str_replace('{menu_title}', Str::ucfirst($data->menu), $index);

        //trash index
        $trash_index = str_replace('{trash_index_route}', $data->route_url , $trash_index_file);
        $trash_index = str_replace('{tcolumns}', $t_columns , $trash_index);
        $trash_index = str_replace('{index}', $trash_index_page , $trash_index);

        //trash search
        $trash_search = str_replace('{index}', $index_page , $trash_search_file);

		$show = str_replace('{show_form}', $show_form, $showFile);
        $show = str_replace('{view_all_route}', '{{ route("'.$route_menu.'.index") }}', $show);
        $show = str_replace('{page_title}', 'Show '.$create_page_title, $show);
        $show = str_replace('{index_route}', $route_menu, $show);
        $show = str_replace('{menu_plural}', $menu_plural, $show);

		$files = array();
		$files["_search"] = $searchForm;
		$files["create"] = $createForm;
		$files["edit"] = $updateForm;
		$files["index"] = $index;
		$files["show"] = $show;
		$files["trash-index"] = $trash_index;
		$files["trash-search"] = $trash_search;

		foreach($files as $filename => $content){
			$ext = ".blade.php";
			$this->createFile($newViewDir , $filename , $ext , $content);
			echo "Controller Successfully Created at ".$templateFolder ."/views/". $filename.$ext ."<BR>";
		}
    }

    private function createFile($dir , $fileName ,  $ext , $content){
    	$myfile = fopen($dir."/".$fileName. $ext, "w") or die("Unable to open file!");
		$txt = $content;
		fwrite($myfile, $txt);
		fclose($myfile);
    }

    public function trashRecords(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Menu::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('menu', 'like', '%'. $request['search'] .'%');
                $query->orWhere('label', 'like', '%'. $request['search'] .'%');
                $query->orWhere('status', 'like', '%'. $request['search'] .'%');
                $query->orWhere('parent_id', 'like', '%'. $request['search'] .'%');
                $query->orWhere('menu_of', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                $query->where('menu_of', $request['status']);
            }
            $models = $query->where('deleted_at', '!=', NULL)->paginate($per_page_records);
            return (string) view('admin.menus.trash-search', compact('models'));
        }
        $models = Menu::onlyTrashed()->paginate($per_page_records);
        return view('admin.menus.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Menu::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
