<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Hungnm28\LaravelModuleAdmin\Traits\CommandTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeEditCommand extends Command
{
    use CommandTrait;

    protected $signature = 'lma:make-edit {name} {--model=}';

    protected $description = 'Make edit';

    public function handle()
    {
        $name = $this->argument('name');
        $name = Str::studly($name);
        $modelName = $this->option("model");
        $this->folder = $name;
        if (!$modelName) {
            $modelName = Str::singular($name);
            $modelName = Str::studly($modelName);
        }
        $this->model = $modelName;

        $this->generateModel($modelName);
        $this->makeClass();
        $this->makeView();
    }

    private function makeClass()
    {
        $pathSave = $this->class_path("Edit.php");
        $stub = $this->getStub('edit-class.stub');
        $dumpFields = "";
        $dumpRules = "";
        $dumpFormField = "";
        $dumDataSet = "";
        foreach ($this->fields as $f => $row) {
            $dumpFields .= $this->generateField($row);
            $dumpRules .= "'$f' => '$row->rule', \r\n\t\t";
            $dumpFormField .= "'$f' => " . '$this->' . $f . ", \r\n\t\t\t";
            $dumDataSet .= '$this->'.$f. ' = $data->'.$f . "; \r\n\t\t";
        }
        $dumpFields = rtrim($dumpFields, ", ");
        $route = config('lma.module.route') . "." . $this->getFonderDot();
        $stub = str_replace([
            'DumMyNamespace',
            'DumMyModelClass',
            'DumMyListFields',
            'DumMyRules',
            'DumMySetData',
            'DumMyModelName',
            'DumMyFormFields',
            'DumMyRoute',
            'DumMyViewFolder',
            'DumMyTitle'
        ], [
            $this->getNamespace(),
            "App\Models\\$this->model",
            $dumpFields,
            $dumpRules,
            $dumDataSet,
            $this->model,
            $dumpFormField,
            $route,
            $this->getFonderDot(),
            Str::headline(Str::replace("/"," ",$this->folder))
        ], $stub);


        return File::put($pathSave, $stub);
    }

    private function makeView()
    {
        $stub = $this->getStub("edit-view.stub");
        $pathSave = $this->view_path("edit.blade.php");
        $route = config('lma.module.route') . "." . $this->getFonderDot();
        $content = '';
        foreach ($this->fields as $row) {
            $content .= $this->generateView($row) . "\r\n\t\t";
        }
        $stub = str_replace([
            'DumMyTitle',
            'DumMyRoute',
            'DumMyContent',
        ],
            [
                Str::headline($this->folder),
                $route,
                $content
            ], $stub);

        return File::put($pathSave, $stub);
    }

    private function generateField($item)
    {
        switch ($item->type) {
            case "boolean":
                return '$' . $item->name . '=' . $item->default . ', ';
            case "json":
            case "array":
            case "object":
                return "$" . $item->name . "= [], ";
            case "text":
            case "textarea":
            case "number":
            case "decimal":
                if ($item->default) {
                    return '$' . $item->name . '=' . $item->default . ', ';
                }
            default:
                return "$" . $item->name . ", ";
        }
    }

    private function generateView($item)
    {
        switch ($item->type) {
            case 'textarea':
                return '<x-lma.forms.textarea name="' . $item->name . '" label="' . $item->label . '" />';
            case 'boolean':
                return '<x-lma.forms.toggle name="' . $item->name . '" label="' . $item->label . '" />';
            case 'json':
            case 'array':
            case 'object':
                return '<x-lma.forms.array  name="' . $item->name . '" label="' . $item->label . '" :data="$' . $item->name . '"/>';
            default:
                return '<x-lma.forms.input type="' . $item->type . '" name="' . $item->name . '" label="' . $item->label . '" />';
        }
    }
}
