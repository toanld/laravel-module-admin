<?php

namespace Hungnm28\LaravelModuleAdmin\Traits;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

trait WithAdminTrait
{
    use AuthorizesRequests;

    public $record_id;
    public $done = 0;

    /**
     * @param $propertyName
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * @param $route
     * @param $id
     */
    public function redirectForm($route, $id, $params = [])
    {
        switch ($this->done) {
            case 0:
                $this->redirect(route("$route.create", $params));
                break;
            case 1:
                $params["record_id"] = $id;
                $this->redirect(route("$route.show", $params));
                break;
            case 2:
                $params["record_id"] = $id;
                $this->redirect(route("$route.edit", $params));
                break;
            default:
                $this->redirect(route($route));
        }
    }

    /**
     * @param $name
     * @param $param
     * @return false|void
     */
    public function addItem($name, $param)
    {
        $param = trim($param);
        if ($param == '') return false;
        if (isset($this->$name)) {
            $data = $this->$name;
            $data[] = $param;
            $this->$name = array_keys(array_flip($data));
        }
    }

    /**
     * @param $val
     * @param $k
     */
    public function removeItem($val, $k)
    {
        if (isset($this->$val) && isset($this->$val[$k])) {
            unset($this->$val[$k]);
            $this->$val = array_values($this->$val);
        }
    }

    /**
     * @param $name
     * @return int[]|string[]
     */
    private function getArrayParams($name)
    {
        $data = $this->$name;
        foreach ($data as $k => $val) {
            $val = trim($val);
            if ($val == "") {
                unset($data[$k]);
            }
        }
        return array_keys(array_flip($data));
    }

    /**
     *
     */
    public function resetForm()
    {
        $this->redirect(request()->header('Referer'));
    }
}
