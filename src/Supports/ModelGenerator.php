<?php

namespace Hungnm28\LaravelModuleAdmin\Supports;

use Illuminate\Database\Eloquent\Model;

class ModelGenerator
{
    public $model;
    protected $fieldTypeMapping = [
        'ip' => 'ip',
        'email' => 'email|mail',
        'password' => 'password|pwd',
        'url' => 'url|link|src|href',
        'mobile' => 'mobile|phone',
        'color' => 'color|rgb',
        'image' => 'image|img|avatar|pic|picture|cover',
        'file' => 'file|attachment',
    ];
    protected $fieldRulerMapping = [
        "name" => "string"
        , "email" => "email"
        , "password" => "required|min:8"
        , "url" => "url"
    ];

    private $doctrineTypeMapping = [
        'string' => [
            'enum', 'geometry', 'geometrycollection', 'linestring',
            'polygon', 'multilinestring', 'multipoint', 'multipolygon',
            'point',
        ],
    ];

    public function __construct($model)
    {
        $this->model = $this->getModel($model);
    }

    public function getFields()
    {
        $reservedColumns = $this->getReservedColumns();

        $output = [];
        foreach ($this->getTableColumns() as $column) {
            $name = $column->getName();
            if (in_array($name, $reservedColumns)) {
                continue;
            }
            $type = $column->getType()->getName();
            $default = $column->getDefault();
            $notnull = $column->getNotnull();
            $defaultValue = '';
            // set column fieldType and defaultValue
            switch ($type) {
                case 'boolean':
                case 'bool':
                    $fieldType = 'boolean';
                    break;
                case 'json':
                    $fieldType = "json";
                    break;
                case 'array':
                    $fieldType = "array";
                    break;
                case 'object':
                    $fieldType = "object";
                    break;
                case 'string':
                    $fieldType = 'text';
                    foreach ($this->fieldTypeMapping as $type => $regex) {
                        if (preg_match("/^($regex)$/i", $name) !== 0) {
                            $fieldType = $type;
                            break;
                        }
                    }
                    $defaultValue = "'{$default}'";
                    break;
                case 'integer':
                case 'bigint':
                case 'smallint':
                case 'timestamp':
                    $fieldType = 'number';
                    break;
                case 'decimal':
                case 'float':
                case 'real':
                    $fieldType = 'decimal';
                    break;
                case 'datetime':
                    $fieldType = 'datetime';
                    $defaultValue = "date('Y-m-d H:i:s')";
                    break;
                case 'date':
                    $fieldType = 'date';
                    $defaultValue = "date('Y-m-d')";
                    break;
                case 'time':
                    $fieldType = 'time';
                    $defaultValue = "date('H:i:s')";
                    break;
                case 'text':
                case 'blob':
                    $fieldType = 'textarea';
                    break;
                default:
                    $fieldType = 'text';
                    $defaultValue = "'{$default}'";
            }

            $defaultValue = $defaultValue ?: $default;

            $label = $this->formatLabel($name);
            $ruler = "";
            if ($notnull) $ruler = data_get($this->fieldRulerMapping, $name, $ruler);
            $output[$name] = (object)[
                "name" => $name
                , "label" => $label
                , "type" => $fieldType
                , "notnull" => $notnull
                , "default" => $defaultValue
                , "rule" => $ruler
            ];
        }
        return (object)$output;

    }

    protected function getModel($model)
    {
        if ($model instanceof Model) {
            return $model;
        }
        if (class_exists($model) && is_subclass_of($model, Model::class)) {
            return new $model();
        }
        $model = "App\\Models\\$model";
        if (class_exists($model) && is_subclass_of($model, Model::class)) {
            return new $model();
        }
        throw new \InvalidArgumentException("Invalid model [$model] !");
    }

    protected function getTableColumns()
    {
        if (!$this->model->getConnection()->isDoctrineAvailable()) {
            throw new \Exception(
                'You need to require doctrine/dbal: ~2.3 in your own composer.json to get database columns. '
            );
        }

        $table = $this->model->getConnection()->getTablePrefix() . $this->model->getTable();
        /** @var \Doctrine\DBAL\Schema\MySqlSchemaManager $schema */
        $schema = $this->model->getConnection()->getDoctrineSchemaManager($table);

        // custom mapping the types that doctrine/dbal does not support
        $databasePlatform = $schema->getDatabasePlatform();

        foreach ($this->doctrineTypeMapping as $doctrineType => $dbTypes) {
            foreach ($dbTypes as $dbType) {
                $databasePlatform->registerDoctrineTypeMapping($dbType, $doctrineType);
            }
        }

        $database = null;
        if (strpos($table, '.')) {
            list($database, $table) = explode('.', $table);
        }
        return $schema->listTableColumns($table, $database);
    }

    protected function formatLabel($value)
    {
        return ucfirst(str_replace(['-', '_'], ' ', $value));
    }

    protected function getReservedColumns()
    {
        return [
            $this->model->getKeyName(),
            $this->model->getCreatedAtColumn(),
            $this->model->getUpdatedAtColumn(),
            'deleted_at',
            'remember_token',
            'two_factor_recovery_codes',
            'two_factor_secret'
        ];
    }

}
