<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Hungnm28\LaravelModuleAdmin\Traits\CommandTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModelCommand extends Command
{

    use CommandTrait;

    protected $signature = 'lma:model {name}';

    protected $description = 'Make model page';


    public function handle()
    {
        $this->generateModel($this->argument("name"));
        $this->createModel();

    }

    protected function createModel()
    {
        $dumpFields = "";
        $dumCastClass = "";
        $dumCasts = "";
        $dumpListFields ="\"id\"";
        foreach ($this->fields as $f => $row) {
            $dumpFields .= "\"$f\", ";
            $dumpListFields .= ", \"$f\"";
            switch ($row->type) {
                case "json":
                case "array":
                case "object":
                    $dumCastClass .= "use App\Casts\JsonCast;\n";
                    $dumCasts .= "\"$f\" => JsonCast::class,\r\n\t\t";
                    break;
                case "text":
                    $dumCasts .= "\"$f\" => \"string\",\r\n\t\t";
                    break;
                case "textarea":
                    $dumCastClass .= "use App\Casts\HtmlCast;\n";
                    $dumCasts .= "\"$f\" => HtmlCast::class,\r\n\t\t";
                    break;
                case "number":
                    $dumCasts .= "\"$f\" => \"integer\",\r\n\t\t";
                    break;
                default:
                    $dumCasts .= "\"$f\" => \"$row->type\",\r\n\t\t";
            }
        }
        $dumpFields = trim($dumpFields, ", ");
        $dumCasts = trim($dumCasts, ",");
        $dumpListFields .= ", \"updated_at\", \"created_at\"";
        $stub = $this->getStub("model.stub");
        $template = str_replace(
            [
                'DumMyCastsClass',
                'DumMyClassName',
                'DumMyFillable',
                'DumMyListFields',
                'DumMyCasts'
            ],
            [
                $dumCastClass,
                $this->argument("name"),
                $dumpFields,
                $dumpListFields,
                $dumCasts
            ],
            $stub
        );
        $pathSave = app_path("Models/" . $this->argument("name") . ".php");
        return File::put($pathSave, $template);

    }
}
