<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BaoPham\DynamoDb\DynamoDbModel;

class Todo extends DynamoDbModel
{
    use HasFactory;

    protected $primaryKey = 'id';   // required
    /*protected $table = 'Todos';*/
    // name of the partition key (required)*/*/

    /*protected $fillable = ['uuid', 'name', 'description', 'created_at', 'updated_at'];*/
}
