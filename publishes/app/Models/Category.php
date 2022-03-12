<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\JsonCast;


class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "parent_id", "sort", "tags", "active"];

    public static $listFields = ["name", "slug", "parent_id", "sort", "tags", "active"];

    protected $casts = [
        "name" => "string",
		"slug" => "string",
		"parent_id" => "integer",
		"sort" => "integer",
		"tags" => JsonCast::class,
		//"active" => "boolean",

    ];
}
